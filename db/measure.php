<?php
 /* add measurement of gas, water, electricity */

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);


// Create (connect to) SQLite database in file
include("connect.php");


$insert = "INSERT INTO meter (wasser, gas, e1, e2, checkin)
          VALUES (:wasser, :gas, :e1, :e2, :checkin)";

$t = time();

$stmt = $dbh->prepare($insert);


$stmt->bindParam(':wasser', round($_POST['wasser']));
$stmt->bindParam(':gas', round($_POST['gas']));
$stmt->bindParam(':e1', round($_POST['e1']));
$stmt->bindParam(':e2', round($_POST['e2']));
$stmt->bindParam(':checkin', $_POST['checkin']);


$stmt->execute() or die("Speichern fehlgeschlagen");

if($_POST['checkin']){
    header('Location:../index.php?page=checkin&msg=success');
}else{
    header('Location:../index.php?page=checkout&msg=success');
}

?>
