<?php
include "conn.php";
$id = $_GET['id'];

$sql = "DELETE FROM travel_location WHERE id = '$id'";

mysql_query( $sql,$link);

mysql_close($link);

echo $id;

session_start();
$_SESSION['alert_message'] = "Delete user success";

header("LOCATION: index.php");