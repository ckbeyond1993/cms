180
a:4:{s:8:"template";a:3:{s:14:"news/index.tpl";b:1;s:10:"header.tpl";b:1;s:10:"footer.tpl";b:1;}s:9:"timestamp";i:1444447728;s:7:"expires";i:1444451328;s:13:"cache_serials";a:0:{}}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

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
														   <form action="index.php?c=user&a=login" method="post" id="formDIV">
								    用户名：<input type="text" name="username" id="username" size="10"/>
										密 码：<input type="password" name="password" id="password" size="10"/>
										<input type="checkbox" name="remember" id="remember" value=1 />记住我
									  <input type="submit"  value="登录" />
								 </form>
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
				
				
				
				
<div class="mainRight">
	<div class="rightTOP"></div>
	<div class="rightMid" >
		<div class="breadCrumb">您现在的位置是：新闻中心</div>
    <div id="newsDIV">
		<ul class="news">   <!--<a href="index.php?c=news&a=info&id=">这是使用没静态化的链接-->
					<li><a href="html/63.html"> beyond</a><span style="float:right">2014-11-11 20:32:39</span></li> 
					<li><a href="html/62.html"> <a...</a><span style="float:right">2014-11-03 00:33:58</span></li> 
					<li><a href="html/61.html"> <script>alert(1...</a><span style="float:right">2014-11-03 00:32:49</span></li> 
					<li><a href="html/60.html"> aa</a><span style="float:right">2014-11-03 00:31:38</span></li> 
					<li><a href="html/59.html"> zz</a><span style="float:right">2014-11-02 22:39:39</span></li> 
				</ul>
		</div>
		<div id="pageDIV" style="margin-top:10px"><a href='index.php?c=news&a=index&curpage=1' class='number' title='1'>首页</a><a href='index.php?c=news&a=index&curpage=1' class='number current' title='1'>1</a><a href='index.php?c=news&a=index&curpage=2' class='number' title='2'>2</a><a href='index.php?c=news&a=index&curpage=3' class='number' title='3'>3</a><a href='index.php?c=news&a=index&curpage=4' class='number' title='4'>4</a><a href='index.php?c=news&a=index&curpage=5' class='number' title='5'>5</a><a href='index.php?c=news&a=index&curpage=2' class='number' title='2'>下一页</a><a href='index.php?c=news&a=index&curpage=9' class='number' title='9'>尾页</a></div>
	</div>
	
	<div class="rightBtm"></div>
</div>
     <div class="clear"></div>    
    </div>
    <ul class="footer">
    	<li></li>
        <li class="footCen">版权所有&copy;佛山市顺德区宝源家具实业有限公司&nbsp;&nbsp;技术支持QQ:463022243多迪网络科技</li>
        <li class="footRig"></li>
    </ul>
<!--    1、加快显示速度
    2、提高负载承受能力
    3、保证特效的完整性
    <p>&nbsp;</p> <p>&nbsp;</p> <p>&nbsp;</p>-->
</div>
</body>
</html>
<script>
	$("#pageDIV a").live('click',function(){
		//alert("a");
		var url=$(this).attr("href");
		//alert (url);return false;
		$.ajax({
			type: "GET",
			url: url,
			dataType:'json',      
			success: function(msg){
        //alert( "Data Saved: " + msg);return false; //将上面dataType:'json', 屏蔽掉才能看到详细内容
				var nr='';
				for(var i=0;i<msg.data.length;i++){
					nr+='<ul class="news">';
					nr+='<li><a href="html/'+msg.data[i].id+'.html">'+msg.data[i].title+'</a><span style="float:right">'+msg.data[i].newstime+'</span></li>';
					nr+='</ul>';	
			 }

				 $("#newsDIV").html(nr);
				 $("#pageDIV").html(msg.page);
			}
		});
		return false;
		})
</script>