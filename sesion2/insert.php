<?php 

    include_once("./conexion.php");

    function insertarFabricante($conexion, $nombre){
        
         //Preparamos la sentencia a ejecutar parametrizando los valores
        $sentencia = $conexion->prepare("INSERT INTO fabricante (nombre) VALUES (?);");

        //Vinculación de los parámetros
        $sentencia->bind_param('s', $nombre);

        //Comprobamos que se puede llevar a cabo la ejecución
        if($sentencia->execute()){
            //Cerramos la sentencia
            $sentencia->close();

            //cerramos la conexion
            $conexion->close();

            //Redirigimos al sitio que deseemos
            header('Location:http://proyecto.site/ut06/sesion2/insertok.php');
        }else{
            
            //Redirigimos a la página de error
            header('Location:http://proyecto.site/ut06/sesion2/insertko.php');
        }

    }

    if (isset($_POST['txtFabricante'])){
        //Llamamos a la función de inserción
        insertarFabricante($conexion,$_POST['txtFabricante']);
    }

    include '../../assets/header.php'; 

    include '../assets/menu.php';

    
?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>
                    Formulario de inserción de fabricante
                </h3>
                <form action="insert.php" method="post">
                    <div class="form-floating mb-3">

                        <input type="text" class="form-control" id="txtFabricante" name="txtFabricante" 
                            placeholder="Insertar nombre del fabricante" required>
                        <label for="txtFabricante">Nombre Fabricante</label>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                    
            </div>
        </div>
    </div>

        

        <footer class="pt-3 mt-4 text-muted border-top">
        &copy; 2021-2022
        <br>
        <a href="https://mrodara.github.io" target="_blank">mrodara.github.io</a> 
        <br>
        <a href="https://github.com/JuanMiMiranda" target="_blank">miranda.github.io</a>
        </footer>
    </div>
</main>
        
    <script src="../js/bootstrap.js"></script>
</body>
</html>
