<?php 
//checkLogin();
if(!empty($_POST['username'])){
//print_r($_POST);exit;
	$_POST['password']=md5($_POST['password']);
	 unset($_POST['code']);//code不存入数据库，故将它释放
	$email=$_POST['email'];
//print_r($_POST);exit;
	if(add($_POST,'user')){
		$id=mysql_insert_id();
		$ticket=md5($id);
		add(array('user_id'=>$id,'ticket'=>$ticket,'otime'=>time()),'ticket');
		require_once(MODEL_PATH.'phpmailer/class.phpmailer.php');
		//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

		$mail             = new PHPMailer();//实例化一个类，可以得到这个类的对象，对象有属性和方法，这个对象可以使用这个类里面的属性和方法

		$body             = '<a href="http://localhost:8080/cms/index.php?c=user&a=activate&ticket='.$ticket.'">点击激活你的账号</a>';//获取html内容,将目标文件的代码变成字符串的形式输出
		//$body             = eregi_replace("[\]",'',$body);

		$mail->IsSMTP(); // telling the class to use SMTP 使用smtp协议发送（固定要的）
		$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
																							 // 1 = errors and messages
																							 // 2 = messages onlyn   调试模式，正式用的时候要关闭，将它设置为0
		$mail->SMTPAuth   = true;                  // enable SMTP authentication  允许stmp发送
		$mail->Host       = "smtp.163.com"; // sets the SMTP server  发送邮件的邮箱的服务器地址
		$mail->Port       = 25;                    // set the SMTP port for the GMAIL server邮箱服务器进程的默认端口
		$mail->Username   = "ck178060634@163.com"; // SMTP account username发送邮箱的有户名和密码
		$mail->Password   = "ckbeyond";        // SMTP account password
		$mail->CharSet = "UTF-8";   
		$mail->SetFrom('ck178060634@163.com','蔡侃');//设置接收来源

		$mail->AddReplyTo("ck178060634@163.com");//回复邮箱


		$mail->Subject    = "no zuo no die why you try";//标题

		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

		$mail->MsgHTML($body);//内容使用html格式

		$address = $email;//发送地址
		$mail->AddAddress($address);//有多个邮箱地址，使用多次
    //echo $body;exit;
		$mail->AddAttachment("images/paofu.jpg");      // attachment 附件;会提示错误Deprecated: Function set_magic_quotes_runtime() is deprecated（该函数在php6.0以后被弃用了）去D:\wamp\www\cms\protected\model\phpmailer\class.phpmailer.php on line 1350将这个函数注释掉；
		//必须在当前文件夹下建立images,再将要传的附件放到images里面，因为class.phpmailer.php里面某些函数已经固定了路径
		
		//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment 多个附件执行多次
		$mail->Send();
		// if(!$mail->Send()) {
		// echo "Mailer Error: " . $mail->ErrorInfo;
		// } else {
		// echo "Message sent!";
		// }
		header('location:index.php?&c=site&a=index');  ///////////////不重新定向的话，当注册成功后手动刷新又会重新提交
        //file_put_contents('header.txt','aaaaa');
	}
}
view($arr=array(),'user/register','');
?>