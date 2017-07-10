<?php 
checkLogin();
$id=!empty($_GET['id'])?$_GET['id']:0;
$assoc=getOne("id=$id",'*','level');
$level=json_decode($assoc['menu']);
//print_r($level);exit;
if(!empty($_POST)){
	$_POST['menu']=json_encode($_POST['menu']);//将权限数组转化为json格式的字符串
	//print_r($_POST);exit;
	if(update("`id`=$id",'level',$_POST)){
		header("location:index.php?admin=admin&c=level&a=index");
	}
	else{
		echo '<script>alert("未做任何修改！")</script>';
	}
}
view(array('name'=>$assoc['name'],'level'=>$level),'level/edit');
?>