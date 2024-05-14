<?php

class clsReport2 {

  
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
    public $Err;
    public $msg;
    
  
     public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=finance;', "root", "");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
  public function ReadRecord() {
    $sql="SELECT Bl_Bill_No,Bl_BillDate ,SUM(Bl_Gross)as TotalGross,SUM(Bl_DiscountPercentage),SUM(Bl_GstPercentage),SUM(Bl_Net),SUM(Bl_DiscountPrice),SUM(Bl_GSTPrice ),Bl_ItemNo,cu_fname,SUM(Bl_Rate),
	It_description,Bl_Quantity
        FROM bill1 ,bill2,item,customer
        WHERE Bl_Bill_No = Bl2_Bl1_Bill_No AND Bl_ItemNo = It_codeno AND Bl_customerId = cu_customerid AND  Bl_BillDate BETWEEN :start_date AND :end_date  GROUP BY cu_fname ORDER BY cu_fname ";   
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':start_date', $this->cSDate);  
    $stmt->bindParam(':end_date', $this->cTDate); 
    $stmt->execute();
   $nCount = 0;

    foreach ($stmt->fetchAll() as $row) {
        

        $this-> cDate[$nCount] = $row['Bl_BillDate'];
        $this->nBillno[$nCount]= $row['Bl_Bill_No'];
        $this-> nCustomerName[$nCount] = $row['cu_fname'];
        $this-> nItemno[$nCount]= $row['Bl_ItemNo'];
        $this->cItemname[$nCount]=$row['It_description'];
        
        $this-> nGross [$nCount]= $row['TotalGross'];
        $this-> nDisctper[$nCount] = $row['Bl_DiscountPrice'];
        $this-> nDisc[$nCount] = $row['Bl_DiscountPercentage'];
        $this-> nGsttper [$nCount]= $row['Bl_GSTPrice'];
        $this->nGst[$nCount] = $row['Bl_GstPercentage'];
        $this->nNet [$nCount]= $row['Bl_Rate'];
        
        $nCount++;
    }
}

}


