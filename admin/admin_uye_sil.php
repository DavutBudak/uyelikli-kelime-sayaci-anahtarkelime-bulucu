

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Üye Sil</title>
    <!-- BOOTSTRAP 4.3.1 FRAMEWORK PROJEMİZE DAHİL EDİYORUZ -->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- BOOTSTRAP 4.3.1 FRAMEWORK PROJEMİZE DAHİL EDİYORUZ -->
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="mt-5">Üye Sil</h4>
            <?php

            include "../baglanti.php";
            $id = $_GET["id"];
            $uye_getir = $db->prepare("SELECT * FROM uyeler WHERE uye_id = ?");
            $uye_getir->execute(array($id));
            if ($uye_getir->rowCount()) {

                $uye_sil = $db->prepare("DELETE FROM uyeler WHERE uye_id = ?");
                $uye_sil->execute(array($id));
                if ($uye_sil->rowCount()) {
                    echo '
                    <div class="alert alert-success" role="alert">
                    Üye silindi.
                    </div>';
                    header("Location:admin_uye_listesi.php");
                } else {
                    echo '    
                    <div class="alert alert-danger" role="alert">
                    Üye silme başarısız. Bir sorun oluştu.
                    </div>';
                }

            } else {
                header("Location:admin_uye_listesi.php");
            }

            ?>
        </div>
    </div>
</div>
</body>
</html>