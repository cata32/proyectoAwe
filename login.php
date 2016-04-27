<?php
// Conectando, seleccionando la base de datos
$link = mysql_connect('localhost', 'cata');
/*if (!$link){
	die('<p>error en la conexion</p>'.mysql_error());
}else{
	echo 'Conexion satisfactoria';
}*/

mysql_select_db('proyectoawe') or die('No se pudo seleccionar la base de datos: '.mysql_error());
$usuario = $_POST['user_name'];
$password = $_POST['password'];
$query = 'SELECT UsPassword FROM usuario WHERE UsDocumentoIdentidad ='.$usuario;
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    
    foreach ($line as $col_value) {
       if ($password == $col_value) {
       	session_start();
       	$_SESSION["newsession"]= $usuario;
       	header("Location: http://localhost/sena/inicio.php");
		die();
       	echo "loguin correcto";
       }
       else {
       	echo "error en el loguin";
       }
    }
}
   


// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);
?>

