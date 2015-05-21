<?php
	session_start();
	$_SESSION['nom']=$_REQUEST['nombre'];
	$_SESSION['ape']=$_REQUEST['apellidos'];
	$_SESSION['fe']=$_REQUEST['fecha'];
	print 'nombre: '.$_SESSION['nom'];
	//print "INSERT INTO Reserva VALUES('$_REQUEST[nombre]','$_REQUEST[apellidos]','$_REQUEST[fecha]') <br/>";
	print '<a href="crearPdf.php" target="blank">Imprimir </a><img src="image/impresora.png" width="20" height="27"/>';
	for ($i=1;$i<=10000000;$i++){
	}
?>

