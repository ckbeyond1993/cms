<?php 
	$username=$_POST['username'];
	$row=getRecordNum("`username`='$username'",'*','user');
	if($row){
	  echo 1;
	}
	else{
	  echo 0;
	}

?>