<?php 
/**
* 
*/
class MedicoController
{
	
	function __construct()
	{
		
	}

	function index(){
		require_once('../../Views/Medico/show.php');
	}

	function register(){
		require_once('../../Views/Medico/register.php');
	}

	function save(){
		$medico= new Medico($_POST['cc'], $_POST['nombre'],$_POST['apellido'], $_POST['direccion'], $_POST['telefono'], $_POST['especialidad'], $_POST['contrasena']);

		Medico::save($medico);
		$this->show();
	}

	function show(){
		$listaMedicos= Medico::all();

		require_once('../../Views/medico/show.php');
	}

	function updateshow(){
		$cc=$_GET['idMedico'];
		$medico = Medico::searchById($cc);
		require_once('../../Views/Medico/updateshow.php');
	}

	function update(){
		$medico = new Medico($_POST['cc'], $_POST['nombre'],$_POST['apellido'], $_POST['direccion'], $_POST['telefono'], $_POST['especialidad'], $_POST['contrasena']);
		Medico::update($medico);
		$this->show();
	}
	function delete(){
		$cc=$_GET['cc'];
		medico::delete($cc);
		$this->show();
	}

	function search(){
		if (!empty($_POST['cc'])) {
			$cc=$_POST['cc'];
			$medico= Medico::searchById($cc);
			$listaMedicos[]=$medico;
			require_once('../../Views/Medico/show.php');
		} else {
			$listaMedicos= Medico::all();

			require_once('../../Views/Medico/show.php');
		}		
	}

	function error(){
		require_once('../../Views/Medico/error.php');
	}

}
