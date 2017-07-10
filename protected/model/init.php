<?php 
	session_start();
	//define('BASE_URL','http://localhost:8080/cms/');
	header('Content-type: text/html;charset=UTF-8');
	date_default_timezone_set('Asia/Shanghai');
    //date_default_timezone_set('America/Los_Angeles');
	include('common.fun.php');
	include('db.fun.php');
    include('page.fun.php');
	include('category.fun.php');
    include_once(MODEL_PATH.'smarty/Smarty.class.php');
    connectDB();

/*    //只对后台起作用
    if($admin =='admin'){

        if(!empty($_SESSION['time'])){
            //避免登陆后关闭窗口（不是关闭浏览器，此时session依旧存在）,在登陆时再次验证；避免直接点击退出时仍然调用此函数
            if($a!='login'||$a!='logout'){
                AutoLoginOut($_SESSION['time'],time());
            }
        }
        //刚登陆时记录登陆时间
        //之后的当前操作没有超时时，更新session时间，不加判断，10秒内未登陆会造成循环登陆错误
        if(!empty($_SESSION['username'])){
            $_SESSION['time']=time();
        }
    }*/

//只对后台起作用

if($admin === 'admin'){  //==没用,因为 0=='admin' 返回的是true
    if(!empty($_SESSION['username'])){
        if(empty($_COOKIE['time'])){
            //避免登陆后关闭窗口（不是关闭浏览器，此时session依旧存在）,在登陆时再次验证；避免直接点击退出时仍然调用此函数
            if($a!='login'&&$a!='logout'){
                //unset($_SESSION['username']); //unset()不注释掉，下面的Js就没有提示
                //测试模拟登录屏蔽了下面代码
               // echo "<script>alert('由于你长时间未操作,请重新登陆');location.href='index.php?admin=admin&c=admin&a=login'</script>";
            }
        }
        else{
            setcookie('time',time(),time()+60*20);
        }
   }
}

  $smarty = new Smarty;//实例化一个smarty对象
  $smarty->template_dir = VIEW_PATH;//模板文件夹(模板存放位置)
  $smarty->compile_dir = VIEW_PATH.'template_c/';//编译文件夹
  $smarty->cache_dir = VIEW_PATH.'cache/';//缓存文件夹
  $smarty->left_delimiter = '<{';//定义左边的边界符
  $smarty->right_delimiter = '}>';//定义右边的边界符
  $smarty->caching=2;
 
?>

