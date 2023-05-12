
<?php
// UYE GIRISI yapılmışsa ekle SAYFASINA YONLENDIR

include "baglanti-admin.php";

if ($_SESSION["admn_login"]) {
    
    header("Location:admin_uye_listesi.php");
    

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
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../style.css"/>

<script src="https://kit.fontawesome.com/1d31c2c74b.js" crossorigin="anonymous"></script>
</head>
<body style="background-image:url(../metin/img/admn.png);      background-repeat : no-repeat center center fixed; 
              -o-background-size: cover;
              background-size: cover;
              -webkit-background-size: cover;
              -moz-background-size: cover;"  >
    <center>


<div class="container">
    <div class="col">
        <?php
        if ($_POST) {
            $admn_kullaniciadi = trim($_POST["admn_kullaniciadi"]);
            $admn_sifre = trim($_POST["admn_sifre"]);
            if (!$admn_kullaniciadi || !$admn_sifre) {
                echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Hata!</strong> Kullanıcı adı veya şifre alanları boş bırakılamaz!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
            } else {
                $uye_varmi = $db->prepare("SELECT * FROM admn_giris WHERE BINARY admin_kadi = ? AND BINARY  admin_sifre = ?");
                $uye_varmi->execute(array($admn_kullaniciadi, $admn_sifre));
                if ($uye_varmi->rowCount() > 0) {
                    $uye = $uye_varmi->fetch(PDO::FETCH_OBJ);
                    $_SESSION["admn_login"] = true;
                    $_SESSION["uye"] = $uye->admin_kadi;
                    $_SESSION["id"] = $uye->admin_id;

                    header("Refresh: 1; url=admin_uye_ekle.php");
                    echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Giriş Başarılı.</strong> Üye yönetim sayfasına yönlendiriliyorsunuz...
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
        
  <form class="border rounded col-7" method="post" action="" style="background-color:white; margin-top:150px;">
      
        <div class="girisbslk"><h3 class="mt-2">Admin Girişi</h3>
</div>
        <hr style="background-color:red;">
            <div class="form-group ">
                <label>Kullanıcı Adı: (*)</label>

<div class="row">

<div class="girisklncico col-1" > <i class="fas fa-user" ></i> </div>


<div class="girisklnc col-11"><input type="text" class="form-control" maxlength="50" placeholder="Kullanıcı adınızı giriniz" name="admn_kullaniciadi"></div>


</div>
 
            </div>
            <div class="form-group">
                <label>Şifre: (*)</label>

                <div class="row">
                    
            <div class="girissfrico col-1" ><i class="fas fa-lock" ></i></div>

            <div class="girissfr col-11"> <input type="password" class="form-control" maxlength="20" placeholder="Şifrenizi giriniz" name="admn_sifre"></div>


            
            </div>





            </div>
            <button type="submit" class="btn btn-primary">Giriş Yap</button>
        </form>




		
    </div>
</div>

</center>

</body>
</html>