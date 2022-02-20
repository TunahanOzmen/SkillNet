<?php
session_destroy();
$_SESSION["isim"]=array();
$_SESSION["mail"]=array();
header("Location: http://localhost/BIL372");
?>