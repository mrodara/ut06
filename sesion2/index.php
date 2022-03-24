<head>
    <meta charset="UTF-8">
    <title> Sesion 2 - Recuperación de datos y gestión de errores</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/highlight.min.js"></script>
    <script src="../js/script.js"></script>
    <script>
        hljs.highlightAll();
    </script>

</head>

<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="">Recuperación de datos desde php contra una Base de datos Mysql </h1>

        <h5 class="">Indice </h5>
        <ul class="list-group">
            <li class="list-group-item"><a href="index.php#example-1">Ejemplo 1. Crear registro en la base de datos</a></li>
            <li class="list-group-item"><a href="index.php#example-2">Ejemplo 2. Leer información de la base de datos</a></li>
            <li class="list-group-item"><a href="index.php#example-3">Ejemplo 3. Actualizar registros en la base de datos</a></li>
            <li class="list-group-item"><a href="index.php#example-4"> Ejemplo 4. Eliminar registos de la base de datos</a></li>
        </ul>


    </div>
    <!--   *************************************** ----->
    <!--   Ejemplo 1. Crear registro en la base de datos   ----->
    <!--   *************************************** 1 ----->
    <section id="example-1">
        <h2> <code>Ejemplo 1 </code>- Crear registro en la base de datos </h2>
        <h5> Crear un fabricante en la base de datos Tienda </h5>
        <p>Para este ejemplo vamos a añadir un nuevo fabricante a nuestra base de datos, veamos los pasos que debemos 
            realizar para ello, como siempre y recordando lo visto en la sesión anterior tenemos que abrir
            una nueva conexión con nuestra BBDD (en este caso usaremos el método orientado a objetos).
        </p>

        <pre>
        <code class="language-bash">
        //Parámetros de conexión a nuestra base de datos
        include_once("config.php");

        // Crear la conexión
        $conexion = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_BASE);
        
        //Si no se ha podido llevar a cabo la conexión abortamos el programa
        if ($conexion->connect_error) {
            die("Connection failed: " . $conexion->connect_error);
        }

        //Acciones a realizar una vez establecida la conexión
        //En este caso vamos a añadir un nuevo registro en la tabla fabricante
        $consulta = $conexion->prepare("INSERT INTO fabricante (nombre) VALUES (?)");
        
        //Establecemos el valor de la variable $nombre
        $nombre = "Fabricante de prueba";

        //Enlazamos el parámetro indicando el tipo de dato que va a esperar la consulta
        //Este ejemplo espera un string que indicamos mediante 's'
        $consulta->bind_param("s", $nombre);

        //Cerramos la consulta
        $consulta->close();

        //Cerramos la conexion
        $conexion->close();
        </code>
        </pre>

        
        
        <a href="https://www.php.net/manual/es/mysqli.prepare.php" target="_blank">Documentación mysqli::prepare</a>
        <br>
        <a href="https://www.php.net/manual/es/mysqli-stmt.bind-param" target="_blank">Documentación mysqli::bind_param</a>
        <br>
        <br>
        <a href="insert.php" target="_blank" class="btn btn-info btn-lg">Probar inserción</a>

        <br><br>

        <hr>
        <br>
        <h4> <code> # </code>Recomendaciones </h4>
        <h6> <code> # </code>Realizar funciones que se encarguen de casos concretos </h6>

        <p>Es recomendable que agrupemos los bloques de código en funciones que realicen determinadas acciones (Ej: insertarFabricante()) y posteriormente agrupar todas ellas
            en ficheros que las identifiquen como por ejemplo: <code> crud_fabricantes.php </code> que contendría todos los métodos
            de inserción, modificación, lectura y eliminación referentes a la tabla fabricante de nuestra hipotética base de datos.
         </p>


        <pre>
        <code class="language-php">
        // Definición de las acciones que podemos hacer sobre la tabla fabricante
        function insertarFabricante(){...}
        function editarFabricante(){...}
        function leerFabricante(){...}
        function eliminarFabricante(){...}
        </code>
    </pre>
        <p> Tomando esta recomendación podríamos codificar el ejemplo anterior de la siguiente manera:

        <pre>
        <code class="language-php">
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
        </code>
        </pre>

        
        <a href="https://www.php.net/manual/es/function.include-once.php" target="_blank">Documentación include_once</a>

        <hr>
        <br>
        <h6> <code> ## </code>Cerrar conexiones con el SGBD </h6>
        <p>
            Otra recomendación es cerrar la conexiones abiertas con nuestro SGBD.
            Una conexión abierta se cierra automáticamente después de un cierto tiempo de inactividad, pero si se cierra de forma manual
            se esta soltando el sokect y se libera al sistema de mantener una acción hasta que se cierre.
        </p>
        <p>
            Esto se realiza de la siguiente forma:
        </p>

        <pre>
        <code class="language-php">
        // Procedimental
        mysqli_close($conn);
        // POO
        $conn->close();
        </code>
        </pre>
        <a href="https://www.php.net/manual/es/mysqli.close.php" target="_blank">Documentación mysqli_close</a>
    </section>
    <hr>
    <hr>

    <!--   *************************************** ----->
    <!--   EJEMPLO 2 - Crear BD   ----->
    <!--   ***************************************  ----->

    <section id="example-2">
        <h2> <code>Ejemplo 2 </code>- Creación de base de datos desde PHP</h2>
        <p>
            Una vez disponemos de una conexión abierta con el SGBD podemos realizar operaciones sobre la misma.
            La primera de las operaciones que realizaremos será la de crear una nueva base de datos.
            Esto lo realizaremos haciendo uso de
            <a href="https://www.php.net/manual/es/mysqli.query.php" target="_blank">mysqli_query </a> podemos ver un ejemplo
            en el siguiente código:
        </p>



        <pre>
        <code class="language-php">
            include_once("config.php");
            // Crear la conexión
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD);
            $sql = "CREATE DATABASE IF NOT EXISTS myDB";
            if ($conn->query($sql) === TRUE) {
                echo "Database created successfully";
            } else {
                echo "Error creating database: " . $conn->error;
            }
            $conn->close();
        </code>
        </pre>
        <a href="ej2.php" target="_blank" class="btn btn-info btn-lg">Pruebalo tu mismo</a>

        <p> <code>mysqli_query</code> retorna false en caso de error. Si una consulta del tipo SELECT, SHOW, DESCRIBE o EXPLAIN es exitosa, mysqli_query()
         retornará un objeto <code>mysqli_result </code>. Para otras consultas exitosas de mysqli_query() retornará true.
    </p>
    </section>

    <hr>
    <hr>

    <!--   *************************************** ----->
    <!--   EJEMPLO 3 - Crear Tablas   ----->
    <!--   ***************************************  ----->

    <section id="example-3">
        <h2> <code>Ejemplo 3 </code>- Creación de tablas desde PHP</h2>
        <h5> Selección de base de datos </h5>
        <p>
            Es importante definir la BD sobre la que estamos trabajando, para esto msqli dispone del método 
            <a href="https://www.php.net/manual/es/mysqli.select-db.php" target="_blank">mysqli_select_db </a> 
            Recuerda que esto es necesario si en la cadena de conexión mediante  <code>mysqli_connect</code> no se indicó el 
            parámetro opcional que especifica la BD.

        </p>



        <pre>
        <code class="language-php">
        include_once("config.php");
        // Crear la conexión
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
        if (mysqli_select_db($conn, "myDB") === TRUE) {
            echo "Database select successfully";
        } else {
            echo "Error select database: ";
        }
        </code>
        </pre>
        <a href="ej3.php" target="_blank" class="btn btn-info btn-lg">Pruebalo tu mismo</a>

        <br>
        <br>
        <h5> Crear tablas </h5>
        <p>
            Para crear tablas realizaremos uso nuevamente de la función
            <a href="https://www.php.net/manual/es/mysqli.query.php" target="_blank">mysqli_query </a> 
        </p>

        <pre>
        <code class="language-php">
        include_once("config.php");
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
        // Select the database 
        $conn->select_db("myDB"); 
        // sql to create table
        $sql = "CREATE TABLE MyGuests (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
        if ($conn->query($sql) === TRUE) {
            echo "Table MyGuests created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
        </code>
        </pre>
        <a href="ej3.php" target="_blank" class="btn btn-info btn-lg">Pruebalo tu mismo</a>

    </section>

</div>