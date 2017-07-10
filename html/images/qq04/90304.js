
lastScrollY=0;
function heartBeat(){ 
var diffY;
if (document.documentElement && document.documentElement.scrollTop)
    diffY = document.documentElement.scrollTop;
else if (document.body)
    diffY = document.body.scrollTop
else
    {/*Netscape stuff*/}
    
//alert(diffY);
percent=.1*(diffY-lastScrollY); 
if(percent>0)percent=Math.ceil(percent); 
else percent=Math.floor(percent); 
document.getElementById("lovexin12").style.top=parseInt(document.getElementById("lovexin12").style.top)+percent+"px";

lastScrollY=lastScrollY+percent; 
//alert(lastScrollY);
}
suspendcode12="<DIV id=\"lovexin12\" style='right:22px;POSITION:absolute;TOP:100px;z-index:100'>";
var recontent='<table align="left" style="margin-right:22px;width:90px" border="0" cellpadding=0 cellspacing=0 height="32">' + 
'<tr>' + 
'<td style="padding:0;font-size:13px" height="32" ><table style="width:90px" border="0" cellspacing="0" cellpadding="0" height="1">' + 
'<tr>' + 
'<td style="padding:0;font-size:13px; background:none" height="20"><img src="images/qq04/head_90304.gif"  border="0" usemap="#MapMapMap"></td>' + 
'</tr>' + 
'<tr>' + 
'<td style="padding:0;font-size:13px;padding-left:1px" background="images/qq04/center_1_90304.gif" height="19">' + 
'<table style="width:90px"  border="0" align="center" cellpadding="0" cellspacing="0" height="1">' + 
'<tr>' + 
'<td style="padding:0;background:#F7F3F7;font-size:13px" height="6"></td>' + 
'</tr>' + 
'<tr>' + 
'<td style="padding:0;background:#F7F3F7;font-size:13px" height="1" align="left"><img style="margin:0;padding:0" src="images/qq04/center_2_90304.gif"><span style="text-decoration:none;font-size:14px;font-family:新宋体;color:#000000;font-weight:700">在线咨询</span></td>' + 
'</tr>' + 
'<tr>' + 
'<td style="padding:0;background:#F7F3F7;font-size:13px" height="39">' + 
'<table  border="0" align="left" cellpadding="0" cellspacing="0" style="width:90px">' + 
'<!--begin-->' + 
'<tr>' + 
'<td style="padding-left:0px" align="left" width="10"><img src="images/qq04/center_4_90304.gif"></td>' + 
'<td style="background-color: bgcolor; background-repeat: repeat; background-attachment: scroll; padding: 0; background-position: 0%" height="24" align="left">' + 
'&nbsp;<a style="text-decoration:none;" href="tencent://message/?uin=463022243&Site=在线咨询&Menu=yes" target="blank"><span style="text-decoration:none;font-family:新宋体;font-size:12;color:#000000;text-align:left">小吴</span>' + 
'</td>' + 
'</tr>' + 
'<tr>' + 
'<td style="padding-left:0px" align="left" width="10"><img src="images/qq04/center_4_90304.gif"></td>' + 
'<td style="background-color: bgcolor; background-repeat: repeat; background-attachment: scroll; padding: 0; background-position: 0%" height="24" align="left">' + 
'&nbsp;<a style="text-decoration:none;" href="tencent://message/?uin=463022243&Site=在线咨询&Menu=yes" target="blank"><span style="text-decoration:none;font-family:新宋体;font-size:12;color:#000000;text-align:left">建站咨询</span>' + 
'</td>' + 
'</tr>' + 
'<tr>' + 
'<td style="padding-left:0px" align="left" width="10"><img src="images/qq04/center_4_90304.gif"></td>' + 
'<td style="background-color: bgcolor; background-repeat: repeat; background-attachment: scroll; padding: 0; background-position: 0%" height="24" align="left">' + 
'&nbsp;<a style="text-decoration:none;" href="tencent://message/?uin=463022243&Site=在线咨询&Menu=yes" target="blank"><span style="text-decoration:none;font-family:新宋体;font-size:12;color:#000000;text-align:left">项目咨询</span>' + 
'</td>' + 
'</tr>' + 
'<!--end-->' + 
'</table></td>' + 
'</tr>' + 
'</table></td>' + 
'</tr>' + 
'<tr>' + 
'<td style="padding:0;font-size:13px" height="1"><img src="images/qq04/end_90304.gif"></td>' + 
'</tr>' + 
'</table>' + 
'</td>' + 
'</tr>' + 
'</table>' + 
'<map name="MapMapMap" onclick="far_close()" style="cursor:handle">' + 
'<area shape="rect" coords="71,8,102,30" href="#">' + 
'</map>';

document.write(suspendcode12); 
document.write(recontent); 
document.write("</div>"); 
window.setInterval("heartBeat()",1);

function far_close()
{
	document.getElementById("lovexin12").innerHTML="";
}

function setfrme()
{
	var tr=document.getElementById("lovexin12");
	var twidth=tr.clientWidth;
	var theight=tr.clientHeight;
	var fr=document.getElementById("frame55la");
	fr.width=twidth-1;
	fr.height=theight-30;
}
//setfrme()

