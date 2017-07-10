<?php
checkLogin();
checkLevel();
/*echo '<pre>';
print_r($_POST);
print_r($_FILES);exit;*/


if(!empty($_POST)){

    /*2015/11/06 试验webupload上传插件*/
if(is_array($_POST['upload_image'])&&!empty($_POST['upload_image'])){
    $_POST['image']=implode(',',$_POST['upload_image']);
    unset($_POST['upload_image']);
}
    /*2015/11/06 end*/

//print_r ($_FILES);exit;
//print_r ($_POST);exit;
   // 这个二维数组的键image代表input框的name名字
/* Array
(
    [image] => Array
        (
            [name] => paofu.jpg
            [type] => image/jpeg
            [tmp_name] => D:\wamp\tmp\phpDF.tmp
            [error] => 0
            [size] => 147410 以字节（B/Byte）为单位;
        )

) */

if($_FILES['image']['name']){
//echo 'a';exit;
  $file=$_FILES['image'];
	//设置文件大小
   if($file['size']>2*1024*1024){
	   die('文件过大');
	 }
	 $type=array('jpg','txt','gif','png','chm'); //echo strrpos($file['name'],'.');
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
	   mkdir($path,777,true);    //***************** 当递归创建文件夹时，这儿的第三个参数true很重要，被坑了几个小时；
	 }
    //将上传的文件移动到新位置
	 move_uploaded_file($file['tmp_name'],$path.'/'.$filename);		
	 // print_r ($_FILES);exit;
	 $_POST['image']=$path.'/'.$filename;
}
//$_POST['newstime']=time();
$_POST['newstime']=date('Y-m-d H-i-s',time());

//print_r($_POST);exit;
if(add($_POST)){
$id=mysql_insert_id();
$url="http://localhost/cms/index.php?c=news&a=info&id=".$id; //非要写绝对地址，不知为何

$html=file_get_contents($url);
file_put_contents('html/'.$id.'.html',$html);

header('location:index.php?admin=admin&c=news&a=index');
}
else{
 echo '<script> alert("添加失败");</script>';
    echo 2;exit;
}
}
$cate_arr=getList(0,100,'category','ASC','pid=0');

view(array('cate_arr'=>$cate_arr),'news/add');
?>