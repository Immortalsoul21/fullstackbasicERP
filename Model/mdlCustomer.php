<?php 
Class mdlCustomer{

    private $db;
    public $nAddEdit = 0;
    public $sCustomerIdErr = "";
    public $sNameErr =  "";
     public $sAddrErr =   "";  
     public $sDojErr = "";
     public $sDepositErr =  "";
    public $sCustomerId =  "";
    public $sName =  "";
    public $sAddr =  "";
    public $sDoj =  "";
    public $sDeposite = "";
    public $result;
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=finance;charset=utf8',"root", "");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function searchCustomerById() {
        $query = "SELECT cu_customerid,cu_fname,cu_addr,cu_doj,cu_deposite FROM customer WHERE cu_customerid = :customerId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':customerId', $this->sCustomerId);
        $stmt->execute();
        $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->result;
    }

    public function addCustomer() {
        
        $query = "INSERT INTO customer (cu_customerid, cu_fname, cu_addr, cu_doj, cu_deposite) VALUES (:customerId, :sname, :addr, :doj, :deposit)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':customerId', $this->sCustomerId);
        $stmt->bindParam(':sname', $this->sName);
        $stmt->bindParam(':addr', $this->sAddr);
        $stmt->bindParam(':doj', $this->sDoj);
        $stmt->bindParam(':deposit', $this->sDeposite);
        $stmt->execute();
    }

    public function updateCustomer() {
       

        $query = "UPDATE customer SET cu_fname = :name, cu_addr = :addr, cu_doj = :doj, cu_deposite = :deposit WHERE cu_customerid = :customerId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':customerId',$this->sCustomerId);
        $stmt->bindParam(':name', $this->sName);
        $stmt->bindParam(':addr', $this->sAddr);
        $stmt->bindParam(':doj', $this->sDoj);
        $stmt->bindParam(':deposit', $this->sDeposite);
        $stmt->execute();
    }

    public function deleteCustomer() {
        

        $query = "DELETE FROM customer WHERE cu_customerid = :customerId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':customerId', $this->sCustomerId);
        $stmt->execute();
    }
}
    
    





?>