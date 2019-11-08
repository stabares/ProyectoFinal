<?php 
/**
* 
*/
class CitaController
{
	
	function __construct()
	{
		
	}

	function index(){
		require_once('../../Views/Cita/show.php');
	}

	function register(){
		require_once('../../Views/Cita/register.php');
	}

	function save(){
		$cita= new Cita($_POST['id'], $_POST['nombre'],$_POST['paciente'], $_POST['medico'], $_POST['inicio'], $_POST['fin'] , $_POST['descripcion']  , $_POST['estado']);

		Cita::save($cita);
		$this->show();
	}

	function show(){
		$listaCitas=Cita::all();
		require_once('../../Views/Cita/show.php');
	}

	function updateshow(){
		$id=$_GET['idCita'];
		$cita=cita::searchById($id);
		require_once('../../Views/Cita/updateshow.php');
	}

	function update(){
		$cita = new Cita($_POST['id'], $_POST['nombre'],$_POST['paciente'], $_POST['medico'], $_POST['inicio'], $_POST['fin'] , $_POST['descripcion']  , $_POST['estado']);
        Cita::update($cita);
		$this->show();
	}
	function delete(){
		$id=$_GET['id'];
		cita::delete($id);
		$this->show();
	}

	function search(){
		if (!empty($_POST['id'])) {
			$id=$_POST['id'];
			$cita=Cita::searchById($id);
			$listaCitas[]=$cita;
			require_once('../../Views/Cita/show.php');
		} else {
			$listaCitas=Cita::all();

			require_once('../../Views/Cita/show.php');
		}		
	}

	function error(){
		require_once('../../Views/Cita/error.php');
	}

}

?>