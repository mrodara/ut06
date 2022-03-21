<head>
    <meta charset="UTF-8">
    <title> Sesion 1 - Conexión con Base de datos</title>
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
        <h1 class="">Conexión con Base de datos Mysql </h1>

        <h5 class="">Indice </h5>
        <ul class="list-group">
            <li class="list-group-item"><a href="index.php#example-1">Ejemplo 1. Conexión con BD</a></li>
            <li class="list-group-item"><a href="index.php#example-2">Ejemplo 2. Creación de BD</a></li>
            <li class="list-group-item"><a href="index.php#example-3">Ejemplo 3. Creación de tablas</a></li>
            <li class="list-group-item"><a href="index.php#example-4"> Ejemplo 4. Eliminar BD</a></li>
        </ul>


    </div>
    <!--   *************************************** ----->
    <!--   EJEMPLO 1 - Conexión con la BD   ----->
    <!--   *************************************** 1 ----->
    <section id="example-1">
        <h2> <code>Ejemplo 1 </code>- Conexión con la BD </h2>
        <h5> Crear usuarios de Mysql </h5>
        <p>Antes de poder conectarnos al sistema gestor de base de datos (SGBD) debemos disponer de un usuario y una constraseña
            La creación de un usuario, diferente al administrador de sistemas (root), es un paso importante, ya que si cometemos un error
            ejecutando sentencias SQL o si la aplicación hace lo que no esperamos, no se vea afectado más allá del alcance que pueda tener este usuario. Para ello se suele crear siempre un usuario por cada base de datos que almacena el sistema gestor MySQL.
        </p>

        <pre>
        <code class="language-bash">
            mysql –u root -p
            CREATE USER 'usr_iaw'@'localhost' IDENTIFIED BY ‘psw_iaw';
            GRANT CREATE, SELECT ON * . * TO ‘usr_iaw'@'localhost';
        </code>
        </pre>

        <p>
            Una vez disponemos de un usuario para establecer la conexión con Mysql utilizaremos el constructor de mysqli (
            <a href="https://www.php.net/manual/es/mysqli.construct.php" target="_blank">Documentación mysqli_connect</a>)
            , podemos realizar la conexión haciendo uso de del estilo orientado a objetos o del estilo procedimental.
            Debemos recordar que ambos son equivalentes.
        </p>
        <h5> Estilo Orientado a objetos </h5>
        <pre>
        <code class="language-php">
        // Definición de las Variables de conexión con el SGBD
        $DB_HOST = "localhost";
        $DB_USER = "usr_iaw";
        $DB_PASSWORD = "psw_iaw";
        // Crear la conexión
        $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD); 
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
        </code>
        </pre>
        <a href="ej1-obj.php" target="_blank" class="btn btn-info btn-lg">Pruebalo tu mismo</a>

        <br><br>
        <h5> Estilo Procedimental </h5>
        <p>
            Otra posibilidad equivalente es el uso del estilo por procedimientos
        </p>

        <pre>
        <code class="language-php">
        // Definición de las Variables de conexión con el SGBD
        $DB_HOST = "localhost";
        $DB_USER = "usr_iaw";
        $DB_PASSWORD = "psw_iaw";
        // Crear la conexión
        mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
        // Comprobar la conexión
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        else
            echo "Connected successfully";
    </code>
    </pre>

        <a href="https://www.php.net/manual/es/mysqli.connect-error.php" target="_blank">Documentación connect_error</a>
        <br>
        <br>
        <a href="ej1-procedimental.php" target="_blank" class="btn btn-info btn-lg">Pruebalo tu mismo</a>

        <hr>
        <br>
        <h4> <code> # </code>Recomendaciones </h4>
        <h6> <code> # </code>Abstraer constantes de Conexión </h6>

        <p>Es recomendable abstraer las variables de conexión con la BD de nuestro código, de esta forma
            será mucho mas sencillo modificar estas de forma global. Es por esto recomendamos crear un fichero <code> confg.php </code> que contenga esta información: </p>


        <pre>
        <code class="language-php">
        // Definición de las Variables de conexión con el SGBD
        define('DB_HOST', 'localhost');
        define('DB_USER', 'usr_iaw');
        define('DB_PASSWORD', 'psw_iaw');
        </code>
    </pre>
        <p> Ahora podemos modificar los ejemplos anteriores para unificar nuestras constantes de conexión importando estas de forma única:

        <pre>
        <code class="language-php">
        // POO
        include_once("config.php");
        // Crear la conexión
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD); 
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
        </code>
        </pre>

        <pre>
        <code class="language-php">
        // Procedimental
        include_once("config.php");
        // Crear la conexión
        mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
        // Comprobar la conexión
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        else
            echo "Connected successfully";
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