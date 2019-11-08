<?php 

class Adminstrador
{
    private $cc;
    private $contrasena;

	
	function __construct($cc, $contrasena)
	{
		$this->setCC($cc);
		$this->setContrasena($contrasena);
	}

	public function getCC(){
		return $this->cc;
	}

	public function setCC($cc){
		$this->cc = $cc;
	}

	public function setContrasena($contrasena){
		$this->contrasena = $contrasena;
    }
    
    public function getContrasena(){
		return $this->contrasena;
	}

    public static function save($administrador){
		$db=Db::getConnect();
		
		$insert=$db->prepare('INSERT INTO administrador VALUES (:cc, :contrasena)');
        $insert->bindValue('cc',$administrador ->getCC());
        $insert->bindValue('contrasena',$administrador ->getContrasena());
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
        $listaAdministradores=[];

		$select=$db->query('SELECT * FROM administrador order by cc');

        foreach($select->fetchAll() as $administrador
        ){
            $listaAdministradores[]=new Administrador ($administrador['cc'], $administrador['contrasena']);
		}
        return $listaAdministradores;
	}

	public static function searchById($cc){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM administrador WHERE cc=:cc');
		$select->bindValue('cc',$cc);
		$select->execute();

        $administradorDb=$select->fetch();


        $administrador = new Administrador
        ($administradorDb['cc'], $administradorDb['contrasena']);
        return $administrador;

	}

    public static function update($administrador){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE administrador SET cc=:cc, contrasena=:contrasena WHERE cc=:cc');
        $update->bindValue('cc',$administrador->getCC());
        $update->bindValue('contrasena',$administrador->getContrasena());
		$update->execute();
	}

	public static function delete($cc){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM administrador WHERE cc=:cc');
		$delete->bindValue('cc',$cc);
		$delete->execute();		     
	}
}
