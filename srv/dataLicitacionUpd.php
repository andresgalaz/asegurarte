<?php
include_once 'dataServer.php';
include_once '../includes/jquery.realperson.php';

if (rpHash($_POST['lic_CODVERIFICA']) == $_POST['lic_CODVERIFICAHash']) {
	$params=array();
	$params['prm_dataSource']='cotizarte';
	$params['prm_funcion']='paCotizarteAGV.operLicitacionInsUpd';
	$params=copyArrayCambiaPrefijo($_POST, 'lic_', $params, 'prm_' );
	// TODO: Eliminar cuando se actualice a la nueva versiòn del Package AGV
	$params['prm_fEstado']=$_POST['lic_FESTADOWKF'];
	if( isset($_SESSION['PVISITA']))
		$params['prm_fVisita']=$_SESSION['PVISITA'];
	
	try {
		$data = json_decode(llamaServidorDatos( armaUrl($params) ),true);
		$data = $data['records'][0];
		if( $data['NESTADO'] < 0 )
			$cMensajeError = $data['CMENSAJE'];
		else {
			$cMensajeError ='OK';
			header("Location: formLicitacionFinal.php");
		}
	} catch (Exception $e) {
		$cMensajeError = 'Error desconocido';
	}

} else {
	$cMensajeError = 'Error en el código de verificación del Captcha';
}
?>
