<?php
//in halaman ntuk menandai pesan sudah dibaca,jangan di edit!
if(isset($_GET['cid'])&&isset($_GET["pnp"])){
    include "query.php";
    $cid=$_GET['cid'];
    $pnp=$_GET['pnp']; 
    mysqli_query($config,"update chats set dibaca=1  where dialog='$cid' and pengirim='$pnp' ");
}
?> 