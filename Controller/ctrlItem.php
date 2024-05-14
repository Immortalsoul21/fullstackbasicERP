<?php

include_once("Model/mdlItem.php");
class ctrlItemController
{

    public $model;
    
public function __construct() {

       
        $this->model = new mdlItem();
      
    }


public function invoke(){
    
        
        



    if (isset($_POST["btnSave"])){ 
        $this->model->nAddEdit = $_POST["textAddEdit"];
        
        $this->model-> sItemno= $_POST['txtItemno'];
        $this->model->sDescription = $_POST['txtDescription'];
        $this->model-> sRate = $_POST['txtRate'];
        
    
    if( $this->model->nAddEdit ==0 ) {
    
       
        $this->model->addItem();
        $this->model->nAddEdit = 0;
                $this->model-> sItemno= "";
                $this->model->sDescription = "";
                $this->model-> sRate = "";
                

        
   
       
    } 
else {
    $this->model-> sItemno= $_POST['txtItemno'];
    $this->model->sDescription = $_POST['txtDescription'];
    $this->model-> sRate = $_POST['txtRate'];

        $this->model->updateItem();
        $this->model->nAddEdit = 0;
        $this->model-> sItemno= "";
                $this->model->sDescription = "";
                $this->model-> sRate = "";
        
    
} 
    }
    

   
    if (isset($_POST["btnSearch"])) {
        $this->model-> sItemno= $_POST['txtItemno'];
        $this->model->sDescription = $_POST['txtDescription'];
        $this->model-> sRate = $_POST['txtRate'];
                    
        
            $this->model->nAddEdit = 1;
            echo "the new value of global variable is ".$this->model->nAddEdit;
            $this->model->searchItemById();
               
    
                if (count($this->model->result) > 0) {
                    $row = $this->model->result[0];
                     $this->model-> sItemno = $row['It_codeno'];
                    $this->model->sDescription= $row['It_description'];
                    $this->model-> sRate = $row['It_rate'];
                     

        
    } else {
        echo "Data not found!";
    }
}
        
   

    if(isset($_POST['btnDelete'])) { 
        $this->model-> sItemno= $_POST['txtItemno'];
        $this->model->sDescription = $_POST['txtDescription'];
        $this->model-> sRate = $_POST['txtRate'];

            $this->model->deleteItem();
    }

        
    if(isset($_POST["btnClear"])) {
        $this->model->nAddEdit = 0;
        $this->model-> sItemno= "";
        $this->model->sDescription = "";
        $this->model-> sRate = "";


    }


        require("View/vewItem.php");


    }
    }


?>