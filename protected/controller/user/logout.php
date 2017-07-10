<?php 
unset($_SESSION['user']);
$ucsynlogin = uc_user_synlogout();
echo $ucsynlogin;exit;
if(empty($_SERVER['HTTP_X_REQUESTED_WIDH'])){
   header('location:index.php?c=site&a=index');
}
?>