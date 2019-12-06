<?php
require_once('connect.php');

$sql = new Send($table, $where, $mysqli);

class Send{
    public static function bronirovanie() {
$room = trim($_REQUEST['room']);
$checkin = trim($_REQUEST['checkin']);
$departure = trim($_REQUEST['departure']);
$fam= trim($_REQUEST['fam']); 
$nam= trim($_REQUEST['nam']); 
$otch= trim($_REQUEST['otch']); 

$where = "((
    '$checkin' BETWEEN booking.checkin and booking.departure-1
    or
    '$departure'  BETWEEN booking.checkin-1 and booking.departure-1
) AND (booking.room = '$room'))";
function recordExists($table, $where, $mysqli) {
        $query = "SELECT * FROM `$table` WHERE $where";
        $result = $mysqli->query($query);

        if($result->num_rows > 0) {
                return true; 
        }
        return false;
}
if(!recordExists("booking", $where, $connection)){
$sql = "INSERT INTO booking (room, checkin, departure) VALUES ('$room', '$checkin', '$departure')";
$query = "INSERT INTO bron (fam, nam, otch) VALUES ('$fam','$nam', '$otch')"; 
if (mysqli_query($connection, $sql)) { 

} else { 
echo "<br>31Error: " . $sql . "<br>" . mysqli_error($connection); 
}
}
}
}