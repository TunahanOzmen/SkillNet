<?php
if(isset($_POST['stkProje']))
{
$con = mysqli_connect('localhost', 'root', '','db_master');
session_start();
// get the post records
$mail = $_SESSION["mail"];
$projeID = $_POST['stkProje'];


// database insert SQL code
$sql = "INSERT INTO `gonullu_proje` (`gonulluMail`, `projeID`) VALUES ('$mail', '$projeID')";

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
    //echo $sql;
    //header("Location: http://localhost/BIL372/yazilimcilar.php");
    exit();
}
}
?>