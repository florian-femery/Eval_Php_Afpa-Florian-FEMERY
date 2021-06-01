<?php 
namespace App; 
use \PDO; //car la classe PDO n'est pas dans le namespace App, il faut donc preciser qu'elle est a la racine '\' 


/**
 * [Description Database]
 * Permet d'initialiser la connexion a la base de donnée. 
 */
class Database{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo; 

    /**
     * @param mixed $db_name
     * @param string $db_user
     * @param string $db_pass
     * @param string $db_host
     */
    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost'){
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;   
    }

    /**
     * Permet d'initialiser la connexion a la base de donnée via l'objet PDO. 
     * @return PDO initialisé et connécté. 
     */
    private function getPDO(){
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name.';charset=utf8', $this->db_user, $this->db_pass); 
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo; 
        }
        return $this->pdo;
    }

    /**
     * @param mixed $statement
     * Permet de faire une requete simple sans parametres à la base de donnée. 
     * A utiliser pour les SELECTS. 
     * @return [type]
     */
    public function query($statement, $class_name){
        $request = $this->getPDO()->query($statement); 
        $datas = $request->fetchAll(PDO::FETCH_CLASS, $class_name); 
        return $datas; 
    }

    /**
     * @param mixed $statement requete SQL
     * @param array $arguments A ajouter dans la requete SQL
     * @param string $class_name class du fetch_class
     * @param bool $one
     * 
     * @return [Class]
     */
    public function prepare($statement, $arguments, $class_name, $one = false){
        $request = $this->getPDO()->prepare($statement); 
        $request->execute($arguments);
        $request->setFetchMode(PDO::FETCH_CLASS, $class_name);

        if($one) {
            $datas = $request->fetch();  
        } else $datas = $request->fetchAll();

        return $datas; 
    }


    public function delete($statement, $arguments){
        $request = $this->getPDO()->prepare($statement); 
        $request->execute($arguments);
    }
    
    public function update($statement, $arguments){
        $request = $this->getPDO()->prepare($statement); 
        $request->execute($arguments);
    }

    public function getUsedRefs(){
        $request = $this->getPDO()->prepare("SELECT pro_ref FROM produits"); 
        $request->execute();
        return $request->fetchAll(PDO::FETCH_COLUMN); 
    }
}
