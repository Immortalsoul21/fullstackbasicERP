<?php

include_once 'Model/mdlReport2.php';

class ctrlReport2Controller {

    public $model;
    public $cError;

    public function __construct() {
        $this->model = new clsReport2();
        $this->cError = "";
    }

    public function invoke() {
        if (isset($_POST['btnShow'])) {
            
            $this->model->cSDate = date("Y-m-d", strtotime($_POST['txtFromDate']));
             
            $this->model->cTDate = date("Y-m-d", strtotime($_POST['txtToDate']));
           
            if (strtotime($this->model->cSDate) >= strtotime($this->model->cTDate)) {
    
            $this->model->Err = "**To date should be smaller**";
    
}else{
            $this->model->ReadRecord();
            
}       
         
    }
    require "View/vewReport2.php";

}
}
?>