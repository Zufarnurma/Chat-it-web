<?php
//ini halaman back end,jangan diedit! 
    include "query.php";
    $emsal=false;
    $tptl=false;
    if(isset($_POST['user'])){
        $cek=ver($_POST['user'],$_POST['telp'],$_POST['emal']);
        if($cek=="sah"){
            regis($_POST['telp'],$_POST['user'],md5($_POST['password']),$_POST['emal']);
            header("location:index.php");
        } 
        else if($cek==0) {
            echo"<script>alert('$reg $fld, $al $rgr');</script>";
            $emsal=true;
            $tptl=false;
        }
        else if($cek==1) {
        echo"<script>alert('$reg $fld, $tel $rgr');</script>";
            $tptl=true;
            $emsal=false;
        }
        else if($cek==2) 
        echo"<script>alert('$reg $fld, $al $ad $tel $rgr');</script>";
            $emsal=true;$tptl=true;
        }
?>