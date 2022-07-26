<?php
session_start();
$_SESSION = array(); //empty array
unset($_SESSION);
session_destroy();
//redirect website bằng PHP
header("Location: index.php");
exit;
