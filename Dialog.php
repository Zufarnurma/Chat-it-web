<br><br><br><br><br><br><br><br>

<?php
/*ini halaman untuk memilih dialog(yang di sebelah kanan)
boleh di edit buat merapikan
*/ 
include "query.php";
include "bhs.php";
if(isset($_GET['cid'])&&isset($_GET['uid'])){
    $uid=$_GET['uid'];
    $cid=$_GET['cid']; 
    $wkt_online=mysqli_fetch_array(mysqli_query($config,"select * from account where id='$uid'"));
    $ambil=mysqli_query($config,"select * from dialog where sub2='$uid' or sub1='$uid' order by lastchat DESC");
    while($row=mysqli_fetch_array($ambil)){
        if($row['sub1']==$uid) {
            $nih=$row['sub2']; 
        }
        else {
            $nih=$row['sub1'];  
        }
        $cekuser=mysqli_fetch_array(mysqli_query($config,"select * from account where id='$nih'")); 
        $cekonline=$cekuser['online'];  
        $gil=substr($cekonline,0,10);
        $wkt=substr($cekonline,11,5);
        $hari=substr($cekonline,8,2); 
        $bulan=substr($cekonline,5,2);
        $thn=substr($cekonline,2,2);  
        $tim="(".$wkt.")";
         
        if($wkt==substr($wkt_online['online'],11,5)) $psmasuk="<font color='green'>online</font>";
        else if($hari != date("d") || $bulan!=date("m")||$thn!=date("y")){ 
            
            
            if($bulan+1==date("m")&&$thn==date("y")||$bulan==12&&date("m")==1&& $thn+1==date("y")){
                
                if($bulan==2&&$thn%4>0) $limter=28;
                else if($bulan==2) $limter=29;
                else if($bulan<=7&&$bulan%2>0||$bulan>7&&$bulan%2==0) $limter=31;
                else $limter=30;
                $jauh=($limter-$hari)+date("d");
                
                if($jauh==1) $psmasuk= $infonline.substr($penjelastgl,42,9).$tim; 
                else if($jauh<=6) $psmasuk= $infonline.$jauh." ".substr($penjelastgl,0,14).$tim;
                else if($jauh==7) $psmasuk= $infonline.substr($penjelastgl,15,18).$tim;
                else $psmasuk=$infonline.$gil.$tim;
            }
            else if(date("y")==$thn && $bulan==date("m")){
               $jauh=date("d")-$hari;
                if($jauh==1) $psmasuk= $infonline.substr($penjelastgl,42,9).$tim; 
                else if($jauh==7) $psmasuk= $infonline.substr($penjelastgl,15,18).$tim;
                else if(date("d")-$hari<7)$psmasuk= $infonline.$jauh." ".substr($penjelastgl,0,14).$tim;
                else $psmasuk=$infonline.$gil.$tim;
            }
            else $psmasuk=$infonline.$gil.$tim; 
        }
        else if($hari==date("d")&&$bulan==date("m")&&$thn==date("y")){ 
            $psmasuk= $infonline.substr($penjelastgl,33,8).$tim;  
        }
        if($row['id']==$cid) echo "<div  class='Dlist'  onclick='upduu(".$row['id'].",".$nih.");'><p>".Lprofil($nih).Ause($nih)."</p><font size='1.56px'>".$psmasuk."</font><p></p><font size=1px>".$row['lastchat']."</font></div><br>";
        else echo "<div class='Plist' onclick='upduu(".$row['id'].",".$nih.");'><p>".Lprofil($nih).Ause($nih)."</p><font size='1.56px'>".$psmasuk."</font><p></p><font size=1px>".$row['lastchat']."</font></div><br>";
    }

} 


?>