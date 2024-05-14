<?php

include_once 'Model/mdlReport3.php';

class ctrlReport3Controller {

    public $model;
    public $cError;

    public function __construct() {
        $this->model = new clsReport3();
        $this->cError = "";
    }

    public function invoke() {
        if (isset($_POST['btnShow'])) {
           
            $this->model->cSDate = date("Y-m-d", strtotime($_POST['txtFromDate']));
            
            $this->model->cTDate = date("Y-m-d", strtotime($_POST['txtToDate']));
            
            $this->model->ReadRecord1();
            
         
    }
    require "View/vewReport3.php";

}
}
?>