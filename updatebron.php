<?php
$fam= trim($_REQUEST['fam']);

$sql = new Bronir('localhost', 'id9146149_admin', 'admin',"id9146149_litehote1"); 
$sql->updatebron($fam);
class Bronir{ 
private $connection; 
public function __construct($host, $user, $password,$db_name) { 
$this->connection = new mysqli($host, $user, $password); 
mysqli_select_db($this->connection, $db_name); 

} 

public function updatebron($fam)
{
    $sqlcom = "UPDATE clients SET accepted = '1'  WHERE clients.fam='$fam'";
    if (mysqli_query($this->connection, $sqlcom))
    echo '<script>location.replace("https://litehote1.000webhostapp.com/adminconnection.php?");</script>'; exit;

}
} 
?>