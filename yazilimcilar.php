<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SkillNet/Yazılımcı</title>

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
        <a class="navbar-brand" href="#">Merhaba, <?php session_start(); echo $_SESSION["isim"];  ?></a>
        <a class="btn btn-primary" href="#" onclick="document.getElementById('gonulluOl').style.display='block'" style="width: auto;position: absolute;right: 290px;">Gönüllü Ol</a>
        <a class="btn btn-primary" href="#" onclick="document.getElementById('sirketBul').style.display='block'" style="width: auto;position: absolute;right: 180px;">Şirket Bul</a>
        <a class="btn btn-primary" href="#" onclick="document.getElementById('profil').style.display='block'" style="width: auto;position: absolute;right: 100px;">Profil</a>
        <a class="btn btn-primary" href="logout.php" style="width: auto;position: absolute;right: 20px;">Çıkış</a>
    </div>
</nav>

<!-- Stk projesi butonu-->
<div id="gonulluOl" class="modal">
    <form id="projeGoruntuleForm" action="gonulluOl.php" method="post">
        <h1>Sizin İçin Sectigimiz Projeler:</h1>
        <div>
            <hr>
            <?php
                $con = mysqli_connect('localhost', 'root', '','db_master');
                $mail = $_SESSION["mail"];
                $sql_yazilimci = "SELECT * FROM `yazilimci` WHERE `mail`='$mail' ";
                $result_yazilimci = mysqli_query($con, $sql_yazilimci);
                $r_y = $result_yazilimci->fetch_assoc(); // $r_y = result_yazilimci

                $sql_stk = "SELECT * FROM `stk`,`stk_proje`
                            WHERE `stk`.`mail`=`stk_proje`.`stkMail`
                            AND `stk_proje`.`pozisyon`=\"{$r_y["pozisyon"]}\"
                            AND `stk_proje`.`java`<=\"{$r_y["java"]}\"
                            AND `stk_proje`.`python`<=\"{$r_y["python"]}\"
                            AND `stk_proje`.`js`<=\"{$r_y["js"]}\"
                            AND `stk_proje`.`c`<=\"{$r_y["c"]}\"
                            AND `stk_proje`.`c_s`<=\"{$r_y["c_s"]}\"
                            AND `stk_proje`.`c_pp`<=\"{$r_y["c_pp"]}\"
                            AND `stk_proje`.`ruby`<=\"{$r_y["ruby"]}\"
                            AND `stk_proje`.`swift`<=\"{$r_y["swift"]}\"
                            AND `stk_proje`.`php`<=\"{$r_y["php"]}\"
                            ORDER BY `projeID` ASC";
                $result_stk = mysqli_query($con, $sql_stk);
                if ($result_stk->num_rows > 0) {
                    while($row_stk = $result_stk->fetch_assoc()) {
                        echo "<input class='form-check-input' type='radio' name='stkProje' value=",$row_stk['projeID'],"> <label class='form-check-label' for='stkProje'> Proje No: ",$row_stk['projeID'],"<br> STK: ",$row_stk['isim'], "<br> Faaliyet Alanı: ",$row_stk['faaliyetAlani'] ,"<br> İnternet Sitesi: ",$row_stk['internetSitesi'] ,"<br>", "</label>";
                        echo "<hr>";
                    }
                }
                else{
                    echo "<br><br><p> Şimdilik size uygun proje bulunmuyor <br></p>";
                }
            ?>
        </div>
        <div style="overflow:auto;">
             <div style="float:right;">
                 <button type="button" id="updateBtn" onclick="document.getElementById('projeGoruntuleForm').submit();">Gönüllü Ol</button>
             </div>
        </div>
    </form>
</div>

<!-- Sirket goruntuleme butonu-->
<div id="sirketBul" class="modal">
    <form id="talepGoruntuleForm" action="pozisyonBasvuru.php" method="post">
        <h1>Sizin İçin Sectiğimiz Pozisyonlar:</h1>
        <div>
            <hr>
            <?php
                $con = mysqli_connect('localhost', 'root', '','db_master');
                $mail = $_SESSION["mail"];
                $sql_yazilimci = "SELECT * FROM `yazilimci` WHERE `mail`='$mail' ";
                $result_yazilimci = mysqli_query($con, $sql_yazilimci);
                $r_y = $result_yazilimci->fetch_assoc(); // $r_y = result_yazilimci

                $sql_sirket = "SELECT * FROM `sirket`,`sirket_talep`
                WHERE `sirket`.`mail`=`sirket_talep`.`sirketMail`
                AND `sirket`.`yemek`>=\"{$r_y["yemek"]}\"
                AND `sirket`.`egitim`>=\"{$r_y["egitim"]}\"
                AND `sirket`.`servis`>=\"{$r_y["servis"]}\"
                AND `sirket`.`sigorta`>=\"{$r_y["sigorta"]}\"
                AND `sirket_talep`.`maxMaas`>=\"{$r_y["maas"]}\"
                AND `sirket_talep`.`minTecrube`<=\"{$r_y["tecrube"]}\"
                AND `sirket_talep`.`pozisyon`=\"{$r_y["pozisyon"]}\"
                AND `sirket_talep`.`java`<=\"{$r_y["java"]}\"
                AND `sirket_talep`.`python`<=\"{$r_y["python"]}\"
                AND `sirket_talep`.`js`<=\"{$r_y["js"]}\"
                AND `sirket_talep`.`c`<=\"{$r_y["c"]}\"
                AND `sirket_talep`.`c_s`<=\"{$r_y["c_s"]}\"
                AND `sirket_talep`.`c_pp`<=\"{$r_y["c_pp"]}\"
                AND `sirket_talep`.`ruby`<=\"{$r_y["ruby"]}\"
                AND `sirket_talep`.`swift`<=\"{$r_y["swift"]}\"
                AND `sirket_talep`.`php`<=\"{$r_y["php"]}\"
                ORDER BY `talepID` ASC";
                $result_sirket = mysqli_query($con, $sql_sirket);
                if ($result_sirket->num_rows > 0) {
                    while($row_sirket = $result_sirket->fetch_assoc()) {
                        //echo "<input class='form-check-input' type='radio' name='stkProje' value=",$row_stk['projeID'],"> <label class='form-check-label' for='stkProje'> Proje No: ",$row_stk['projeID'],"<br> STK: ",$row_stk['isim'], "<br> Faaliyet Alanı: ",$row_stk['faaliyetAlani'] ,"<br> İnternet Sitesi: ",$row_stk['internetSitesi'] ,"<br>", "</label>";
                        echo "<input class='form-check-input' type='radio' name='sirketTalep' value=",$row_sirket['talepID'],"><label class='form-check-label' for='sirketTalep'> Proje No: ",$row_sirket['talepID'],"<br> ŞİRKET: ",$row_sirket['isim'], "<br> İletişim Adresi: ",$row_sirket['mail'] ,"<br> Şehir: ",$row_sirket['sehir'] ,"<br> Pozisyon: ",$row_sirket['pozisyon'] ,"<br>", "</label>";
                        echo "<hr>";
                    }
                }
                else{
                    echo "<br><br><p style='text-align:center;' > Şimdilik size uygun sirket/pozisyon bulunmuyor <br></p>";
                }
            ?>
        </div>
        <div style="overflow:auto;">
             <div style="float:right;">
                 <button type="button" id="updateBtn" onclick="document.getElementById('talepGoruntuleForm').submit();">Pozisyona Başvur</button>
             </div>
        </div>
    </form>
</div>

<!-- Profil butonu-->
<div id="profil" class="modal">
    <form id="profilGoruntuleForm" action="guncelleYazilimci.php" method="post">
        <h1>BİLGİLERİNİZ</h1>
        <?php
            $con = mysqli_connect('localhost', 'root', '','db_master');
            $mail = $_SESSION["mail"];
            $sql_yazilimci = "SELECT * FROM `yazilimci` WHERE `mail`='$mail' ";
            $result_yazilimci = mysqli_query($con, $sql_yazilimci);
            $r_y = $result_yazilimci->fetch_assoc(); // $r_y = result_yazilimci

            echo "<p>İsminiz:</p>";
            echo "<p><input placeholder='{$r_y['isim']}' oninput='this.className = ''' name='fname' id='isim'></p>";

            echo "<p>Soyisminiz:</p>";
            echo "<p><input placeholder='{$r_y['soyisim']}' oninput='this.className = ''' name='lname' id='soyisim'></p>";

            echo "<p>Minimum Maaş Beklentiniz:</p>";
            echo "<p><input placeholder='{$r_y['maas']}' oninput='this.className = ''' name='maas' id='maas'></p>";

            echo "<p>Yaşadığınız Şehir:</p>";
            echo "<p><input placeholder='{$r_y['sehir']}' oninput='this.className = ''' name='sehir' id='sehir'></p>";

            echo "<p>Dogum Tarihiniz (YYYY-AA-GG):</p>";
            echo "<p><input placeholder='{$r_y['dogumTarihi']}' oninput='this.className = ''' name='dogumTarihi' id='dogumTarihi'></p>";

            echo "<hr>";
            echo "<p>Uzmanlık Alanınız:</p>";
            $labels = array("Backend Developer","Frontend Developer","Full Stack Developer","Android Developer","IOS Developer","QA/Test Developer","DevOps Developer");
            foreach ($labels as $pozisyon){
                if($r_y['pozisyon'] == $pozisyon){
                    echo "<input class='form-check-input' type='radio' name='uzmanlik' id='$pozisyon' value='$pozisyon' checked><label class='form-check-label' for='$pozisyon'>$pozisyon</label><br>";
                }
                else{
                    echo "<input class='form-check-input' type='radio' name='uzmanlik' id='$pozisyon' value='$pozisyon'><label class='form-check-label' for='$pozisyon'>$pozisyon</label><br>";
                }
            }
            echo "<hr>";
            echo "<p>Uzmanlık Alanınızdaki Deneyiminiz:</p>";
            $values = array("0","1","2","3","4","5","6","7","8","9","10","11");
            $labels = array("0","1","2","3","4","5","6","7","8","9","10","10+");
            $i = 0;
            foreach ($values as $value){
                if($r_y['tecrube'] == $value){
                    echo "<input class='form-check-input' type='radio' name='tecrube' id='$value' value='$value' checked><label class='form-check-label' for='$value'>$labels[$i]</label><br>";
                }
                else{
                    echo "<input class='form-check-input' type='radio' name='tecrube' id='$value' value='$value'><label class='form-check-label' for='$value'>$labels[$i]</label><br>";
                }
                $i = $i+1;
            }

            echo "<hr>";
            echo "<p>Bildiğiniz Diller:</p>";
            $names = array("dil1","dil2","dil3","dil4","dil5","dil6","dil7","dil8","dil9");
            $columns = array("java","python","js","c","c_s","c_pp","ruby","swift","php");
            $labels = array("Java","Python","JavaScript","C","C#","C++","Ruby","Swift","Php");
            $i = 0;
            foreach ($columns as $dil){
                echo "<div class='form-check form-switch'>";
                if($r_y[$dil] > 0){
                    echo "<input class='form-check-input' type='checkbox' name='{$names[$i]}' value='$dil' id='$dil' checked>";
                }
                else{
                    echo "<input class='form-check-input' type='checkbox' name='{$names[$i]}' value='$dil' id='$dil'>";
                }
                echo "<label class='form-check-label' for='$dil'>$labels[$i]</label></div>";
                $i = $i+1;
            }

            echo "<hr>";
            echo "<p>Yanhak Kriterleriniz:</p>";
            $names = array("yanhak1","yanhak2","yanhak3","yanhak4");
            $columns = array("yemek","egitim","servis","sigorta");
            $labels = array("Yemek","Egitim Bütçesi","Ulaşım","Sağlık Sigortası");
            $i = 0;
            foreach ($columns as $yanhak){
                echo "<div class='form-check form-switch'>";
                if($r_y[$yanhak] > 0){
                    echo "<input class='form-check-input' type='checkbox' name='{$names[$i]}' value='$yanhak' id='$yanhak' checked>";
                }
                else{
                    echo "<input class='form-check-input' type='checkbox' name='{$names[$i]}' value='$yanhak' id='$yanhak'>";
                }
                echo "<label class='form-check-label' for='$yanhak'>$labels[$i]</label></div>";
                $i = $i+1;
            }
        ?>
        <div style="overflow:auto;">
             <div style="float:right;">
                 <button type="button" id="updateBtn" onclick="document.getElementById('profilGoruntuleForm').submit();">Bilgilerimi Guncelle</button>
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
        <h1 class="mb-5">Sen kriterlerini belirle, biz senin için en uygun işi bulalım.</h1>
        <h6 class="mb-5">Kriterlerine uygun işleri bulabilir, gönüllü olarak sivil toplum kuruluşları projelerinde yer alabilir veya istediğin zaman kriterlerini gözden geçirebilirsin</h6>
      </div>
    </div>
  </div>
</header>

<script>
    // Formlar doldururken ekranin disinda bir noktaya basilirsa cikilir
    var modal = document.getElementById('gonulluOl');
    var modal2 = document.getElementById('sirketBul');
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
