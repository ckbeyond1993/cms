
<?php 
//include("protected/model/init.php");
checkLogin();
checkLevel();
$file=opendir('html');//打开一个文件目录，返回资源类型，文件路径错误，返回false
$files=array();
while($filename=readdir($file)){//返回文件夹下的文件夹或文件名，当文件或文件夹遍历完之后，再执行，返回false
	if(!is_dir('html/'.$filename)){//从打开的目录开始，判断一个目录是否为文件夹
		$tmp_arr=array();
		$status=stat('html/'.$filename);//获取文件的详细信息
		//print_r($status);exit;
		$tmp_arr['filename']=$filename;
		$tmp_arr['ctime']=$status['ctime'];
		$files[]=$tmp_arr;
	}
}
//print_r($files);exit;
view(array('files'=>$files),'file/index');

?>