<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Bill</title>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            display: none;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <form method="post" action='index.php?mdl=4'>
        <div class="w3-container w3-margin">
            <span class="w3-text-red error" id="txterror">
                <?php echo $this->model->Err; ?>
            </span>
            <span class="w3-text-green">
                <?php echo $this->model->msg; ?>
            </span>
            <div class="w3-row">
                <div class="w3-col l3">
                    <span> Bill NO:</span>
                    <input type="number" placeholder="Enter bill Number" name="txtBillno"
                        value="<?php echo $this->model->nBillNo; ?>" style="width:150px">
                </div>
                <div class="w3-col l6">&nbsp;</div>
                <div class="w3-col l3 w3-right-align">Date: <input type="date" name="txtDate"
                        value="<?php echo $this->model->cDate; ?>"></div>

            </div>
            <br>
            <div class="w3-row">
                <div class="w3-col l3">
                    <span>Customer Code:</span>
                    <input type="number" placeholder="Enter Code" style="width:100px" name="txtCustomerCode"
                        id="txtCustomerCode" value="<?php echo $this->model->nCode; ?>">
                </div>
                <div class="w3-col l4">
                    <span>Customer Name:</span>
                    <input type="text" placeholder="Enter Customer Name" id="txtcustName" name="txtcustName"
                        value="<?php echo $this->model->sName; ?>" readonly>
                </div>
            </div><br>
            <div class="w3-row">
                <table class="w3-table-centered" id="itemTable" style="overflow: auto;width: 100%;">
                    <div class="w3-col l12">
                        <thead>
                            <tr>
                                <th>Sl No:</th>
                                <th>Item Code:</th>
                                <th>Item Name:</th>
                                <th>Quantity:</th>
                                <th>Rate:</th>
                                <th>Amount:</th>
                                <th>&nbsp;</th>
                            <tr>
                        </thead>
                        <?php
                        $nMax = count($this->model->nItemCode);
                        $nCount = 0;
                        for ($nCount = 0; $nCount < $nMax; $nCount++) {
                            ?>
                            <tr id="row<?php echo $nCount + 1; ?>">
                                <td class="w3-center" style="width: 50px; overflow: auto;" class="w3-center">
                                    <?php echo $nCount + 1; ?>
                                </td>
                                <td class="w3-center"><input class="w3-border-0 no-outline w3-center form-control"
                                        style="width:150px" type="text" name="txtCode<?php echo $nCount + 1; ?>"
                                        id="txtCode<?php echo $nCount + 1; ?>"
                                        value="<?php echo $this->model->nItemCode[$nCount]; ?>"></td>
                                <td class="w3-center"><span class="w3-border-0 no-outline w3-center form-control"
                                        style="width:70px" type="text" name="txtName<?php echo $nCount + 1; ?>"
                                        id="txtName<?php echo $nCount + 1; ?>"
                                        onchange="getItem(<?php echo $nCount + 1; ?>)" value="" readonly>
                                        <?php echo $this->model->cItName[$nCount]; ?>
                                    </span></td>
                                <td class="w3-center"><input class="w3-border-0 no-outline w3-center form-control"
                                        style="width:80px" type="text" name="txtQuantity<?php echo $nCount + 1; ?>"
                                        id="txtQuantity<?php echo $nCount + 1; ?>"
                                        value="<?php echo $this->model->nQuantity[$nCount]; ?>" onkeyup="calculateTotal()">
                                </td>
                                <td class="w3-center"><input class="w3-border-0 no-outline w3-center form-control"
                                        style="width:80px" type="text" name="txtRate<?php echo $nCount + 1; ?>"
                                        id="txtRate<?php echo $nCount + 1; ?>"
                                        value="<?php echo $this->model->nRate[$nCount]; ?>" readonly></td>
                                <td class="w3-center"><input class="w3-border-0 no-outline w3-center form-control"
                                        style="width:80px" type="text" name="txtAmount<?php echo $nCount + 1; ?>"
                                        id="txtAmount<?php echo $nCount + 1; ?>" readonly
                                        value="<?php echo $this->model->nAmount[$nCount]; ?>"></td>
                                <td class="w3-center w3-hide"><input class="w3-border-0 no-outline w3-center form-control"
                                        style="width:80px" type="hidden" name="txtSLNo<?php echo $nCount + 1; ?>"
                                        id="txtSLNo<?php echo $nCount + 1; ?>"
                                        value="<?php echo $this->model->nSLNo[$nCount]; ?>" readonly></td>
                                <td class="w3-center" style="width: 20px; overflow: auto;"><input
                                        class="w3-btn w3-small w3-border-0 w3-red" type="button"
                                        id="cRemove<?php echo $nCount + 1; ?>"
                                        onclick="TblRow(<?php echo $nCount + 1; ?>, 'D'); calculateTotal()" value="-"></td>
                                
                            </tr>
                            <?php
                        }
                        $nCount++;
                        ?>
                        <tr id="row<?php echo $nCount; ?>">
                            <td class="w3-center" style="width:50px; overflow: auto;" class="w3-center">
                                <?php echo $nCount; ?>
                            </td>
                            <td class="w3-center" style="width:70px; overflow: auto;"><input
                                    class="w3-border-0 no-outline w3-center form-control" style="width:70px;"
                                    type="text" name="txtCode<?php echo $nCount; ?>" id="txtCode<?php echo $nCount; ?>"
                                    onchange="getItem(<?php echo $nCount; ?>, this.value)"
                                    onclick="TblRow(<?php echo $nCount; ?>, 'A');" value=""></td>
                            <td class="w3-center" style="width:150px; overflow: auto;"><input
                                    class="w3-border-0 no-outline w3-center form-control" style="width:150px;"
                                    type="text" name="txtName<?php echo $nCount; ?>" id="txtName<?php echo $nCount; ?>"
                                    value="" readonly></td>
                            <td class="w3-center" style="width:80px; overflow: auto;"><input
                                    class="w3-border-0 no-outline w3-center form-control" style="width:80px;"
                                    type="text" name="txtQuantity<?php echo $nCount; ?>"
                                    id="txtQuantity<?php echo $nCount; ?>" value="0" onkeyup="calculateTotal()"></td>
                            <td class="w3-center" style="width:80px; overflow: auto;"><input
                                    class="w3-border-0 no-outline w3-center form-control" style="width:80px;"
                                    type="text" name="txtRate<?php echo $nCount; ?>" id="txtRate<?php echo $nCount; ?>"
                                    value="0" readonly></td>
                            <td class="w3-center" style="width:80px; overflow: auto;"><input
                                    class="w3-border-0 no-outline w3-center form-control" style="width:80px;"
                                    type="text" name="txtAmount<?php echo $nCount; ?>"
                                    id="txtAmount<?php echo $nCount; ?>" readonly value=""></td>
                            <td class="w3-center w3-hide"><input class="w3-border-0 no-outline w3-center form-control"
                                        style="width:80px" type="hidden" name="txtSLNo<?php echo $nCount  ?>"
                                        id="txtSLNo<?php echo $nCount ?>"
                                         readonly value="0"></td>
                            <td class="w3-center" style="width: 20px; overflow: auto;"><input
                                    class="w3-btn w3-small w3-border-0 w3-red" type="button"
                                    id="cRemove<?php echo $nCount; ?>"
                                    onclick="TblRow(<?php echo $nCount; ?>, 'D'); calculateTotal()" value="-"></td>
                            
                        </tr>
                        </tbody>
                    </div>
                </table>

            </div>
            <div class="w3-row w3-section w3-responsive">
                <div class="w3-col l8">&nbsp;</div>
                <div class="w3-col l1 m7">Gross: </div>
                <div><input class="w3-col w3-border-0 w3-border-bottom no-outline w3-margin-left w3-center l2"
                        name="txtGross" id="nGross" value="<?php echo $this->model->nGross; ?>" style="width:100px"
                        readonly></div>

            </div>
            <div class="w3-row w3-section w3-responsive">
                <div class="w3-col l8 ">&nbsp;</div>
                <div class="w3-col l1 m7 ">Discount: </div>
                <div>%<input
                        class="w3-col w3-border-0 w3-border-bottom no-outline w3-center w3-margin-right w3-margin-left l1"
                        name="txtDiscount" id="nDiscount" style="width:100px"
                        value="<?php echo $this->model->nDiscount; ?>" onkeyup="calculateTotal()">
                    <input class=" w3-border-0 w3-border-bottom no-outline w3-center w3-margin-left "
                        name="txtDiscountPrice" id="nDiscountPrice" style="width: 100px"
                        value="<?php echo $this->model->nDiscountPrice; ?>" readonly>
                </div>
            </div>
            <div class="w3-row w3-section w3-responsive">
                <div class="w3-col l8">&nbsp;</div>
                <div class="w3-col l1">GST :</div>
                <div><input
                        class="w3-col w3-border-0 w3-border-bottom no-outline w3-center w3-margin-right w3-margin-left l1"
                        name="txtGst" id="nGst" style="width:100px" value="<?php echo $this->model->nGst; ?>"
                        onkeyup="calculateTotal()">%
                    <input class="  w3-border-0 w3-border-bottom no-outline  w3-center w3-margin-left "
                        name="txtGstPrice" id="txtGstPrice" style="width: 100px"
                        value="<?php echo $this->model->nGstPrice; ?>" readonly>
                </div>
            </div>
            <div class="w3-row w3-section w3-responsive">
                <div class="w3-col l8">&nbsp;</div>
                <div class="w3-col l1">Net Amount:</div>
                <div class="w3-col l2 m5">
                    <input class="w3-col w3-border-0 w3-border-bottom no-outline w3-center w3-margin-left l1"
                        name="txtNet" id="nNet" style="width:100px" value="<?php echo $this->model->nNet; ?>" readonly>
                    <input class="w3-border-0 w3-border-bottom no-outline w3-margin-left" name="txtLastRow"
                        id="txtLastRow" value="<?php echo $nCount; ?>" readonly style="display: none">
                    <input type="text" name="click" id="click" value="<?php echo $this->model->click; ?>">
                </div>
            </div>
        </div>
        <hr>
        <div class="w3-row">
            <div class="w3-col l2 w3-center">
                <button class="w3-btn w3-border w3-border-green w3-hover-green" name="btnsave"
                    style="width:200px">Save</button>
            </div>
            <div class="w3-col l1">&nbsp;</div>
            <div class="w3-col l2 w3-center">
                <button class="w3-btn w3-border w3-border-black w3-hover-yellow" name="btnSearch"
                    style="width:200px">Search</button>
            </div>
            <div class="w3-col l1">&nbsp;</div>
            <div class="w3-col l2 w3-center">
                <button class="w3-btn w3-border w3-border-red w3-hover-red" name="btnDelete"
                    style="width:200px">Delete</button>
            </div>
            <div class="w3-col l2 w3-center">
                <button class="w3-btn w3-border w3-border-black w3-hover-black" name="btnClear"
                    style="width:160px">Clear</button>
            </div>
            <div class="w3-col l2 w3-center">
                <a class="w3-btn w3-border w3-border-green w3-hover-green" name="close" href='index.php?mdl=1'
                    style="width:160px">Close</a>
            </div>
        </div>
        </div>


        <script>
            $('#txtCustomerCode').keyup(function () {
                var customerCode = $(this).val();
                if (customerCode !== "") {
                    $.getJSON("ajax.php?code=" + customerCode, function (data) {
                        if (data.error === 0) {
                            console.log($('#txtcustName').val(data.txtName));
                            $('#txterror').html('');
                        } else {
                            $('#txtcustName').val('');
                            $('#txterror').html('Customer not Found');
                        }
                    });
                } else {
                    $('#txtcustName').val('');
                    $('#txterror').html('');
                }
            });

            function getItem(row, code) {
                //alert('getItem called with row = ' + row + ' and code = ' + code);
                //debugger;
                if (code != "") {
                    $.getJSON("ajaxItem.php?code=" + code, function (data) {
                        $.each(data, function (index, item) {
                            if (data.error != 1) {
                                document.getElementById("txtName" + row).value = item.txtDescription;
                                
                                document.getElementById("txtRate" + row).value = item.txtPrice;
                                

                                document.getElementById("txterror").innerHTML = "";
                            } else {
                                document.getElementById("txtCode" + row).value = "";
                                document.getElementById("txtName" + row).value = "";
                                document.getElementById("txtRate" + row).value = "";
                                document.getElementById("txterror").innerHTML = "item not found";
                            }
                        });
                    })//.fail(function(jqXHR, textStatus, errorThrown) {
                }
                else {
                    $('#txtCode' + row).html("");
                    $('#txtRate' + row).html("");
                }
                TblRow(row, 'A');
            } 
            

        </script>
        <script>
            function TblRow(nCurRow, sAlert) {
                var nCounter = 0;
                var html = "";
                var table = document.getElementById("itemTable");
                var row = Number(document.getElementById("txtLastRow").value);
                var count = row + 1;

                if (row == nCurRow) {
                    html = '<tr id="row' + count + '">';
                    html += '<td class="w3-center" style="width:50px">' + count + '</td>';
                    html += '<td class="w3-center" style="width:70px"><input class="w3-border-0 no-outline w3-center form-control" style="width: 70px" type="text" name="txtCode' + count + '" id="txtCode' + count + '" onchange="getItem(' + count + ',this.value)" value="""></td>';
                    html += '<td class="w3-center" style="width:150px"><input class="w3-border-0 no-outline w3-center form-control" style="width: 150px" type="text" name="txtName' + count + '" id="txtName' + count + '" value="" readonly></td>';
                    html += '<td class="w3-center" style="width:80px"><input class="w3-border-0 no-outline w3-center form-control" style="width: 80px" type="text" name="txtQuantity' + count + '" id="txtQuantity' + count + '" onkeyup="calculateTotal()" value="0"></td>';
                    html += '<td class="w3-center" style="width:80px"><input class="w3-border-0 no-outline w3-center form-control" style="width: 80px" type="text" name="txtRate' + count + '" id="txtRate' + count + '" value="0" readonly></td>';
                    html += '<td class="w3-center" style="width:80px"><input class="w3-border-0 no-outline w3-center form-control" style="width: 80px" type="text" name="txtAmount' + count + '" id="txtAmount' + count + '" readonly value="0"></td></td>';
                     html += '<td class="w3-center w3-hide" style="width:80px"><input class="w3-border-0 no-outline w3-center form-control" style="width: 80px" type="hidden" name="txtSLNo' + count + '" id="txtSLNo' + count + '" readonly value="0"></td></td>';
                    html += '<td class="w3-center" style="width: 20px;"><input class="w3-btn w3-small w3-border-0 w3-red fa fa-minus" type="button" id="cRemove' + count + '" onclick="TblRow(' + count + ',\'D\'); calculateTotal()" value="-"></td>';
                    html += '</tr>';
                    $(table).find('tbody').append(html);
                    document.getElementById("txtLastRow").value = count;
                }
                if (sAlert == "D") {

                    var trId = "row" + nCurRow;
                    var row = document.getElementById(trId);
                    row.parentNode.removeChild(row);
                    nCounter = 0;

                    $('#itemTable tbody tr').each(function (row, tr) {
                        if ($(tr).find('td:eq(1)').find('input').val() == "") {
                            nCounter = 0;
                        }
                    });
                    if (nCounter > 0) {
                        nCurRow = row;
                    }
                }
                nCounter = 1;
                $('#itemTable tbody tr').each(function (row, tr) {
                    $(tr).find('td:eq(0)').html(nCounter);
                    nCounter++;
                });
            }

            function calculateTotal() {
                var nQuantity = 0;
                var nRate = 0;
                var nAmount = "";
                var nGross = 0;
                var nDiscount = 0;
                var nDiscountPrice = 0;
                var nGst = 0;
                var nGstPrice = 0;
                var nNet = 0;
                $('#itemTable tbody tr').each(function (row, tr) {
                    nQuantity = Number($(tr).find('td:eq(3)').find('input').val());
                    nRate = Number($(tr).find("td:eq(4) input[type='text']").val());
                    nAmount = nQuantity * nRate;
                    $(tr).find("td:eq(5) input[type='text']").val(nAmount);
                    nGross += nAmount;
                });
                document.getElementById("nGross").value = nGross;
                $('#nDiscount').each(function () {
                    nDiscount = Number($(this).val());
                    nDiscountPrice = (nGross * nDiscount) / 100;
                    document.getElementById("nDiscountPrice").value = nDiscountPrice.toFixed(2);
                });
                $('#nNet').each(function () {
                    nGst = Number($('#nGst').val());
                    nGstPrice = ((nGross - nDiscountPrice)) * (nGst / 100);
                    document.getElementById("txtGstPrice").value = nGstPrice.toFixed(2);
                    nNet = nGross - nDiscountPrice + nGstPrice;
                    document.getElementById("nNet").value = nNet.toFixed(2);
                });
            }

        </script>
    </form>
</body>

</html>