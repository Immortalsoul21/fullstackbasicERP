<?php

class clsReport3 {

  
    public $pdo;
    public $cSDate=[];
    public $cTDate=[];
    public $result=[];
    public $cDate =[];
    public $nBillno=[];
    public $nCustomerName =[];
    public $nItemno=[];
    public $nGross =[];
    public $nDisctper=[];
    public $nDisc =[];
    public $nGsttper=[];
    public $nGst=[];
    public $nNet=[] ;
    public $newSDate=[];
    public $newTDate=[];
    public $cItemname=[];
    public  $nQuantity=[];
     public $nTotalNet;
      public $nTotalDiscountPrice;
     public $nTotalGstPrice;
     public $nTotalGross;
     public $nAmount = [];
     
     public $previousBillNo=[];

     public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=finance;', "root", "");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
  public function ReadRecord1() {
    $sql="SELECT Bl_Bill_No, DATE(Bl_BillDate) as Bl_BillDate,Bl_Gross,Bl_DiscountPercentage,Bl_GstPercentage,Bl_Net,Bl_DiscountPrice,Bl_GSTPrice ,Bl_ItemNo,cu_fname,It_description,Bl_Quantity,Bl_Rate,Bl_amount
        FROM bill1 ,bill2,item,customer
        WHERE Bl_Bill_No = Bl2_Bl1_Bill_No AND Bl_ItemNo = It_codeno AND Bl_customerId = cu_customerid AND  Bl_BillDate BETWEEN :start_date AND :end_date ORDER BY cu_fname ,Bl_Bill_No, Bl_BillDate";   
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':start_date', $this->cSDate);  
    $stmt->bindParam(':end_date', $this->cTDate); 
    $stmt->execute();
   $nCount = 0;

    foreach ($stmt->fetchAll() as $row) {
        

        $this-> cDate[$nCount] =date("d-m-Y", strtotime( $row['Bl_BillDate']));
        $this->nBillno[$nCount]= $row['Bl_Bill_No'];
        $this-> nCustomerName[$nCount] = $row['cu_fname'];
        $this-> nItemno[$nCount]= $row['Bl_ItemNo'];
        $this->nAmount[$nCount]=$row['Bl_amount'];
        $this->cItemname[$nCount]=$row['It_description'];
        $this->nQuantity[$nCount]=$row['Bl_Quantity'];
        $this-> nGross [$nCount]= $row['Bl_Gross'];
        $this-> nDisctper[$nCount] = $row['Bl_DiscountPrice'];
        $this-> nDisc[$nCount] = $row['Bl_DiscountPercentage'];
        $this-> nGsttper [$nCount]= $row['Bl_GSTPrice'];
        $this->nGst[$nCount] = $row['Bl_GstPercentage'];
        $this->nNet [$nCount]= $row['Bl_Net'];
        
        $nCount++;
    }
}

}


