<?php
class mdlBill
{
    private $db;

    public $sCustomerId;
    public $nBillNo;
    public $cDate;
    public $nCode;
    public $sName;
    public $nDiscount;
    public $nGross;
    public $nDiscountPrice;
    public $nGst;
    public $nGstPrice;
    public $nNet;
    public $nItemCode = [];
   public $cItName=[];
    public $nQuantity = [];
    public $nRate = [];
    public $nAmount = [];
    public $nMax;
    public $result;
    public $nflag =1;
    public $data = array();
    public $row;
    public $click;
    public $Err;
    public $msg;
    public $SLNo =[];





    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=finance;', "root", "");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }






    public function save()
    {
        if($this->click != 'Y'){
            $this->db->beginTransaction();
            $sql = "INSERT INTO bill1(	Bl_Bill_No,Bl_BillDate,Bl_CustomerId ,Bl_Gross,Bl_DiscountPercentage,Bl_GstPercentage,Bl_Net,Bl_DiscountPrice,Bl_GSTPrice	) Values (:billno,:billdate,:customerid,:gross,:discount,:gst,:net,:discountper,:gstper)";
            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(':billno', $this->nBillNo);
            $stmt->bindValue(':billdate', $this->cDate);
            $stmt->bindValue(':customerid', $this->nCode);
            
            $stmt->bindValue(':gross', $this->nGross);
            $stmt->bindValue(':discount', $this->nDiscount);
            $stmt->bindValue(':gst', $this->nGst);
            $stmt->bindValue(':net', $this->nNet);
            $stmt->bindValue(':discountper', $this->nDiscountPrice);
            $stmt->bindValue(':gstper', $this->nGstPrice);
            $stmt->execute();
            if ($stmt->errorCode() != '00000') {
                print_r($stmt->errorInfo());
                exit();
            }
      for ($i = 0; $i < count($this->nItemCode); $i++) {
    $sql ="INSERT INTO bill2 (Bl2_Bl1_Bill_No,Bl2_Bl1_BillDate,Bl_ItemNo,Bl_Quantity,Bl_Rate,Bl_amount,Bl_SLNo)
            VALUES (:billno, :billdate,:itemno,  :quantity, :rate, :amount,:sno)";
    $stmt = $this->db->prepare($sql);

    $stmt->bindValue(':billno', $this->nBillNo);
    $stmt->bindValue(':billdate', $this->cDate);
    $stmt->bindValue(':itemno', $this->nItemCode[$i]);
    $stmt->bindValue(':sno', $this->nflag++);
    $stmt->bindValue(':quantity', $this->nQuantity[$i]);
    $stmt->bindValue(':rate', $this->nRate[$i]);
    $stmt->bindValue(':amount', $this->nAmount[$i]);
 
    $stmt->execute();
                if ($stmt->errorCode() != '00000') {
                    print_r($stmt->errorInfo());
                    exit();
                }

            }
            $this->db->commit();
        } else{
    $this->db->beginTransaction();
    $sql = "UPDATE bill1 SET Bl_BillDate = :billdate, Bl_CustomerId = :customerid, Bl_Gross = :gross, Bl_DiscountPercentage = :discount, Bl_GstPercentage = :gst, Bl_Net = :net, Bl_DiscountPrice = :discountper, Bl_GSTPrice = :gstper WHERE Bl_Bill_No = :billno";
    $stmt = $this->db->prepare($sql);

    $stmt->bindValue(':billno', $this->nBillNo);
    $stmt->bindValue(':billdate', $this->cDate);
    $stmt->bindValue(':customerid', $this->nCode);
    
    $stmt->bindValue(':gross', $this->nGross);
    $stmt->bindValue(':discount', $this->nDiscount);
    $stmt->bindValue(':gst', $this->nGst);
    $stmt->bindValue(':net', $this->nNet);
    $stmt->bindValue(':discountper', $this->nDiscountPrice);
    $stmt->bindValue(':gstper', $this->nGstPrice);
    $stmt->execute();

    if ($stmt->errorCode() != '00000') {
        print_r($stmt->errorInfo());
        exit();
    }

    
    $query = "DELETE FROM bill2 WHERE Bl2_Bl1_Bill_No = :billno";
    $stmt = $this->db->prepare($query);
    $stmt->bindValue(':billno', $this->nBillNo);
    $stmt->execute();
    if ($stmt->errorCode() != '00000') {
        print_r($stmt->errorInfo());
        exit();
    }

    
    for ($i = 0; $i < count($this->nItemCode); $i++) {
        $sql ="INSERT INTO bill2 (Bl2_Bl1_Bill_No, Bl2_Bl1_BillDate, Bl_ItemNo, Bl_Quantity, Bl_Rate, Bl_amount,Bl_SLNo)
                VALUES (:billno, :billdate, :itemno,  :quantity, :rate, :amount,:sno)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':billno', $this->nBillNo);
        $stmt->bindValue(':billdate', $this->cDate);
        $stmt->bindValue(':itemno', $this->nItemCode[$i]);
        
        $stmt->bindValue(':quantity', $this->nQuantity[$i]);
        $stmt->bindValue(':rate', $this->nRate[$i]);
        $stmt->bindValue(':amount', $this->nAmount[$i]);
        $stmt->bindValue(':sno', $this->nSLNo[$i]);
        $stmt->execute();
        if ($stmt->errorCode() != '00000') {
            print_r($stmt->errorInfo());
            exit();
        }

    }
    $this->db->commit();
} 
}
    

    public function search()
    {
        
        $query = "SELECT Bl_Bill_No, Bl_BillDate, Bl_customerId,Bl_Gross,Bl_DiscountPercentage,Bl_GstPercentage,Bl_Net,Bl_DiscountPrice	,Bl_GSTPrice ,Bl_ItemNo,Bl_Quantity,Bl_Rate,Bl_amount,It_description,cu_fname,Bl_SLNo
        FROM bill1 ,bill2,item,customer
        WHERE Bl_Bill_No = Bl2_Bl1_Bill_No AND Bl_ItemNo = It_codeno AND Bl_customerId = cu_customerid AND  Bl_Bill_No = :billno ";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':billno', $this->nBillNo);
       

        $stmt->execute();
        $nCount = 0;
        foreach ($stmt->fetchAll() as $row) {


            $this->nBillNo = $row['Bl_Bill_No'];
            $this->cDate = $row['Bl_BillDate'];
            $this->nCode = $row['Bl_customerId'];
           $this->sName = $row['cu_fname'];
            $this->nGross = $row['Bl_Gross'];

            $this->nDiscount = $row['Bl_DiscountPercentage'];
            $this->nGst = $row['Bl_GstPercentage'];
            $this->nNet = $row['Bl_Net'];
            $this->nDiscountPrice = $row['Bl_DiscountPrice'];
            $this->nGstPrice = $row['Bl_GSTPrice'];
            $this->nItemCode[$nCount] = $row['Bl_ItemNo'];
            $this->cItName[$nCount] = $row['It_description'];
            $this->nQuantity[$nCount] = $row['Bl_Quantity'];
            $this->nRate[$nCount] = $row['Bl_Rate'];
            $this->nAmount[$nCount] = $row['Bl_amount'];
            $this->nSLNo[$nCount] = $row['Bl_SLNo'];
            $nCount++;

        }
    }

    public function delete()
    {
        





try {
   
    $sql = $this->db->prepare('DELETE FROM bill2 WHERE Bl2_Bl1_Bill_No = :bill_no');
    $sql->bindParam(':bill_no', $this->nBillNo);
    $sql->execute();
    
   
    $stmt = $this->db->prepare('DELETE FROM bill1 WHERE Bl_Bill_No= :bill_no');
    $stmt->bindParam(':bill_no', $this->nBillNo);
    $stmt->execute();

    
    
    
} catch (PDOException $e) {
    // If an error occurred, roll back the transaction
    $this->db->rollBack();
    echo "Error deleting record: " . $e->getMessage();
}
    }
    
    public function clear(){
        $this->click="";
        $this->sCustomerId="";
        $this->nBillNo="";
        $this->cDate="";
        $this->nCode="";
        $this->sName = "";
        $this->nDiscount="";
        $this->nGross="";
        $this->nDiscountPrice="";
        $this->nGst="";
        $this->nGstPrice="";
        $this->nNet="";
        $this->nItemCode = [];
        
        $this->nQuantity = [];
        $this->nRate = [];
        $this->nAmount = [];
        
    }
}
?>
    
        





    



    