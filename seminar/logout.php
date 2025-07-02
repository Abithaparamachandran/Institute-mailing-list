<?php
session_start();
unset($_COOKIE['usernamee']);
setcookie('usernamee', '', time() - 3600);// where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
header("Location: log1.php");
?>
~
