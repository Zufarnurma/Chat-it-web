<br>
<br> 
<?php
/*halaman ini adalah halaman untuk mengambil chat dari database
boleh ganti desain nya aja*/
include "query.php";
include "bhs.php";  
$cekha=mysqli_fetch_array(mysqli_query($config,"select * from account where id='$_GET[uid]'"));
$ambiltanggal=$cekha['online'];
$hariini=substr($ambiltanggal,8,2); 

if(isset($_GET['cid'])&&isset($_GET["uid"])){
    $cid=$_GET['cid'];
    $uid=$_GET["uid"];   //DESC dalam sql artinya mengurutkan dari terbesar ke terkecil
    $liat=mysqli_query($config,"select * from chats where dialog='$cid' order by tgl DESC");
    mysqli_query($config,"update account set online=CURRENT_TIMESTAMP where id='$uid'");
    $tag=true;
    $dari=false;
    while($row=mysqli_fetch_array($liat)){ 
        $id=$row['id'];  
        $tang=$row['tgl'];
        $gil=substr($tang,0,10);
        $wkt=substr($tang,11,5);
        $hari=substr($tang,8,2); 
        $bulan=substr($tang,5,2);
        $thn=substr($tang,2,2); 
 if($hari!=$hariini){
            $psmasuk=$hari."-".$bulan."-".$thn;
            if($bulan+1==date("m")&&$thn==date("y")||$bulan==12&&date("m")==1&& $thn+1==date("y")){
 
                if($bulan==2&&$thn%4>0) $limter=28;
                else if($bulan==2) $limter=29;
                else if($bulan<=7&&$bulan%2>0||$bulan>7&&$bulan%2==0) $limter=31;
                else $limter=30;
                $jauh=($limter-$hari)+date("d");
                
                if($jauh==1) $psmasuk= substr($penjelastgl,42,9); 
                else if($jauh<=6) $psmasuk= $jauh." ".substr($penjelastgl,0,14);
                else if($jauh==7) $psmasuk= substr($penjelastgl,15,18);
            }
            else if(date("y")==$thn && $bulan==date("m")){
               $jauh=date("d")-$hari;
                if($jauh==1) $psmasuk= substr($penjelastgl,42,9);
                else if($jauh==7) $psmasuk= substr($penjelastgl,15,18);
                else if($jauh<=6) $psmasuk= $jauh." ".substr($penjelastgl,0,14);
                else if(date("d")-$hari<7)$psmasuk= $gil;
            }
            else if(date("m")!=$bulan &&date("y")!=$thn){ $psmasuk=$gil;}
            
            
        }
        else if($hari==$hariini) $psmasuk=substr($penjelastgl,33,9);
        if(isset($sesiwaktu)){
            if( $gil!=$sesiwaktu) echo "<H5 id='baru'>".$psmasuk."</H5>";}
            else echo "<H5 id='baru'>".$psmasuk."</H5>";
            $sesiwaktu=$gil;
        if($row['tipe']==0){
        if($row["pengirim"]!=$uid){
         echo "<div id='Ckiri' onclick='salin(".$row['id'].");'><p>".$row["pesan"]."</p><font size=2px>".$wkt."</font></div><br><input type='text' id='".$row['id']."' style='display:none;' value='".$row['pesan']."' readonly>";
            if($row['dibaca']==0) $dari=true;
        }
        else{
            if($row['dibaca']==1) echo "<div id='Ckanan'><p>".$row["pesan"]."</p><font size=2px>".$wkt.
            "</font><img src='assets/icon/icontitik3.svg'  onclick='mulaiedit(".$id.");'><img src='assets/icon/check.svg' height=20px width=20px></div><br><input type='text' id='".$row['id']."' style='display:none;' value='".$row['pesan']."' readonly>";
            
            
            else echo "<div id='Ckanan'><p>".$row["pesan"]."</p><font size=2px>".$wkt.
            "</font><img src='assets/icon/icontitik3.svg'  onclick='mulaiedit(".$id.");'></div><br><input type='text' id='".$row['id']."' style='display:none;' value='".$row['pesan']."' readonly>";
        }
        if($tag==true && $dari==true){
            $tag=false;//id baru = pesan belum dibaca
            echo "<div id='baru'>".$nms."</div>";
        }
    }
    else if($row['tipe']==1){
        
        if($row["pengirim"]!=$uid){
            echo "<div id='Ckiri' style='height:140px; width:190px;'><img onclick='startview(this.src);' style='border:white solid 1px;' width=180px src='gambar/".$row["pesan"]."' height='120px'><br><font size=2px>".$wkt.
               "<a href='gambar/".$row['pesan']."' download='".$row['pesan']."'>".$dwld."</a></font></div><br>";           }
           else{
               if($row['dibaca']==1)echo "<div id='Ckanan' style='height:140px; width:220px;'><img onclick='startview(this.src);'style='border:white solid 1px;' width=180px src='gambar/".$row["pesan"]."' height='120px'><br><font size=2px>".$wkt.
               "<a href='gambar/".$row['pesan']."' download='".$row['pesan']."'>".$dwld."</a></font><img src='assets/icon/check.svg' height=20px width=20px><img height=30px width=25px src='assets/icon/icontitik3.svg'  onclick='yahapus(".$id.");'></div><br>";
               
               
               else echo "<div id='Ckanan' style='height:140px; width:220px;'><img onclick='startview(this.src);' style='border:white solid 1px;' width=180px src='gambar/".$row["pesan"]."' height='120px'><br><font size=2px>".$wkt.
               "<a href='gambar/".$row['pesan']."' download='".$row['pesan']."'>".$dwld."</a></font><img height=30px width=25px src='assets/icon/icontitik3.svg'  onclick='yahapus(".$id.");'></div><br>";
    }
    }
    else if($row['tipe']==2){
        
        if($row["pengirim"]!=$uid){
            echo "<div id='Ckiri'><br><audio style='border:white solid 1px;' src='audio/".$row["pesan"]."' controls onmouseover='jaga=false;' onmouseout='jaga=true;' ></audio><br><br><font size=2px>".$wkt.
               "<a href='audio/".$row['pesan']."' download='".$row['pesan']."'>".$dwld."</a></font></div><br>";           
            }
           else{
               if($row['dibaca']==1)echo "<div id='Ckanan'><br><audio style='border:white solid 1px;' src='audio/".$row["pesan"]."' controls onmouseover='jaga=false;' onmouseout='jaga=true;'>audio error</audio><br><br><font size=2px>".$wkt.
               "<a href='audio/".$row['pesan']."' download='".$row['pesan']."'>".$dwld."</a></font><img height=30px width=25px src='assets/icon/icontitik3.svg'  onclick='yahapus(".$id.");'><img src='assets/icon/check.svg' height=20px width=20px></div><br>";
               
               
               else echo "<div id='Ckanan'><br><audio style='border:white solid 1px;' src='audio/".$row["pesan"]."' controls onmouseover='jaga=false;' onmouseout='jaga=true;' >audio error</audio><br><br><font size=2px>".$wkt.
               "<a href='audio/".$row['pesan']."' download='".$row['pesan']."'>".$dwld."</a></font><img height=30px width=25px src='assets/icon/icontitik3.svg'  onclick='yahapus(".$id.");'></div><br>";
    }
    }
    else if($row['tipe']==3){
        
        if($row["pengirim"]!=$uid){
            echo "<div id='Ckiri'><br><a href='dokumen/".$row['pesan']."' download='".$row['pesan']."'>".$row['pesan']."</a><br><br><font size=2px>".$wkt.
               "<a href='dokumen/".$row['pesan']."' download='".$row['pesan']."'>".$dwld."</a></font></div><br>";           
            }
           else{
               if($row['dibaca']==1)echo "<div id='Ckanan'><br><a href='dokumen/".$row['pesan']."' download='".$row['pesan']."'>".$row['pesan']."</a><br><br><font size=2px>".$wkt.
               "<a href='dokumen/".$row['pesan']."' download='".$row['pesan']."'>".$dwld."</a><br></font><img src='assets/icon/check.svg' height=20px width=20px><img height=30px width=25px src='assets/icon/icontitik3.svg'  onclick='yahapus(".$id.");'></div><br>";
               
               
               else echo "<div id='Ckanan'><br><a href='dokumen/".$row['pesan']."' download='".$row['pesan']."'>".$row['pesan']."</a><br><br><br><font size=2px>".$wkt.
               "<a href='dokumen/".$row['pesan']."' download='".$row['pesan']."'>".$dwld."</a></font><img height=30px width=25px src='assets/icon/icontitik3.svg'  onclick='yahapus(".$id.");'></div><br>";
    }
    }
    else if($row['tipe']==4){
        
        if($row["pengirim"]!=$uid){
            echo "<div id='Ckiri' style='height:140px; width:140px;'><img width=120px src='emote/".$row["pesan"]."' height='120px'><br><font size=2px>".$wkt.
            "</font></div><br>";
        }
            else{
               if($row['dibaca']==1)echo "<div id='Ckanan' style='height:140px; width:190px;'><img width=140px src='emote/".$row["pesan"]."' height='140px'><br><font size=2px>".$wkt.
               "</font><img height=30px width=25px src='assets/icon/icontitik3.svg'  onclick='yahapus(".$id.");'><img src='assets/icon/check.svg' height=20px width=20px></div><br>";
               
               
               else echo "<div id='Ckanan' style='height:140px; width:140px;'><img width=120px src='emote/".$row["pesan"]."' height='120px'><br><font size=2px>".$wkt.
               "</font><img height=30px width=25px src='assets/icon/icontitik3.svg'  onclick='yahapus(".$id.");'></div><br>";
    }
    } 
}
} 
if($cid==" "){
      echo '<img src="./assets/img/big.svg" height:500px; style="">'.
         ' <h1 class="text-center text-content">'.$aym.'</h1>'.
          '<h3 class="text-center">'.$dtm.'</h3>';
}
?>