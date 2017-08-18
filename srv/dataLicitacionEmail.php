<?php
include_once 'dataServer.php';

$params=array();
$params['prm_dataSource']='cotizarte';
$params['prm_funcion']='paCotizarteAGV.operLicitacionEmail';
$params=copyArrayCambiaPrefijo($_POST, 'prm_', $params, 'prm_' );
$data = json_decode(llamaServidorDatos( armaUrl($params) ),true);
$rec = $data['records'][0];
$pLicitacion = $rec['PLICITACION'];

$params=array();
$params['prm_dataSource']='cotizarte';
$params['prm_funcion']='paCotizarteAGV.operLicitacion';
$params['prm_pLicitacion']=$pLicitacion;
$resp = llamaServidorDatos( armaUrl($params) );
echo $resp;
?>
