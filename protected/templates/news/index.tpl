<{include file='header.tpl'}>

<div class="mainRight">
	<div class="rightTOP"></div>
	<div class="rightMid" >
		<div class="breadCrumb">您现在的位置是：新闻中心</div><{$y}>
    <div id="newsDIV">
		<ul class="news">   <!--<a href="index.php?c=news&a=info&id=<{$v.id}>">这是使用没静态化的链接-->
		<{foreach from=$data key=k item=v}>
			<li><a href="html/<{$v.id}>.html"> <{$v.title|truncate:18:"..."}></a><span style="float:right"><{$v.newstime}></span></li> 
		<{/foreach}>
		</ul>
		</div>
		<div id="pageDIV" style="margin-top:10px"><{$page}></div>
	</div>
	
	<div class="rightBtm"></div>
</div>
<{include file='footer.tpl'}>

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