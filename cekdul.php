<?php 
//ini halaman back end,jangan di edit!
include 'query.php'; 
if(isset($_COOKIE["login"])){
    $verify=cid($_COOKIE['login']);
if($verify){ 
    echo "<script>location.href='chat.php';</script>";
    }
}
?>
