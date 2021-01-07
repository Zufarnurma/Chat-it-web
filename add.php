<?php 
/*ini halaman untuk memilih dialog, boleh diedit,
 * tapi jangan merubah query dan cara kerja nya!
 * (if else dan variabel nya)
 */
    include"query.php";
    if( isset($_GET['uid']) && isset($_GET['tgt']) ){
        if($_GET['tgt']!=""){
            $tgt=$_GET['tgt'];
            $id=$_GET['uid'];
            $ambil=mysqli_query($config,"select * from account where username like '%$tgt%' or telpon like '%$tgt%' ");
            while($row=mysqli_fetch_array($ambil)){
                if($row['id']==$id) {}
                else {
                    $cek=mysqli_query($config,"select * from dialog where sub1='$row[id]' and sub2='$id' or sub1='$id' and sub2='$row[id]' ");
                    $ceks=mysqli_num_rows($cek);
                    
                    if($ceks==0)echo "<div id='DN' onclick='tdialog(".$row['id'].",".$id.");' >".$row['username']."<br>".$row['telpon']."</div>";
                    else {
                        $tak=mysqli_fetch_array($cek);
                        echo" <div id='DE' onclick='upduu(".$tak['id'].",".$row['id'].");' >".$row['username']."<br>".$row['telpon']."</div>";
                    }   
                }
            }
        }
    }
    if(isset($_GET['idul']) && isset($_GET['tar'])){
        $idul=$_GET['idul'];
        $tar=$_GET['tar'];
        mysqli_query($config,"insert into dialog(sub1,sub2) value($idul,$tar)");
    }
?> 