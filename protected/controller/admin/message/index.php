
<?php 
//include("protected/model/init.php");
checkLogin();
checkLevel();
//print_r($_SERVER);exit;
/* 
当前页数curpage   每页条数perpage  起始条数  偏移量offset=(curpage-1)*$perpage
1                    2                1         0(代表Id=1的记录)
2                    2                3         2(代表Id=3的记录) 
*/
$perpage=5;  //每页显示条数
$curpage=isset($_GET["curpage"])?$_GET["curpage"]:1; //当前页码数
$offset=($curpage-1)*$perpage;
$page=getPage($perpage,$curpage,'admin=admin&c=message&a=index','message');
//getList($offset,$perpage,$table='news',$order='DESC',$con=1,$inner="",$id="id",$zd="*")
$data=getList($offset,$perpage,'`message`');
foreach($data as $key=>$value){
	$data[$key]['time']=date('Y-m-s H:i:s',$value['time']);
}
//print_r($data);exit;
$arr=array('page'=>$page,'data'=>$data);
//print_r($arr);exit;
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){
  echo json_encode($arr);
}
else{
  view($arr,'message/index');
}
/* include(VIEW_PATH.'admin/header.html');
include(VIEW_PATH.'admin/news/index.html');
include(VIEW_PATH.'admin/footer.html'); */
?>