/*ini adalah file kode untuk full back end!
jangan di ubah, karna bisa ngerusak fungsi sistem nya!
*/
isi = document.getElementById("idu");
ddid = document.getElementById("chaid");
ddid.style.display = "none";
isi.style.display = "none";
var cid = ddid.value;
updial();
setInterval(() => {
    if (jaga == true) {
        update();
        updial();
        tandibaca();
    }
}, 5000);
var minChat;
var minDial;
var cah;
var minteserr;
var dibaru;
var tadib;
var jaga = true;
var lipw = false;
var mlm = false;

function cekpw() {
    if (lipw == false) {
        lipw = true;
    } else {
        lipw = false;
    }
}
setInterval(() => {
    if (lipw == false || lipw == true && document.getElementById("pwdbr").value.length >= 8)
        document.getElementById("cgprofil").type = "submit";
    else
        document.getElementById("cgprofil").type = "button";
}, 1000);

function tgtk() {
    tigtik = document.getElementById("tripledot");
    tigtik.style.display = "block";

}

function tptgtk() {
    document.getElementById("tripledot").style.display = "none";
}

function ralat() {
    if (lipw == false || lipw == true && document.getElementById("pwdbr").value.length >= 8) {

    } else invalidnih();
}

function gantimode() {
    if (mlm == false) mlm = true;
    else mlm = false;
}

function malam() {
    if (mlm == true) {
        document.getElementById("cadangstyle").innerHTML = "<style>body{ background-color: black; filter:invert(100%);} img[src='assets/icon/search.svg']{filter:invert(0%);} img[src='assets/icon/search.svg']{} img{filter:invert(200%);} img[src='Xbutton.png']{filter:invert(0%);} img[src='assets/icon/icontitik3.svg']{filter:invert(0%);}img[src='assets/img/smile.svg']{filter:invert(0%);} img[src='assets/img/Vector.svg']{filter:invert(0%);} img[src='assets/icon/check.svg']{filter:invert(0%);}img[src='assets/img/paperclip.svg']{filter:invert(0%)}</style> ";
        document.getElementById("cekmalam").checked = true;
    } else {
        document.getElementById("cadangstyle").innerHTML = "<style>body{ background-color: white; filter:invert(0%);} img{filter:invert(0%);}</style>";
        document.getElementById("cekmalam").checked = false;
    }
}

function bathp() {
    document.getElementById("konfirhps").style.display = "none";
    document.getElementById("pac").style.display = "none";
}

function yahapus(gbrygdhps) {
    document.getElementById("konfirhps").style.display = "block";
    document.getElementById("tgtnnya").value = gbrygdhps;
    document.getElementById("pac").style.display = "block";
}

function salin(salinan) {
    var ygdisalin = document.getElementById(salinan).value;
    document.getElementById("wrd").value = ygdisalin;
    bisal();
}

function startview(imageplace) {
    document.getElementById("liatgambar").src = imageplace;
    document.getElementById("liat").style.display = "block";
}

function viewdone() {
    document.getElementById("liat").style.display = "none";
}

function emot(emoji) {
    let tujuan = "kirim.php";
    tujuan = tujuan + "?emote=" + emoji + "&chid=" + cid + "&usid=" + isi.value;
    tadib = reqServer();
    tadib.open("GET", tujuan, true);
    tadib.send(null);
    update();
}

function senddoc() {
    let kirgam = document.getElementById("kirimdoc");
    stopaudio();
    stopdoc();
    kirgam.style.display = "block";
}

function stopdoc() {
    document.getElementById("kirimdoc").style.display = "none";
}

function sendimage() {
    let kirgam = document.getElementById("kirimgambar");
    stopaudio();
    stopdoc();
    kirgam.style.display = "block";
}

function stopaudio() {
    document.getElementById("kirimaudio").style.display = "none";
}

function sendaudio() {
    stopimage();
    stopdoc();
    document.getElementById('kirimaudio').style.display = "block";
}

function stopimage() {
    document.getElementById("kirimgambar").style.display = "none";
}

function tdialog(sub2, sub1) {
    tadib = reqServer();
    var tjwn = "add.php";
    tjwn = tjwn + "?idul=" + sub1 + "&tar=" + sub2 + "&a=" + Math.random;
    tadib.open("GET", tjwn, true);
    tadib.send(null);
    ddid.value = sub2;
    cid = ddid.value;
    setTimeout(() => {
        updial();
        update();
    }, 100);
}

setTimeout(() => {
    if (cid != " ") {
        update();
        document.getElementById("chatplace").style.display = "flex";
        document.getElementById("menu").style.display = "flex";
        document.getElementById("emotes").style.display = "block";
        document.getElementById("tambahfile").style.display = "block";
        document.getElementById('tmpupdu').innerHTML = "<style>@media screen and (orientation:portrait){.hider{display:block;} #chosechat{width:3%; transition:0.4s; } .hider{display:block} .logo{display:none} .tripledot{display:none} .tambD{display:none;}}</style>";
    }
}, 100);

function cariDialog(lapis) {
    dibaru = reqServer();
    var almt = "add.php";
    almt = almt + "?uid=" + isi.value + "&tgt=" + lapis + "&a=" + Math.random;
    dibaru.onreadystatechange = carrrs;
    dibaru.open("GET", almt, true);
    dibaru.send(null);
}

function carrrs() {
    var isianya = dibaru.responseText;
    if (isianya.length > 0) document.getElementById("daftarada").innerHTML = isianya;
}

function upduu(jla, kpl) {
    document.getElementById("chatplace").style.display = "flex";
    document.getElementById("menu").style.display = "flex";
    document.getElementById("emotes").style.display = "block";
    document.getElementById("tambahfile").style.display = "block";
    ddid.value = jla;
    cid = ddid.value;
    tandibaca(jla, kpl);
    document.getElementById('cttarget').value = cid;
    document.getElementById('tujaudio').value = cid;
    document.getElementById('tujuanfile').value = cid;
    document.getElementById('tmpupdu').innerHTML = "<style>@media screen and (orientation:portrait){.hider{display:block;} #chosechat{width:3%; transition:0.4s; } .hider{display:block} .logo{display:none} .tripledot{display:none} .tambD{display:none;}}</style>";
    update();
    updial();
}

function bukachat() {
    document.getElementById("chatplace").style.display = "none";
    document.getElementById("menu").style.display = "none";
    document.getElementById("emotes").style.display = "none";
    document.getElementById("tambahfile").style.display = "none";
    document.getElementById('tmpupdu').innerHTML = "<style>.hider{display:none;}</style>";
}


function hapus() {
    idhps = document.getElementById("tgtnnya").value;
    document.getElementById("pac").style.display = "none";
    let tujuan = "kirim.php";
    tujuan = tujuan + "?edit=" + idhps + "&kata= ";
    tadib = reqServer();
    tadib.open("GET", tujuan, true);
    tadib.send(null);
    bataledit();
    setTimeout(() => {
        update();
    }, 120);
}

function hapuspesan() {
    let idhps = document.getElementById("idchat").value;
    document.getElementById("pac").style.display = "none";
    let tujuan = "kirim.php";
    tujuan = tujuan + "?edit=" + idhps + "&kata= ";
    tadib = reqServer();
    tadib.open("GET", tujuan, true);
    tadib.send(null);
    bataledit();
    setTimeout(() => {
        update();
    }, 120);
}

function kirimedit() {
    document.getElementById("editor").style.display = "none";
    document.getElementById("pac").style.display = "none";
    let hasiledit = document.getElementById("editan").value;
    let idpilihan = document.getElementById("idchat").value;
    let tujuan = "kirim.php";
    tujuan = tujuan + "?edit=" + idpilihan + "&kata=" + hasiledit;
    tadib = reqServer();
    tadib.open("GET", tujuan, true);
    tadib.send(null);
    document.getElementById("idchat").value = "";
    document.getElementById("editan").value = "";
    update();
}

function mengirim() {
    isikrim = document.getElementById("wrd");
    hshshs(isikrim.value);
    isikrim.value = "";
    setTimeout(() => {
        update();
    }, 100);

}


function mulaiedit(id) {
    document.getElementById("editor").style.display = "block";
    var isdit = document.getElementById("editan");
    var isipesan = document.getElementById(id);
    var idcht = document.getElementById("idchat");
    isdit.value = isipesan.value;
    idcht.value = id;
    document.getElementById("pac").style.display = "block";
}

function bataledit() {
    document.getElementById("editor").style.display = "none";
    document.getElementById("pac").style.display = "none";
}

function hshshs(peessan) {
    minteserr = reqServer();
    var ssnd = "kirim.php";
    ssnd = ssnd + "?psn=" + peessan + "&Dial=" + cid + "&uid=" + isi.value + "&a=" + Math.random;

    minteserr.open("GET", ssnd, true);
    minteserr.send(null);

}

function tandibaca(kkl, lla) {
    cah = reqServer();
    var kabi = "baca.php";
    kabi = kabi + "?cid=" + kkl + "&pnp=" + lla + "&a=" + Math.random();
    cah.open("GET", kabi, true);
    cah.send(null);
}

function ganpr() {
    document.getElementById('ganprofil').style.display = "flex";
    document.getElementById("pac").style.display = "block";
}

function tup() {
    document.getElementById('ganprofil').style.display = "none";
    document.getElementById("pac").style.display = "none";
}

function updial() {
    minDial = reqServer();
    var arah = "Dialog.php";
    arah = arah + "?uid=" + isi.value + "&cid=" + cid + "&a=" + Math.random();
    minDial.onload = gandial;
    minDial.open("GET", arah, true);
    minDial.send(null);
}

function update() {
    if (jaga == false) return "";
    minChat = reqServer();
    var tujuan = "ambilchat.php";
    tujuan = tujuan + "?uid=" + isi.value + "&cid=" + cid + "&a=" + Math.random();
    minChat.onload = gantiStat;
    minChat.open("GET", tujuan, true);
    minChat.send(null);

}

function reqServer() {
    if (window.XMLHttpRequest) return new XMLHttpRequest();
    if (window.ActiveXObject) return new ActiveXObject("Microsoft.XMLHTTP");
    return null;
}

function gantiStat() {
    var data;
    data = minChat.responseText;
    if (data.length > 0) document.getElementById("isi").innerHTML = data;

}

function gandial() {
    var ngambil = minDial.responseText;
    if (ngambil.length > 0) document.getElementById("chosechat").innerHTML = ngambil;
}