<?php 
checkLogin();
$id=!empty($_GET['id'])?$_GET['id']:0;
$curpage=!empty($_GET['curpage'])?$_GET['curpage']:0;
//echo $curpage;exit;
$assoc=getOne("id=$id",'*');

/** 2015/11/06 增加了多图上传插件 **/
if($assoc['image']){
    $assoc['image'] = explode(',',$assoc['image']);
}
/** end **/

//print_r($assoc);exit;
if(!empty($_POST)){
	if($_FILES['image']['name']){
	//echo 'a';exit;
	$file=$_FILES['image'];
	//设置文件大小
	if($file['size']>2*1024*1024){
	   die('文件过大');
	 }
	 $type=array('jpg','txt','gif','png','chm','mp3'); //echo strrpos($file['name'],'.');
	 $cantype=substr($file['name'],strrpos($file['name'],'.')+1); //echo $cantype;
	 //$cantype=explode()
	 //设置文件格式
	 if(!in_array($cantype,$type)){
	   die('不支持此格式');
	 }
	 //文件保存路径
	 $filename=time().mt_rand(1000,9999).'.'.$cantype;//文件名
	 //echo $filename;
	 $year=date('Y',time());
	 $month=date('m',time());
	 $day=date('d',time());
	 $path='upload/'.$year.'/'.$month.'/'.$day;
	 //echo $path;
	 if(!file_exists($path)){//判断文件夹是否存在
	   mkdir($path,777,true);	 
	 }
	 move_uploaded_file($file['tmp_name'],$path.'/'.$filename);		
	 // print_r ($_FILES);exit;
	 $_POST['image']=$path.'/'.$filename;
	}
	//$_POST['newstime']=time();
	$_POST['newstime']=date('Y-m-d H-i-s',time());
	//print_r($_POST);exit;
	if(update("`id`='$id'",'news',$_POST)){
	   header("location:index.php?admin=admin&c=news&a=index&curpage=$curpage");
	}
	else{
	   echo '<script>alert("未做任何修改！")</script>';
	}
}
$cate_id=$assoc['cate_id'];
$id=$cate_id;
//echo $id;exit;
$r=getOne("id=$id",'*','category');
$r2=$r;
$cate_arr=array();
do{
$pid=$r2['pid'];
//getList($offset,$perpage,$table='news',$order='DESC',$con=1,$inner="",$id="id",$zd="*")
$row=getList(0,100,'category','desc','pid='.$pid);
$cate_arr[$id]=$row;//17 16
$id=$pid;
$r2=getOne("id=$id",'*','category');
}
while($pid!=0);
$cate_arr=array_reverse($cate_arr,true);//键名不规则，自动丢弃，加上true会保留不规则键名
//print_r($cate_arr);exit;
//print_r($r);exit;

view(array('title'=>$assoc['title'],'content'=>$assoc['content'],'image'=>$assoc['image'],'cate_arr'=>$cate_arr,'r'=>$r),'news/edit');
?>
