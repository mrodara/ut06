<?php 

/****** ESCRIBE TU CODIGO AQUÍ *********/
// 1º Importa el archivo de configuración y en el que previamente definiste tu conexión con la BD.
// 2º Añade el código que permita obtener el contenido de la tabla users de la base de datos definida en la configuración.
// 3º Revisa el código de este formulario y añade lo necesario para mostrar el resultado de la tabla usuarios.
// 4º Revisa el parámetro Id que se envía a las páginas edit.php y delete.php para que coincida con el valor del Id de cada uno de los usuarios.
// 5º Recuerda cerrar tu conexión con la BD.
/****** ESCRIBE TU CODIGO AQUÍ *********/


include "templates/header.php"; ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="add.php"  class="btn btn-primary mt-4">Crear usuario</a>
      <hr>
    </div>
  </div>
</div>

<!-- Lista de usuarios --->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-3">Lista de Usuarios</h2>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Edad</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
      
<!--/****** ESCRIBE TU CODIGO AQUÍ *********/ -->
              <tr>
                <td>0</td>
                <td>Nombre Ejemplo</td>
                <td> ejemplo@ejemplo.com</td>
                <td>0</td>
                <td>
                <a href="edit.php?id='0'"  class="btn btn-secondary">Editar</a>
                <a href="delete.php?id='0' ?>"  class="btn btn-danger">Borrar</a>
                </td>
              </tr>
  <!--/****** ESCRIBE TU CODIGO AQUÍ *********/ -->
        <tbody>
      </table>
    </div>
  </div>
</div>

<!-- Fin Lista de usuarios-->

<?php include "templates/footer.php"; ?>