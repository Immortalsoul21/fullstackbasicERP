<?php 

session_start();
include_once("Controller/ctrlController.php");
$Controller = new Controller();
$Controller->invoke();
?>
