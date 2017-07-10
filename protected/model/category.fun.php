<?php 
function getcategory($pid=0,$cate_arr=array(),$level=0){
	$data=getList(0,100,'category','ASC','pid='.$pid);
	
	foreach($data as $v){           
		$str='<font color="red">';   
		for($i=0;$i<$level;$i++){
			$str.='|-';
		}
		$str.='</font>';
		$v['name']=$str.$v['name'];
		$cate_arr[]=$v;
		$pid=$v['id'];
		$level++;
		$cate_arr=getcategory($pid,$cate_arr,$level);
		$level--;
	}
	return $cate_arr;
}


function getAllCate($pid=0,$arr = array(),$level = 0){
    //函数内使用全局变量必须要用global关键字，且函数内对变量的修改会覆盖全局变量的值
    global $level;
    $top_cate = getList(0,100,'category','asc','pid='.$pid);
    $str='<font color="red">';
    for($i=0;$i<$level;$i++){
        $str.='|-';
    }
    $str.='</font>';
    foreach($top_cate as $k=>$v){
        $v['name'] = $str.$v['name'];
        $arr[] = $v;
        $level++;
        $arr =  array_merge($arr,getAllCate($v['id']));
        $level--;
    }
    return $arr;
}
/*
function getcategory2($pid,$cate){
	$data=getList(0,100,'category','ASC','pid='.$pid);
	foreach($data as $v){
		$cate[]=$v;
		$pid=$v['id'];
		$cate=getcategory3($pid,$cate);
	}
	return $cate;
}
function getcategory3($pid,$cate){
	$data=getList(0,100,'category','ASC','pid='.$pid);
	foreach($data as $v){
		$cate[]=$v;
		//$pid=$v['id'];
	}
	return $cate;
}*/

function delCategory($id){
	$data=getList(0,100,'category','asc','pid='.$id);
	foreach($data as $key=>$value){
		$pid=$value['id'];
		delCategory($pid);
	}
	//echo $id.'</br>';	
	del('id='.$id,'category');
}
?>