<?php 
/**
* 
*/
class AdministradorController
{
	
	function __construct()
	{
		
	}

	function index(){
		require_once('../../Views/Paciente/show.php');
	}

	function register(){
		require_once('../../Views/Administrador/register.php');
	}

	function save(){
		$administrador= new Administrador($_POST['cc'], $_POST['contrasena']);

		Administrador::save($administrador);
		$this->show();
	}

	function show(){
		$listaAdministradores=Administrador::all();

		require_once('../../Views/Administrador/show.php');
	}

	function updateshow(){
		$cc=$_GET['idAdministrador'];
		$administrador=Administrador::searchById($cc);
		require_once('../../Views/Administrador/updateshow.php');
	}

	function update(){
		$administrador = new Administrador($_POST['cc'], $_POST['contrasena']);
		administrador::update($administrador);
		$this->show();
	}
	function delete(){
		$cc=$_GET['cc'];
		administrador::delete($cc);
		$this->show();
	}

	function search(){
		if (!empty($_POST['cc'])) {
			$cc=$_POST['cc'];
			$administrador=administrador::searchById($cc);
			$listaadministradors[]=$administrador;
			require_once('../../Views/administrador/show.php');
		} else {
			$listaadministradors=administrador::all();

			require_once('../../Views/administrador/show.php');
		}		
	}

	function error(){
		require_once('../../Views/administrador/error.php');
	}

}

?>