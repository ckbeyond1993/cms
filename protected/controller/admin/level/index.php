
<?php 
//include("protected/model/init.php");
checkLogin();
checkLevel();
$data=getList(0,100,'`level`','asc');
//print_r($data);exit;
view(array('data'=>$data),'level/index');
?>