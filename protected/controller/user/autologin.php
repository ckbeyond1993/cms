<?php 
if(!empty($_COOKIE['user'])){
$_SESSION['user']=$_COOKIE['user'];
//header('location:index.php?c=site&a=index');无限死循环
}

?>