<?php 

    //Realizamos la conexión con nuestra BBDD como siempre
    include_once("./conexion.php");

    function obtenerProductos($conexion){
        
         //Ejecutamos la sentencia SELECT deseada
         $productos = mysqli_query($conexion, "SELECT * FROM producto ORDER BY nombre;");

        //Cerramos la conexión
        $conexion->close();

        //retornamos los resultados
        return $productos;

    }

    

    include '../../assets/header.php'; 

    include '../assets/menu.php';

    
?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>
                    Listado de productos en orden alfabético
                </h3>
                
                <?php 

                    //Llamamos a la función para obtener los resultados
                    $resultado = obtenerProductos($conexion);

                    //Comprobamos que se ha traido resultados para mostrar
                    if (isset($resultado)){
                        
                        //Definimos la estructura de la tabla
                        echo "<table class='table table-light table-striped table-hover'>
                                <thead><tr><th>ID</th><th>Nombre</th><th>Precio</th></tr></thead><tbody>";

                        //Recorremos el resultado con fetch_assoc() que me dará un array asociativo, también
                        //se puede usar fetc_array() con un resultado similar.
                        while($producto = $resultado->fetch_assoc()){
                            //Añadimos una fila a la tabla por cada producto
                            echo "<tr><td>" .$producto["codigo"]. "</td><td>". $producto["nombre"]. 
                                "</td><td>". number_format($producto["precio"],2,",",".") ." €" ."</td></tr>";
                                
                        }

                        //Cerramos la estructura de tabla
                        echo "</tbody></table>";

                    }else{

                        echo "La consulta no ha generado resultados";
                    }
                
                ?>            
                
                <a href="./index.php#example-2" class="btn btn-primary">Volver a la sesión 2</a>
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
