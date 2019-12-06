<?php
$fam= trim($_REQUEST['fam']); 
$nam =trim( $_REQUEST['nam']); 
$otch = trim($_REQUEST['otch']); 
$payment= trim($_REQUEST['payment']);
echo ($fam); 
echo ($nam); 
echo ($otch); 
echo($payment);

$sql = new Bron('localhost', 'id9146149_admin', 'admin',"id9146149_litehote1"); 
$sql->addbron($fam, $nam, $otch, $payment);
class Bron{ 
private $connection; 
public function __construct($host, $user, $password,$db_name) { 
$this->connection = new mysqli($host, $user, $password); 
mysqli_select_db($this->connection, $db_name); 

} 

public function addbron($famIn, $namIn, $otchIn, $paymentIn)
{
    $sqlcom = "UPDATE bron SET paid = '1' , payment='$paymentIn' WHERE bron.fam='$famIn' and bron.nam='$namIn' and bron.otch='$otchIn'";
    if (mysqli_query($this->connection, $sqlcom))
    echo "25New record created successfully"; 
    {
        return 1;
    }
}
} 
?>