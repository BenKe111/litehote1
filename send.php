<?php

$fam= trim($_REQUEST['fam']); 
$nam =trim( $_REQUEST['nam']); 
$otch = trim($_REQUEST['otch']); 
$email = trim($_REQUEST['email']); 
$pnumber = trim($_REQUEST['pnumber']); 
$dop= trim($_REQUEST['dop']); 
$lvl =trim( $_REQUEST['lvl']); 
$room = trim($_REQUEST['room']); 
$checkin = trim($_REQUEST['checkin']);
$departure = trim($_REQUEST['departure']);

$sql = new CheckRoom('localhost', 'id9146149_admin', 'admin',"id9146149_litehote1");
$sql->adddate($fam, $nam, $otch, $room, $checkin, $departure);

class CheckRoom {
private $connection; 
public function __construct($host, $user, $password,$db_name) { 
$this->connection = new mysqli($host, $user, $password); 
mysqli_select_db($this->connection, $db_name); 
}
 
public function adddate($famIn, $namIn, $otchIn, $roomIn, $checkinIn, $departureIn)
{
    $where = "((
    '$checkinIn' BETWEEN booking.checkin and booking.departure-1
    or
    '$departureIn'  BETWEEN booking.checkin-1 and booking.departure-1
) AND (booking.room = '$roomIn'))";
function recordExists($table, $where, $mysqli) {
        $query = "SELECT * FROM `$table` WHERE $where";
        $result = $mysqli->query($query);

        if($result->num_rows > 0) {
                return true; 
        }
        return false;
}
if(!recordExists("booking", $where, $this->connection)){
$sql = "INSERT INTO booking (room, checkin, departure) VALUES ('$roomIn', '$checkinIn', '$departureIn')";
if (mysqli_query($this->connection, $sql)) 
echo "Номер успешно забронирован на заданные числа<br>"; 

else 
mysqli_close($connection);
}
}
}

$sql = new Send('localhost', 'id9146149_admin', 'admin',"id9146149_litehote1"); 

$sql->addclients($fam, $nam, $otch, $email, $pnumber); 
$sql->adddops($dop, $lvl, $room);
$sql->addbron($fam, $nam, $otch);

class Send {
private $connection; 
public function __construct($host, $user, $password,$db_name) { 
$this->connection = new mysqli($host, $user, $password); 
mysqli_select_db($this->connection, $db_name); 

} 

public function addclients($famIn, $namIn, $otchIn, $emailIn, $pnumberIn) 
{ 
$sqlcom = "INSERT INTO clients (fam, nam, otch, email, pnumber) VALUES ('$famIn', '$namIn', '$otchIn', '$emailIn', '$pnumberIn')"; 
if (mysqli_query($this->connection, $sqlcom)) 
    echo "Ваша заявка на бронирование добавлена!<br>"; 
} 
public function adddops($dopIn, $lvlIn, $roomIn)
{
    $sqlcom = "INSERT INTO dops (dop, lvl, room) VALUES ('$dopIn', '$lvlIn', '$roomIn')";
    if (mysqli_query($this->connection, $sqlcom))
    echo "Сведения о ваших доп.услугах учтены.<br>"; 
} 
public function addbron($famIn, $namIn, $otchIn)
{
    $sqlcom = "INSERT INTO bron (fam, nam, otch) VALUES ('$famIn', '$namIn', '$otchIn')";
    if (mysqli_query($this->connection, $sqlcom))
    echo "Так же пожалуйста подтвердите и оплатите бронирование в течении 24 часов, иначе оно слетит.<br>"; 
    {
        return 1;
    }
}
}

?>