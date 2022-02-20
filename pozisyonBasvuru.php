<?php
if(isset($_POST['sirketTalep']))
{
$con = mysqli_connect('localhost', 'root', '','db_master');
session_start();
// get the post records
$mail = $_SESSION["mail"];
$talepID = $_POST['sirketTalep'];


// database insert SQL code
$sql = "INSERT INTO `yazilimci_talep` (`yazilimciMail`, `talepID`) VALUES ('$mail', '$talepID')";

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