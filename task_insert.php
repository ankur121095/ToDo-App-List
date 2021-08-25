<?php
include "dbcon.php";

$task = $_POST['task'];

$q = "insert into studentgiri_table(task)value('$task')";
mysqli_query($con,$q);
header("location: index.php");
?>