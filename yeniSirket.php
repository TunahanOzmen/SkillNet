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
if(isset($_POST['yanhak1sirket'])){$yanhak1 = 1;}else{$yanhak1 = 0;}
if(isset($_POST['yanhak2sirket'])){$yanhak2 = 1;}else{$yanhak2 = 0;}
if(isset($_POST['yanhak3sirket'])){$yanhak3 = 1;}else{$yanhak3 = 0;}
if(isset($_POST['yanhak4sirket'])){$yanhak4 = 1;}else{$yanhak4 = 0;}

// database insert SQL code
$sql = "INSERT INTO `sirket` (`mail`, `isim`, `sifre`, `internetSitesi`, `sehir`, `yemek`, `egitim`, `servis`, `sigorta`)
                      VALUES ('$mail', '$isim', '$password', '$site', '$sehir', '$yanhak1', '$yanhak2', '$yanhak3', '$yanhak4')";

// insert in database
$rs = mysqli_query($con, $sql);
if($rs)
{
    session_start();
    $_SESSION["mail"]=$mail;
    $_SESSION["isim"]=$isim;
    header("Location: http://localhost/BIL372/sirketler.php");
    exit();
}
else
{
    echo "BAŞARISIZ - Halihazırda bir kaydınız bulunuyor olabilir.";

}
}
?>