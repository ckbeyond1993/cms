$(function(){
 //var username=$("#username").val();放在外面会获取的username,password永远为空
 //var password=$("#password").val();那么if里面永远为真，一直阻止表单提交； 故这样写是不合适的；
//alert (username);
 $("#btn").click(function(){
 var username=$("#username").val();
 var password=$("#password").val();
 if(username==""||password==""){
 $("#error").text("用户名，密码不能为空");
 $("#serverError").text("");
 return false;
 }
 })
})

