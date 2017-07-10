<?php
function excel($data){

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

//设置行宽
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);

//设置行高度
$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(22);
$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);

// 字体和样式
$objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(10);
$objPHPExcel->getActiveSheet()->getStyle('A2:D2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

$objPHPExcel->getActiveSheet()->getStyle('A2:D2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->getStyle('A2:D2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

$objPHPExcel->getActiveSheet()->getStyle('A2:D2')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

// 设置水平居中
$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

$objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


//合并单元格
$objPHPExcel->getActiveSheet()->mergeCells('A1:D1');

//表头
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', '管理员列表  时间 '.date('Y-m-d H:i:s'))
    ->setCellValue('A2', '序号')
    ->setCellValue('B2', '姓名')
    ->setCellValue('C2', '最后登录IP')
    ->setCellValue('D2', '最后登录时间');

//内容
for($i=0;$i<count($data);$i++){
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.($i+3), $data[$i]['id']);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.($i+3), $data[$i]['username']);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.($i+3), $data[$i]['lastloginip']);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.($i+3), date('Y-m-d H:i:s',$data[$i]['lastlogintime']));
    $objPHPExcel->getActiveSheet()->getStyle('A' . ($i + 3) . ':D' . ($i + 3))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('A' . ($i + 3) . ':D' . ($i + 3))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    $objPHPExcel->getActiveSheet()->getRowDimension($i + 3)->setRowHeight(16);
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
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');


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