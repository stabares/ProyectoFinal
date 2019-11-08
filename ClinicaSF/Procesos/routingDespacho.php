<?php 

$controllers=array(
	'despacho'=>['index','register','save','show','updateshow','update','delete','search','error']
);

if (array_key_exists($controller,  $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller, $action);
	}
	else{
		call('despacho','error');
	}		
}else{
	call('despacho','error');
}

function call($controller, $action){
	require_once('Controllers/'.$controller.'Controller.php');

	switch ($controller) {
		case 'despacho':
		require_once('Model/Despacho.php');
		$controller= new DespachoController();
		break;			
		default:
		break;
	}
	$controller->{$action}();
}

?>