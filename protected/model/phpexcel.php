<?php
function outExcel($data){

    //猛哥 飞天宝 orderAction.class.php  中更方便

    /** Error reporting */
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);
    date_default_timezone_set('Asia/Shanghai');
//
//if (PHP_SAPI == 'cli')
//    die('This example should only be run from a Web Browser');

    //define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />'); 2.所需要的常量定义

    /** Include PHPExcel */
    require_once dirname(__FILE__) . '/phpexcel/Classes/PHPExcel.php';


// Create new PHPExcel object
    $objPHPExcel = new PHPExcel();

// Set document properties
    $objPHPExcel->getProperties()->setCreator("ck")
        ->setLastModifiedBy("ck")
        ->setTitle("Office 2007 XLSX Test Document")
        ->setSubject("Office 2007 XLSX Test Document")
        ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
        ->setKeywords("office 2007 openxml php")
        ->setCategory("Test result file");

    $newobj =  $objPHPExcel->setActiveSheetIndex(0);
    $obj =  $objPHPExcel->getActiveSheet();

//设置行高度(第一行，第二行)
    $obj->getRowDimension('1')->setRowHeight(26);
    $obj->getRowDimension('2')->setRowHeight(22);

// 字体和样式
    $obj->getDefaultStyle()->getFont()->setSize(10);

    $obj->getStyle('A1')->getFont()->setBold(true);


// 设置水平居中/垂直居中
    $obj->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $obj->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);




    $letter = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    if($data){

        //计算字段长度，-1因为$letter从$letter[0]开始
        $len=count($data[0])-1;
        $i = 1;
        //合并单元格
        $obj->mergeCells('A1:'.$letter[$len].'1');
        //设置表头
        $newobj->setCellValue('A1', '管理员列表  时间 '.date('Y-m-d H:i:s'));
        //设置第二行样式（边框，加粗，居中）
        $obj->getStyle('A2:'.$letter[$len].'2')->getFont()->setBold(true);
        $obj->getStyle('A2:'.$letter[$len].'2')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $obj->getStyle('A2:'.$letter[$len].'2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $obj->getStyle('A2:'.$letter[$len].'2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        foreach ($data as $key => $value) {
            //设置行高度(从第三行开始)
            $obj->getRowDimension($i+2)->setRowHeight(20);
            //设置单元格样式（第三行开始）
            $obj->getStyle('A' . ($i + 2) . ':'.$letter[$len] . ($i + 2))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $obj->getStyle('A' . ($i + 2) . ':'.$letter[$len] . ($i + 2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $obj->getStyle('A' . ($i + 2) . ':'.$letter[$len] . ($i + 2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $j = 0;
            foreach ($value as $k => $val) {
                $index = $letter[$j];

                //设置行宽/居中
                $obj->getColumnDimension($index)->setWidth(30);
                $obj->getStyle($index)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                //$i代表第几条数据(有个致命bug，如果$data只有一条数据，那么$i不会等于2)
                if($i==2){
                    //第二行放字段
                    $newobj->setCellValue($index.$i,  ' '.$k);
                    //同时将查询的第二条数据放入第四行
                    $newobj->setCellValue($index.($i+2),  ' '.$val);
                }else{
                    //将查询的第一条数据放入第三行/第三条以后的数据放入$1+2行
                    $newobj->setCellValue($index.($i+2),  ' '.$val);
                }
                $j++;
            }
            $i++;
        }
    }

// Rename worksheet
    $objPHPExcel->getActiveSheet()->setTitle('管理员列表');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $objPHPExcel->setActiveSheetIndex(0);

    ob_end_clean();//清除缓冲区,避免乱码
    //1.浏览器提示下载
// Redirect output to a client’s web browser (Excel2007)
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="管理员列表('.date('Y-m-d H:i:s').').xlsx"');
	//header('Content-Disposition: attachment;filename="管理员列表('.date('Y-m-d H:i:s').').xls"');
    header('Cache-Control: max-age=0');

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
exit;

    //2.自动保存在当前文件夹下
// Save Excel 2007 file
//echo date('H:i:s') , " Write to Excel2007 format" , EOL;  //创建文件的详细信息
//$callStartTime = microtime(true);

//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//$objWriter->save(str_replace('.php', date('Y_m_d_H_i_s').'.xlsx', __FILE__));

    /*
    $callEndTime = microtime(true);
    $callTime = $callEndTime - $callStartTime;

    echo date('H:i:s') , " File written to " , str_replace('.php', '.xlsx', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;
    echo 'Call time to write Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
    // Echo memory usage
    echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;
     */

}


?>