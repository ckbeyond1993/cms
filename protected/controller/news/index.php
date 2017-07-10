
<?php 
$perpage=5;  //每页显示条数
$curpage=isset($_GET["curpage"])?$_GET["curpage"]:1; //当前页码数
$offset=($curpage-1)*$perpage;
$page=getPage($perpage,$curpage,'c=news&a=index');
//getList($offset,$perpage,$table='news',$order='DESC',$con=1,$inner="",$id="id",$zd="*")
$data=getList($offset,$perpage,'`news`');
//print_r($data);exit;
$arr=array('page'=>$page,'data'=>$data,'curpage'=>$curpage);
//print_r($arr);exit;
$y='yes';$n='no';
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){
		echo json_encode($arr);
	}else{
		if($smarty->is_cached('news/index.tpl')){
				$smarty->assign('y',$y); 
		 }else{
				$smarty->assign('n',$n); 
		 }
		//view($arr,'news/index','');
		 $smarty->assign('data',$data);          //将值设置到模板变量中
		 $smarty->assign('page',$page);
		 //$smarty->display('header.tpl');
		 $smarty->display('news/index.tpl');     //设置最终输出的模板
		 //$smarty->display('footer.tpl');
		 $smarty->cache_lifetime=60;

	}

?>