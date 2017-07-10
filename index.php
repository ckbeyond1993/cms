<?php 
define('MODEL_PATH','protected/model/');
define('VIEW_PATH','protected/templates/');
define('CONTROLLER_PATH','protected/controller/');
//include(MODEL_PATH.'init.php');

$admin=!empty($_GET['admin'])?$_GET['admin']:0;
$c=!empty($_GET['c'])?$_GET['c']:'site';
$a=!empty($_GET['a'])?$_GET['a']:'index';
define('ADMIN',$admin);
define('A',$a);
define('C',$c);
//之所以放这里是方便超时自动退出功能，见init.php文件
include(MODEL_PATH.'init.php');

if($admin){
    include(CONTROLLER_PATH.'admin/'.$c.'/'.$a.'.php');
}
else{
   include(CONTROLLER_PATH.$c.'/'.$a.'.php');
}
?>
