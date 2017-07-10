<?php

$perpage=3;  //每页显示条数
$curpage=isset($_GET["curpage"])?$_GET["curpage"]:1; //当前页码数
$offset=($curpage-1)*$perpage;

//getPage($perpage,$curpage,$link='admin=admin&c=message&a=index',$table='news',$inner="")
$page=getPage($perpage,$curpage,'c=message&a=index','message','','status=1');

//getList($offset,$perpage,$table='news',$order='DESC',$con=1,$inner="",$id="id",$zd="*");
$data=getList($offset,$perpage,'message','DESC','status=0'); 
//echo 111;exit;
//print_r($data);exit;
foreach($data as $key=>$value){
	$data[$key]['time']=date('Y-m-d H:i:s',$value['time']);
}
$arr=array('data'=>$data,'page'=>$page);
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){
  echo json_encode($arr);
}
else{
  view($arr,'message/index','');
}




?>