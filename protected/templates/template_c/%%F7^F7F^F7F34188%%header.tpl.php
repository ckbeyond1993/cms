<?php /* Smarty version 2.6.26, created on 2014-11-11 17:12:15
         compiled from header.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="家具,顺德家具,木材,沙发" />
<meta name="description" content="顺德家具厂" />
<title>佛山市顺德区宝源家具实业公司</title>
<!-- <script language="javascript" src="images/qq.js"></script></script> -->
<!-- <script language="javascript" src="js/asd.js"></script>  -->
<script language="javascript" src="js/jquery-1.3.2.min.js"></script>
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/news.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

<div id="container">
	<div class="header">
    	<div class="headTop">
        	<div class="logo">
            	<a href="index.php?admin=admin&c=admin&a=login"><img src="images/logo.gif" alt="佛山市顺德区宝源家具实业公司" title="佛山市顺德区宝源家具实业公司" /></a>
            </div>
            <div class="headRight">
            	<div class="tool" id="loginDIV">
							<?php if (! isset ( $_SESSION['user'] )): ?>
							   <form action="index.php?c=user&a=login" method="post" id="formDIV">
								    用户名：<input type="text" name="username" id="username" size="10"/>
										密 码：<input type="password" name="password" id="password" size="10"/>
										<input type="checkbox" name="remember" id="remember" value=1 />记住我
									  <input type="submit"  value="登录" />
								 </form>
							<?php else: ?> <?php echo $_SESSION['user']; ?>
,欢迎你!<a href='index.php?c=user&a=logout'>退出</a> 
							<?php endif; ?>
						  </div>
               <ul class="nav">
                    <li class="navLeft"></li>
                    <li class="navCenter">
                    	<a href="index.html">公司简介</a>
                        <a href="product.html">产品展示</a>
                        <a href="index.php?c=news&a=index">新闻中心</a>
                        <a href="index.php?c=message&a=index">给我留言</a>
                        <a href="links.html">友情链接</a>
                        <a href="address.html">联系我们</a>
                        <a href="index.php?c=user&a=register" class="last">会员注册</a>
                    </li>
                    <li class="navRight"></li>
                </ul><!-- 避免多DIV症 -->
            </div>
        </div>
        <div class="banner"><img src="images/banna.jpg" /></div>
    </div>
    <div class="main">
    	<div class="mainLeft">
        	<img src="images/product.gif" /><!-- 隐式块级 -->
            <ul class="cate">
            	<li class="cateTop"></li>
                <li class="cateMid">
                	<a href="#">商务会议</a>
                    <a href="#">商务会议</a>
                    <a href="#">商务会议</a>
                    <a href="#">商务会议</a>
                </li>
                <li class="cateBtm"></li>
            </ul>
            <img src="images/search.gif" />
            <div class="search">
            <form>
            	<p><input type="text" name="keyword" size="15" /></p>
            	<p>
                	<select name="cate">
                		<option value="">请选择</option>
                    	<option value="">商务会议</option>
                    	<option value="">商务会议</option>
                	</select>
                </p>
                <p><input type="image" src="images/search_left.gif" /></p>
            </form>
            </div>
        </div>
				<script>
				  $("#formDIV").live('submit',function(){
					   //alert('a');
						 var url=$(this).attr('action');
						 var username=$("#username").attr('value');
						 var password=$("#password").val();
						 var remember = $('#remember').is(':checked');
						 if(remember){
						    remember=1;
						 }
						 else{
						    remember=0;
						 }
						 //alert (remember);return false;
						 //alert (password);return false;
							$.ajax({
								type: "POST",
								url: url,
								data: "username="+username+"&password="+password+"&remember="+remember,
								success: function(msg){
									 //alert( "Data Saved: " + msg );return false;
									 var nr=msg+",欢迎你!<a href='index.php?c=user&a=logout'>退出</a>";
									 if(msg==0){
									    alert('请输入用户名和密码');
										  //$("#loginDIV").html(nr2);
									 }
									 else if(msg==1){
											alert('用户名或密码错误');					
											//$("#loginDIV").html(nr2);
									 }
									 else{
									    $("#loginDIV").html(nr);
									 }
								}
              });
						 return false;
					})
					$("#loginDIV a").live('click',function(){
					//alert ('a');return false;
					var url=$(this).attr('href');
					//alert(url);return false;
					$.ajax({				
						type: "POST",
						url: url,
						//data: "name=John&location=Boston",
						success: function(msg){
						   //alert( "Data Saved: " + msg );
							var nr2='<form action="index.php?c=user&a=login" method="post" id="formDIV">';
							nr2+='用户名：<input type="text" name="username" id="username" size="10"/> ';
							nr2+='密 码：<input type="password" name="password" id="password" size="10"/> ';
							nr2+='<input type="checkbox" name="remember" value=1 />记住我 ';
							nr2+='<input type="submit"  value="登录" />';
							nr2+='</form>';
							$("#loginDIV").html(nr2);
						  }
          });
					return false;
					})
					
				</script>
				
				
				
				