<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"> -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.4/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.7/sb-1.3.4/sp-2.0.2/sl-1.4.0/sr-1.1.1/datatables.min.css" />

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.4/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.7/sb-1.3.4/sp-2.0.2/sl-1.4.0/sr-1.1.1/datatables.min.js"></script>



<!-- <div class="col-8">
    <button type="button" class="btn btn-primary">Crear</button>
</div> -->

<!-- ------------------------------------------------------- -->
<?php
session_start();
if(!(isset($_SESSION['usuario'])&&strlen($_SESSION['usuario'])>1)){
  header("location: index.php?e=error");
}
include "modal_pro.php";
?>




<!-- ------------------------------------------------------- -->

<div class="row">

  <div class="col-md-1">
  </div>
  <div class="col-md-10">

    <body>
      <table class="table table-striped table-hover table table-bordered" id="productos">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Descripcion</th>
            <th>Imagen</th>



          </tr>
        </thead>
        <tbody>


          <?php
          include "conexion.php";
          echo '<a href="logout.php" class="btn btn-danger">Salir</a>';
          
          $sql = "SELECT * FROM producto LIMIT 50";

          $datos = $cone->query($sql);

          foreach ($datos as $pro) {

            echo "<tr>";
            echo "<td>" . $pro['idproducto'] . "</td>";
            echo "<td>" . $pro['nombre'] . "</td>";
            echo "<td>" . $pro['precio'] . "</td>";
            echo "<td>" . $pro['cantidad'] . "</td>";
            echo "<td>" . $pro['descrip'] . "</td>";
            echo "<td><img src='cdn/shop/products/" . $pro['imagen'] . "' style='width: 20%; height: auto; display: block; margin-left: auto; margin-right: auto;'></td>";;
            echo '<td> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#actualizar' . $pro['idproducto'] . '">
                        
                        Editar
                      </button> 

                      <a href="prodelete.php?id=' . $pro['idproducto'] . '" class="btn btn-danger" button type="button">Elminar</a>
                  <div class="modal fade" id="actualizar' . $pro['idproducto'] . '"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  
  
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="actualizar">Editar' . $pro['idproducto'] . '</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
        <form action="proedit.php" method="post">
        <input type="hidden" value="' . $pro['idproducto'] . '" name="id">
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="' . $pro['idproducto'] . '" aria-describedby="emailHelp" name="nombre" value="' . $pro['nombre'] . '">
          </div>
          
    
                <label for="exampleInputPassword1" class="form-label">Categoria</label>
                <select name="idcategoria" class="form-select" aria-label="Default select example" placeholder="Ingrese pais">';
                  
                  include "conexion.php";

                  $sql = "SELECT * FROM categoria";
                  
                  $datos = $cone->query($sql);
                  foreach($datos as $cat)
                  {
                    if($cat['idcategoria']==$pro['idcategoria'])
                    {
                    echo "<option selected value='" . $car['idcategoria'] . "'>" . $cat['nombrecat'] . " </option>";
                    }
                    else
                    {
                     echo "<option value='" . $cat['idcategoria'] . "'>" . $cat['nombrecat'] . " </option>";
                    }
                  }
                echo'

                </select>

          

          <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Precio</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="precio" value="' . $pro['precio'] . '">
          </div>

          <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="cantidad" value="' . $pro['cantidad'] . '">
          </div>
          <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Descripcion</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="descrip" value="' . $pro['descrip'] . '">
          </div>
          <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="exampleInputPassword1" name="imagen" value="' . $pro['imagen'] . '">
          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <input type="submit" class="btn btn-primary" value="Guardar">
          </div>
          
        </form>
      </div>

      
    </div>
  </div>
</div>
                      </td>';
            echo "</tr>";
          }
          ?>

        </tbody>
      </table>



      <html>


      <script>
        $(document).ready(function() {
          $('#productos').DataTable();
        });
      </script>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>