
<?php

$sayfa_admin = trim($_GET["sayfa_admin"]);

switch ($sayfa_admin){
    case "":
        include "anasayfa_admin.php";
        break;
        case "cikis-yap-admin":
        include "cikis_admin.php";
        break;
    default:
        include "anasayfa_admin.php";
        break;
}