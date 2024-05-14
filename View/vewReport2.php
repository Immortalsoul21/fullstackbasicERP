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
        <form id="frmReport1" action="index.php?mdl=5" method="post">
            <div class="w3-panel w3-border-blue">
                <div class="w3-row w3-responsive w3-bar">
                    <span class="w3-text-red error" id="txterror">
                        <?php echo $this->model->Err; ?>
                    </span>
                    <span class="w3-text-green">
                        <?php echo $this->model->msg; ?>
                    </span>
                    <div class="w3-bar-item w3-margin-left w3-margin-right">
                        <div>From Date:</div>
                        <input type="date"  name="txtFromDate" value="<?php echo $this->model->cSDate; ?>"/>
                    </div>
                    <div class="w3-bar-item w3-margin-left w3-margin-right">
                        <div>To Date:</div>
                        <input type="date" name="txtToDate" value="<?php echo $this->model->cTDate; ?>"/>
                    </div>
                    <div class="w3-bar-item w3-margin-left w3-margin-right">
                        <div><p></p></div>
                        <div><p></p></div>
                        <div><p></p></div>
                        <button name="btnShow" type="submit" class="w3-btn w3-blue w3-hover-blue w3-left-top w3-right-bottom">show report</button>
                    </div>

                </div>
            </div><br>
            <div class="w3-container w3-border-red">
                <div class="w3-row w3-responsive">
                    <table id="itemTable" class="w3-table w3-striped w3-border "" style="overflow: auto;width: 100%;">
                        <div class=" w3-gray">
                            <thead class="w3-gray w3-container w3-gray w3-margin-left w3-margin-right">
                            <th >SNo.</th>
                            <th>Date</th>
                            <th>Bill No.</th>
                            <th>Customer Name</th>
                            <th>Item No.</th>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Gross</th>
                            <th>Discount Price</th>
                            <th>Discount %</th>
                            <th>Gst Price</th>
                            <th>Gst %</th>
                            <th>Net</th>
                            </thead>
                            <tbody>
                                <?php
                               // $previousBillNo = [];
                               // $total=0;
                               // $TotalDiscountPrice=0;
                               // $TotalGstPrice=0;
                               // $TotalNet=0;
                               // $previouscustomername = [];
                                
                                
                                $nMax = count($this->model->nBillno);
                                $nCount = 0;
                                for ($nCount = 0; $nCount < $nMax; $nCount++) {
                                //    if ( $previousBillNo == '') {
                               //         $previousBillNo = $this->model->nBillno[$nCount ];
                                //    }
                                    
                                  //   $lPrintAll = 'N';
                                 //   if ( $this->model->nBillno[$nCount] != $previousBillNo) {
                                  //            $lPrintAll = 'Y';
                                  //      $previousBillNo = $this->model->nBillno[$nCount ];
                                   // }
                                    ?>
                                    <tr id="row<?php echo $nCount + 1; ?>">
                                        <td class="w3-center" style="width: 50px; overflow: auto;" class="w3-center">
                                            <?php echo $nCount + 1; ?>
                                        </td>
                                        
                                        
                                        <td class="w3-center">
                                            <?php
                                           
                                                echo $this->model->nCustomerName[$nCount];
                                            
                                            ?>
                                        </td>
                                       
                                        
                                        <td class="w3-center"><?php
                                           // if ($lPrintAll != "Y"){
                                            //    echo " ";
                                           // } else {
                                                echo $this->model->nGross[$nCount];
                                             //   $total += $this->model->nGross[$nCount];
                                           // }
                                            ?></td>
                                        <td class="w3-center"><?php
                                          //  if ($lPrintAll != "Y") {
                                          //      echo " ";
                                         //   } else {
                                                echo $this->model->nDisctper[$nCount];
                                               // $TotalDiscountPrice +=$this->model->nDisctper[$nCount];
                                          //  }
                                            ?></td>
                                        <td class="w3-center"><?php
                                          
                                                echo $this->model->nDisc[$nCount];
                                            
                                            ?></td>
                                        <td class="w3-center"><?php
                                           
                                                echo $this->model->nGsttper [$nCount];
                                              //  $TotalGstPrice +=$this->model->nGsttper [$nCount];
                                            
                                            ?></td>
                                        <td class="w3-center"><?php
                                           
                                                echo $this->model->nGst[$nCount];
                                            
                                            ?></td>
                                        <td class="w3-center"><?php
                                          
                                                echo $this->model->nNet[$nCount];
                                              //  $TotalNet += $this->model->nNet[$nCount];
                                            
                                            ?></td>
                                    </tr>
                                    <?php
                                }
                                $nCount++;
                                ?>
                            </tbody>

                            <tr class="w3-container w3-gray">


                                <th class="w3-centerw3-bar-item ">Total</th>
                                <th colspan="5"></th>
                              <!--  <th class="w3-margin-left w3-center"><?php echo $total ?></th>
                                <th class="w3-margin-left w3-center"><?php echo $TotalDiscountPrice; ?></th>
                                <th colspan="1"></th>
                                <th class="w3-margin-left w3-center"><?php echo $TotalGstPrice; ?></th>
                                <th colspan="1"></th>
                                <th class="w3-margin-left w3-center"><?php echo $TotalNet; ?></th>-->

                            </tr>

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





