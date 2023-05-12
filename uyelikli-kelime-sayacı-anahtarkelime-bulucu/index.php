

<?php
// UYE GIRISI YAPILMAMISSA GIRIS SAYFASINA YONLENDIR
include "baglanti.php";
if(!$_SESSION["login"]){
header("Location:giris.php");
}
else{
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
    <title>Anasayfa</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container mt-5">
    <div class="col">
        <?php
        if (file_exists("inc/ozellikler.php")){
            include "inc/ozellikler.php";
        }else{
            echo "Sistem dosyaları eksik.";
            exit();
        } 
        ?>
    </div>
</div>

</body>
</html>