<!DOCTYPE html>
<html>
    <head>
        <title>Number Maker</title>
        <style>
            body {
                height:100%;
                background-color: #474e5d;
                font-family: unset;
                color: #d4d4d4;
                text-align: center;
                padding-top: 200px;
                font-size: xx-large;
            }
        </style>
    </head>
    <body>
        <?php
            if(isset($_POST['email'])){
                $con = mysqli_connect('localhost', 'root', '','db_master');

                // get the post records
                $mail = $_POST['email'];
                $password = $_POST['pword'];
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

                // database insert SQL code
                $sql = "INSERT INTO `yazilimci` (`mail`, `isim`, `soyisim`, `sifre`, `maas`, `sehir`, `dogumTarihi`, `pozisyon`, `tecrube`, `java`, `python`, `js`, `c`, `c_s`, `c_pp`, `ruby`, `swift`, `php`, `yemek`, `egitim`, `servis`, `sigorta`)
                                         VALUES ('$mail', '$fname', '$lname', '$password', '$maas', '$sehir', '$dt', '$pozisyon', '$tecrube', '$dil1', '$dil2', '$dil3', '$dil4', '$dil5', '$dil6', '$dil7', '$dil8', '$dil9', '$yanhak1', '$yanhak2', '$yanhak3', '$yanhak4')";

                // insert in database
                $rs = mysqli_query($con, $sql);
                if($rs){
                    session_start();
                    $_SESSION["mail"]=$mail;
                    $_SESSION["isim"]=$fname;
                    header("Location: http://localhost/BIL372/yazilimcilar.php");
                    //session_destroy();
                    //$_SESSION = array();
                    exit();
                }
                else{
                    echo "BAŞARISIZ - Halihazırda bir kaydınız bulunuyor olabilir.";
                }
            }
        ?>
    </body>
</html>