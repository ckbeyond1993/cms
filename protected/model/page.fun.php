<?php 
function getPage($perpage,$curpage,$link='admin=admin&c=news&a=index',$table='news',$inner="",$con=1){
$sql2="SELECT count(*) as total FROM $table $inner WHERE $con";
$result2=mysql_query($sql2) or die(mysql_error());
$assoc=mysql_fetch_assoc($result2);
//print_r($assoc);exit;
$total=$assoc["total"];//总条数
$pertotal=ceil($total/$perpage);//总页码数

if(ADMIN){//前台也有调用分页的，在此处坑到后台去了。此常量首页定义
	if($pertotal<$curpage){
		$curpage-=1;
		header("location:index.php?admin=admin&c=news&a=index&curpage=$curpage"); //配合delete功能，如果当前页只有一条记录，删除后自动跳转到当前页的前一页
	}
}
$pagenum=5;//固定页码数
$floorpage=floor($pagenum/2);//前后页码数

if($curpage<=$floorpage){
$startpage=1;				//当前页码数<前后页码数
$endpage=$pagenum;
}
else if($curpage>$pertotal-$floorpage){   //当前页码数>（总页码数-前后页码数）
$startpage=$pertotal-$floorpage*2;
$endpage=$pertotal;
}
else{
$startpage=$curpage-$floorpage;  // 前后页码数<当前页码数<总页码数-前后页码数
$endpage=$curpage+$floorpage;
}

if($pertotal<$pagenum){
$startpage=1;				// 当页码总数<固定页码数的特殊情况
$endpage=$pertotal;
}

$page="";
$page.="<a href='index.php?$link&curpage=1' class='number' title='1'>首页</a>";
if($curpage>1){
$prepage=$curpage-1;
$page.="<a href='index.php?$link&curpage=$prepage' class='number' title='$prepage'>上一页</a>";
}
for($i=$startpage;$i<=$endpage;$i++){
if($curpage==$i){
 $page.="<a href='index.php?$link&curpage=$i' class='number current' title='$i'>$i</a>"; 
 }
 else{
 $page.="<a href='index.php?$link&curpage=$i' class='number' title='$i'>$i</a>";
 }
}
if($curpage<$pertotal){
$nextpage=$curpage+1;
$page.="<a href='index.php?$link&curpage=$nextpage' class='number' title='$nextpage'>下一页</a>";
}
$page.="<a href='index.php?$link&curpage=$pertotal' class='number' title='$pertotal'>尾页</a>";
return $page;
}
?>