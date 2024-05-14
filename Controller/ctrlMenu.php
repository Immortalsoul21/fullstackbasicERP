<?php

include_once 'Model/mdlMenu.php';

class ctrlMenuController {

    public $model;
    public $cError;

    public function __construct() {
        $this->model = new clsMenu();
        $this->cError = "";
    }

    public function invoke() {
        $page = filter_input(INPUT_GET, 'mdl', FILTER_SANITIZE_SPECIAL_CHARS);
//    echo "Page is ".$page."        ";

        if (isset($_POST['btnSubmit'])) {
            $this->model->cName = $_POST['txtName'];
            $this->model->cEmail = $_POST['txtEmail'];
            $this->model->save();
            require "View/vewMenu.php";
        } else {
            require "View/vewMenu.php";
        }
    }

}

?>