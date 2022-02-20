<?php
if(isset($_POST['isim']))
{
$con = mysqli_connect('localhost', 'root', '','db_master');
session_start();
// get the post records
$mail = $_SESSION["mail"];
$isim = $_POST['isim'];
$internetSitesi = $_POST['internetSitesi'];
$sehir = $_POST['sehir'];
if(isset($_POST['yanhak1'])){$yanhak1 = 1;}else{$yanhak1 = 0;}
if(isset($_POST['yanhak2'])){$yanhak2 = 1;}else{$yanhak2 = 0;}
if(isset($_POST['yanhak3'])){$yanhak3 = 1;}else{$yanhak3 = 0;}
if(isset($_POST['yanhak4'])){$yanhak4 = 1;}else{$yanhak4 = 0;}

$sql = "SELECT * FROM `sirket` WHERE `mail`='$mail'";
$rs = mysqli_query($con, $sql);
$db = $rs->fetch_assoc();

if(empty($isim)){$isim = $db['isim'];}
if(empty($internetSitesi)){$internetSitesi = $db['internetSitesi'];}
if(empty($sehir)){$sehir = $db['sehir'];}

// database insert SQL code
$sql = "UPDATE `sirket`
        SET `isim` = '$isim',
        `sehir` = '$sehir',
        `internetSitesi` = '$internetSitesi',
        `yemek` = '$yanhak1',
        `egitim` = '$yanhak2',
        `servis` = '$yanhak3',
        `sigorta` = '$yanhak4'
        WHERE `mail` ='$mail'";

// update database
$rs = mysqli_query($con, $sql);
$rs2 = True;
if(isset($_POST['silinecekTalep'])){
    $talepID = $_POST['silinecekTalep'];
    $sql ="DELETE FROM `sirket_talep` WHERE `talepID`='$talepID' " ;
    $rs2 = mysqli_query($con, $sql);
}

if($rs and $rs2)
{
    header("Location: http://localhost/BIL372/sirketler.php");
    exit();
}

else
{
    echo "BAŞARISIZ";
    echo "<br>";
    echo $sql;
}
}
?>