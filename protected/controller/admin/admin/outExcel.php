<?php
require_once(MODEL_PATH.'/phpexcel.php');

$data=getList(0,100,'admins','asc');
outExcel($data);


?>