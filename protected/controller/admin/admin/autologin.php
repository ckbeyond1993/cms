<?php 
if(!empty($_COOKIE['username'])){
$_SESSION['username']=$_COOKIE['username'];
//header('location:index.php?c=site&a=index');无限死循环
}
?>