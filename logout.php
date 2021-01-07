<?php 
//ini bagian untuk logout
setcookie("login",false,strtotime("+6 months")); ?>
<script>location.href="index.php";</script>