<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>

<body>



  <div class="container">
    <!-- Button trigger modal -->
    <div class="d-grid gap-3 d-md-flex justify-content-md-end">
      <button type="button" class="btn btn-primary me-md-2 my-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Nuevo
      </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ingresar nuevo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <form action="proguardar.php" method="POST">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre" placeholder="Ingrese nombre">

              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Catergoria</label>
                <select name="idcategoria" class="form-select" aria-label="Default select example" placeholder="Ingrese categoria">
                  <?php
                  include "conexion.php";

                  $sql = "SELECT * FROM categoria";

                  $datos = $cone->query($sql);

                  foreach ($datos as $cat) {
                    // "<option value='". ."'>". ."</option>";
                    echo "<option value='" . $cat['idcategoria'] . "'>" . $cat['nombre'] . " </option>";
                  }
                  ?>

                </select>

              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Precio</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="precio" placeholder="Ingrese precio">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="cantidad" placeholder="Ingrese cantidad">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Descripcion</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="descrip" placeholder="Ingrese descripcion">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="exampleInputPassword1" name="imagen" placeholder="Ingrese imagen">
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
  </div>
  </div>







</body>

</html>