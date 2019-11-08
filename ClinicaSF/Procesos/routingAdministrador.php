<?php 

$controllers=array(
	'administrador'=>['index','register','save','show','updateshow','update','delete','search','error']
);

if (array_key_exists($controller,  $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller, $action);
	}
	else{
		call('administrador','error');
	}		
}else{
	call('administrador','error');
}

function call($controller, $action){
	require_once('Controllers/'.$controller.'Controller.php');

	switch ($controller) {
		case 'administrador':
		require_once('Model/Administrador.php');
		$controller= new AdministradorController();
		break;			
		default:
		break;
	}
	$controller->{$action}();
}

?>