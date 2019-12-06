<?php
$sql = new connectbd('localhost', 'id9146149_admin', 'admin',"id9146149_litehote1");

class connectbd {
private $connection; 
public function __construct($host, $user, $password,$db_name) { 
$this->connection = new mysqli($host, $user, $password); 
mysqli_select_db($this->connection, $db_name); 
}
}
?>