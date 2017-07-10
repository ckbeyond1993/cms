<?php 
//include("../../../model/init.php");

if(!empty($_POST)){                                      //有提交就判断
//print_r ($_SERVER);exit;
$username=$_POST["username"];
//echo $username;exit;
$password2=$_POST["password"];//空用md5加密后就不为空了
$password=md5($_POST["password"]);
//var_dump($remember);exit;
//print_r ($_POST);exit;
$code=$_POST['code'];

$assoc=getOne("username='$username' AND password='$password'",'*','admins');
//var_dump($assoc);exit;
$userID=$assoc['id'];

$level_id=$assoc['level_id'];
//echo $assoc['username'];exit;

//$num=getRecordNum("username='$username' AND password='$password'");
if(!empty($assoc['username'])){                            //用户合法
	if(strtoupper($code)==strtoupper($_SESSION["code"])){    //验证码正确，记录用户的用户名，权限，更改最后登录IP，时间
			if(!empty($_POST["remember"])){
					setcookie('username',$username,time()+10);
					setcookie('password',$password2,time()+10);
					//$password2=$_POST["password"];:记住未加密的密码，留作remember me 用
			}
		$row=getOne('id='.$level_id,'*','level');
		//print_r($row);exit;
		$_SESSION['level_menu']=json_decode($row['menu']);
		//print_r($_SESSION['level_menu']);exit;
		$_SESSION["username"]=$username; 
		$curTime=time();
        setcookie('time',$curTime,time()+20);
		$ip=$_SERVER["REMOTE_ADDR"];
		$arr=array('lastloginip'=>$ip,'lastlogintime'=>$curTime);
		//print_r ($arr);exit;
		update('id='.$userID,'admins',$arr);
				if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){     //判断是否ajax提交，是就在Html页面用window.location='index.php?admin=admin&c=news&a=index'跳转
						echo 1;
				}
				else{																							//非ajax直接跳转
					header("location:index.php?admin=admin&c=news&a=index");
				}
		}
		else{                                               //验证码匹配不上
				if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){   
						echo 3;
				}
		    else{                                     
						header("location:index.php?admin=admin&c=admin&a=login&status=error");
			 }
		}
}
else{                                                 //用户不合法
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){
			echo 2;
		}
		else{
			header('Location:index.php?admin=admin&c=admin&a=login&status=error');  //非ajax，跳转的时候带上error错误参数
		}
}


	
}
else{  //不加else 用ajax会将视图页面也全部返回； 没提交就加载视图
		include(VIEW_PATH.'/admin/admin/login.html');
//include("../../../templates/admin/admin/login.html");
}
?>
