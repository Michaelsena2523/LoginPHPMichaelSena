

<?php

session_start();

$conexion = new mysqli('localhost', 'root', '', 'login');

if ($conexion->connect_error) {

    die('erro de conexion' . $conexion->connect_error);
}; /* else {
    echo "conexion Exitosa";
}; */


$NameUser = $_POST['user'];
$Pass = $_POST['password']; 

$consultaSql = 'SELECT * FROM loginuser WHERE User= ? ';
$vaidar = $conexion->prepare($consultaSql); 

if($vaidar === false){
    die('Error al preparal la consulta'. $conexion -> error); 
}

$vaidar-> bind_param("s", $NameUser); 
$vaidar-> execute();
$resultado = $vaidar->get_result(); 

if($resultado -> num_rows > 0){
    $row = $resultado->fetch_assoc();

    if($Pass = $row['password']){
        
        echo'Logiado exitosamente';
    }
}else{
       echo"La contraseña es incorrecta"; 
}; 


$vaidar->close(); 
$conexion->close();


/* if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $NombreUsuario = $_POST['user'];
    $Pass = $_POST['password'];

    
    $consultaSql = ("SELECT FROM * login WHERE  user= '$NombreUsuario' AND  password '$Pass' ");
    
    
    if($resultado-> = 1){
        $_SESSION['user'] = $NombreUsuario; 
        exit();
    }else{
        Echo 'Usuario no encontrado inicial sesion';
    };
};
 */

?>