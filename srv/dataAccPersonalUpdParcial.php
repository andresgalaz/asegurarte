<?php
include_once 'dataServer.php';
session_start();

$params=array();
$params['prm_funcion']='paAccPersonal.operAccPersonalUpdParcial';
$params=copyArrayCambiaPrefijo($_POST, 'acc_', $params, 'prm_' );
if( isset($_SESSION['PVISITA']))
	$params['prm_fVisita']=$_SESSION['PVISITA'];
echo llamaServidorDatos( armaUrl($params) );
?>
