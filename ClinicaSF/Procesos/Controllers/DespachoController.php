<?php 
/**
* 
*/
class DespachoController
{
	
	function __construct()
	{
		
	}

	function index(){
		require_once('../../Views/Despacho/show.php');
	}

	function register(){
		require_once('../../Views/Despacho/register.php');
	}

	function save(){
		$despacho= new Despacho($_POST['id'], $_POST['nombre'],$_POST['paciente'], $_POST['producto'], $_POST['medico'], $_POST['inicio'],  $_POST['fin'], $_POST['estado']);

		Despacho::save($despacho);
		$this->show();
	}

	function show(){
		$listaDespachos= Despacho::all();

		require_once('../../Views/Despacho/show.php');
	}

	function updateshow(){
		$id=$_GET['idDespacho'];
		$despacho= Despacho::searchById($id);
		require_once('../../Views/Despacho/updateshow.php');
	}

	function update(){
		$despacho = new Despacho($_POST['id'], $_POST['nombre'],$_POST['paciente'], $_POST['producto'], $_POST['medico'], $_POST['inicio'],  $_POST['fin'], $_POST['estado']);
        Despacho::update($despacho);
		$this->show();
	}
	function delete(){
		$id=$_GET['id'];
		Despacho::delete($id);
		$this->show();
	}

	function search(){
		if (!empty($_POST['id'])) {
			$id=$_POST['id'];
			$despacho= Despacho::searchById($id);
			$listaDespachos[]=$despacho;
			require_once('../../Views/Despacho/show.php');
		} else {
			$listaDespachos= Despacho::all();

			require_once('../../Views/Despacho/show.php');
		}		
	}

	function error(){
		require_once('../../Views/Despacho/error.php');
	}

}

?>