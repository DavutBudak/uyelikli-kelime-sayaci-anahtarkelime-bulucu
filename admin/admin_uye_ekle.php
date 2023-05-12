<?php
// UYE GIRISI YAPILMAMISSA GIRIS SAYFASINA YONLENDIR
include "baglanti-admin.php";
if(!$_SESSION["admn_login"]){
header("Location:admin_giris.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

    <meta charset="UTF-8">
    <title>Yeni Üye Ekle</title>
    <!-- BOOTSTRAP 4.3.1 FRAMEWORK PROJEMİZE DAHİL EDİYORUZ -->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- BOOTSTRAP 4.3.1 FRAMEWORK PROJEMİZE DAHİL EDİYORUZ -->
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="mt-5">Yeni Üye Ekle
              
            <button style="float:right;" class="btn btn-danger"><a style="text-decoration:none" href="index.php?sayfa_admin=cikis-yap-admin"><b style="color:white;">Çıkış Yap</b></a></h4> </button>

            
            <?php
if (isset($_POST["uye_kadi"])) {
  include "../baglanti.php";

   $uye_kadi = trim($_POST["uye_kadi"]);
   $uye_sifre = trim($_POST["uye_sifre"]);
   $uye_eposta = trim($_POST["uye_eposta"]);
   $onay = trim($_POST["onay"] ? 1 : 0);
    if (empty($uye_kadi) || empty($uye_sifre) || empty($uye_eposta)) {
      echo '
       <div class="alert alert-danger" role="alert">
       Yıldızlı alanları lütfen boş bırakmayınız.
      </div>';
    } else {
       if ($onay != 0) {
        echo '
        <div class="alert alert-danger" role="alert">
        Kuralları kabul etmediniz.
        </div>';
       } else {
         $ayni_uye_varmi = $db -> prepare("SELECT * FROM uyeler WHERE uye_kadi = ?");
         $ayni_uye_varmi -> execute(array($uye_kadi));
          if($ayni_uye_varmi -> rowCount()){
            echo '
            <div class="alert alert-danger" role="alert">
            Bu kullanıcı adı zaten kullanılıyor. Farklı bir kullanıcı adı deneyin.
            </div>';
          }else{
             $uye_ekle = $db->prepare("INSERT INTO uyeler (uye_kadi, uye_sifre, uye_eposta) VALUES (?,?,?)");
             $uye_ekle -> execute(array($uye_kadi, $uye_sifre, $uye_eposta));
             if ($uye_ekle){
               echo '
               <div class="alert alert-success" role="alert">
               Kayıt işlemi tamamlandı.
               </div>';
             }else{
               echo '
               <div class="alert alert-danger" role="alert">
               Üye kaydı başarısız. Bir sorun oluştu.
               </div>';
              }
          }
       }
    }
}
?>
            <form method="post" action="">
                <div class="form-group">
                    <label>Kullanıcı Adı: (*)</label>
                    <input type="text" class="form-control" placeholder="Kullanıcı adı giriniz" name="uye_kadi">
                </div>
                <div class="form-group">
                    <label>Şifre: (*)</label>
                    <input type="password" class="form-control" placeholder="Şifre giriniz" name="uye_sifre">
                </div>
                <div class="form-group">
                    <label>E-posta: (*)</label>
                    <input type="email" class="form-control" placeholder="E-posta adresi giriniz" name="uye_eposta">
                </div>
                
                <div class="col-md-12"> 
              <div class="row">
              <button type="submit" style="" class="btn btn-primary col-md-2">Yeni Üye Ekle</button>
              <div class="col-md-8"> </div>
                <a href="admin_uye_listesi.php" class="btn btn-primary col-md-2">Üye Listesi</a>
              </div>    
              
              </div>
               
            </form>
        </div>
    </div>
</div>
</body>
</html>