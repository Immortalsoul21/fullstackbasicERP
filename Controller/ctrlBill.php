<?php

include_once("Model/mdlBill.php");

class ctrlBillController {

    public $model;

    public function __construct() {
        $this->model = new mdlBill();
    }

    public function invoke() {


        if (isset($_POST['btnsave'])) {
            
            $this->model->click = $_POST['click'];
            $this->model->nBillNo = $_POST['txtBillno'];
            $this->model->cDate = $_POST['txtDate'];
            $this->model->nCode = $_POST['txtCustomerCode'];
            $this->model->sName = $_POST['txtcustName'];
            $this->model->nGross = $_POST['txtGross'];
            $this->model->nDiscount = $_POST['txtDiscount'];
            $this->model->nDiscountPrice = $_POST['txtDiscountPrice'];
            $this->model->nGst = $_POST['txtGst'];
            $this->model->nGstPrice = $_POST['txtGstPrice'];
            $this->model->nNet = $_POST['txtNet'];

            $nCount = 0;
            $nTrue = 0;
            foreach ($_POST as $key => $value) {
                if (0 === strpos($key, 'txtCode') || 0 === strpos($key, 'txtName') || 0 === strpos($key, 'txtQuantity') || 0 === strpos($key, 'txtRate') || 0 === strpos($key, 'txtAmount') ||  0 === strpos($key, 'txtSLNo')) {
                    if (0 === strpos($key, 'txtCode') && !empty($value)) {
                        $this->model->nItemCode[$nCount] = $value;
                        $this->model->cItName[$nCount] = '';
                        $this->model->nQuantity[$nCount] = 0;
                        $this->model->nRate[$nCount] = 0;
                        $this->model->nAmount[$nCount] = 0;
                        $this->model->nSLNo[$nCount] = 0;
                        $nTrue = 1;
                    } elseif (0 === strpos($key, 'txtName') && $nTrue === 1) {
                        $this->model->cItName[$nCount] = $value;
                    } elseif (0 === strpos($key, 'txtQuantity') && $nTrue == 1) {
                        $this->model->nQuantity[$nCount] = $value;
                    } elseif (0 === strpos($key, 'txtRate') && $nTrue == 1) {
                        $this->model->nRate[$nCount] = $value;
                    } elseif (0 === strpos($key, 'txtAmount') && $nTrue == 1) {
                        $this->model->nAmount[$nCount] = $value;
                     } elseif (0 === strpos($key, 'txtSLNo') && $nTrue == 1) {
                        $this->model->nSLNo[$nCount] = $value;
                        
                        $nCount++;
                        $nTrue = 0;
                    }
                }
            }
            if (empty($this->model->nBillNo)) {
                $this->model->Err = '*Bill No. is Required';
            
            
            }else{


                $this->model->save();
                 $this->model->clear();
                 $this->model->msg = "saved successfully";
            }
        }

        if (isset($_POST['btnSearch'])) {
            $this->model->nBillNo = $_POST['txtBillno'];
            $this->model->click = 'Y';
                
            $this->model->search();
            
        }
        if (isset($_POST['btnDelete'])) {
             $this->model->nBillNo = $_POST['txtBillno'];
            $this->model->click = $_POST["click"];
            if ($this->model->click == 'Y') {
                
                $this->model->delete();
                 $this->model->clear();
               $this->model->msg = 'delete successful';
            } else {
                $this->model->Err = 'Search the Bill to Delete';
            }
        }
        
        if(isset($_POST['btnClear'])){
            $this->model->clear();
        }
            
        
        require("View/vewBill.php");
    }
}

