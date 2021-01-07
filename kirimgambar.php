<?php
//ini halaman untuk mengirim gambar, jangan di edit!
include "bhs.php";
session_start();
include "query.php";
$uid=$_COOKIE['login']; 
$cid=$_POST['cttarget'];
$namafile=$_FILES['gambarnya']['name'];
$drc=$_FILES['gambarnya']['tmp_name'];
$_SESSION['idcht']=$cid; 
if($cid!=""&&$cid!=" "&& $cid>0 && $cid != null){
    $lastimage=mysqli_fetch_array(mysqli_query($config,"select max(id) as lid from chats"));
    $idbaru=1+number_format($lastimage['lid']);
    $ykirim=$idbaru.".png";
    move_uploaded_file($drc,"gambar/".$ykirim);
    $k=mysqli_query($config,"update dialog set lastchat=CURRENT_TIMESTAMP where id='$cid'");
    $k2=mysqli_query($config,"INSERT INTO `chats` (`id`, `tgl`, `dialog`, `pengirim`, `pesan`, `dibaca`, `tipe`) VALUES (NULL, CURRENT_TIMESTAMP, '$cid', '$uid', '$ykirim', '0', '1');");
    if($k&&$k2){
    }
    else echo "<script>alert('$mngrm $gr $fld $cid $uid');</script>";
}
header("location:chat.php?");
?>