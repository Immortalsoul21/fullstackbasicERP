<!DOCTYPE html>
<html>

    <head>
        <title>SalesReport</title>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>

    <body >
        <form id="frmReport1" action="index.php?mdl=6" method="post" >
            <div class="w3-panel w3-border-blue">
                <div class="w3-panel w3-center"> CUSTOMER ITEM SALES</div><br>
                <div class="w3-row w3-responsive w3-bar">

                    <div class="w3-bar-item w3-margin-left w3-margin-right">
                        <div>From Date:</div>
                        <input type="date" id="cSDate"  name="txtFromDate" value="<?php echo $this->model->cSDate; ?>"/>
                    </div>
                    <div class="w3-bar-item w3-margin-left w3-margin-right">
                        <div>To Date:</div>
                        <input type="date" id="cTDate" name="txtToDate" value="<?php echo $this->model->cTDate; ?>"/>
                    </div>
                    <div class="w3-bar-item w3-margin-left w3-margin-right">
                        <div><p></p></div>
                        <div><p></p></div>
                        <div><p></p></div>
                        <button name="btnShow" type="submit" class="w3-btn w3-blue w3-hover-blue w3-left-top w3-right-bottom"  ">show report</button>
                    </div>

                </div>
            </div><br>
            <div class="w3-container " >
                <div class="w3-row w3-responsive"  >

                    <table id="itemTable" class="w3-table w3-striped w3-border" >
                        <div class=" w3-gray">
                            <thead class="w3-container w3-purple w3-margin-left w3-margin-right">
                            <th >SNo.</th>
                            <th>Date</th>
                            <th class="w3-center">Bill No.</th>
                            <th>Customer Name</th>
                            <th>Gross</th>
                            <th>Item Name</th>
                            <th >Quantity</th>
                            <th>Amount</th>
                            <th>Discount Price</th>
                            <th>Gst Price</th>
                            <th>Net</th>
                            </thead>

                            <tbody >
                            <div>
                                <?php
                                $previousBillNo = [];
                                $total = 0;
                                $gross = 0;
                                $TotalDiscountPrice = 0;
                                $TotalGstPrice = 0;
                                $TotalNet = 0;
                                $previouscustomername = [];
                                $totalAmount = 0;
                                $DiscountPrice = 0;
                                $GstPrice = 0;
                                $Net = 0;

                                $nMax = count($this->model->nBillno);
                                $nCount = 0;
                                for ($nCount = 0; $nCount < $nMax; $nCount++) {

                                    if ($previousBillNo == '') {
                                        $previousBillNo = $this->model->nBillno[$nCount];
                                    }
                                    $lPrintAll = 'N';
                                    if ($previouscustomername == '') {

                                        $previouscustomername = $this->model->nCustomerName[$nCount];
                                    }



                                    if ($this->model->nBillno[$nCount] != $previousBillNo) {
                                        $lPrintAll = 'Y';
                                        $previousBillNo = $this->model->nBillno[$nCount];
                                    }
                                    if ($this->model->nCustomerName[$nCount] != $previouscustomername) {

                                        $previouscustomername = $this->model->nCustomerName[$nCount];

                                        if ($nCount > 0) {
                                            ?>


                                            <tr class="w3-gray">
                                                <th colspan="2"></th>
                                                <th > <?php echo $this->model->nCustomerName[$nCount - 1]; ?> Total  </th>
                                                <th colspan="1"></th>
                                                <th class="w3-center" > <?php echo number_format($gross, 2, '.', ''); ?> </th>
                                                <th colspan="3"></th>
                                                <th class="w3-center"> <?php echo $DiscountPrice; ?>  </th>
                                                <th class="w3-center"> <?php echo $GstPrice ?> </th>
                                                <th class="w3-center"> <?php echo $Net ?>  </th>
                                            </tr>
                                            <?php
                                            $gross = 0;
                                            $DiscountPrice = 0;
                                            $GstPrice = 0;
                                            $Net = 0;
                                        }
                                    }
                                    ?>
                                    <tr id="row<?php echo $nCount + 1; ?>">
                                        <td class="w3-center" style="width: 50px; overflow: auto;" class="w3-center">
                                            <?php echo $nCount + 1; ?>
                                        </td>
                                        <td class="w3-center">
                                            <?php
                                            if ($lPrintAll != "Y") {
                                                echo " ";
                                            } else {
                                                echo date("d-m-Y", strtotime($this->model->cDate[$nCount]));
                                            }
                                            ?>
                                        </td>
                                        <td class="w3-center" name="nbillNo">
                                            <?php
                                            if ($lPrintAll != "Y") {
                                                echo " ";
                                            } else {
                                                echo $this->model->nBillno[$nCount];
                                            }
                                            ?>
                                        </td>
                                        <td class="w3-center">
                                            <?php
                                            if ($lPrintAll != "Y") {
                                                echo " ";
                                            } else {
                                                echo $this->model->nCustomerName[$nCount];
                                            }
                                            ?>
                                        </td>
                                        <td class="w3-center"><?php
                                            if ($lPrintAll != "Y") {
                                                echo " ";
                                            } else {
                                                echo $this->model->nGross[$nCount];
                                                $gross += $this->model->nGross[$nCount];
                                                $total += $this->model->nGross[$nCount];
                                            }
                                            ?></td>
                                        <td class="  w3-left"><?php echo $this->model->cItemname[$nCount]; ?></td>
                                        <td ><?php echo $this->model->nQuantity[$nCount]; ?></td>
                                        <td class="w3-center"><?php
                                            echo $this->model->nAmount[$nCount];
                                            $totalAmount += $this->model->nAmount[$nCount];
                                            ?></td>
                                        <td class="w3-center"><?php
                                            if ($lPrintAll != "Y") {
                                                echo " ";
                                            } else {
                                                echo $this->model->nDisctper[$nCount];
                                                $DiscountPrice += $this->model->nDisctper[$nCount];
                                                $TotalDiscountPrice += $this->model->nDisctper[$nCount];
                                            }
                                            ?></td>


                                        <td class="w3-center"><?php
                                            if ($lPrintAll != "Y") {
                                                echo " ";
                                            } else {
                                                echo $this->model->nGsttper [$nCount];
                                                $GstPrice += $this->model->nGsttper [$nCount];
                                                $TotalGstPrice += $this->model->nGsttper [$nCount];
                                            }
                                            ?></td>

                                        <td class="w3-center"><?php
                                            if ($lPrintAll != "Y") {
                                                echo " ";
                                            } else {
                                                echo $this->model->nNet[$nCount];
                                                $Net += $this->model->nNet[$nCount];
                                                $TotalNet += $this->model->nNet[$nCount];
                                            }
                                            ?></td>
                                    </tr>
                                    <?php if ($nCount == $nMax - 1) { ?>
                                        <tr class="w3-gray">
                                            <th colspan="2"></th>
                                            <th > <?php echo $this->model->nCustomerName[$nCount - 1]; ?> Total  </th>
                                            <th colspan="1"></th>
                                            <th class="w3-center" > <?php echo number_format($gross, 2, '.', '');?> </th>
                                            <th colspan="3"></th>
                                            <th class="w3-center"> <?php echo $DiscountPrice; ?>  </th>
                                            <th class="w3-center"> <?php echo $GstPrice ?> </th>
                                            <th class="w3-center"> <?php echo $Net ?>  </th>
                                        </tr>
                                        <?php
                                    }
                                }

                                $nCount++;
                                ?>
                                </tbody>

                                <tr class="w3-container w3-purple">


                                    <th class="w3-centerw3-bar-item ">Grand Total</th>
                                    <th colspan="2"></th>
                                    <th class=" w3-center"><?php echo number_format($total, 2, '.', '');  ?></th>
                                    <th colspan="3"></th>
                                    <th class="w3-margin-left w3-center"><?php echo $TotalDiscountPrice; ?></th>
                                    <th class="w3-margin-left w3-center"><?php echo $TotalGstPrice; ?></th>
                                    <th class="w3-margin-left w3-center"><?php echo $TotalNet; ?></th>
                                </tr>

                            </div>            


                        </div>
                        <div></div>
                    </table>

                </div>
            </div><br>
            <div class="w3-container">
                <div class="w3-row"> 
                    <div class="w3-col w3-third" style=" margin-left: 60%;"> 

                        <a name="btnClear" href="index.php?mdl=1" class="w3-btn w3-blue w3-right w3-hover-blue">Close</a> 
                    </div> 
                </div>
            </div>


        </form>


    </body>

</html>





