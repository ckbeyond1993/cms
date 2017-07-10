
<?php
checkLogin();
checkLevel();
$data=getList(0,100,'admins','asc');
//print_r($data);

view(array('data'=>$data),'admin/index');

?>