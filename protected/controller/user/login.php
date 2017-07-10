<?php

include './config.inc.php';

include './include/db_mysql.class.php';
$db = new dbstuff;

$db->connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect);
unset($dbhost, $dbuser, $dbpw, $dbname, $pconnect);

include './uc_client/client.php';



if(!empty($_POST["username"])){


    //通过接口判断登录帐号的正确性，返回值为数组
    list($uid, $username, $password, $email) = uc_user_login($_POST['username'], $_POST['password']);
    //print_r(uc_user_login($_POST['username'], $_POST['password']));exit;


    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $assoc = getOne("username='$username' AND password='$password'", '*', 'user');
    $_SESSION["user"] = $assoc['username'];
    //print_r($assoc);exit;
    if($uid > 0) {

        if (!empty($assoc) && $assoc['status'] == 1) {
            //生成同步登录的代码
            $ucsynlogin = uc_user_synlogin($uid);
           // echo $username;exit;  //这样同步不了，不知道为什么
            echo $ucsynlogin;


/*            $_SESSION["user"] = $assoc['username'];
            if (!empty($_POST['remember'])) {
                setcookie('user', $assoc['username'], time() + 3600);
            }
            if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
                echo $_SESSION["user"];
            } else {
                header("location:index.php?c=site&a=index");
            }*/
        } else {

            if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
                echo 1;
            } else {
                echo "<script>alert('用户名或密码错误');window.location.href='index.php?c=site&a=index';</script>";
            }
        }
    }

    elseif($uid == -1){
        //当UC不存在该用而CMS存在,就注册一个.

        if(!empty($assoc)) {

            $row = $assoc['email'];
            $uid = uc_user_register($_POST['username'], $_POST['password'], $row);

            if($uid > 0) {
                $ucsynlogin = uc_user_synlogin($uid);
            }
            echo $_POST['username'];
        }


    }

}
else{
  if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){
	    echo 0;
	}
	else{
    echo '<script>alert("请输入用户名和密码");window.location.href="index.php?c=site&a=index";</script>';
	}
}

?>
