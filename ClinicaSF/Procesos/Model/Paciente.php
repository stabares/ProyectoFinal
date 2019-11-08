<?php 

class Paciente
{
    private $cc;
    private $nombre;
    private $apellido;
    private $direccion;
    private $telefono;
    private $contrasena;

	
	function __construct($cc, $nombre,$apellido, $direccion, $telefono, $contrasena)
	{
		$this->setCC($cc);
		$this->setNombre($nombre);
		$this->setApellido($apellido);
		$this->setDireccion($direccion);
		$this->setTelefono($telefono);
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

	public function setContrasena($contrasena){
		$this->contrasena = $contrasena;
    }
    
    public function getContrasena(){
		return $this->contrasena;
	}

    public static function save($paciente
    ){
		$db=Db::getConnect();
		
		$insert=$db->prepare('INSERT INTO paciente VALUES (:cc, :nombre,:apellido,:direccion, :telefono, :contrasena)');
        $insert->bindValue('cc',$paciente
        ->getCC());
        $insert->bindValue('nombre',$paciente
        ->getNombre());
        $insert->bindValue('apellido',$paciente
        ->getApellido());
        $insert->bindValue('direccion',$paciente
        ->getDireccion());
        $insert->bindValue('telefono',$paciente
        ->getTelefono());
        $insert->bindValue('contrasena',$paciente
        ->getContrasena());
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
        $listaPacientes=[];

		$select=$db->query('SELECT * FROM paciente order by cc');

        foreach($select->fetchAll() as $paciente
        ){
            $listaPacientes[]=new Paciente ($paciente['cc'],$paciente['nombre'],$paciente['apellido'], $paciente['direccion'], $paciente['telefono'], $paciente['contrasena']);
		}
        return $listaPacientes;
	}

	public static function searchById($cc){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM paciente WHERE cc=:cc');
		$select->bindValue('cc',$cc);
		$select->execute();

        $pacienteDb=$select->fetch();


        $paciente
         = new paciente
        ($pacienteDb['cc'],$pacienteDb['nombre'],$pacienteDb['apellido'], $pacienteDb['direccion'], 
        $pacienteDb['telefono'], $pacienteDb['contrasena']);
        return $paciente;

	}

    public static function update($paciente
    ){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE paciente SET cc=:cc, nombre=:nombre, apellido=:apellido, direccion=:direccion, telefono=:telefono, contrasena=:contrasena WHERE cc=:cc');
        $update->bindValue('cc',$paciente->getCC());
        $update->bindValue('nombre',$paciente->getNombre());
        $update->bindValue('apellido',$paciente->getApellido());
        $update->bindValue('direccion',$paciente->getDireccion());
        $update->bindValue('telefono',$paciente->getTelefono());
        $update->bindValue('contrasena',$paciente->getContrasena());
		$update->execute();
	}

	public static function delete($cc){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM paciente WHERE cc=:cc');
		$delete->bindValue('cc',$cc);
		$delete->execute();		
	}
}

?>