<?php
$action = $_POST['action'];
if($action == 'new_message'){

	$filename  = MODEL_PATH.'data.txt';
	if(!file_exists($filename)){
		fopen($filename,'x+');
	}
	$lastmodify    = isset($_POST['timestamp']) ? $_POST['timestamp'] : 0;
	$currentmodify = filemtime($filename);  //Int filemtime(string $filename),取得文件上次被修改的时间

 	while ($currentmodify <= $lastmodify) // check if the data file has been modified !
    {
        //echo 111;die;
        usleep(10000); // sleep 10ms to unload the CPU  sleep(10)//都是推迟，sleep()是秒为单位，usleep是微妙为单位,1秒=10^6微秒
        clearstatcache();  //清楚文件缓存状态
        $currentmodify = filemtime($filename);
    }

    $new_message = getList(0,100,'message','desc','is_read=0','','time','id,title');

	$response['msg']       = $new_message;
	$response['timestamp'] = $currentmodify;
	//exit;
	echo json_encode($response);
	flush();
}
?>