<?php 
checkLogin();
$id=!empty($_GET['id'])?$_GET['id']:0;
//delCategory($id);
if(delCategory($id)){
header("location:index.php?admin=admin&c=category&a=index"); 
}
else{
echo "删除失败";
}
?>