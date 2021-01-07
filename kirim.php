<?php
/*ini halaman untuk mengirim pesan lewat query,
termasuk mengedit pesan dan menghapus pesan
Jangan di edit!
*/
include 'query.php';
if(isset($_GET['psn']) && isset($_GET['Dial']) && isset($_GET['uid'])){
    $psn=$_GET['psn'];
    $dial=$_GET['Dial'];
    $uid=$_GET['uid']; 
    if($psn != "" && $dial != ""){
    mysqli_query($config,"insert into chats(tgl,dialog,pengirim,pesan,dibaca) value(CURRENT_TIMESTAMP,$dial,$uid,'$psn',0)");
    mysqli_query($config,"update dialog set lastchat=CURRENT_TIMESTAMP where id='$dial'");
    }
}
if(isset($_GET['edit']) && isset($_GET['kata'])){
    $id=$_GET['edit'];
    $kata=$_GET['kata'];
    if($kata==""||$kata==" "){
        $cekjns=mysqli_query($config,"select * from chats where id='$id'");
        $hasil=mysqli_fetch_array($cekjns);
        if($hasil['tipe']==3) unlink("dokumen/".$hasil['pesan']);
        else if($hasil['tipe']==2) unlink("audio/".$hasil['pesan']);
        else if($hasil['tipe']==1) unlink("gambar/".$hasil['pesan']);
        else {

        }

        mysqli_query($config,"delete from chats where id='$id'");
    }
    else {
        mysqli_query($config,"update chats set pesan='$kata' where id='$id'");
    }
}
if(isset($_GET['emote'])&& isset($_GET['chid']) && isset($_GET['usid']) ){
    $emot=$_GET['emote'];
    $cid=$_GET['chid'];
    $uid=$_GET['usid'];
    if($cid!=null && $cid !=0 && $cid !="" &&$cid !=" "){
        mysqli_query($config,"insert into chats(tgl,dialog,pengirim,pesan,tipe) value(CURRENT_TIMESTAMP,$cid,$uid,'$emot',4)");
        mysqli_query($config,"update dialog set lastchat=CURRENT_TIMESTAMP where id='$cid'");

    }
}
?>