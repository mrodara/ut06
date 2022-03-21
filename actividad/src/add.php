<?php
/****** ESCRIBE TU CODIGO AQUÍ *********/
// 1º Importa el archivo de configuración y en el que previamente definiste tu conexión con la BD.
// 2º Añade el código que permita recibir el nombre, edad, email mediante el uso de POST.
// 3º Comprueba que no están vacíos los valores del formulario. Muestra un mensaje en caso de que alguno de los parámetros se encuentre vacío y aborta la creación
// 4º Inserta el registro en la base de datos
// 5º Recuerda cerrar tu conexión con la BD.
/****** ESCRIBE TU CODIGO AQUÍ *********/
?>

<?php include "templates/header.php"; ?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Crea un usuario</h2>
      <hr>
      <form method="post">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="form-group">
          <label for="apellido">Apellido</label>
          <input type="text" name="apellido" id="apellido" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="edad">Edad</label>
          <input type="text" name="edad" id="edad" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-primary" value="Enviar">
          <a class="btn btn-primary" href="index.php">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include "templates/footer.php"; ?>