<?php
$fam= trim($_REQUEST['fam']); 
$nam =trim( $_REQUEST['nam']); 
$otch = trim($_REQUEST['otch']); 
$email = trim($_REQUEST['email']); 
$pnumber = trim($_REQUEST['pnumber']); 
$dop= trim($_REQUEST['dop']); 
$lvl =trim( $_REQUEST['lvl']); 
$room = trim($_REQUEST['room']); 
echo ($fam); 
echo ($nam); 
echo ($otch); 
echo ($email); 
echo ($pnumber); 
echo ($dop); 
echo ($lvl); 
echo ($room); 

$sql = new DB('localhost', 'id9146149_admin', 'admin',"id9146149_litehote1"); 
$sql->addclients($fam, $nam, $otch, $email, $pnumber); 
$sql->adddops($dop, $lvl, $room);
class DB{ 
private $connection; 
public function __construct($host, $user, $password,$db_name) { 
$this->connection = new mysqli($host, $user, $password); 
mysqli_select_db($this->connection, $db_name); 

} 

public function addclients($fam, $nam, $otch, $email, $pnumber) 
{ 
$sql = "INSERT INTO clients (fam, nam, otch, email, pnumber) VALUES ('$fam', '$nam', '$otch', '$email', '$pnumber')"; 
if (mysqli_query($this->connection, $sql)) 
echo "New record created successfully"; 
} 
public function adddops($dop, $lvl, $room)
{
    $sql = "INSERT INTO dops (dop, lvl, room) VALUES ('$dop', '$lvl', '$room')";
    if (mysqli_query($this->connection, $sql))
    echo "New record created successfully"; 
} 
}
?>