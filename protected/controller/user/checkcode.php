<?php 
	$code=$_POST['code'];
	if(strtoupper($code)==strtoupper($_SESSION["code"])){//strtoupper（将字母全部大写），不区分大小写。$_SESSION["code"]，验证码函数记录的session;
	  echo 1;
	}
	else{
	  echo 0;
	}
?>