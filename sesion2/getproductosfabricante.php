<?php 

    //Realizamos la conexión con nuestra BBDD como siempre
    include_once("./conexion.php");

    function obtenerProductosFabricante($conexion, $fabricante){
        
        //Preparamos la consulta
        $sql = "SELECT * FROM producto WHERE codigo_fabricante=" .$fabricante ." ORDER BY nombre;";

         //Ejecutamos la sentencia SELECT deseada
         $productos = $conexion->query($sql);

        //Cerramos la conexión
        $conexion->close();        

        //retornamos los resultados
        return $productos;

    }

    function obtenerFabricantes($conexion){
        //Creamos nuestra sentencia y la ejecutamos
        $fabricantes = mysqli_query($conexion,"SELECT codigo, nombre FROM fabricante ORDER BY codigo;");

        //Retornamos los resultados
        return $fabricantes;
    }

    

    include '../../assets/header.php'; 

    include '../assets/menu.php';

    
?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>
                    Listado de productos por fabricante
                </h3>

                <form action="getproductosfabricante.php" method="post">
                    <select class="form-select" aria-label="txtFabricante" name="txtFabricante">
                    <option selected>Indicar un fabricante</option>
                    <?php 
                        //Llamamos a la función
                        $fabricantes = obtenerFabricantes($conexion);

                        //Rellenamos el select con los resultados
                        if(isset($fabricantes)){
                            while($opcion = $fabricantes->fetch_assoc()){
                                echo "<option value='" .$opcion['codigo']. "'>" . $opcion['nombre'] ."</option>";
                            }
                        }
                    ?>
                    </select>
                    <button type="submit" class="btn btn-primary">Consultar productos</button>
                </form>
                
                <?php 

                    //Comprobamos que haya un fabricante para consultar sus productos
                    if(isset($_POST['txtFabricante'])){

                        //Llamamos a la función para obtener los resultados
                        $resultado = obtenerProductosFabricante($conexion,$_POST['txtFabricante']);

                        echo var_dump($resultado);

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
                    }

                
                ?>            
                <br><br>
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
