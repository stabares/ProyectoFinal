<?php 

class Cita
{
    private $id;
    private $nombre;
    private $paciente;
    private $medico;
    private $inicio;
    private $fin;
    private $descripcion;
    private $estado;

	
	function __construct($id, $nombre,$paciente, $medico, $inicio, $fin, $descripcion, $estado)
	{
		$this->setId($id);
		$this->setNombre($nombre);
		$this->setPaciente($paciente);
		$this->setMedico($medico);
		$this->setInicio($inicio);
        $this->setFin($fin);
        $this->setDescripcion($descripcion);
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
    
    public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
    }
    
    public function getDescripcion(){
		return $this->descripcion;
    }
    public function setEstado($estado){
		$this->estado = $estado;
    }
    
    public function getEstado(){
		return $this->estado;
	}

    public static function save($cita){
		$db=Db::getConnect();
		
		$insert=$db->prepare('INSERT INTO cita VALUES (:id, :nombre,:paciente,:medico, :inicio, :fin, :descripcion, :estado)');
        $insert->bindValue('id',$cita->getId());
        $insert->bindValue('nombre',$cita->getNombre());
        $insert->bindValue('paciente',$cita->getPaciente());
        $insert->bindValue('medico',$cita->getMedico());
        $insert->bindValue('inicio',$cita->getInicio());
        $insert->bindValue('fin',$cita->getFin());
        $insert->bindValue('descripcion',$cita->getDescripcion());
        $insert->bindValue('estado',$cita->getEstado());
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
        $listaCitas=[];
		$select=$db->query('SELECT * FROM cita order by id');
        foreach($select->fetchAll() as $cita
        ){
            $listaCitas[]=new Cita ($cita['id'],$cita['nombre'],$cita['paciente'], $cita['medico'], $cita['inicio'], $cita['fin'], $cita['descripcion'], $cita['estado']);
		}
        return $listaCitas;
	}

	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM cita WHERE id=:id');
		$select->bindValue('id',$id);
		$select->execute();

        $citaDb=$select->fetch();
        $cita = new Cita ($citaDb['id'],$citaDb['nombre'],$citaDb['cita'], $citaDb['medico'], 
        $citaDb['inicio'], $citaDb['fin'], $citaDb['descripcion'], $citaDb['estado']);
        return $cita;

	}

    public static function update($cita){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE cita SET id=:id, nombre=:nombre, cita=:cita, medico=:medico, inicio=:inicio, fin=:fin, descripcion=:descripcion, estado=:estado WHERE id=:id');
        $update->bindValue('id',$cita->getId());
        $update->bindValue('nombre',$cita->getNombre());
        $update->bindValue('paciente',$cita->getPaciente());
        $update->bindValue('medico',$cita->getMedico());
        $update->bindValue('inicio',$cita->getInicio());
        $update->bindValue('fin',$cita->getFin());
        $update->bindValue('descripcion',$cita->getDescripcion());
        $update->bindValue('estado',$cita->getEstado());
		$update->execute();
	}

	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM cita WHERE id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

?>