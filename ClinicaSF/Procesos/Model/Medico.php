<?php 

class Medico
{
    private $cc;
    private $nombre;
    private $apellido;
    private $direccion;
    private $telefono;
    private $especialidad;
    private $contrasena;

	
	function __construct($cc, $nombre,$apellido, $direccion, $telefono, $especialidad, $contrasena)
	{
		$this->setCC($cc);
		$this->setNombre($nombre);
		$this->setApellido($apellido);
		$this->setDireccion($direccion);
        $this->setTelefono($telefono);
        $this->setEspecialidad($especialidad);
		$this->setContrasena($contrasena);
	}

	public function getCC(){
		return $this->cc;
	}

	public function setCC($cc){
		$this->cc = $cc;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getApellido(){
		return $this->apellido;
    }
    
    public function setApellido($apellido){
		$this->apellido = $apellido;
	}


	public function setDireccion($direccion){
		$this->direccion = $direccion;
    }
    
    public function getDireccion(){
		return $this->direccion;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
    }
    
    public function getTelefono(){
		return $this->telefono;
    }
    
    public function setEspecialidad($especialidad){
		$this->especialidad = $especialidad;
    }
    
    public function getEspecialidad(){
		return $this->especialidad;
	}

	public function setContrasena($contrasena){
		$this->contrasena = $contrasena;
    }
    
    public function getContrasena(){
		return $this->contrasena;
	}

    public static function save($medico
    ){
		$db=Db::getConnect();
		
		$insert=$db->prepare('INSERT INTO medico VALUES (:cc, :nombre,:apellido,:direccion, :telefono, :especialidad, :contrasena)');
        $insert->bindValue('cc',$medico->getCC());
        $insert->bindValue('nombre',$medico->getNombre());
        $insert->bindValue('apellido',$medico->getApellido());
        $insert->bindValue('direccion',$medico->getDireccion());
        $insert->bindValue('telefono',$medico->getTelefono());
        $insert->bindValue('especialidad',$medico->getEspecialidad());
        $insert->bindValue('contrasena',$medico->getContrasena());
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
        $listaMedicos=[];

		$select=$db->query('SELECT * FROM medico order by cc');

        foreach($select->fetchAll() as $medico
        ){
            $listaMedicos[]=new Medico ($medico['cc'],$medico['nombre'],$medico['apellido'], 
            $medico['direccion'], $medico['telefono'], $medico['especialidad'], $medico['contrasena']);
		}
        return $listaMedicos;
	}

	public static function searchById($cc){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM medico WHERE cc=:cc');
		$select->bindValue('cc',$cc);
		$select->execute();

        $medicoDb=$select->fetch();


        $medico = new Medico($medicoDb['cc'],$medicoDb['nombre'],$medicoDb['apellido'], $medicoDb['direccion'], 
        $medicoDb['telefono'], $medicoDb['especialidad'], $medicoDb['contrasena']);
        return $medico;

	}

    public static function update($medico
    ){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE medico SET cc=:cc, nombre=:nombre, apellido=:apellido, direccion=:direccion, telefono=:telefono, contrasena=:contrasena WHERE cc=:cc');
        $update->bindValue('cc',$medico->getCC());
        $update->bindValue('nombre',$medico->getNombre());
        $update->bindValue('apellido',$medico->getApellido());
        $update->bindValue('direccion',$medico->getDireccion());
        $update->bindValue('telefono',$medico->getTelefono());
        $update->bindValue('especialidad',$medico->getEspecialidad());
        $update->bindValue('contrasena',$medico->getContrasena());
		$update->execute();
	}

	public static function delete($cc){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM medico WHERE cc=:cc');
		$delete->bindValue('cc',$cc);
		$delete->execute();		
	}
}

?>