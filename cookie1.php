<?php
$a = 5;
/*
 * 问题一:为什么设置的cookie不能立即生效:因为cookie是存放在客户端的,第一次访问浏览器的头信息中并没有cookie,只是服务器上面生成了cookie,并返回给浏览器存储,第二次访问浏览器才会把cookie放在头信息中传给服务器,服务器在作出相应响应
 * http://bbs.csdn.net/topics/340237899
 * 问题二:下面的第1种情况在cookie2这个页面是没有cookie输出的,第2种有cookie输出:因为setcookie的第4个参数代表cookie作用目录第5个参数代表cookie作用主机
 * 默认是当前主机当前目录
 * */
//setcookie('num',$a,time()+3600);      1
setcookie('num',$a,time()+3600,'/');//  2
//setcookie('num','',time()-3600);
if(isset($_COOKIE['num'])){
    header('Location:../cookie2.php');
}
//print_r($_COOKIE);