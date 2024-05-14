<?php 




class mdlItem {

    private $db;
    public $nAddEdit = 0;
    public $sItemnoErr = "";
    public $sDescriptionErr =  "";
     public $sRateErr =   "";  
     public $sItemno = "";
     public $sDescription=  "";
    public $sRate =  "";
    
    public $result;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=finance;charset=utf8',"root", "");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function searchItemById() {
        $query = "SELECT It_codeno,It_description,It_rate FROM item WHERE It_codeno = :Itemno";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':Itemno', $this->sItemno);
        $stmt->execute();
        $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->result;
    }

    public function addItem() {
        
        $query = "INSERT INTO item(It_codeno,It_description,It_rate) VALUES (:It_codeno,:It_description,:It_rate)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':It_codeno', $this->sItemno);
        $stmt->bindParam(':It_description', $this->sDescription);
        $stmt->bindParam(':It_rate', $this->sRate);
       
        $stmt->execute();
    }

    public function updateItem() {
       

        $query = "UPDATE item SET It_description = :It_description, It_rate = :It_rate WHERE It_codeno = :It_codeno";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':It_codeno', $this->sItemno);
        $stmt->bindParam(':It_description', $this->sDescription);
        $stmt->bindParam(':It_rate', $this->sRate);
        $stmt->execute();
    }

    public function deleteItem() {
        

        $query = "DELETE FROM item WHERE It_codeno = :It_codeno";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':It_codeno', $this->sItemno);
        $stmt->execute();
    }
}
?>