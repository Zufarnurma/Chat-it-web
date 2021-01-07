<?php
//ini halaman untuk mengirim suara, jangan di edit!
include "bhs.php";
include "query.php";
session_start();
$uid=$_COOKIE['login']; 
$cid=$_POST['tujaudio'];
$namafile=$_FILES['suara']['name'];
$emformat=strlen($namafile)-3;
$drc=$_FILES['suara']['tmp_name']; 
$_SESSION['idcht']=$cid;
if($cid!=""&&$cid!=" "&& $cid>0 && $cid != null){
    $lastaud=mysqli_fetch_array(mysqli_query($config,"select max(id) as lid from chats"));
    $idbaru=1+number_format($lastaud['lid']);
    $format=substr($namafile,$emformat,3);
    $ykirim=$idbaru.$format;
    
    move_uploaded_file($drc,"audio/".$ykirim);
    $k=mysqli_query($config,"update dialog set lastchat=CURRENT_TIMESTAMP where id='$cid'");
    $k2=mysqli_query($config,"INSERT INTO `chats` (`id`, `tgl`, `dialog`, `pengirim`, `pesan`, `dibaca`, `tipe`) VALUES (NULL, CURRENT_TIMESTAMP, '$cid', '$uid', '$ykirim', '0', '2');");
    if($k&&$k2){
    }
    else echo "<script>alert('$mngrm $gr $fld $cid $uid');</script>";
}
header("location:chat.php?");
?>