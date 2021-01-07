<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>login-Chat It</title>
        <link rel="styleSheet" href="layout.css">
        <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    </head>
<body>
<?php  
$ggl=false;
/*bhs.php adalah file sumber untuk semua variabel dan fungsi 
yang berhubungan dengan bahasa*/
include "bhs.php";
/**cekdul.php adalah file untuk mengecek
 * cookie yang berisi id login user. 
 */
include "cekdul.php";
//ini bagian untuk mengecek login
if(isset($_POST['username'])&&isset($_POST['password'])){
    $masuk=login($_POST['username'],md5($_POST['password']));
    if($masuk){
        bisa($masuk);
    }//$ggl untuk menampilkan pesan jika username/password salah
    else $ggl=true;
} 
?>  
<div class="content ">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 d-flex justify-content-center e">
                    <img src="assets/img/image.svg" alt="login chat it" class="d-print-none-block">
                </div>
                <div class="col-sm-6">
                    <h1 class="text"><?php echo $ktmask;?></h1>
                    <form action="" method="post">
                        <div class="form-group input">
                            <label for="username"><?php echo $uree;?></label>
                            <input type="text" class="form-control" name="username" <?php if($ggl)echo "style='border:2px solid red;'"; ?> required>
                        </div>
                        <div class="form-group input">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="username"><div id="warn"><?php if($ggl)echo $csl; ?></div><?php echo $pwd;?></label>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                </div>
                            </div><div id="dispw">
                            <label style="width:92%;"><input type="password" class="form-control" name="password" id="password" <?php if($ggl)echo "style='border:2px solid red;'"; ?> required></label>
                            <img id="liat" src="assets/icon/eye.svg" style onclick="showpw();">
                        </div></div>
                        <button class="input btn button" type="submit" >Log In</button>
                        <a class="kataor"><?php echo $orr;?></a>
                        <button class="input btn button" type="button" onclick="location.href='daftar.php';" ><?php echo $reg;?></button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
    function showpw(){
        var fpw=document.getElementById("password");
        if(fpw.type=="password"){
            fpw.type="text";
            document.getElementById("liat").src="assets/icon/eye-off.svg";
        }
        else if(fpw.type=="text"){
            fpw.type="password";
            document.getElementById("liat").src="assets/icon/eye.svg";
        }
    }
    </script>
</body>
</html>