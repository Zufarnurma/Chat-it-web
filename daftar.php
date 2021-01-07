<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="styleSheet" href="layout.css">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <title>daftar-Chat it</title>
</head>
<?php 
    include "bhs.php";
    include "cekDaftar.php"; ?>
<body>
    <?php Pbhs(); ?><select id="bah" onchange="Cbhs();">
<option value="ing" <?php if($bahasa=="eng") echo "selected";?>>english</option>
<option value="ind" <?php if($bahasa=="ind") echo "selected";?>>indonesia</option>
</select>
<div class="content ">
    <div class="container">
    <div class="row">
    <div class="col-sm-6 d-flex justify-content-center e">
    <img src="assets/img/image.svg" alt="login chart it" class="d-print-none-block">
    </div>
    <div class="col-sm-6">
    <h1 class="text"><?php echo $ktdaf;?></h1>
    <form action="" method="post">
    <div class="form-group input">
    <label for="user"><?php echo $urnam;?></label>
    <input type="text" class="form-control" name="user" required>
    </div>
    <div class="form-group input">
    <div class="row">
    <div class="col-4">
    <label for="user"><div id="warn"></div><?php echo $pwd;?></label>
    </div>
    <div class="col-6 d-flex justify-content-end">
    </div>
    </div><div id="dispw">
    <label style="width:92%;"><input type="password" class="form-control" name="password" id="password" <?php if(isset($ggl))echo "style='border:2px solid red;'"; ?> required></label>
    <img id="liat" src="assets/icon/eye.svg" style="posistion:fixed; top:0%; right:0%;" onclick="showpw();">
    </div>
    </div>
    <div class="form-group input">
    <label for="telp"><?php echo $tel;?></label><br>
    <input type="text" name="telp" class="form-control" <?php if($tptl==true)echo "style='border:2px solid red;'";?> required>
    </div>
    <div class="form-group input">
    <label for="emal"><?php echo $al;?></label><br>
    <input type="email" name="emal" class="form-control" <?php if($emsal==true)echo "style='border:2px solid red;'";?> required>
    </div>
    <button class="input btn button" id="krim" onclick="klik=1;" type="submit" ><?php echo $reg;?></button>
    <a class="kataor"><?php echo $orr;?></a>
    <button class="input btn button" type="button" onclick="location.href='index.php';" >Log in</button>
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
    
    var klik=0;
    setInterval(() => {
            var pjg=document.getElementById("password").value;
            var cek=pjg.length;
            var kiir=document.getElementById("krim");
            if(cek>=8) kiir.type="submit";
            else kiir.type="button";
        if(klik==1){
            if(cek<8) alert('<?php echo $PL; ?>');
            klik=0;
        }
    }, 10);  

    </script>
    </body>
</html>