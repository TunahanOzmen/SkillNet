<?php
if(isset($_POST['fname']))
{
$con = mysqli_connect('localhost', 'root', '','db_master');
session_start();
// get the post records
$mail = $_SESSION["mail"];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$dt = $_POST['dogumTarihi'];
$sehir = $_POST['sehir'];
$maas = $_POST['maas'];
$pozisyon = $_POST['uzmanlik'];
$tecrube = $_POST['tecrube'];
if(isset($_POST['dil1'])){$dil1 = 1;}else{$dil1 = 0;}
if(isset($_POST['dil2'])){$dil2 = 1;}else{$dil2 = 0;}
if(isset($_POST['dil3'])){$dil3 = 1;}else{$dil3 = 0;}
if(isset($_POST['dil4'])){$dil4 = 1;}else{$dil4 = 0;}
if(isset($_POST['dil5'])){$dil5 = 1;}else{$dil5 = 0;}
if(isset($_POST['dil6'])){$dil6 = 1;}else{$dil6 = 0;}
if(isset($_POST['dil7'])){$dil7 = 1;}else{$dil7 = 0;}
if(isset($_POST['dil8'])){$dil8 = 1;}else{$dil8 = 0;}
if(isset($_POST['dil9'])){$dil9 = 1;}else{$dil9 = 0;}
if(isset($_POST['yanhak1'])){$yanhak1 = 1;}else{$yanhak1 = 0;}
if(isset($_POST['yanhak2'])){$yanhak2 = 1;}else{$yanhak2 = 0;}
if(isset($_POST['yanhak3'])){$yanhak3 = 1;}else{$yanhak3 = 0;}
if(isset($_POST['yanhak4'])){$yanhak4 = 1;}else{$yanhak4 = 0;}

$sql = "SELECT * FROM `yazilimci` WHERE `mail`='$mail'";
$rs = mysqli_query($con, $sql);
$db = $rs->fetch_assoc();

if(empty($fname)){$fname = $db['isim'];}
if(empty($lname)){$lname = $db['soyisim'];}
if(empty($dt)){$dt = $db['dogumTarihi'];}
if(empty($sehir)){$sehir = $db['sehir'];}
if(empty($maas)){$maas = $db['maas'];}
if(empty($pozisyon)){$pozisyon = $db['pozisyon'];}
if(empty($tecrube)){$tecrube = $db['tecrube'];}


// database insert SQL code
$sql = "UPDATE `yazilimci`
        SET `isim` = '$fname',
        `soyisim` = '$lname',
        `maas` = '$maas',
        `sehir` = '$sehir',
        `dogumTarihi` = '$dt',
        `pozisyon` = '$pozisyon',
        `tecrube` = '$tecrube',
        `java` = '$dil1',
        `python` = '$dil2',
        `js` = '$dil3',
        `c` = '$dil4',
        `c_s` = '$dil5',
        `c_pp` = '$dil6',
        `ruby` = '$dil7',
        `swift` = '$dil8',
        `php` = '$dil9',
        `yemek` = '$yanhak1',
        `egitim` = '$yanhak2',
        `servis` = '$yanhak3',
        `sigorta` = '$yanhak4'
        WHERE `mail` ='$mail'";

// update database
$rs = mysqli_query($con, $sql);
if($rs)
{

    header("Location: http://localhost/BIL372/yazilimcilar.php");
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