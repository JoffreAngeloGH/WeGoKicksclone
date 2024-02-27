
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ArtesanHCO | Login </title>
    <link rel="stylesheet" href="css/logincss.css">
  </head>
  <body>
    <div class="login-box">
      <h1>Bienvenido</h1>
      <form action="log.php" method="POST">
        <!--  USERNAME INPUT  -->
        <label for="usuario">Usuario</label>
        <input type="text" placeholder="Enter Username" name="usuario" required>
         <!-- PASSWORD INPUT  -->
        <label for="contraseña">Contraseña</label>
        <input type="password" placeholder="Enter Password" name="contraseña" required>
        <input type="submit" value="Ingresar" name="btningresar">
        <a href="index.php">Volver</a>
      </form>
    </div>
  </body>
</html>