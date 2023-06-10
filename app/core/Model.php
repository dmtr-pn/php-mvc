<?php 

class Model
{
    private $db_host = '';
    private $db_name = '';
    private $db_username = '';
    private $port = "";
    private $db_password = '';

    public $db;

    public function __construct() {

        //$this->dbConnect();
        
    }

    public function dbConnect()
    {
        try{
            $this->db = new PDO('mysql:host='.$this->db_host.'; port='.$this->port.'; dbname='.$this->db_name,$this->db_username,$this->db_password);
        }catch(PDOException $e){
            echo "Connection error ".$e->getMessage(); 
            exit;
        }
    }
}
