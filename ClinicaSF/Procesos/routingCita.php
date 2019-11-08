<?php 

$controllers=array(
	'cita'=>['index','register','save','show','updateshow','update','delete','search','error']
);

if (array_key_exists($controller,  $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller, $action);
	}
	else{
		call('cita','error');
	}		
}else{
	call('cita','error');
}

function call($controller, $action){
	require_once('Controllers/'.$controller.'Controller.php');

	switch ($controller) {
		case 'cita':
		require_once('Model/Cita.php');
		$controller= new CitaController();
		break;			
		default:
		break;
	}
	$controller->{$action}();
}

?>