<?php 
checkLogin();
$id=!empty($_GET['id'])?$_GET['id']:0;
$assoc=getOne("id=$id",'`username`,`password`','admins');
if(!empty($_POST)){
    $_POST['password']=md5($_POST['password']);
	if(update("`id`='$id'",'admins',$_POST)){
	   header('location:index.php?admin=admin&c=admin&a=index');
	}
	else{
	   echo '<script>alert("未做任何修改！")</script>';
	}
}
view(array('username'=>$assoc['username'],'password'=>$assoc['password']),'admin/edit');
/* include(VIEW_PATH.'admin/header.html');
include(VIEW_PATH.'admin/admin/edit.html');
include(VIEW_PATH.'admin/footer.html'); */
?>