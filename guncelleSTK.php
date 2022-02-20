<?php

$con = mysqli_connect('localhost', 'root', '','db_master');

session_start();
// get the post records
$mail = $_SESSION["mail"];
$isim = $_POST['isim'];
$sehir = $_POST['sehir'];
$faaliyetAlani = $_POST['faaliyetAlani'];
$internetSitesi = $_POST['internetSitesi'];

$sql = "SELECT * FROM `stk` WHERE `mail`='$mail'";
$rs = mysqli_query($con, $sql);
$db = $rs->fetch_assoc();

if(empty($isim)){$isim = $db['isim'];}
if(empty($sehir)){$sehir = $db['sehir'];}
if(empty($faaliyetAlani)){$faaliyetAlani = $db['faaliyetAlani'];}
if(empty($internetSitesi)){$internetSitesi = $db['internetSitesi'];}

$sql = "UPDATE `stk`
        SET `isim` = '$isim',
        `sehir` = '$sehir',
        `faaliyetAlani` = '$faaliyetAlani',
        `internetSitesi` = '$internetSitesi'
        WHERE `mail` ='$mail'";
$rs = mysqli_query($con, $sql);
$rs2 = True;
if(isset($_POST['silinecekProje'])){
    $projeID = $_POST['silinecekProje'];
    $sql ="DELETE FROM `stk_proje` WHERE `projeID`='$projeID' " ;
    $rs2 = mysqli_query($con, $sql);
}

if($rs and $rs2)
{
    header("Location: http://localhost/BIL372/stklar.php");
    exit();
}
else
{
    echo "BAŞARISIZ<br>";
    echo $sql;
}
?>