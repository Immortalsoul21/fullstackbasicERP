
<!DOCTYPE html>


<html>

<meta Name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-card-4 w3-margin-top w3-margin-right w3-margin" style="margin: 400px 100px 100px 100px;">
  <div class="w3-container w3-teal">
    <h2 class="w3-center">CUSTOMER</h2>
  </div>
  <form class="w3-container" action="index.php?mdl=2" method = "post">
    <p>      
    <label class="w3-text-teal"><b>Customer Id</b></label>
    <input class="w3-input w3-border w3-sand" Name="txtCustomerId" type="text" maxlength="5"value="<?php echo  $this->model->sCustomerId; ?>"/>
    <span class="error"><?php echo $this->model->sCustomerIdErr; ?></span></p>

    <p>      
    <label class="w3-text-teal"><b>Name</b></label>
    <input class="w3-input w3-border w3-sand" Name="txtName" type="text" maxlength="30" value="<?php echo  $this->model->sName?>"/>
    <span class="error"><?php echo $this->model->sNameErr; ?></span>
</p>
    <label class="w3-text-teal"><b>Address</b></label>
    <input class="w3-input w3-border w3-sand" Name="txtAddr" type="text"  maxlength="30"value="<?php echo  $this->model->sAddr ?>"/>
    <span class="error"><?php echo $this->model->sAddrErr; ?></span>
</p>
    <label class="w3-text-teal"><b>Date of Joining</b></label>
    <input class="w3-input w3-border w3-sand" Name="txtDoj" type="date"  value="<?php echo  $this->model->sDoj?>" />
    <span class="error"><?php echo $this->model->sDojErr; ?></span>
</p>
    <label class="w3-text-teal"><b>Deposite Amount</b></label>
    <input class="w3-input w3-border w3-sand" name="txtDeposite" type="text" maxlength="30" value="<?php echo  $this->model->sDeposite ?>" />
    <span class="error"><?php echo $this->model->sDepositErr; ?></span>
</p>
    <div class="w3-center">
<div class="w3-bar w3-margin-bottom">
   
  <input name = "textAddEdit" type="textbox" value="<?php echo $this->model->nAddEdit;?>"/>
  <button Name="btnClear"  type="Submit" class=" w3-button w3-black w3-margin-left w3-margin-right" >Clear</button>
  <button Name="btnSave" type="Submit"  class="w3-button w3-teal w3-margin-left w3-margin-right" >SAVE</button>
  <button Name="btnDelete" class="w3-button w3-aqua w3-margin-left w3-margin-right">DELETE</button>
  <button  Name="btnSearch"  class="w3-button w3-blue w3-margin-left w3-margin-right" >SEARCH</button>
  <a href="index.php?mdl=1" class=" w3-button w3-green">CLOSE</a>
</div>
</div>
  </form>
</div>

</body>
</html>