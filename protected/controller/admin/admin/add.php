<?php 
checkLogin();
checkLevel();
if(!empty($_POST)){
$_POST['password']=md5($_POST['password']);
if(add($_POST,'admins')){
header('location:index.php?admin=admin&c=admin&a=index');
}
else{
 echo '<script> alert(”添加失败“);</script>';
}
}
view(array(),'admin/add');
/* include(VIEW_PATH.'admin/header.html');
include(VIEW_PATH.'admin/admin/add.html');
include(VIEW_PATH.'admin/footer.html'); */
?>