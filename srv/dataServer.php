<?php

// define('SERVIDOR_DATOS','192.168.1.105:8080/webDesap_3.5');
// define('SERVIDOR_DATOS','localhost:8082/webDesap_3.5');
define('SERVIDOR_DATOS','54.68.195.226:8080/webDesap');

function llamaServidorDatos($url) {
	$fo = fopen ( "$url", "r" ) or die ( "No se ha encontrado la pagina." );
	$codigohtml = '';
	while ( ! feof ( $fo ) ) {
		$codigohtml .= fgets ( $fo, 4096 );
	}
	fclose ( $fo );
//  error_log("\n\n llamaServidorDatos\nPARAMS:".print_r($url,true)."\nDATOS:".print_r($codigohtml, true)."\n");	
	return $codigohtml;
}

function armaUrl($arrayParams){
	// Convierte arreglo de parámetro en URL
	$params = '';
	foreach ($arrayParams as $prm => $valor)
		$params .= '&' .$prm.'='.urlencode($valor);
	// Servidor que atiende las llamadas de datos
	$URL_SERVICE_DATA = SERVIDOR_DATOS.'/do/storeLeerNoLogged?';
	
	// Arma URL final
	$params = 'http://' . $URL_SERVICE_DATA . substr ( $params, 1 );
	// error_log('--- URL ---:'.$params);
	return $params;
}

function copyArrayCambiaPrefijo( $arrayOrigen, $prefijoOrigen, $arrayDestino, $prefijoDestino ){
	foreach ($arrayOrigen as $llave => $valor){
		$pos = strpos ( $llave, $prefijoOrigen );
		// Solo pasa los parámetros que comienzan con lic_
		if( $pos !== false && $pos == 0 ){
			$nvaLlave = $prefijoDestino . substr($llave, strlen($prefijoOrigen));
			$arrayDestino[$nvaLlave] = urlencode($arrayOrigen[$llave]);
		}
	}
	return $arrayDestino;
}

?>