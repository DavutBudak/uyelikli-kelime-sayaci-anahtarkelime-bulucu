
<?php
// UYE GIRISI yapılmışsa indexe SAYFASINA YONLENDIR
include "baglanti.php";
if ($_SESSION["login"]) {
    header("Location:index.php");
}
?>

<?php
include "baglanti.php";
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Üye Kayıt</title>
    <!-- BOOTSTRAP 4.3.1 FRAMEWORK PROJEMİZE DAHİL EDİYORUZ -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- BOOTSTRAP 4.3.1 FRAMEWORK PROJEMİZE DAHİL EDİYORUZ -->
        <link rel="stylesheet" href="style.css"/>
    <script src="https://kit.fontawesome.com/1d31c2c74b.js" crossorigin="anonymous"></script>
</head>

<body style="background-image:url(metin/img/arkpln4.jpeg);      background-repeat : no-repeat center center fixed; 
              -o-background-size: cover;
              background-size: cover;
              -webkit-background-size: cover;
              -moz-background-size: cover;" >
<center>

            <?php
if (isset($_POST["uye_kadi"])) {
  include "baglanti.php";

   $uye_kadi = trim($_POST["uye_kadi"]);
   $uye_sifre = trim($_POST["uye_sifre"]);
   $uye_eposta = trim($_POST["uye_eposta"]);
   $onay = trim($_POST["onay"] ? 1 : 0);

   $uye_kadi = $_POST['uye_kadi'];
   
   $uye_kadi = str_replace(" ","",$uye_kadi);

   $uye_sifre = $_POST['uye_sifre'];
   
   $uye_sifre = str_replace(" ","",$uye_sifre);
   
   
    if (empty($uye_kadi) || empty($uye_sifre) || empty($uye_eposta)) {
      echo '
       <div class="alert alert-danger" role="alert">
       Yıldızlı alanları lütfen boş bırakmayınız.
      </div>';
    } else {
       if ($onay != 1) {
        echo '
        <div class="alert alert-danger" role="alert">
        Üyelik kurallarını kabul etmeniz gerekiyor.
        </div>';
       } else {
         $ayni_uye_varmi = $db -> prepare("SELECT * FROM uyeler WHERE BINARY uye_kadi = ?");
         $ayni_uye_varmi -> execute(array($uye_kadi));
          if($ayni_uye_varmi -> rowCount()){
            echo '
            <div class="alert alert-danger" role="alert">
            Bu kullanıcı adı daha önce alınmış. Lütfen farklı bir kullanıcı adı deneyin.
            </div>';}
            
          else{
             $uye_ekle = $db->prepare("INSERT INTO uyeler (uye_kadi, uye_sifre, uye_eposta) VALUES (?,?,?)");
             $uye_ekle -> execute(array($uye_kadi, $uye_sifre, $uye_eposta));
             if ($uye_ekle){
               echo '
               <div class="alert alert-success" role="alert">
               Kayıt işlemi tamamlandı. Giriş sayfasına yönlendiriliyorsunuz...
               </div>';
				header("Refresh: 2; url=giris.php"); 
				 
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
          

   
<form id="form" class="border rounded col-8" method="post" action="" style="background-color:white; margin-top:80px;">
      
      <div class="girisbslk"><h3 class="mt-2">Üye Kayıt</h3></div>

      <hr style="background-color:red;">

          <div class="form-group ">
              <label>Kullanıcı Adı: <br>(<small style="color:blue;">Min 8 Karakter , Sembol İçermez</small>)</label>

<div class="row">

<div class="girisklncico col-1" > <i class="fas fa-user" ></i> </div>


<div class="girisklnc col-11"><input type="text"   pattern="[a-zA-Z0-9]+" minlength="8"  class="form-control" placeholder="Kullanıcı adınızı giriniz" maxlength="50" name="uye_kadi"></div>


</div>

          </div>
          <div class="form-group">
              <label>Şifre: <br>(<small style="color:blue;" >Min 8 Karakter , 1 Büyük Harf / Küçük Harf / Rakam</small>)</label>

              <div class="row">
                  
          <div class="girissfrico col-1" ><i class="fas fa-lock" ></i></div>

          <div class="girissfr col-11"> <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="8"  class="form-control" placeholder="Şifrenizi giriniz" maxlength="20" name="uye_sifre"></div>

          </div>
          </div>





          <div class="form-group ">
              <label>E-posta: (*)</label>

<div class="row">

<div class="girisklncico col-1" > <i class="fas fa-user" ></i> </div>


<div class="girisklnc col-11"><input type="email" class="form-control"  maxlength="50"  placeholder="E-posta adresinizi giriniz" name="uye_eposta"></div>


</div>

          </div>
          <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="onay">
                    <label class="form-check-label">Üyelik kurallarını kabul ediyorum (*)</label>
                </div>


                <button type="submit" class="btn btn-primary">Kayıt Ol</button> <br>
                <br>
                              <div style="text-align:center; "><a class="btn btn-danger" style="text-decoration:none; " href="giris.php"> <b style="color:white;">Hesabın Varsa Giriş Yap</b></a></div>




      </form>

      </center>
</body>
</html>


