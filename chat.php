<!--ini halaman untuk melakukan chat (halaman setelah login)-->
<!--boleh diubah desain nya-->
<html>
<head>
    <?php
    session_start();
    //query.php adalah file sumber untuk semua fungsi yang memakai query
    include 'query.php';
    /*bhs.php adalah file sumber untuk semua variabel dan fungsi 
    yang berhubungan dengan bahasa*/
    include 'bhs.php';
    
    ?>
<title>chat it</title>
<link rel="styleSheet" type="text/css" href="layout.css">

</head>
<body> 
<!--dua input dibawah ini dipakai sebagai parameter javascript, jangan di ubah!-->
<input type="text" id="idu" value="<?php echo $_COOKIE['login'] ?>" readonly>
<input type="text" id="chaid" value=" <?php if(isset($_SESSION['idcht'])){echo $_SESSION['idcht']; session_destroy();}?>" readonly> 
 <!--script src ambil.js adalah tag untuk memanggil file ambil.js-->
 <!--jangan dihapus, dan biarkan kosong!-->
<script src="ambil.js">
</script>
<br><br>

<!--id isi adalah bagian untuk menampilkan chat dari ambilchat.php-->
<!--jangan di hapus, dan biarkan kosong!-->
<div id="isi" onclick="stopimage(); stopdoc(); tptgtk(); stopaudio();">
    <?php
           echo '<img src="./assets/img/big.svg" height:500px; style="">'.
           ' <h1 class="text-center text-content">'.$aym.'</h1>'.
            '<h3 class="text-center">'.$dtm.'</h3>';
    ?>
</div>
<!--id chosechat adalah tempat web dialog.php di tampilkan!-->
<!--biarkan kosong!,dan jangan dihapus!-->
<div id="chosechat" onclick="stopimage(); stopdoc(); tptgtk(); stopaudio();">
 </div>
 <div class="hider" onclick="bukachat();"> 
     <br><br><br><br><br><br>c<br>h<br>a<br>t<br>s<br>
</div>
<div id="tmpupdu">
</div>

<!--class tambD dipakai untuk desain tambahkan chat-->
<div class="tambD" onmouseover="stopimage(); stopdoc(); tptgtk(); stopaudio();">
    <div id="daftarada"></div>
<input type="text" onfocus="setInterval(() => { cariDialog(this.value); }, 1000);" placeholder="<?php echo $urnam."/".$tel; ?>" id="TbhDlg">
<img src="assets/icon/search.svg" style="position:absolute; right:0%; top:10%;">
</div>


<!--menu adalah bar menu di atas-->
<div id="menu" onclick="stopimage(); stopdoc(); tptgtk(); stopaudio();"> 
<!--gamm adalah bagian yang menunjukan profil pengguna-->
<div class="gamm" onclick="stopimage(); stopdoc(); tptgtk(); stopaudio();">

</div>
 <?php echo profil();?>
<div id="tag">
<?php echo Check(); ?></div>
</div>    

<img class="tripledot" src="assets/icon/icontitik3.svg" height=40px onclick="tgtk();">
<div id="tripledot" display="none">
    <div id="piltpd">
    <a onclick="location.href='logout.php';"><?php echo $kel;?></a>
    </div>
    <div id="piltpd" onclick="gantimode();malam();">
        <?php echo $gmkm;?><input id="cekmalam" type="checkBox">
    </div> 
    <div id=piltpd onclick="ganpr();">
        <a onclick="ganpr();"><?php echo $prm;?></a><br>
    </div>
</div>


<!--div id chatplace dipakai untuk bagian mengetik pesan-->
<div id="chatplace" onclick="stopimage(); stopdoc(); tptgtk(); stopaudio();">
<input type="text" id="wrd" value="">
<button type="button" id="ceker" onclick="mengirim();">
<img src="assets/img/Vector.svg"></button>
 </div>

 
<!--cadangstyle adalah tempat buat merubah mode
 ke mode malam dengan javascript, biarkan kosong! -->
<div id="cadangstyle">

</div>

<!--kirimaudio untuk mengitim audio-->
<div id="kirimaudio">
<form action="kirimaudio.php" enctype="multipart/form-data" method="post">
<input type="text" name="tujaudio" id="tujaudio" style="display:none;">
<input type="file" name="suara" accept="audio/*" capture="microphone"><br>
<input type="submit" value="<?php echo Pkirim(); ?>">
</form>
<img src="assets/img/mic.svg" height=60px width=40px>
</div>


<!--kirimgambar adalah bagian mengirim gambar-->
<div id="kirimgambar">
<form action="kirimgambar.php" enctype="multipart/form-data" method="post">
<input type="text" name="cttarget" id="cttarget" style="display:none;">
<input type="file" name="gambarnya" accept="image/*"><br>
<input type="submit" value="<?php echo Pkirim(); ?>">
</form>
<img src="assets/img/pict.svg" height=60px width=40px>
</div>
<!--kirimdokumen adalah bagian mengirim file dokumen-->
<div id="kirimdoc">
<form action="kirimfile.php" enctype="multipart/form-data" method="post">
<input type="text" name="tujuanfile" id="tujuanfile" style="display:none;">
<input type="file" name="dokumen"><br>
<input type="submit" value="<?php echo Pkirim(); ?>">
</form>
<img src="assets/img/paperclip.svg" height=60px width=40px>
</div>

 <!--class tambahfile dipakai untuk logo attachment-->
  <div id="tambahfile" class="tambahfile" >
<img height=30px onclick="senddoc();"width=30px src="assets/img/paperclip.svg">
<img height=30px onclick="sendaudio();"width=30px src="assets/img/mic.svg">
<img height=30px onclick="sendimage();" width=30px src="assets/img/pict.svg">
</div>

<?php 
include 'emote.php';
?>
<img src="assets/img/chat logo.svg" class="logo">
<!--liat dipakai untuk memunculkan gambar ke layar penuh-->
<div id="liat"><div id="vimage" onclick="viewdone();">
</div>
<img id="liatgambar" src="gambar/54.png">
<img height=20px width=20px src="xbutton.png" style="background-color:white; position:absolute; top:5%; right:2%; " onclick="viewdone();">
</div>

<div id="pac" onclick="tup();bataledit();bathp();">
<img height=20px width=20px src="xbutton.png" style="background-color:white; position:absolute; top:5%; right:2%; " onclick="tup();bataledit();bathp();">
</div>

<div id="konfirhps" style="display:none;">
<input type="text" id="tgtnnya" style="display:none;">
<br><br>
<label><?php echo$hp;?>?</label><br>
<input type="button" style="background-color:red; color:white;" onclick="hapus();bathp();" value="<?php echo $hp;?>">
<input type="button" value="<?php echo $kcl;?>" onclick="bathp();">
<img src='Xbutton.png' height=20px onclick="bathp();"></div>
</div>
<!--class editR dipakai untuk dialog edit pesan-->
<div id="editor" class="editR" style="display:none;" onclick="stopimage(); stopdoc(); tptgtk(); stopaudio();"><?php echo $ep; ?>
<br><br><input type="text" id="idchat" style="display:none;" readonly></br><input type="text" id='editan'>
<input type="button" onclick="kirimedit();" value="<?php Pkirim();?>">
<hr width=100% height=2px>
<input type="button" style="background-color:red; color:white;" onclick="hapuspesan();" value="<?php echo $hp;?>">
<img src='Xbutton.png' height=20px onclick="bataledit();"></div>



<!--ganprofil adalah id yang dipakai untuk menu ganti profil-->
<div id="ganprofil" style="display:none;" onclick="stopimage(); stopdoc(); tptgtk(); stopaudio();"> 
    <form enctype="multipart/form-data" action="gprofil.php" method="post">
    <?php echo $prm."<br>".Bprofil().$urnam.':'; ?><br>
    <input type="text" name="nama" value="<?php echo Ause($_COOKIE['login']); ?>"></br>
    <?php echo $gpwd;?><input onclick="cekpw();" type="checkBox" name="pwjuga" value="ada"><br>
    <input type="text" name="pwdbr" id="pwdbr"><br>
    <?php echo $pt; ?><input type="checkBox" name="gambarjuga" value="ada"></br>
    <input type="file" accept="image/*" onchange="" name="Pbaru" id="Pbaru"></br>
    <input type="submit" id="cgprofil" onclick="ralat();" value="<?php echo $prm; ?>"> 
    <br><input type="button" value="<?php echo$kcl;?>" onclick="tup();">
    <img src="Xbutton.png" height="32px" onclick="tup();">
    <hr width="100%">
<?php //Pbhs() adalah fungsi untuk memilih bahasa dari bhs.php
//semua fungsi dan variabel yang berhubungan dengan bahasa ada di bhs.php
 Pbhs();
 ?> 
<select id="bah" onchange="Cbhs();">
<option value="ing" <?php if($bahasa=="eng") echo "selected";?>>english</option>
<option value="ind" <?php if($bahasa=="ind") echo "selected";?>>indonesia</option>
</select>
</form>

</div>
<script>
    viewdone();
    stopimage(); stopdoc(); tptgtk();
    stopaudio();
    function bisal(){
        alert('<?php echo $slnbs;?>');
    }
    function invalidnih(){
        alert('<?php echo $PL;?>');
    }
</script>
</body>
</html>