<?php 

    //Realizamos la conexión con nuestra BBDD como siempre
    include_once("./conexion.php");

    
    /** Consultamos la información del código de producto recibido */
    function obtenerDatosProducto($conexion, $codigo){
        //preparamos la consulta
        $sql = "SELECT * FROM producto WHERE codigo=" .$codigo. ";";

        //Ejecutamos la sentencia SELECT
        $producto = $conexion->query($sql);

        //Cerramos la conexión
        //$conexion->close();

        //Devolvemos el resultado
        return $producto;
    }

    function updateProducto($conexion, $codigo, $producto){
        //Aquí vamos a usar también la consulta parametrizada 
        
        //Creamos nuestra sentencia
        $sentencia = $conexion->prepare('UPDATE producto SET nombre = ?, precio = ? WHERE codigo = ?');
        
        //Vinculamos los parámetros
        $sentencia->bind_param('sdi', $producto['txtNombre'], $producto['txtPrecio'], $codigo);
        
        //Comprobamos que se puede llevar a cabo la ejecución
        if($sentencia->execute()){
            //Cerramos la sentencia
            $sentencia->close();

            //cerramos la conexion
            $conexion->close();

            //Redirigimos al sitio que deseemos
            header('Location:http://proyecto.site/ut06/sesion2/updateok.php');

        }else{
            
            //Redirigimos a la página de error
            header('Location:http://proyecto.site/ut06/sesion2/updateko.php');
        }
       
    }

    
    //Si tenemos un código nos traemos la info de la BBDD
    if(isset($_GET['codigo'])){
        
        $resultado = obtenerDatosProducto($conexion, $_GET['codigo']);

        $producto = $resultado->fetch_assoc();
        
    }

    include '../../assets/header.php'; 

    include '../assets/menu.php';

    
?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>
                    Formulario de actualización de producto
                </h3>

                <form action="updateproducto.php" method="post">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="txtCodigo" name="txtCodigo" 
                        value="<?php echo $producto['codigo'] ?>">
                    <label for="txtCodigo">Código del producto</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="txtNombre" name="txtNombre" 
                        value="<?php echo $producto['nombre'] ?>" required>
                    <label for="txtNombre">Nombre del producto</label>
                    </div>
                    <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="txtPrecio" name="txtPrecio" step="0.01" 
                        value="<?php echo $producto['precio'] ?>" required>
                    <label for="txtPrecio">Precio del producto</label>
                </div>
                    <button type="submit" class="btn btn-warning">Actualizar producto</button>
                </form>
                <br><br><br>
                <?php 

                    //Comprobamos que se hayan modificado los datos del formulario
                    if(isset($_POST['txtNombre']) && isset($_POST['txtPrecio'])){
                        
                        //Llamamos a la función para actualizar la información
                        updateProducto($conexion, $_POST['txtCodigo'], $_POST);
                    }                
                ?>            
                <br><br>
                <a href="./index.php#example-3" class="btn btn-primary">Volver a la sesión 2</a>
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
