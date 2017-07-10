<?php 
checkLogin();
$id=!empty($_GET['id'])?$_GET['id']:0;
if(del("`id`='$id'",'admins')){
header('location:index.php?admin=admin&c=admin&a=index');
//echo '<script> alert("删除成功,点击确定跳转到主页");window.location.href="index.php";</script>';
}
else{
echo "删除失败";
}
?>