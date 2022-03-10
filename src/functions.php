<?php
session_start();
if(!isset($_SESSION['picnic'])){
    $_SESSION['picnic'] = array();
}
?>
<?php 

$name = $_POST['name'];
$gen = $_POST['gen'];
$phone = $_POST['phone'];
$jodate = $_POST['jodate'];
$redate = $_POST['redate'];
$vehicle = $_POST['vehicle'];
$foodcard = $_POST['foodcard'];
$action = $_POST['action'];

class picnic{
   public $name ;
   public  $gen ;
   public  $phone ;
   public $jodate ;
   public $redate;
   public $vehicle;
   public $foodcard;



   public function __construct($name,$gen,$phone,$jodate,$redate,$vehicle,$foodcard){
   $this->name = $name;
   
   $this->gen = $gen;
   $this->phone = $phone;
   $this -> jodate = $jodate;
   $this -> redate = $redate;
   $this ->vehicle =$vehicle;
   $this->foodcard = $foodcard;
   }

   public function picnicreg(){
       $data = array("name" => $this->name , "gen"=>$this->gen,"phone" => $this->phone ,"jodate" => $this->jodate , "redate" => $this->redate,"vehicle"=>$this->vehicle,"food"=> $this->foodcard );
         array_push($_SESSION['picnic'],$data);

   }
   }
   
    switch($action){
        case "sub":
            $obj = new picnic($name,$gen,$phone,$jodate,$redate,$vehicle,$foodcard);
            $obj->picnicreg();
            echo json_encode($_SESSION['picnic']);
    }   
   





?>