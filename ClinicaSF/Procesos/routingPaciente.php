<?php 

$controllers=array(
	'paciente'=>['index','register','save','show','updateshow','update','delete','search','error']
);

if (array_key_exists($controller,  $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller, $action);
	}
	else{
		call('paciente','error');
	}		
}else{
	call('paciente','error');
}

function call($controller, $action){
	require_once('Controllers/'.$controller.'Controller.php');

	switch ($controller) {
		case 'paciente':
		require_once('Model/Paciente.php');
		$controller= new PacienteController();
		break;			
		default:
		break;
	}
	$controller->{$action}();
}

?>