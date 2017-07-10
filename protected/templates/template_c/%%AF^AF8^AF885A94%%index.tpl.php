<?php /* Smarty version 2.6.26, created on 2014-11-11 17:31:30
         compiled from news/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'news/index.tpl', 10, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="mainRight">
	<div class="rightTOP"></div>
	<div class="rightMid" >
		<div class="breadCrumb">您现在的位置是：新闻中心</div><?php echo $this->_tpl_vars['y']; ?>

    <div id="newsDIV">
		<ul class="news">   <!--<a href="index.php?c=news&a=info&id=<?php echo $this->_tpl_vars['v']['id']; ?>
">这是使用没静态化的链接-->
		<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
			<li><a href="html/<?php echo $this->_tpl_vars['v']['id']; ?>
.html"> <?php echo ((is_array($_tmp=$this->_tpl_vars['v']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 18, "...") : smarty_modifier_truncate($_tmp, 18, "...")); ?>
</a><span style="float:right"><?php echo $this->_tpl_vars['v']['newstime']; ?>
</span></li> 
		<?php endforeach; endif; unset($_from); ?>
		</ul>
		</div>
		<div id="pageDIV" style="margin-top:10px"><?php echo $this->_tpl_vars['page']; ?>
</div>
	</div>
	
	<div class="rightBtm"></div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

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