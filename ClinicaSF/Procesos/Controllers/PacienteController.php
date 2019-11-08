<?php 
/**
* 
*/
class PacienteController
{
	
	function __construct()
	{
		
	}

	function index(){
        require_once('../../Views/Paciente/show.php');
        $listaPacientes=Paciente::all();
		require_once('../../Views/Paciente/show.php');
	}

	function register(){
        require_once('../../Views/Paciente/register.php');
	}

	function save(){
		$paciente= new Paciente($_POST['cc'], $_POST['nombre'],$_POST['apellido'], $_POST['direccion'], $_POST['telefono'], $_POST['contrasena']);

		Paciente::save($paciente);
		$this->show();
	}

	function show(){
		$listaPacientes=Paciente::all();
		require_once('../../Views/Paciente/show.php');
	}

	function updateshow(){
		$cc=$_GET['idPaciente'];
		$paciente=Paciente::searchById($cc);
		require_once('../../Views/Paciente/updateshow.php');
	}

	function update(){
		$paciente = new Paciente($_POST['cc'], $_POST['nombre'],$_POST['apellido'], $_POST['direccion'], $_POST['telefono'], $_POST['contrasena']);
		Paciente::update($paciente);
		$this->show();
	}
	function delete(){
		$cc=$_GET['cc'];
		Paciente::delete($cc);
		$this->show();
	}

	function search(){
		if (!empty($_POST['cc'])) {
			$cc=$_POST['cc'];
			$paciente=Paciente::searchById($cc);
			$listaPacientes[]=$paciente;
			require_once('../../Views/Paciente/show.php');
		} else {
			$listaPacientes=Paciente::all();

			require_once('../../Views/Paciente/show.php');
		}		
	}

	function error(){
		require_once('../../Views/Paciente/error.php');
	}

}

?>