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
        // database connection code
        if(isset($_POST['email'])){

            $con = mysqli_connect('localhost', 'root', '','db_master');
            if (!$con) {
              die("Connection failed: " . mysqli_connect_error());
            }

            $mail = $_POST['email'];
            $password = $_POST['pword'];

            // database check yazilimci
            $sql = "SELECT `sifre`, `isim` FROM `yazilimci` WHERE `mail`='$mail' "; //
            $result = mysqli_query($con, $sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if($row["sifre"] == $password){
                        session_start();
                        $_SESSION["mail"]=$mail;
                        $_SESSION["isim"]=$row["isim"];
                        header("Location: http://localhost/BIL372/yazilimcilar.php");
                        exit();
                    }
                    else {
                        echo "YANLIS PAROLA";
                        exit();
                    }
                }
            }

            // database check sirket
            $sql = "SELECT `sifre`,`isim` FROM `sirket` WHERE `mail`='$mail' "; //
            $result = mysqli_query($con, $sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if($row["sifre"] == $password){
                        session_start();
                        $_SESSION["mail"]=$mail;
                        $_SESSION["isim"]=$row["isim"];
                        header("Location: http://localhost/BIL372/sirketler.php");
                        exit();
                    }
                    else {
                        echo "YANLIS PAROLA";
                        exit();
                    }
                }
            }

            // database check stk
            $sql = "SELECT `sifre`,`isim` FROM `stk` WHERE `mail`='$mail' "; //
            $result = mysqli_query($con, $sql);
            if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if($row["sifre"] == $password){
                            session_start();
                            $_SESSION["mail"]=$mail;
                            $_SESSION["isim"]=$row["isim"];
                            header("Location: http://localhost/BIL372/stklar.php");
                            exit();
                        }
                        else {
                            echo "YANLIS PAROLA";
                            exit();
                        }
                    }
                }

            echo "BOYLE BIR MAIL ADRESI BULUNMUYOR";
            $con->close();
        }
    ?>
  </body>
</html>