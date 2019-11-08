<?php 
/**
* 
*/
class ProductoController
{
	
	function __construct()
	{
		
	}

	function index(){
        require_once('../../Views/Producto/show.php');
        $listaProductos=Producto::all();
	}

	function register(){
		require_once('../../Views/Producto/register.php');
	}

	function save(){
		$producto= new Producto($_POST['id'], $_POST['nombre'],$_POST['tipo'], $_POST['cantidad'], $_POST['activo'], $_POST['precio']);

		Producto::save($producto);
		$this->show();
	}

	function show(){
		$listaProductos=Producto::all();
		require_once('../../Views/Producto/show.php');
	}

	function updateshow(){
		$id=$_GET['idProducto'];
		$producto= Producto::searchById($id);
		require_once('../../Views/Producto/updateshow.php');
	}

	function update(){
		$producto = new Producto($_POST['id'], $_POST['nombre'],$_POST['tipo'], $_POST['cantidad'], $_POST['activo'], $_POST['precio']);
        Producto::update($producto);
		$this->show();
	}
	function delete(){
		$id=$_GET['id'];
		Producto::delete($id);
		$this->show();
	}

	function search(){
		if (!empty($_POST['id'])) {
			$id=$_POST['id'];
			$producto= Producto::searchById($id);
			$listaProductos[]=$producto;
			require_once('../../Views/Producto/show.php');
		} else {
			$listaProductos= Producto::all();
			require_once('../../Views/Producto/show.php');
		}		
	}

	function error(){
		require_once('../../Views/Producto/error.php');
	}

}

?>