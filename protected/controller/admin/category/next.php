<?php 
$pid=!empty($_GET['id'])?$_GET['id']:0;
//getList($offset,$perpage,$table='news',$order='DESC',$con=1)
$cate=getList(0,100,'category','ASC','pid='.$pid);
//print_r($cate);exit;
echo json_encode($cate);
?> 