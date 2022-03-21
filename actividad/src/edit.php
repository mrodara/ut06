<?php 
/****** ESCRIBE TU CODIGO AQUÍ *********/
// 1º Importa el archivo de configuración y en el que previamente definiste tu conexión con la BD.
?>

<?php 
/******** CÓDIGO QUE SE EJECUTARA PARA MOSTRAR LOS DATOS EN EDICIÓN ******* */
if (!isset($_GET['id'])) {
    echo "<div class='alert alert-danger' role='alert'>El usuario no existe</div>";
}
else {
  /****** ESCRIBE TU CODIGO AQUÍ *********/
  // 1º Añade el código que permita obtener de la BD los datos  de nombre, email y edad del usuario en edición a partir de su Id
  // 2º Revisa el código de esta página para reemplazar los valores obtenidos de nombre, edad y email.
  // 3º Recuerda cerrar tu conexión con la BD.
  /****** ESCRIBE TU CODIGO AQUÍ *********/
}
?>

<?php
/******** CÓDIGO QUE SE EJECUTARA EN EL ENVIO DEL FORMULARIO ******* */
if (isset($_POST['submit'])) {
  
/****** ESCRIBE TU CODIGO AQUÍ *********/
// 1º Importa el archivo de configuración y en el que previamente definiste tu conexión con la BD.
// 2º Añade el código que permita recibir el id, nombre, edad, email mediante el uso de POST / GET.
// 3º Comprueba que no están vacíos los valores del formulario. Muestra un mensaje en caso de que alguno de los parámetros se encuentre vacío y aborta la creación
// 4º Actualiza el registro modificado en la base de datos.
// 5º Muestra un mensaje en caso de que se produzca algún error.
// 5º Recuerda cerrar tu conexión con la BD.
/****** ESCRIBE TU CODIGO AQUÍ *********/
}

?>

<?php require "templates/header.php"; ?>
<?php
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="mt-4">Editando el usuario NOMBRE EDITAR</h2> <!-- ESCRIBE TU CODIGO AQUÍ -->
        <hr>
        <form method="post">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="NOMBRE EDITAR" class="form-control"> <!-- ESCRIBE TU CODIGO AQUÍ -->
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="EMAIL EDITAR" class="form-control"> <!-- ESCRIBE TU CODIGO AQUÍ -->
          </div>
          <div class="form-group">
            <label for="edad">Edad</label>
            <input type="text" name="edad" id="edad" value="0" class="form-control"> <!-- ESCRIBE TU CODIGO AQUÍ -->
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Actualizar">
            <a class="btn btn-danger" href="index.php">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
?>

<?php require "templates/footer.php"; ?>