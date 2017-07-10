<?php 
$id=!empty($_GET['id'])?$_GET['id']:0;

//print_r($id);exit;
//getOne($con=1,$area='`title`,`content`',$table='news')
$r=getOne('id='.$id,'*');

//view(array('r'=>$r),'news/info','');
	 $smarty->assign('r',$r);          //将值设置到模板变量中
	 $smarty->display('header.tpl');
	 $smarty->display('news/info.tpl');     //设置最终输出的模板
	 $smarty->display('footer.tpl');
?>