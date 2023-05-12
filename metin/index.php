<?php
// UYE GIRISI YAPILMAMISSA GIRIS SAYFASINA YONLENDIR
include "../baglanti.php";
if(!$_SESSION["login"]){
header("Location:../giris.php");
}
?>



<!DOCTYPE html> 
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="content-language" content="tr">
   </head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <script src="https://kit.fontawesome.com/1d31c2c74b.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css">
<script src="java.js"></script>
<body>


<center> 



<!-- HEADER -->

<div class="col-md-12"> 
  <div class="row">
    
  <div class="logo col-md-8"> <a href="https://www.siteadresi.com"> <h1>LOGO ALANI</h1>    </a> </div>



  <div class="col-md-4" style="text-align:right;" > 
<style>
  

.sidenav {
  height: 100%;
  width: 0; /*Genişliği javascriptle değiştir*/
  position: fixed;
  z-index: 1;
  top: 0;
  right: 0px;
  background-color: #111;
  overflow-x: hidden; /*Yatay kaydırmayı devre dışı bırak */
  transition: 0.5s;/* Sidenav'da kaymaya 0,5 saniye geçiş efekti */
  padding-top: 60px; /*İçeriği üstten 60 piksel yerleştirin */
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}
/*Menüler üzerine gelince  renklerini değiştirin */

.sidenav a:hover {
  color: #f1f1f1; 
}
/*Kapat düğmesini konumlandırın ve stillendirin (sağ üst köşe) */

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
/* Yüksekliğin 450 pikselden az olduğu daha küçük ekranlarda, 
sidenav stilini değiştirin 
(daha az dolgu ve daha küçük bir yazı tipi boyutu) */

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="YanMenu" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">

  &times;</a>

  <a style="text-align:center; text-decoration:none;"  href="">Ana Sayfa</a>
  <a  style="text-align:center; text-decoration:none;"  href="uye_duzenle.php">Düzenle</a>
  <a style=" text-align:center; text-decoration:none;" href="../index.php?sayfa=cikis-yap">Çıkış Yap</a>


</div>


<span style="font-size:30px;cursor:pointer" onclick="openNav()">
&#9776; 
</span>

<!-- javascript ile menuyu açma kapatma -->

<script>
function openNav() {
  document.getElementById("YanMenu").style.width = "250px";
}

function closeNav() {
  document.getElementById("YanMenu").style.width = "0";
}
</script> </div>


    

</div>
</div>

<!-- HEADER BİTİŞ-->




    
<div id="form_kutusu" class="col-md-12">    
    <form action="index.php" method="POST">
         <fieldset>
           <legend style="text-align: center; margin-bottom: 15px; color: rgb(28, 102, 74);" > <a href="" style="text-decoration: none;  color: rgb(248, 143, 44);"> KELIME SAYACI V 2.0</a>  </legend>
<h5> Metninizi Giriniz </h5>          
           <textarea style="background-color: #11d5db;  color:red;"name="kelime" rows="15"  placeholder="Lütfen Metninizi Giriniz ..." class="metnigir form-control"></textarea>
           <input type="text" name="anahtar" class="tkrar form-control-lg" placeholder="Anahtar Kelime..."> 
<br>
           <button type="submit" class="btn btn-primary btn-lg btn-block "  value="Gönder" >HESAPLA</button>
         </fieldset>
       </form>
    </div>
    <?php 
    mb_internal_encoding("UTF-8");
      @$_anahtar = $_POST['anahtar'];     
      @$_kelime=$_POST['kelime'];       
      $str = mb_strtolower($_kelime);
      $stranahtar = mb_strtolower($_anahtar);
    ?> 
<br><br>
<div class="szcklerüst col-md-12">
   <div class="szckler col-md-12">   
<div class="row">
<div class="szck col-md-3 border border-success">

<li> <h6>Toplam Karakter Sayısı </h6> </li>
   <li> <p> <?php echo mb_strlen($str);
 ?> </p> </li>
  </div>

<div class="szck col-md-3 border border-success">
<li> <h6>Boşluksuz Karakter Sayısı </h6> </li>
   <li> <p> <?php echo mb_strlen(str_replace(" ","",$str));
 ?> </p>  </li>
  </div>

<div class="szck col-md-3 border border-success">
<li> <h6> Kelime Sayısı </h6> </li>
   <li> <p> <?php echo str_word_count($str,0,'öçşığüÖÇŞİĞÜ1234567890');

   $enyenistr = str_word_count($str,0,'öçşığüÖÇŞİĞÜ1234567890');
  ?> </p>  </li>
   </div>

<div class="szck col-md-3 border border-success">
   <li> <h6>Anahtar Kelime </h6>  </li>
   <li>  <p> <?php @$k_sayisi=count(explode( $stranahtar , $str))-1;

if ($k_sayisi == null)
{ echo ":Anahtar Kelime Bulunamadı:"; }  

else { echo $k_sayisi;}  ?>   </p> </li>   </div>

  <div  class="szck col-md-12 border border-success">
   <li> <h6>Anahtar Kelime Yüzdesi </h6>  </li>
   <li>  <p> 
   <?php  
$karakter_sayisii = mb_strlen($str);
@$yuzde= ($k_sayisi*100) / $enyenistr;
if ($k_sayisi == null) { echo "0"; }
else { echo  " % "." " . $son_karakter = substr($yuzde ,0,4);} ?>      </p> </li>  </div>
</div>
</div>
</div>
<div class="footeralt col-md-12 "> 
       
     </center>
   </body>
</html>