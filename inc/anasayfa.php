<?php
include "../baglanti.php";
 ?>
 



<?php if($_SESSION["login"]){
header("Location:metin/index.php");
}
else{
    header("Location:giris.php");
} ?>







