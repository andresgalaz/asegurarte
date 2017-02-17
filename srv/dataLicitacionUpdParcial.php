<?php
include_once 'dataServer.php';
session_start();

$params=array();
$params['prm_funcion']='paCotizarteAGV.operLicitacionUpdParcial';
$params=copyArrayCambiaPrefijo($_POST, 'lic_', $params, 'prm_' );
if( isset($_SESSION['PVISITA']))
	$params['prm_fVisita']=$_SESSION['PVISITA'];
echo llamaServidorDatos( armaUrl($params) );
?>
