<?php
include_once 'database.php';

class appointments extends database {
    //déclaration des attribus
    public $id;
    public $dateHour;
    public $idPatients;
    
    /*déclaration de la méthode addAppointment
     * 
     */
    public function addAppointment(){
        /*
         * requete sql pour insérer la date et l'heure du rendez vous ainsi que l'id du patient 
         */
        $request = 'INSERT INTO `appointments`(`dateHour`,`idPatients`)'
             .'VALUES(:dateHour, :idPatients)';
        $insertAppointment = $this->db->prepare($request);
        //
        $insertAppointment->bindValue(':dateHour',$this->dateHour, PDO::PARAM_STR);
        $insertAppointment->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        return $insertAppointment->execute();
    }
}

