<?php 

class Despacho
{
    private $id;
    private $nombre;
    private $paciente;
    private $producto;
    private $medico;
    private $inicio;
    private $fin;
    private $estado;

	
	function __construct($id, $nombre,$paciente, $producto, $medico, $inicio, $fin, $estado)
	{
		$this->setId($id);
		$this->setNombre($nombre);
		$this->setPaciente($paciente);
		$this->setProducto($producto);
		$this->setMedico($medico);
        $this->setInicio($inicio);
        $this->setFin($fin);
		$this->setEstado($estado);

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

	public function getPaciente(){
		return $this->paciente;
    }
    
    public function setPaciente($paciente){
		$this->paciente = $paciente;
	}


	public function setProducto($producto){
		$this->producto = $producto;
    }
    
    public function getProducto(){
		return $this->producto;
	}

	public function setMedico($medico){
		$this->medico = $medico;
    }
    
    public function getMedico(){
		return $this->medico;
	}

	public function setInicio($inicio){
		$this->inicio = $inicio;
    }
    
    public function getInicio(){
		return $this->inicio;
    }
    
    public function setFin($fin){
		$this->fin = $fin;
    }
    
    public function getFin(){
		return $this->fin;
    }
    
    public function setEstado($estado){
		$this->estado = $estado;
    }
    
    public function getEstado(){
		return $this->estado;
	}

    public static function save($despacho){
		$db=Db::getConnect();
		
		$insert=$db->prepare('INSERT INTO despacho VALUES (:id, :nombre,:paciente,:producto, :medico, :inicio, :fin, :estado)');
        $insert->bindValue('id',$despacho->getId());
        $insert->bindValue('nombre',$despacho->getNombre());
        $insert->bindValue('paciente',$despacho->getPaciente());
        $insert->bindValue('producto',$despacho->getProducto());
        $insert->bindValue('medico',$despacho->getMedico());
        $insert->bindValue('inicio',$despacho->getInicio());
        $insert->bindValue('fin',$despacho->getFin());
        $insert->bindValue('estado',$despacho->getEstado());
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
        $listaDespachos=[];

		$select=$db->query('SELECT * FROM despacho order by id');

        foreach($select->fetchAll() as $despacho
        ){
            $listaDespachos[]=new Despacho ($despacho['id'],$despacho['nombre'],$despacho['paciente'],
             $despacho['producto'], $despacho['medico'], $despacho['inicio'], $despacho['fin'], $despacho['estado']);
		}
        return $listaDespachos;
	}

	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM despacho WHERE id=:id');
		$select->bindValue('id',$id);
		$select->execute();

        $despachoDb=$select->fetch();


        $despacho = new Despacho ($despachoDb['id'],$despachoDb['nombre'],$despachoDb['paciente'], $despachoDb['producto'], 
        $despachoDb['medico'], $despachoDb['inicio'], $despachoDb['fin'], $despachoDb['estado']);
        return $despacho;

	}

    public static function update($despacho
    ){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE despacho SET id=:id, nombre=:nombre, paciente=:paciente, producto=:producto, medico=:medico, inicio=:inicio, fin=:fin, estado=:estado WHERE id=:id');
        $update->bindValue('id',$despacho->getId());
        $update->bindValue('nombre',$despacho->getNombre());
        $update->bindValue('paciente',$despacho->getPaciente());
        $update->bindValue('producto',$despacho->getProducto());
        $update->bindValue('medico',$despacho->getMedico());
        $update->bindValue('inicio',$despacho->getInicio());
        $update->bindValue('fin',$despacho->getFin());
        $update->bindValue('estado',$despacho->getEstado());
        $update->execute();
	}

	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM despacho WHERE id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

?>