<?php 

$controllers=array(
	'medico'=>['index','register','save','show','updateshow','update','delete','search','error']
);

if (array_key_exists($controller,  $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller, $action);
	}
	else{
		call('medico','error');
	}		
}else{
	call('medico','error');
}

function call($controller, $action){
	require_once('Controllers/'.$controller.'Controller.php');

	switch ($controller) {
		case 'medico':
		require_once('Model/Medico.php');
		$controller= new MedicoController();
		break;			
		default:
		break;
	}
	$controller->{$action}();
}
?>