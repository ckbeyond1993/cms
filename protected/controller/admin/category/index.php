<?php

checkLogin();
checkLevel();
$cate_arr=getcategory();
//print_r($cate_arr);
view(array('data'=>$cate_arr),'category/index');

?>