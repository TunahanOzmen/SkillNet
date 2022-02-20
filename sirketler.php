<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SkillNet/Şirket</title>

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
        <a class="btn btn-primary" href="#" onclick="document.getElementById('yazılımcıGor').style.display='block'" style="margin-right: 20px; width: auto; right: 465px; position: absolute;">Yazılımcıları Gör</a>
        <a class="btn btn-primary" href="#" onclick="document.getElementById('yazilimciTalepAc').style.display='block'" style="width: auto; right: 310px; position: absolute;">Yazılımcı Talebi Aç</a>
        <a class="btn btn-primary" href="#" onclick="document.getElementById('profil').style.display='block'" style="width: auto; right: 230px; position: absolute;">Profil</a>
        <a class="btn btn-primary" href="logout.php" style="width: auto; right: 150px; position: absolute;">Çıkış</a>
    </div>
</nav>

<!-- Eslestigim yazilimcilar butonu-->
<div id="yazılımcıGor" class="modal">
    <form id="yazılımcıGoruntuleForm">
        <h1>Size En Uygun Yazılımcılar:</h1>
        <div>
            <hr>
            <?php
                $con = mysqli_connect('localhost', 'root', '','db_master');
                $mail = $_SESSION["mail"];
                $sql_sirket = "SELECT * FROM `sirket`,`sirket_talep` WHERE `mail`='$mail' AND `sirketMail`=`mail`";
                $result_sirket = mysqli_query($con, $sql_sirket);
                $r_s = $result_sirket->fetch_assoc(); // $r_s = result_sirket
                if(empty($r_s)){
                    echo "<br><br><p style='text-align:center;' > Şimdilik size uygun yazılımcı bulunmuyor <br></p>";
                }else{

                $sql_yazilimci = "SELECT * FROM `yazilimci`,`yazilimci_talep`,`sirket_talep`
                                  WHERE `sirket_talep`.`sirketMail`=\"{$r_s["mail"]}\"
                                  AND `sirket_talep`.`talepID`=`yazilimci_talep`.`talepID`
                                  AND `yazilimci`.`mail`=`yazilimci_talep`.`yazilimciMail`
                                  ORDER BY `yazilimci_talep`.`talepID` ASC";
                $result_yazilimci = mysqli_query($con, $sql_yazilimci);
                if ($result_yazilimci->num_rows > 0) {
                    while($row_yazilimci = $result_yazilimci->fetch_assoc()) {
                        //echo "<input type='radio' name='yazilimciTalep' value=",$row_yazilimci['talepID'],"> Proje No: ",$row_yazilimci['talepID'],"<br> YAZILIMCI: ",$row_yazilimci['isim'], "<br> İletişim Adresi: ",$row_yazilimci['mail'] ,"<br> Şehir: ",$row_yazilimci['sehir'] ,"<br> Pozisyon: ",$row_yazilimci['pozisyon'] ,"<br>";
                        //echo "<input type='radio' class='form-check-input' name='yazilimciTalep' value=",$row_yazilimci['talepID']," id=",$row_yazilimci['talepID'],"><label class='form-check-label' for=",$row_yazilimci['talepID'],"> Proje No: ",$row_yazilimci['talepID'],"<br> YAZILIMCI: ",$row_yazilimci['isim']," ",$row_yazilimci['soyisim'], "<br> İletişim Adresi: ",$row_yazilimci['mail'] ,"<br> Şehir: ",$row_yazilimci['sehir'] ,"<br> Pozisyon: ",$row_yazilimci['pozisyon'] ,"</label><br>";
                        echo "<p>Proje No: ",$row_yazilimci['talepID'],"<br> YAZILIMCI: ",$row_yazilimci['isim']," ",$row_yazilimci['soyisim'], "<br> İletişim Adresi: ",$row_yazilimci['mail'] ,"<br> Şehir: ",$row_yazilimci['sehir'] ,"<br> Pozisyon: ",$row_yazilimci['pozisyon'] ,"<br></p>";
                        echo "<hr>";
                    }
                }
                else{
                    echo "<br><br><p style='text-align:center;' > Şimdilik size uygun yazılımcı bulunmuyor <br></p>";
                }}
            ?>
        </div>
    </form>
</div>

<!-- yeni is acma butonu-->
<div id="yazilimciTalepAc" class="modal">
    <form id="yeniIsForm" action="yazılımcıyaIsAc.php" method="post">
        <h1>Yeni Proje Başlat</h1>
            <?php
                $con = mysqli_connect('localhost', 'root', '','db_master');
                $mail = $_SESSION["mail"];
                $sql = "SELECT * FROM `sirket` WHERE `mail`='$mail' ";
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
                echo "<hr";
                echo "<p>Maximum Maaş: </p>";
                echo "<p><input oninput='this.className = ''' name='maas' id='maxMaas'></p>";
                echo "<hr";
                echo "<p>Minimum Tecrübe: </p>";
                echo "<p><input oninput='this.className = ''' name='minTecrube' id='minTecrube'></p>";

            ?>
            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" id="updateBtn" onclick="document.getElementById('yeniIsForm').submit();">Yazılımcı Talebi Aç</button>
                </div>
            </div>
    </form>
</div>

<!-- Profil butonu-->
<div id="profil" class="modal">
    <form id="profilGoruntuleForm" action="guncelleSirket.php" method="post">
        <h1>BİLGİLERİNİZ</h1>
         <?php
            $con = mysqli_connect('localhost', 'root', '','db_master');
            $mail = $_SESSION["mail"];
            $sql_sirket= "SELECT * FROM `sirket` WHERE `mail`='$mail' ";
            $result_sirket = mysqli_query($con, $sql_sirket);
            $r_s = $result_sirket->fetch_assoc();

            echo "<p>Şirket İsminiz:</p>";
            echo "<p><input placeholder='{$r_s['isim']}' oninput='this.className = ''' name='isim' id='isim'></p>";

            echo "<p>İnternet siteniz:</p>";
            echo "<p><input placeholder='{$r_s['internetSitesi']}' oninput='this.className = ''' name='internetSitesi' id='internetSitesi'></p>";

            echo "<p>Şirketinizin Bulunduğu Şehir:</p>";
            echo "<p><input placeholder='{$r_s['sehir']}' oninput='this.className = ''' name='sehir' id='sehir'></p>";

            echo "<hr>";
            echo "<p>Verdiğiniz Yanhaklar:</p>";
            $names = array("yanhak1","yanhak2","yanhak3","yanhak4");
            $columns = array("yemek","egitim","servis","sigorta");
            $labels = array("Yemek","Egitim Bütçesi","Ulaşım","Sağlık Sigortası");
            $i = 0;
            foreach ($columns as $yanhak){
                echo "<div class='form-check form-switch'>";
                if($r_s[$yanhak] > 0){
                    echo "<input class='form-check-input' type='checkbox' name='{$names[$i]}' value='$yanhak' id='$yanhak' checked>";
                }
                else{
                    echo "<input class='form-check-input' type='checkbox' name='{$names[$i]}' value='$yanhak' id='$yanhak'>";
                }
                echo "<label class='form-check-label' for='$yanhak'>$labels[$i]</label></div>";
                $i = $i+1;
            }

            echo "<hr>";
            echo "<p>Projeleriniz (Kaldırmak İstediğiniz Projeyi İşaretleyiniz):</p>";
            $sql = "SELECT * FROM `sirket_talep`,`sirket` WHERE `mail`=`sirketMail` AND `mail`='$mail' ";
            $result = mysqli_query($con, $sql);
            while($talep = $result->fetch_assoc()){
                echo "<input class='form-check-input' type='radio' name='silinecekTalep' value={$talep['talepID']} id={$talep['talepID']}> <label class='form-check-label' for={$talep['talepID']}> Proje No: ",$talep['talepID'],"<br> Pozisyon: ",$talep['pozisyon'], "<br> Max Maas: ",$talep['maxMaas'],"<br> Min Tecrübe: ",$talep['minTecrube'],"<br></label>";
                echo "<hr>";
            }
         ?>
            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" id="updateBtn" onclick="document.getElementById('profilGoruntuleForm').submit();">Şirket Bilgisi Güncelle</button>
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
        <h1 class="mb-5">Şirketinizin Talepleri Doğrultusunda Sizin İçin En Uygun Yazılımcıyı Bulalım.</h1>
        <h6 class="mb-5">Kriterlerinize uygun yazılımcıları bulabilir, yeni talepler oluşturabilir veya istediğiniz zaman kriterlerinizi gözden geçirebilirsiniz</h6>
      </div>
    </div>
  </div>
</header>

<script>
    // Formlar doldururken ekranin disinda bir noktaya basilirsa cikilir
    var modal = document.getElementById('yazılımcıGor');
    var modal2 = document.getElementById('yazilimciTalepAc');
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
