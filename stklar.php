<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SkillNet/STK</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/landing-page.css" rel="stylesheet">

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-light bg-light static-top">
    <div class="container" style="justify-content: flex-start;">
        <a class="navbar-brand" href="#" >Merhaba, <?php session_start(); echo $_SESSION["isim"];  ?></a>
        <a class="btn btn-primary" href="#"  onclick="document.getElementById('gonulluGor').style.display='block'" style="position: absolute; right: 350px">Gönüllüleri Gör</a>
        <a class="btn btn-primary" href="#" onclick="document.getElementById('gonulluTalepAc').style.display='block'" style="position: absolute; right: 180px">Gönüllü Talebi Aç</a>
        <a class="btn btn-primary" href="#" onclick="document.getElementById('profil').style.display='block'" style="position: absolute; right: 100px">Profil</a>
        <a class="btn btn-primary" href="logout.php" style="position: absolute; right: 20px">Çıkış</a>
    </div>
</nav>


<!-- Gonullu olanlari gorme butonu-->
<div id="gonulluGor" class="modal">
    <form id="gonulluGoruntuleForm">
        <h1>Projelerinizde Çalışmak İsteyen Gönüllüler:</h1>
        <div>
            <br>
            <?php
                $con = mysqli_connect('localhost', 'root', '','db_master');
                $mail = $_SESSION["mail"];
                $sql_stk = "SELECT * FROM `stk` WHERE `mail`='$mail' ";
                $result_stk = mysqli_query($con, $sql_stk);
                $r_stk = $result_stk->fetch_assoc(); // $r_stk = result_stk
                $sql_stk = "SELECT * FROM `stk_proje`,`gonullu_proje`,`yazilimci`
                WHERE `stk_proje`.`stkMail`=\"{$r_stk["mail"]}\"
                AND `stk_proje`.`projeID`=`gonullu_proje`.`projeID`
                AND `yazilimci`.`mail`=`gonullu_proje`.`gonulluMail`
                ORDER BY `stk_proje`.`projeID` ASC";
                $result_stk = mysqli_query($con, $sql_stk);
                if(empty($result_stk)){
                echo "<br><br><p style='text-align:center';> Şimdilik projeniz için gönüllü bulunmuyor <br></p>";
                }else{
                if ($result_stk->num_rows > 0) {
                    while($row_stk = $result_stk->fetch_assoc()) {
                        echo "<br><br><p> Proje No: ",$row_stk['projeID'],"<br> Yazilimci: ",$row_stk['isim'], " ",$row_stk['soyisim'] ,"<br> Pozisyon: ",$row_stk['pozisyon'],"<br> Tecrube: ",$row_stk['tecrube']," Yıl<br> Mail: ",$row_stk['mail'],"<br></p>";
                        echo "<hr>";
                    }
                }
                else{
                    echo "<br><br><p style='text-align:center';> Şimdilik projeniz için gönüllü bulunmuyor <br></p>";
                }}
            ?>
        </div>
    </form>
</div>

<!-- Sirket goruntuleme butonu-->
<div id="gonulluTalepAc" class="modal">
    <form id="talepAcForm" action="gonulluTalepAc.php" method="post">
        <h1>Yeni Proje Başlat</h1>
        <?php
            $con = mysqli_connect('localhost', 'root', '','db_master');
            $mail = $_SESSION["mail"];
            $sql = "SELECT * FROM `stk` WHERE `mail`='$mail' ";
            $result = mysqli_query($con, $sql);
            $r = $result->fetch_assoc(); // $r = result

            echo "<p>İhtiyaç Duyduğunuz Uzmanlık:</p>";
            $labels = array("Backend Developer","Frontend Developer","Full Stack Developer","Android Developer","IOS Developer","QA/Test Developer","DevOps Developer");
            foreach ($labels as $pozisyon){
                echo "<input class='form-check-input' type='radio' name='uzmanlik' id='$pozisyon' value='$pozisyon'><label class='form-check-label' for='$pozisyon'>$pozisyon","</label><br>";
            }
            echo "<hr>";
            echo "<p>Projede Gereken Programlama Dilleri:</p>";
            $names = array("dil1","dil2","dil3","dil4","dil5","dil6","dil7","dil8","dil9");
            $columns = array("java","python","js","c","c_s","c_pp","ruby","swift","php");
            $labels = array("Java","Python","JavaScript","C","C#","C++","Ruby","Swift","Php");
            $i = 0;
            foreach ($columns as $dil){
                echo "<div class='form-check form-switch'>";
                echo "<input class='form-check-input' type='checkbox' name='{$names[$i]}' value='$dil' id='$dil'>";
                echo "<label class='form-check-label' for='$dil'>$labels[$i]</label></div>";
                $i = $i+1;
            }
        ?>
        <div style="overflow:auto;">
             <div style="float:right;">
                 <button type="button" id="updateBtn" onclick="document.getElementById('talepAcForm').submit();">Gönüllü Talebi Aç</button>
             </div>
        </div>
    </form>
</div>

<!-- Profil butonu-->
<div id="profil" class="modal">
<!--  isim, sehir, faaliyet Alani, internetSitesi ,Kaldirmak istediginiz projeyi seciniz-->
    <form id="profilGoruntuleForm" action="guncelleSTK.php", method="post">
        <h1>BİLGİLERİNİZ</h1>
        <?php
            $con = mysqli_connect('localhost', 'root', '','db_master');
            $mail = $_SESSION["mail"];
            $sql = "SELECT * FROM `stk` WHERE `mail`='$mail' ";
            $result = mysqli_query($con, $sql);
            $r_y = $result->fetch_assoc(); // $r_y = result_yazilimci
            echo "<p>İsminiz:</p>";
            echo "<p><input placeholder='{$r_y['isim']}' oninput='this.className = ''' name='isim' id='isim'></p>";

            echo "<p>Şirketinizin Bulunduğu Şehir:</p>";
            echo "<p><input placeholder='{$r_y['sehir']}' oninput='this.className = ''' name='sehir' id='sehir'></p>";

            echo "<p>Faaliyet Alanınız:</p>";
            echo "<p><input placeholder='{$r_y['faaliyetAlani']}' oninput='this.className = ''' name='faaliyetAlani' id='faaliyetAlani'></p>";

            echo "<p>İnternet Siteniz:</p>";
            echo "<p><input placeholder='{$r_y['internetSitesi']}' oninput='this.className = ''' name='internetSitesi' id='internetSitesi'></p>";

            echo "<hr>";
            echo "<p>Projeleriniz (Kaldırmak İstediğiniz Projeyi İşaretleyiniz):</p>";
            $sql = "SELECT * FROM `stk_proje`,`stk` WHERE `mail`=`stkMail` AND `mail`='$mail' ";
            $result = mysqli_query($con, $sql);
            while($project = $result->fetch_assoc()){
                echo "<input class='form-check-input' type='radio' name='silinecekProje' value={$project['projeID']} id={$project['projeID']}> <label class='form-check-label' for={$project['projeID']}> Proje No: ",$project['projeID'],"<br> Pozisyon: ",$project['pozisyon'], "<br> Faaliyet Alanı: ",$project['faaliyetAlani'] ,"<br>","</label>";
                echo "<hr>";
            }
        ?>
        <div style="overflow:auto;">
             <div style="float:right;">
                 <button type="button" id="updateBtn" onclick="document.getElementById('profilGoruntuleForm').submit();">Bilgileri Güncelle</button>
             </div>
        </div>
    </form>
</div>

<!-- Masthead -->
<header class="masthead text-white text-center">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-xl-9 mx-auto">
        <h1 class="mb-5">Sivil Toplum Kuruluşunuzun Projeleri İçin En Uygun Gönüllüyü Bulalım.</h1>
        <h6 class="mb-5">Kriterlerinize uygun gönüller bulabilir, yeni talepler oluşturabilir veya istediğiniz zaman kriterlerinizi gözden geçirebilirsin</h6>
      </div>
    </div>
  </div>
</header>

<script>
    // Formlar doldururken ekranin disinda bir noktaya basilirsa cikilir
    var modal = document.getElementById('gonulluGor');
    var modal2 = document.getElementById('gonulluTalepAc');
    var modal3 = document.getElementById('profil');
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
        if (event.target === modal2) {
            modal2.style.display = "none";
        }
        if (event.target === modal3) {
            modal3.style.display = "none";
        }
    }
</script>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
