<?php
error_reporting(0);
session_start();
ob_start();

/* Veritabanı Baglantı Bilgileri */
$hostname = "localhost";
$username = "davutsiteadresilab_user";
$pass = "Sanane.123";
$database = "davutsiteadresilab_admn_kullanici";

/* MySQL Bağlantısı */
try {
    $db = new PDO("mysql:host=localhost;"  . "dbname=davutsiteadresilab_admn_kullanici;" .  " charset=utf8", "davutsiteadresilab_user", "Sanane.123");
} catch (PDOException $error) {
    print $error->getMessage();
    exit();
}