<?php 

$controllers=array(
	'producto'=>['index','register','save','show','updateshow','update','delete','search','error']
);

if (array_key_exists($controller,  $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller, $action);
	}
	else{
		call('producto','error');
	}		
}else{
	call('producto','error');
}

function call($controller, $action){
	require_once('Controllers/'.$controller.'Controller.php');

	switch ($controller) {
		case 'producto':
		require_once('Model/Producto.php');
		$controller= new ProductoController();
		break;			
		default:
		break;
	}
	$controller->{$action}();
}

?>