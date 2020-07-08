<?php

//url
if ($_SERVER['REQUEST_URI'] == '/'){
	$page = 'home';
}else{
	$page = substr($_SERVER['REQUEST_URI'], 1);
}
//session
session_start();
//define
include "config.php";
//page includ
if (file_exists("all/$page.php")){
	include "all/$page.php";
}else if ($_SESSION['id'] and file_exists("auth/$page.php")){
	include "auth/$page.php";
}else if (!$_SESSION['id'] and file_exists("guest/$page.php")){
	include "guest/$page.php";
}else{
	exit('Страница 404');
}
//register valid
//function valid_captcha() {
    //if (!$_POST['g-recaptcha-response']){
      //  message('Տեղի է ունեցել սխալ');
   // }
    // capcha key get
    //$url = 'https://www.google.com/recaptcha/api/siteverify?secret='.RECAPTCHA_SECRET.'&response='.$_POST['g-recaptcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR'];
  //  $data = json_decode(file_get_contents($url));
//}*/
//register valid
function valid_name() {
    if (!preg_match('/^[A-z0-9]{3,15}$/', $_POST['name'])){
        message('Մուտքանունը պետք է լինի անգելերն տառեր կամ թվեր առանց բացատերի 3-ից 15 սիմվոլ');
    }
}
function valid_pass() {
    if (!preg_match('/^[A-z0-9]{8,15}$/', $_POST['password'])){
        message('Գաղտնաբառ պետք է լինի անգելերն տառեր կամ թվեր առանց բացատերի 8-ից 15 սիմվոլ');
    }

}
//register valid
function valid_wallet() {
    if (substr($_POST['wallet'], 0, 1) != 'P' or !is_numeric(substr($_POST['wallet'], 1))){
        message('Դրամապանակը նշված է սխալ');
    }
}
//connect
function db(){
    global $db;
    $db = mysqli_connect(DB_HOST,DB_USER, DB_PASSWORD, DB_NAME );
    if(!$db){
        exit('Սխալ հարցում');
    }
}
//header
function top($title){
    include "html/header.php";
}
//footer
function bottom(){
    include "html/footer.php";
}
//ajax message
function message($text) {
    exit('{"message":"'.$text.'"}');
}
//ajax redirect
function go($url) {
    exit('{"go":"'.$url.'"}');
}

function r2f($num){
    return number_format((float)$num, 2, '.', '');
}
?>