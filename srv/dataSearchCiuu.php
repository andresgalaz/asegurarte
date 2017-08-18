<?php
include_once 'dataServer.php';
$term=$_GET['term'];

$params=array();
$params['prm_dataSource']='cotizarte';
$params['prm_funcion']='paCotizarteAGV.operActividadSearch';
$params['prm_cCriterio1']=$term;
$data = json_decode(llamaServidorDatos( armaUrl($params) ),true);

$result=array();
foreach ($data['records'] as $rec){
	$item = new STDClass();
	$item->label = $rec['CDESCRIPCION'];
	$item->value = $rec['PACTIVIDAD'];
	array_push($result, $item);
}
echo json_encode($result);
?>
