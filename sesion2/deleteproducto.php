<?php 

    //Realizamos la conexión con nuestra BBDD como siempre
    include_once("./conexion.php");

    function deleteProducto($conexion, $codigo){

        $sentencia = $conexion->prepare("DELETE FROM producto WHERE codigo = ?");

        $sentencia->bind_param('i', $codigo);

        if($sentencia->execute()){
            $mensaje = "Se ha borrado correctamente el registro";
        }else{
            $mensaje = "Ha habido un error contacte con el administrador del sitio";
        }

        $sentencia->close();
        $conexion->close();

        return $mensaje;
    }

    include '../../assets/header.php'; 

    include '../assets/menu.php';

    
?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>
                    <?php echo deleteProducto($conexion, $_GET['codigo']); ?>
                </h3>

                
               <br><br>
                
                <a href="./index.php#example-4" class="btn btn-primary">Volver a la sesión 2</a>
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
