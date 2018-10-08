<?php
class database{
    // Liste des attributs
    protected $db;
    public $id;
    public $type;

    public function __construct() {
        // On test les erreurs avec le try/catch
        // Si tout est bon, on est connecté à la base de donnée
        try {
            $this->db = NEW PDO('mysql:host=localhost; dbname=hospitalE2N; charset=utf8', 'damien', 'N3ptune');
           // $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        //Autrement, un message d'erreur est affiché
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function __destruct() {
        $this->db = NULL;
    }
}
