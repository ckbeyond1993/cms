<?php 
checkLogin();
$id=!empty($_GET['id'])?$_GET['id']:0;

//getOne($con=1,$area='`title`,`content`',$table='news')
//getList($offset,$perpage,$table='news',$order='DESC',$con=1)
$r=getOne("id=$id",'*','category');
$r2=$r;
$cate_arr=array();
do{
    $pid=$r2['pid'];
	//echo $r2['id'].'</br>';
	$tmp_id=$r2['id'];
	$row=getList(0,100,'category','asc','pid='.$pid);
	$cate_arr[$tmp_id]=$row;
	$r2=getOne("id=$pid",'*','category');
	//$pid=$assoc2['pid'];
}while($pid!=0);
//print_r($cate_arr);exit;
//$row2=getList(0,100,'category','ASC','pid='.$pid2);
//exit;
$cate_arr=array_reverse($cate_arr,true);//键名不规则，自动丢弃，加上true会保留不规则键名
//print_r($cate_arr);exit;

if(!empty($_POST)){
     // update($con=1,$table='news',$arr=array())
	if(update("`id`='$id'",'category',$_POST)){
	   header("location:index.php?admin=admin&c=category&a=index");
	}
	else{
	   echo '<script>alert("未做任何修改！")</script>';
	}
}
view(array('r'=>$r,'cate_arr'=>$cate_arr),'category/edit');
?>