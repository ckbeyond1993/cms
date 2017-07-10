<?php
//print_r($_FILES);exit;
/*Array
(
    [excel] => Array
    (
            [name] => 管理员列表(2015-06-05 16_01_41).xlsx
            [type] => application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
            [tmp_name] => D:\xampp\tmp\php51B2.tmp
            [error] => 0
            [size] => 6870
        )

)*/



require_once   MODEL_PATH.'/phpexcel/Classes/PHPExcel.php';
if($_FILES['excel']['name']){
    $file=$_FILES['excel'];
    /*获取Excel文件类型，确定版本*/
    $arr = explode('.',$file['name']);
    $num = count($arr);
    $extend=$arr[$num-1];
    //获取除文件扩展名以外的文件名称
    $pre_file=str_replace($extend,'',$file['name']);
    //判断渲染模式
    $extend = strtolower($extend);
    $extend=='xlsx'?$reader_type='Excel2007':$reader_type='Excel5';

    //文件保存路径
    $filename=$pre_file.date('Y_m_d_H_i_s').'.'.$extend;//文件名
//用以解决中文不能显示出来的问题
    $filename=iconv("utf-8","gb2312",$filename);

    $path='upload/excel';
    if(!file_exists($path)){//判断文件夹是否存在
        mkdir($path,777,true);
    }
	//echo 333;exit;
    //将上传的文件移动到新位置
    if(!move_uploaded_file($file['tmp_name'],$path.'/'.$filename)){
        echo '上传失败';
    }else{
        $res = read ( $path.'/'.$filename,$reader_type );
        var_dump($res);exit;

        //导入的数据表无法登陆，原因是字段值前面多了“ ”，解决方案，用trim()函数过滤

		//将Excel文件导入数据库的代码有一定的局限性，因为Excel的第一行记录的是文件说明，第二行是数据表字段，第三条以后才是真正要导入的内容
		
		
		//第一行放描述，第二行放字段，这一切的前提是要导入的数据的条数也是就count($res)>3
		
		
		if(!empty($res)){
			$str = "";
			foreach ( $res as $key => $val ){
				$str2 = "";
				foreach($val as $k => $v){
				//当$key==2时，所记录的是数据表的字段。其实不需要字段组合一样可以插入
					if ( $key == 2){
                        $v = trim($v);  //屏蔽字段值前面的空格，读取excel文件的时候字段值前多了“ ”
						$str .= "`$v`,";
					}elseif( $key> 2){
                        $v = trim($v);  //屏蔽字段值前面的空格，读取excel文件的时候字段值前多了“ ”
						$str2 .= "'$v',";
					}											
				}
				$str=trim($str,',');
				$str2=trim($str2,',');
				//$key ==1记录的是Excel表的说明
				if($key != 1 && $key != 2){
					$sql="INSERT INTO `admins` ($str) VALUES ($str2)";
                   // $sql="INSERT INTO `admins`  VALUES ($str2)"; 这样也是可以的
					$result = mysql_query($sql);
					if(!$result){
						echo "<script>alert('上传失败')</script>";
					}else{
						header('location:index.php?admin=admin&c=admin&a=index');
					}					
				}
					
			}
		}
	}


}

//将Excel文件转换为数组
 function read($filename,$reader_type,$encode='utf-8'){
     $objReader = PHPExcel_IOFactory::createReader($reader_type);

     $objReader->setReadDataOnly(true);

     $objPHPExcel = $objReader->load($filename);

     $objWorksheet = $objPHPExcel->getActiveSheet();

     $highestRow = $objWorksheet->getHighestRow();
     $highestColumn = $objWorksheet->getHighestColumn();
     $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
     $excelData = array();
     for ($row = 1; $row <= $highestRow; $row++) {
          for ($col = 0; $col < $highestColumnIndex; $col++) {
             $excelData[$row][] =(string)$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
         }
     }
     return $excelData;


 }

?>