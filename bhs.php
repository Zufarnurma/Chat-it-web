<!--ini halaman untuk bahasa-->
<?php
 

    if(isset($_COOKIE['bahasa'])) {
        if($_COOKIE['bahasa']=='ing'){
            $bahasa="ing";
        }
        else if($_COOKIE['bahasa']=='ind'){
            $bahasa="ind";
        }
      }
     else $bahasa="ing";
     
     if($bahasa=="ind"){
       $ktdaf="Daftar ke Chat It";
      $orr="atau"; 
      $ktmask="Masuk ke Chat it";
       $infonline="terakhir di lihat ";
       $penjelastgl="hari yang lalu seminggu yang laluhari ini kemarin  ";
       $pwd="Kata sandi";
       $urnam="Nama pengguna";
       $al="Alamat email";
       $tel="Nomer telpon";
       $reg="Daftar";
       $kel="keluar";
       $bak="Sudah punya akun?";
       $lk="lihat";
       $uree="nama/no.telepon";
       $csl="Nama atau kata sandi salah";
       $pnwrn="Belum punya akun?";
       $bA="Buat akun";
       $PL="Kata sandi minimal 8 karakter";
       $rgr="sudah terdaftar";
       $fld="gagal";
       $ad="dan";
       $prm="Ganti profil";
       $pt="Pilih foto";
       $nms="Pesan baru";
       $ep="Edit pesan";
       $hp="Hapus pesan";
       $gr="gambar";
       $mngrm="Mengirim";
       $dwld="Unduh";
       $slnbs="Teks di salin ke pesan!";
       $gpwd="Ubah kata sandi";
       $gmkm="Mode malam";
       $kcl="batal";
       $aym="Ayo mulai mengobrol";
       $dtm="Dengan temanmu!";
     }
     else{            
      $aym="Let`s chat";
      $dtm="With your friend!"; 
       $kcl="cancel";   
       $ktdaf="Sign up to Chat It";      
      $orr="or";
      $ktmask="Sign in to Chat it";
      $infonline="last time seen ";   
      $penjelastgl="day(s) ago     a week ago        today    yesterday";
       $pwd="Password";
       $urnam="Username";
       $al="Email address";
       $tel="Phone number";
       $reg="Sign up";
       $kel="Sign out";
       $bak="Have an account?";
       $lk="look";
       $uree="username/phone";
       $csl="Incorect username or password";
       $pnwrn="Don't have account?";
       $bA="make one";
       $PL="Minimum password length is 8 character";
       $rgr="already registered";
       $fld="failed";
       $ad="and";
       $prm="Change profile";
       $pt="Choose your new photo";
       $nms="New messages";
       $ep="Edit message";
       $hp="Delete message";
       $gr="image";
       $mngrm="Sending";
       $dwld="Download";
       $slnbs="Text copied to message bar!";
       $gpwd="Change password";
       $gmkm="Night mode";
      }
function Pkirim(){
  if(isset($_COOKIE['bahasa'])) {
    if($_COOKIE['bahasa']=='ing'){
      echo 'Send';
    }
    else if($_COOKIE['bahasa']=='ind'){
      echo 'Kirim';
    }
  }
  else echo'Send';
}
function Pbhs(){
    if(isset($_COOKIE['bahasa'])) {
        if($_COOKIE['bahasa']=='ing'){
          echo 'Language:';
        }
        else if($_COOKIE['bahasa']=='ind'){
          echo 'Bahasa:';
        }
      }
      else echo'Language:';
    }   
    if(isset($_GET['bhs'])){
        if($_GET['bhs']=="ind") setcookie("bahasa","ind",strtotime("+6 months"));
        else setcookie("bahasa","ing",strtotime("+6 months"));
        echo"<script>location.href='?';</script>";
    }
?>
<script>
function Cbhs(){
  pBHS=document.getElementById("bah");
  var selBHS=pBHS.value;
  if(selBHS=='ind'){
   location.href="?bhs=ind";
   }
  else if(selBHS=='ing'){ 
   location.href="?bhs=ing";
   }
}
</script>