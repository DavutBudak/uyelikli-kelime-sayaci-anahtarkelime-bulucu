


<?php
include "../baglanti-admin.php";
 ?>
 

 


<?php if($_SESSION["admn_login"]){
header("Location:../admin_uye_listesi.php");
}
else{
    header("Location:../admin_giris.php");
} ?>







