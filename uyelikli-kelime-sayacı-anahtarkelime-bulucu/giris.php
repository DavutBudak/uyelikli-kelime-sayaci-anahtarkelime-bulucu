
<?php
// UYE GIRISI yapılmışsa indexe SAYFASINA YONLENDIR
include "baglanti.php";
if ($_SESSION["login"]) {
    header("Location:metin/index.php");
}
?>

<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Üye Girişi</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="style.css"/>

    <script src="https://kit.fontawesome.com/1d31c2c74b.js" crossorigin="anonymous"></script>
</head>
<body style="background-image:url(metin/img/arkpln4.jpeg);      background-repeat : no-repeat center center fixed; 
              -o-background-size: cover;
              background-size: cover;
              -webkit-background-size: cover;
              -moz-background-size: cover;" >


    <center>


<div class="container">
    <div class="col">
        <?php
        if ($_POST) {
            $kullanici_adi = trim($_POST["kullanici_adi"]);
            $sifre = trim($_POST["sifre"]);
            if (!$kullanici_adi || !$sifre) {
                echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Hata!</strong> Kullanıcı adı veya şifre alanları boş bırakılamaz!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
            } else {
                $uye_varmi = $db->prepare("SELECT * FROM uyeler WHERE BINARY uye_kadi = ? AND BINARY uye_sifre = ?");
                $uye_varmi->execute(array($kullanici_adi, $sifre));
                if ($uye_varmi->rowCount() > 0) {
                    $uye = $uye_varmi->fetch(PDO::FETCH_OBJ);
                    $_SESSION["login"] = true;
                    $_SESSION["uye"] = $uye->uye_kadi;
                    $_SESSION["id"] = $uye->uye_id;

                    header("Refresh: 1; url=metin/index.php");
                    echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Giriş Başarılı.</strong>Kelime Sayacı sayfasına yönlendiriliyorsunuz...
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
                } else {
                    echo '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Hata!</strong> Kullanıcı adı veya şifre hatalı! Lütfen tekrar deneyiniz.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                    ';
                }
            }
        }
        ?>
        
   
        <form class="border rounded col-8" method="post" action="" style="background-color:white; margin-top:150px;">
      
        <div class="girisbslk"><h3 class="mt-2">Üye Girişi</h3>
</div>
        <hr style="background-color:red;">
            <div class="form-group ">
                <label>Kullanıcı Adı: <br>(<small style="color:blue;">Min 8 Karakter , Sembol İçermez</small>)</label>

<div class="row">

<div class="girisklncico col-1" > <i class="fas fa-user" ></i> </div>


<div class="girisklnc col-11"><input type="text" class="form-control" maxlength="50" placeholder="Kullanıcı adınızı giriniz" name="kullanici_adi"></div>


</div>
 
            </div>
            <div class="form-group">
                <label>Şifre: <br>(<small style="color:blue;" >Min 8 Karakter , 1 Büyük Harf / Küçük Harf / Rakam</small>)</label>

                <div class="row">
                    
            <div class="girissfrico col-1" ><i class="fas fa-lock" ></i></div>

            <div class="girissfr col-11"> <input type="password" class="form-control" maxlength="20" placeholder="Şifrenizi giriniz" name="sifre"></div>


            
            </div>





            </div>
            <button type="submit" class="btn btn-primary">Giriş Yap</button>
			<a href="kayit_ol.php" class="btn btn-primary">Kayıt Ol</a>
        </form>
		
    </div>
</div>

</center>

</body>
</html>