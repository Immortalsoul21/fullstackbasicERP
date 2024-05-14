<?php

include_once("Model/mdlCustomer.php");
class ctrlCustomerController
{

    public $model;
    
public function __construct() {

       
        $this->model = new mdlCustomer();
      
    }


public function invoke(){
    
        
        



    if (isset($_POST["btnSave"])){ 
        $this->model->nAddEdit = $_POST["textAddEdit"];
        $this->model-> sCustomerId = $_POST['txtCustomerId'];
        $this->model->sName = $_POST['txtName'];
        $this->model-> sAddr = $_POST['txtAddr'];
        $this->model-> sDoj = $_POST['txtDoj'];
        $this->model->sDeposite = $_POST['txtDeposite'];
        
           
           
           
           
            
    if( $this->model->nAddEdit ==0 ) {
        $this->model->addCustomer();
        $this->model->nAddEdit = 0;
        $this->model-> sCustomerId = "";
                $this->model->sName = "";
               $this->model-> sAddr = "";
                $this->model-> sDoj ="";
                $this->model-> sDeposite = "";
    echo "saved";
    } 
    else {
    $this->model->sCustomerId = $_POST['txtCustomerId'];
    $this->model->sName = $_POST['txtName'];
    $this->model->sAddr= $_POST['txtAddr'];
    $this->model->sDoj = $_POST['txtDoj'];
    $this->model->sDeposite= $_POST['txtDeposite'];

        $this->model->updateCustomer();
        echo "updated";
        $this->model->nAddEdit = 0;
        $this->model-> sCustomerId = "";
                $this->model->sName = "";
               $this->model-> sAddr = "";
                $this->model-> sDoj ="";
                $this->model-> sDeposite = ""; 
                
    } 
}
    

   
    if (isset($_POST["btnSearch"])) {
            $this->model-> sCustomerId = $_POST["txtCustomerId"];
                    $this->model->sName = $_POST["txtName"];
                   $this->model-> sAddr = $_POST["txtAddr"];
                    $this->model-> sDoj = $_POST["txtDoj"];
                    $this->model-> sDeposite = $_POST["txtDeposite"];
                    if (empty($this->model->sCustomerId)) {
                        $sCustomerIderr = "Customer Id is required";
                    }
        
            $this->model->nAddEdit = 1;
            echo "the new value of global variable is ".$this->model->nAddEdit;
            $this->model->searchCustomerById();
               
    
                if (count($this->model->result) > 0) {
                    $row = $this->model->result[0];
                     $this->model-> sCustomerId = $row['cu_customerid'];
                    $this->model->sName= $row['cu_fname'];
                    $this->model-> sAddr = $row['cu_addr'];
                     $this->model-> sDoj = $row['cu_doj'];
                    $this->model-> sDeposite = $row['cu_deposite'];

        
    } else {
        echo "Data not found!";
    }
}
        
   

    if(isset($_POST['btnDelete'])) { 
        $this->model-> sCustomerId = $_POST["txtCustomerId"];
                $this->model->sName = $_POST["txtName"];
               $this->model-> sAddr = $_POST["txtAddr"];
                $this->model-> sDoj = $_POST["txtDoj"];
                $this->model-> sDeposite = $_POST["txtDeposite"];

            $this->model->deleteCustomer();
            $this->model->nAddEdit = 0;
        $this->model-> sCustomerId = "";
                $this->model->sName = "";
               $this->model-> sAddr = "";
                $this->model-> sDoj ="";
                $this->model-> sDeposite = "";
    }

        
    if(isset($_POST["btnClear"])) {
        $this->model->nAddEdit = 0;
        $this->model-> sCustomerId = "";
                $this->model->sName = "";
               $this->model-> sAddr = "";
                $this->model-> sDoj ="";
                $this->model-> sDeposite = "";


    }


        require("View/vewCustomer.php");


    }
    }


?>