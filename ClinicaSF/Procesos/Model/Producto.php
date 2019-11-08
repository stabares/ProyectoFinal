<?php 

class Producto
{
    private $id;
    private $nombre;
    private $tipo;
    private $cantidad;
    private $activo;
    private $precio;

	
	function __construct($id, $nombre, $tipo, $cantidad, $activo, $precio)
	{
		$this->setId($id);
		$this->setNombre($nombre);
		$this->setTipo($tipo);
		$this->setCantidad($cantidad);
		$this->setActivo($activo);
		$this->setPrecio($precio);
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getTipo(){
		return $this->tipo;
    }
    
    public function setTipo($tipo){
		$this->tipo = $tipo;
	}


	public function setCantidad($cantidad){
		$this->cantidad = $cantidad;
    }
    
    public function getCantidad(){
		return $this->cantidad;
	}

	public function setActivo($activo){
		$this->activo = $activo;
    }
    
    public function getActivo(){
		return $this->activo;
	}

	public function setPrecio($precio){
		$this->precio = $precio;
    }
    
    public function getPrecio(){
		return $this->precio;
	}

    public static function save($producto){
        $db=Db::getConnect();
        		
		$insert=$db->prepare('INSERT INTO producto VALUES (:id, :nombre,:tipo,:cantidad, :activo, :precio)');
        $insert->bindValue('id',$producto->getId());
        $insert->bindValue('nombre',$producto ->getNombre());
        $insert->bindValue('tipo',$producto->getTipo());
        $insert->bindValue('cantidad',$producto->getCantidad());
        $insert->bindValue('activo',$producto->getActivo());
        $insert->bindValue('precio',$producto->getPrecio());
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
        $listaProductos=[];

		$select=$db->query('SELECT * FROM producto order by id');

        foreach($select->fetchAll() as $producto
        ){
            $listaProductos[]=new Producto ($producto['id'],$producto['nombre'],$producto['tipo'], $producto['cantidad'], $producto['activo'], $producto['precio']);
		}
        return $listaProductos;
	}

	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM producto WHERE id=:id');
		$select->bindValue('id',$id);
		$select->execute();

        $productoDb=$select->fetch();


        $producto = new Producto ($productoDb['id'],$productoDb['nombre'],$productoDb['tipo'], $productoDb['cantidad'], $productoDb['activo'], $productoDb['precio']);
        return $producto;

	}

    public static function update($producto){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE producto SET id=:id, nombre=:nombre, tipo=:tipo, cantidad=:cantidad, activo=:activo, precio=:precio WHERE id=:id');
        $update->bindValue('id',$producto->getId());
        $update->bindValue('nombre',$producto->getNombre());
        $update->bindValue('tipo',$producto->getTipo());
        $update->bindValue('cantidad',$producto->getCantidad());
        $update->bindValue('activo',$producto->getActivo());
        $update->bindValue('precio',$producto->getPrecio());
		$update->execute();
	}

	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM producto WHERE id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

?>