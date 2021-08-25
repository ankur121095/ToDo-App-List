<?php
include "dbcon.php";

$id = $_GET['v'];
$q = "delete from studentgiri_table where id = '$id'";
mysqli_query($con,$q);
header("location: index.php");
?>