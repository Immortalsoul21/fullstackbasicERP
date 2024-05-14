<?php
class Controller{
    public function __construct(){}
    public function invoke(){
        $page = filter_input(INPUT_GET,"mdl", FILTER_SANITIZE_SPECIAL_CHARS);
        switch($page){
            case "1": include_once("Controller/ctrlMenu.php");
            $ctrlFilename = new ctrlMenuController();

            $ctrlFilename->invoke();
            break;
            case "2":include_once("Controller/ctrlCustomer.php");
            $ctrlFilename = new ctrlCustomerController();

            $ctrlFilename->invoke();
            break;
            case "3":include_once("Controller/ctrlItem.php");
            $ctrlFilename = new ctrlItemController();

            $ctrlFilename->invoke();
            break;
            case "4":include_once("Controller/ctrlBill.php");
            $ctrlFilename = new ctrlBillController();

            $ctrlFilename->invoke();
            break;
            case "5":include_once("Controller/ctrlReport2.php");
            $ctrlFilename = new ctrlReport2Controller();

            $ctrlFilename->invoke();
            break;
        
            case "6":include_once("Controller/ctrlReport3.php");
            $ctrlFilename = new ctrlReport3Controller();

            $ctrlFilename->invoke();
            break;


            default:include_once("Controller/ctrlMenu.php");
            $ctrlFilename = new ctrlMenuController();

            $ctrlFilename->invoke();
        }
        
    }
}
?>
