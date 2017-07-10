<?php 
//session_start();

session_destroy();
header('Location:index.php?admin=admin&c=admin&a=login');
?>