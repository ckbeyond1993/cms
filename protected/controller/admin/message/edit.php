<?php 
checkLogin();
$id=!empty($_GET['id'])?$_GET['id']:0;

//后台点击message,在点击某个message的title跳转到此处
if($id){
	update("id=$id",'message',array('is_read'=>1));
}

$assoc=getOne("id=$id",'*','message');
//print_r($assoc);exit;

if(!empty($_POST)){
//print_r($_POST);exit;
	if($_POST['status']==1){
		update('id='.$id,'message',$_POST);
		header('location:index.php?admin=admin&c=message&a=index');
	}
	else{
	    echo "<script>alert('审核失败');window.location.href='index.php?admin=admin&c=message&a=index'</script>";
	}
}


view(array('title'=>$assoc['title'],'content'=>$assoc['content']),'message/edit');
?>