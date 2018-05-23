<?php
/**
 * La Classe Mypdo.
 *
 * Cette Classe permet de créer l'accés à la basse de données.
 *
 * @author tristan
 */
class Mypdo extends PDO
{

	protected $dbo;

	public function __construct ()
	{
	 // le paramétrage de cette classe se fait dans le fichier config.inc.php
		if (ENV=='dev'){
			//$bool=true;
		}
		else
		{
			//$bool=false;
		}
		try {
			$this->dbo =parent::__construct("mysql:host=".DBHOST."; dbname=".DBNAME, DBUSER, DBPASSWD,
			array(	PDO::ATTR_PERSISTENT => true,
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
			));
		}
		catch (PDOException $e) {
			echo 'échec lors de la connexion : ' . $e->getMessage();
		}
	}

}

?>
