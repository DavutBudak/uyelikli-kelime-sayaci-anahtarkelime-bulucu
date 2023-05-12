

<?php

unset($_SESSION['login']);

header("Refresh:1; url=giris.php");
?>

<div class="alert alert-primary" role="alert">
    Başarıyla çıkış yaptınız. Giriş sayfasına yönlendiriliyorsunuz...
</div>