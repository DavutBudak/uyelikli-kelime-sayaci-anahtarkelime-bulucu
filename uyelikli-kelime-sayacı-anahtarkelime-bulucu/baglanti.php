

<?php
error_reporting(0);
session_start();
ob_start();

/* Veritabanı Baglantı Bilgileri */
$hostname = "localhost";
$username = "root";
$pass = "root";
$database = "uye_db";

/* MySQL Bağlantısı */
try {
    $db = new PDO("mysql:host=localhost;"  . "dbname=uye_db;" .  " charset=utf8", "root", "root");
} catch (PDOException $error) {
    print $error->getMessage();
    exit();
}