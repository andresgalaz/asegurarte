<?php
session_start();
include_once 'dataServer.php';

$utmSource='';
$utmMedium='';
$utmCampaign='';

if( isset( $_GET['gclid']))
	$utmSource='Adwords';

if( isset( $_GET['utm_source']))
	$utmSource=	$_GET['utm_source'];
if( isset( $_GET['utm_medium']))
	$utmMedium=	$_GET['utm_medium'];
if( isset( $_GET['utm_campaign']))
	$utmCampaign=$_GET['utm_campaign'];

if( $utmSource != '' ){
	try {
		$params=array();
		$params['prm_dataSource']	= 'cotizarte';
		$params['prm_funcion']		= 'paCotizarteAGV.operVisitaIns';
		$params['prm_cRequest']		= print_r($_GET,true);
		$params['prm_cUtmSource']	= $utmSource;
		$params['prm_cUtmMedium']	= $utmMedium;
		$params['prm_cUtmCampaign']	= $utmCampaign;
		$data = json_decode(llamaServidorDatos( armaUrl($params) ),true);
		$data = $data['records'][0];
		if( $data['NESTADO'] < 0 )
			$cMensajeError = $data['CMENSAJE'];
		else 
			$_SESSION['PVISITA'] = $data['NESTADO'];
		
	} catch (Exception $e) {
		error_log($e);
	}
}
?>