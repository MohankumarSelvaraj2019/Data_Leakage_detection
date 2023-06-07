<?php 
require_once("../session.php");
session_unset();
session_destroy();
$url="../index.html";
header("Location:$url");
exit();
?>