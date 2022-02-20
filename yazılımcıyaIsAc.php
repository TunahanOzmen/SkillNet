<?php
if(isset($_POST['uzmanlik']))
{
$con = mysqli_connect('localhost', 'root', '','db_master');

session_start();
// get the post records
$mail = $_SESSION["mail"];
$uzmanlik = $_POST['uzmanlik'];
$tecrube = $_POST['minTecrube'];
$maas = $_POST['maas'];
if(isset($_POST['dil1'])){$dil1 = 1;}else{$dil1 = 0;}
if(isset($_POST['dil2'])){$dil2 = 1;}else{$dil2 = 0;}
if(isset($_POST['dil3'])){$dil3 = 1;}else{$dil3 = 0;}
if(isset($_POST['dil4'])){$dil4 = 1;}else{$dil4 = 0;}
if(isset($_POST['dil5'])){$dil5 = 1;}else{$dil5 = 0;}
if(isset($_POST['dil6'])){$dil6 = 1;}else{$dil6 = 0;}
if(isset($_POST['dil7'])){$dil7 = 1;}else{$dil7 = 0;}
if(isset($_POST['dil8'])){$dil8 = 1;}else{$dil8 = 0;}
if(isset($_POST['dil9'])){$dil9 = 1;}else{$dil9 = 0;}

// database insert SQL code
$sql = "INSERT INTO `sirket_talep` (`talepID`, `sirketMail`, `pozisyon`,`maxMaas`,`minTecrube`, `java`, `python`, `js`, `c`, `c_s`, `c_pp`, `ruby`, `swift`, `php`)
                        VALUES ('', '$mail', '$uzmanlik','$maas','$tecrube', '$dil1', '$dil2','$dil3','$dil4','$dil5','$dil6','$dil7','$dil8','$dil9')";

// insert in database
$rs = mysqli_query($con, $sql); //returns false on a a failure, otherwise true
if($rs)
{
    header("Location: http://localhost/BIL372/sirketler.php");
    exit();
}
else
{
    echo "BAŞARISIZ<br>";
    echo $sql;
}
}
?>