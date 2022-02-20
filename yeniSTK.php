<?php
if(isset($_POST['email']))
{
$con = mysqli_connect('localhost', 'root', '','db_master');

// get the post records
$mail = $_POST['email'];
$password = $_POST['pword'];
$isim = $_POST['isim'];
$site = $_POST['internetSitesi'];
$sehir = $_POST['sehir'];
$faaliyetAlani = $_POST['faaliyetAlani'];

// database insert SQL code
$sql = "INSERT INTO `stk` (`mail`, `isim`, `sifre`, `sehir`, `faaliyetAlani`, `internetSitesi`) VALUES ('$mail', '$isim', '$password', '$sehir', '$faaliyetAlani', '$site')";

// insert in database
$rs = mysqli_query($con, $sql); //returns false on a a failure, otherwise true
if($rs)
{
    session_start();
    $_SESSION["mail"]=$mail;
    $_SESSION["isim"]=$isim;
    header("Location: http://localhost/BIL372/stklar.php");
    exit();
}
else
{
    echo "BAŞARISIZ - Halihazırda bir kaydınız bulunuyor olabilir.";

}
}
?>