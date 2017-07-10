<?php 
checkLogin();
checkLevel();
if(!empty($_POST)){
	if(add($_POST,'category')){
		header('location:index.php?admin=admin&c=category&a=index');
	}
	else{
		echo '<script> alert("添加失败");</script>';
	}
}
//getList($offset,$perpage,$table='news',$order='DESC',$con=1)
$cate_arr=getList(0,100,'category','ASC','pid=0');
view(array('cate_arr'=>$cate_arr),'category/add');
?>