<?php
    global $conn;

   //  $servername = "localhost"; // O tu servidor de base de datos
   //  $username = "senatpsc_david"; // Tu usuario de la base de datos
   //  $password = "David123Colombia_"; // Tu contraseña de la base de datos
   //  $dbname = "senatpsc_senatpsc_safe_parking_zone"; // Nombre de la base de datos

    $servername = "localhost"; // O tu servidor de base de datos
    $username = "root"; // Tu usuario de la base de datos
    $password = ""; // Tu contraseña de la base de datos
    $dbname = "senatpsc_safe_parking_zone"; // Nombre de la base de datos

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Comprobar la conexión
    if ($conn->connect_error) {
        
        die("Conexión fallida: " . $conn->connect_error);
    }


    function login($cedula, $contrasena_validar){

       global $conn; 

        $sql = "SELECT * FROM usuarios WHERE cedula = '$cedula' AND contrasena = '$contrasena_validar'";

        $result = $conn->query($sql);

        return $result;

        $conn->close();

    }

    function cantidadesP(){

        global $conn; 
 
        $sql = "SELECT COUNT(tipo) AS cantidad FROM reservas WHERE tipo = 'P';";

        $result = $conn->query($sql);
 
         return $result;

         $conn->close();
 
     }

     function cantidadesV(){

        global $conn; 
 
        $sql = "SELECT COUNT(tipo) AS cantidad FROM reservas WHERE tipo = 'V';";

        $result = $conn->query($sql);
 
         return $result;

         $conn->close();
 
     }

     function guardarTestimonio($name, $descripcion, $fecha){

        global $conn; 

        $sql = "INSERT INTO testimonios (nombre, descripcion, fecha) VALUES ('$name', '$descripcion', '$fecha')";

        $conn->query($sql);

        return $conn;

        $conn->close();

     }

     function traerTestimoniosM(){

        global $conn;

                // Mostrar los testimonios
        $sql = "SELECT nombre, descripcion FROM testimonios ORDER BY id DESC LIMIT 5";

        $result = $conn->query($sql);


        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $testimonials[] = $row;
                
            }
            
        }
        else {
         
         $testimonials[] = ["nombre" => "Información no disponible", "descripcion" => "No hay testimonios disponibles en este momento."];

        }

        return $testimonials;

        $conn->close();

     }

     function reservar1($licensePlate){

        global $conn; 

        $checkQuery = $conn->prepare("SELECT * FROM reservas WHERE license_plate = ?;");
            
        $checkQuery->bind_param("s", $licensePlate);

        $checkQuery->execute();
        
        $result = $checkQuery->get_result();

        return $result;

        $conn->close();

     }

     function reservar2($selectedSpace){

        global $conn; 

        $checkQuery = $conn->prepare("SELECT * FROM reservas WHERE space_reserved = ?;");
            
        $checkQuery->bind_param("s", $selectedSpace);

        $checkQuery->execute();
        
        $result = $checkQuery->get_result();

        return $result;

        $conn->close();

     }

     function reservar3($selectedSpace, $date){

        global $conn; 

        $checkQuery = $conn->prepare("SELECT * FROM reservas WHERE space_reserved = ? AND ? BETWEEN reservas.fecha AND reservas.fecha_salida");
        
        $checkQuery->bind_param("ss", $selectedSpace, $date);

        $checkQuery->execute();
        
        $result = $checkQuery->get_result();

        return $result;

        $conn->close();

     }

     function insertar($id ,$tipo ,$licensePlate, $selectedSpace, $date, $fecha_salida, $cedula, $nombre, $telefono, $email){

        global $conn;

        $stmt = $conn->prepare("INSERT INTO reservas (id, tipo, license_plate, space_reserved, fecha, fecha_salida) VALUES (?, ?, ?, ?, ?, ?);");
        
        $stmt->bind_param("ssssss", $id, $tipo, $licensePlate, $selectedSpace, $date, $fecha_salida);
        
        if ($stmt->execute()) {

            $stmt = $conn->prepare("INSERT INTO reservausuario (cedula, nombre, telefono, email, placa) VALUES (?, ?, ?, ?, ?);");
        
            $stmt->bind_param("sssss", $cedula, $nombre, $telefono, $email, $licensePlate);

            if ($stmt->execute()) {

                $reservationMessage = "¡Reserva exitosa!";

            }

        }
        else {
            
            $reservationMessage = "Error al realizar la reserva: " . $stmt->error;
        } 
        
        return $reservationMessage;

        $conn->close();

    }

    function insertar2($id ,$tipo ,$licensePlate, $selectedSpace, $date, $fecha_salida){

      global $conn;

      $stmt = $conn->prepare("INSERT INTO reservas (id, tipo, license_plate, space_reserved, fecha, fecha_salida) VALUES (?, ?, ?, ?, ?, ?);");
      
      $stmt->bind_param("ssssss", $id, $tipo, $licensePlate, $selectedSpace, $date, $fecha_salida);
      
      if ($stmt->execute()) {

              $reservationMessage = "¡Reserva exitosa!";
              
      }
      else {
          
          $reservationMessage = "Error al realizar la reserva: " . $stmt->error;
      } 
      
      return $reservationMessage;

      $conn->close();

  }

    function traerEspaciosReservadosM(){

        global $conn;

        $reservedQuery = "SELECT space_reserved FROM reservas;";
        $result = $conn->query($reservedQuery);
    
        if ($result->num_rows > 0) {
        
            while ($row = $result->fetch_assoc()) {
        
                $reservedSpaces[] = $row['space_reserved'];
        
            }

            return $reservedSpaces;

        }

        $conn->close();
     }


     function validarUsuario($cedula){

        global $conn;

        $check_sql = "SELECT * FROM usuarios WHERE cedula = '$cedula'";
        
        $check_result = $conn->query($check_sql);

        return $check_result;

        $conn->close();

     }

     function insertarUsuario($cedula, $nombre, $contrasena, $rol, $telefono, $email){

        global $conn;

        $sql = "INSERT INTO usuarios (cedula, nombre, contrasena, rol, telefono, email) VALUES ('$cedula', '$nombre', '$contrasena', '$rol', '$telefono', '$email')";

        $conn->query($sql);

        return $conn;

        $conn->close();

     }

     function traerReservas($id){
        
        
        global $conn;

        $reservasQuery = "SELECT * FROM reservas WHERE id = '$id';";
        $reservasResult = $conn->query($reservasQuery);

        return $reservasResult;

        $conn->close();

     }


     function traerReservasPorPlacas($license_plate){
        global $conn;

        $checkQuery = $conn->prepare("SELECT * FROM reservas WHERE license_plate = ?;");
        $checkQuery->bind_param("s", $license_plate);
        $checkQuery->execute();
        $result = $checkQuery->get_result();
        $row = $result->fetch_assoc(); 

        return $row;
     }

     function eliminarReserva($license_plate){
        global $conn;
        
        $reservasQuery = "DELETE FROM reservas WHERE reservas.license_plate = '$license_plate';";
        $reservasResult = $conn->query($reservasQuery);

     }

     function traerReservasPorUsuario($license_plate){
        global $conn;

        $checkQuery = $conn->prepare("SELECT * FROM reservausuario WHERE placa = ?;");
        $checkQuery->bind_param("s", $license_plate);
        $checkQuery->execute();
        $result = $checkQuery->get_result();
        $row = $result->fetch_assoc(); 

        return $row;

     }

     function traerReservasPorID($id){
        global $conn;

        $checkQuery = $conn->prepare("SELECT * FROM usuarios WHERE id = ?;");
        $checkQuery->bind_param("s", $id);
        $checkQuery->execute();
        $result = $checkQuery->get_result();
        $row = $result->fetch_assoc(); 

        return $row;

        $conn->close();
     }

     function eliminarReservaUsuario($license_plate){
        global $conn;

        $reservasQuery = "DELETE FROM reservausuario WHERE placa = '$license_plate';";
        $reservasResult = $conn->query($reservasQuery);

        $conn->close();
     }

     function traerUsuarioM($id){
      global $conn;

      // Usando consultas preparadas para evitar inyecciones SQL
      $sqlUsuario = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
      $sqlUsuario->bind_param("s", $id);
      $sqlUsuario->execute();
      $resultUsuario = $sqlUsuario->get_result();

      return $resultUsuario;

      $conn->close();
   }

   function enviarContacto($nombre, $correo, $telefono, $mensaje){
      global $conn;

      $sql = "INSERT INTO mensajes_contacto (nombre, correo, telefono, mensaje) VALUES ('$nombre', '$correo', '$telefono', '$mensaje')";
      $conn->query($sql);

      return $conn;
      
      $conn->close();

   }

   function traerTablasM($tabla){
      global $conn;
      
      $facturasQuery = "SELECT * FROM $tabla";
      $facturasResult = $conn->query($facturasQuery);

      return $facturasResult;

      $conn->close();

   }

   function actualizaReserva($tipo, $license_plate, $space_reserved, $fecha, $fecha_salida, $id){
      global $conn;
      
      $checkQuery = $conn->prepare("UPDATE reservas SET  tipo = ? ,license_plate = ?, space_reserved = ?, fecha = ? , fecha_salida = ? WHERE  license_plate = ?;");
      $checkQuery->bind_param("ssssss", $tipo, $license_plate, $space_reserved, $fecha, $fecha_salida, $license_plate);
      $checkQuery->execute();

      return $checkQuery;

      $conn->close();

   }

   function eliminarReserva2($license_plate){
      global $conn;
      
      $checkQuery = $conn->prepare("DELETE FROM reservas WHERE license_plate = ?;");
      $checkQuery->bind_param("s", $license_plate);
      $checkQuery->execute();

      return $checkQuery;

      $conn->close();

   }


   function actualizaUsuario($id, $cedula, $nombre, $contrasena, $rol, $telefono, $email){
      global $conn;
      
      $checkQuery = $conn->prepare("UPDATE usuarios SET  cedula = ? ,nombre = ?, contrasena = ?, rol = ? , telefono = ?, email = ? WHERE  cedula = ?;");
      $checkQuery->bind_param("sssssss", $cedula, $nombre, $contrasena, $rol, $telefono, $email, $cedula);
      $checkQuery->execute();

      return $checkQuery;

      $conn->close();

   }

   function eliminarUsuario($cedula){
      global $conn;
      
      $checkQuery = $conn->prepare("DELETE FROM usuarios WHERE cedula = ?;");
      $checkQuery->bind_param("s", $cedula);
      $checkQuery->execute();

      return $checkQuery;

      $conn->close();

   }

   function eliminarContacto($id){
      global $conn;
      
      $checkQuery = $conn->prepare("DELETE FROM mensajes_contacto WHERE id = ?;");
      $checkQuery->bind_param("s", $id);
      $checkQuery->execute();

      return $checkQuery;

      $conn->close();

   }


?>