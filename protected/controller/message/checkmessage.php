<?php 
  if(strtoupper($_POST['code'])==strtoupper($_SESSION["code"])){
		//print_r($_POST);exit;
		unset($_POST['code']);
		$_POST['time']=time();
		//print_r($_POST);exit;
		if(add($_POST,'message')){
		   if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){
			    echo 1;
			 }
			 else{
			    header('location:index.php?c=message&a=index');
			}
			//准备实现长轮询用的，失败告终，依旧保留此处
			$filename  = MODEL_PATH.'data.txt';
			file_put_contents($filename,time());
		}
	}
	else{
	   echo 2;
	}

?>