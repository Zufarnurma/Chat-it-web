<?php 
$config=mysqli_connect("localhost","root","","teschat");
//bisa() dipakai untuk menyimpan cookie login ke user
function bisa($isi){
    setcookie("login",$isi,strtotime("+6 months"));
    header("location:chat.php");
}
//check() dipakai untuk mengecek id di halaman chat
function check(){
    $config=mysqli_connect("localhost","root","","teschat");
    if(isset($_COOKIE['login'])){
        $testing=mysqli_query($config,"select * from account where id='$_COOKIE[login]'");
        $Rw=mysqli_num_rows($testing);
        if($Rw>0){
        $ka=mysqli_fetch_array($testing);
        $hals=$ka['username']."<br>".$ka['telpon'];
        return $hals;
        }
        else header("location:index.php");
    }
    else header("location:index.php");
}
//login() dipakai untuk login
function login($name,$pass){
    $config=mysqli_connect("localhost","root","","teschat");
    //ini tes username nya ada atau engga
    $ceknama=mysqli_query($config,"select id from account where username='$name'");
    $cektelp=mysqli_query($config,"select id from account where telpon='$name'");
    $namabenar=mysqli_num_rows($ceknama);
    $telpbenar=mysqli_num_rows($cektelp);
    
    if($namabenar>0){
        $temp=mysqli_fetch_assoc($ceknama);
        $id=$temp['id'];
        $cekpass=mysqli_query($config,"select * from passbank where password='$pass' and id='$id'");
        $cek=mysqli_num_rows($cekpass);

        if($cek>0) {
            $idd=$id;
            $bukti=$idd;
        }
        else $bukti=false;
    }
    else if($telpbenar>0){
        $idt=mysqli_fetch_assoc($cektelp);
        $id2=$idt['id'];
        $cekpass2=mysqli_query($config,"select * from passbank where password='$pass' and id='$id2'");
        $cek2=mysqli_num_rows($cekpass2);
        if($cek2>0){
            $idd=$id2;
            $bukti=$idd;
        }
        else $bukti=false;
    }
    else $bukti=false;
    
    return $bukti;
}
//keluar() dipakai untuk log out
    function keluar(){
        if(isset($_COOKIE['login'])){
            setcookie("login",false,strtotime("+6 months"));
            header("location:index.php");
        }
    }
    function Ause($butuh){
        $config=mysqli_connect("localhost","root","","teschat");
        $testing=mysqli_query($config,"select * from account where id='$butuh'");
        $Rw=mysqli_num_rows($testing);
        if($Rw>0){
        $ka=mysqli_fetch_array($testing);
        return $ka['username'];
        }
    }
/*cid dipakai untuk mengecek username sudah pernah login atau belum*/
    function cid($bukti){
        if($bukti){
            $config=mysqli_connect("localhost","root","","teschat");
            $testing=mysqli_query($config,"select * from account where id='$bukti'");
            if(mysqli_num_rows($testing)>0){
            $ini=true;
            }
        }
        else $ini=false;

        return $ini;
    } 
    /* ver untuk mengecek username dan nomer telpon yang di daftarkan.
     apa bila belum terdaftar,maka pendaftaran sah*/
    function ver($name,$telp,$email){
        $config=mysqli_connect("localhost","root","","teschat");
        
        $cek2=mysqli_num_rows(mysqli_query($config,"select * from account where telpon='$telp'"));
        $cek3=mysqli_num_rows(mysqli_query($config,"select * from account where email='$email'"));
        if($cek3>0 && $cek2>0 ) $verivy=2;
        else if($cek2>0) $verivy=1;
        else if(cek3>0)  $verivy=0;
        else $verivy="sah";
        return $verivy;
    }
    /*regis dipakai untuk memasukan akun baru ke database*/
     function regis($telp,$user,$pass,$email){
        $config=mysqli_connect("localhost","root","","teschat");
        mysqli_query($config,"insert into account(username,telpon,email) value('$user','$telp','$email')");
        $ambil=mysqli_query($config,"select * from account where username='$user'");
        $isi=mysqli_fetch_array($ambil);
        $id=$isi['id'];
        mysqli_query($config,"insert into passbank(id,password) value('$id','$pass')");
    }
    function profil(){
        $bukti=$_COOKIE['login'];
        $config=mysqli_connect("localhost","root","","teschat");
        $testing=mysqli_query($config,"select * from account where id='$bukti'");
        $foto=mysqli_fetch_array($testing); 
        if($foto['profil']!=""||$foto['profil']!="") $gag='<img width=48px height=48px src="data:image/jpeg;base64,'.base64_encode($foto['profil']).'" /></br></br>';
        else $gag='<img width=48px height=48px src="noprofil.png" /></br></br>';
        return $gag;
    }
    function Bprofil(){
        $bukti=$_COOKIE['login'];
        $config=mysqli_connect("localhost","root","","teschat");
        $testing=mysqli_query($config,"select * from account where id='$bukti'");
        $foto=mysqli_fetch_array($testing);
        if($foto['profil']!=""||$foto['profil']!="") $gag='<img width=120px height=120px style="border:black solid 1px;" src="data:image/jpeg;base64,'.base64_encode($foto['profil']).'" /></br></br>';
        else $gag='<img width=120px height=120px style="border:black solid 1px;" src="noprofil.png" /></br></br>';
        return $gag;
    }
    function Lprofil($bukti){ 
        $config=mysqli_connect("localhost","root","","teschat");
        $testing=mysqli_query($config,"select * from account where id='$bukti'");
        $foto=mysqli_fetch_array($testing);
        if($foto['profil']!=null or $foto['profil']!="") $gag='<img width=48px height=48px style="border:black solid 1px;" src="data:image/jpeg;base64,'.base64_encode($foto['profil']).'" >';
        else $gag="<img width=48px height=48px style='border:black solid 1px;' src='noprofil.png'>";
        return $gag;
    }
?>