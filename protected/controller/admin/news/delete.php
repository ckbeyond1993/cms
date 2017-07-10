<?php 
checkLogin();
$id=!empty($_GET['id'])?$_GET['id']:0;
$curpage=!empty($_GET['curpage'])?$_GET['curpage']:0;
if(del("`id`='$id'")){
header("location:index.php?admin=admin&c=news&a=index&curpage=$curpage"); //必须要curpage=$curpage，删除一条记录后将当前页的页码传给主页，然后主页调用page函数判断当前页是否>总页码数
//echo '<script> alert("删除成功,点击确定跳转到主页");window.location.href="index.php";</script>';
}
else{
echo "删除失败";
}
?>