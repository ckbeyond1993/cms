<?php 
	function checkLogin(){
	//echo $_COOKIE['username'];exit;
        if(!isset($_SESSION["username"])){
            header('location:index.php?admin=admin&c=admin&a=login');
            //header('location:protected/controller/admin/admin/login.php');
        }
	}
	function checkLevel(){
		if(!empty($_SESSION['level_menu'])){      //当前用户的权限为空，也就是$_SESSION['level_menu']为空时，in_array($_SESSION['menu'][C.'/'.A],$_SESSION['level_menu'])是会报错的，故要先判断
			if(empty($_SESSION['menu'])){         //判断权限数组是否存在，存在就不重新加载xml，直接判断in_array($_SESSION['menu'][C.'/'.A],$_SESSION['level_menu']);
				$xml=simplexml_load_file('protected/data/menu.xml');
				$_SESSION['menu']=array();
				foreach($xml->controller as $c){
					foreach($c->action as $a){
						$controller=(string)$c->menuname->attributes()->en;
						$action=(string)$a->navname->attributes()->en;
						$_SESSION['menu'][$controller.'/'.$action]=(int)$a->navname->attributes()->id;  //$a->navname->attributes()->id看起来是int型，实际上也是对象，可以用var_dump查看完整信息；
					}
				}
			}
			//print_r($_SESSION['menu']);exit;
			if(!in_array($_SESSION['menu'][C.'/'.A],$_SESSION['level_menu'])){
			    die('你的权限不够，请联系管理员');
			}
		}
		else{ 
			die('你的权限不够，请联系管理员');
		}
	}

/* 		function checkLevel(){
		if(!empty($_SESSION['level_menu'])){
		  $xml=simplexml_load_file('protected/data/menu.xml');
		   foreach($xml->controller as $c){
				foreach($c->action as $a){
					if($c->menuname->attributes()->en==C&&$a->navname->attributes()->en==A){
					//print_r ($_SESSION['level']);exit;
					//echo $a->navname->attributes()->id;exit;
							if(!in_array($a->navname->attributes()->id,$_SESSION['level_menu'])){
								 die('你的权限不够，请联系管理员');
							}
					}
					//else{ die('你的权限不够，请联系管理员');}这样是错的，循环一次就die了;
				}
			 
			}
		}
		else{ 
			die('你的权限不够，请联系管理员');
		}
	} */

	function view($arr=array(),$view='news/index',$admin='admin/'){
		extract($arr);
		if($admin){
			$xml=simplexml_load_file('protected/data/menu.xml');
	   //print_r ($xml);exit;
		}
		else{
		   include(CONTROLLER_PATH.'user/autologin.php');
		}
		include(VIEW_PATH.$admin.'header.html');
		include(VIEW_PATH.$admin.$view.'.html');
		include(VIEW_PATH.$admin.'footer.html');

}
/*
 * 3600秒超时自动退出功能
 * @param  $lastDoTime  string  上次操作时间
 * @param  $nowDoTime   string  本次操作时间
 * */

    function AutoLoginOut($lastDoTime,$nowDoTime){
        $midTime=$nowDoTime-$lastDoTime;
        if($midTime>3600){
            session_unset();
            session_destroy();
            echo "<script>alert('由于你长时间未操作,请重新登陆');location.href='index.php?admin=admin&c=admin&a=login'</script>";
            //header('Location:index.php?admin=admin&c=admin&a=login'); //这样直接跳转了，没有提示
            die();
        }
    }
/*格式化文本输出
 */

    function p($data){
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
?>