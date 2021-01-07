<?php
//ini halaman untuk mengganti profil, jangan di edit!
include "bahasa.php";
include "query.php";
$uid=$_COOKIE['login'];
$nama=$_POST['nama'];
$drc=$_FILES['Pbaru']['tmp_name'];
$gbr = addslashes(file_get_contents($drc)); 
if(isset($_POST['gambarjuga'])){
$k=mysqli_query($config,"update account set profil='$gbr' where id='$uid' ");
$k2=mysqli_query($config,"update account set username='$nama' where account.id='$uid' ");
}
else{
    $k2=mysqli_query($config,"update account set username='$nama' where account.id='$uid' ");   
}
if(isset($_POST['pwjuga'])){
    $pwbaru=md5($_POST['pwdbr']);
    $k3=mysqli_query($config,"update passbank set password='$pwbaru' where id='$uid' ");
}
if($k&$k2){
}
else echo "<script>alert('$prm $fld');</script>";
header("location:chat.php?");
?>