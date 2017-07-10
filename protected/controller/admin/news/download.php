<?php

//文件下载两种方法

//1.直接做超链接，地址为文件地址
//<a href="upload/excel/file.rar">点击下载</a>
//缺点:只能下载浏览器不能解析的文件，比如rar啊，脚本文件之类。如果文件是图片或者txt文档，就会直接在浏览器中打开

//2.文件输出流，如下

//header("Content-type:text/html;charset=utf-8");
$file_dir=$_SERVER['DOCUMENT_ROOT']."/cms/upload/excel/";
$file_name="管理员列表.xlsx";
//用以解决中文不能显示出来的问题
$file_name=iconv("utf-8","gb2312",$file_name);

download($file_dir,$file_name);

function download($file_dir,$file_name){

    ob_clean();//屏蔽这句，下载的文件打不开，而且大小比源文件多一个字节
    //http://bbs.csdn.net/topics/390932524

    $file_path = $file_dir.$file_name;
    //判断要下载的文件是否存在
    //file_exists()不支持中文路径的问题:因为php函数比较早，不支持中文，所以如果被下载的文件名是中文的话，需要对其进行字符编码转换，否则file_exists()函数不能识别，可以使用iconv()函数进行编码转换
    if(!file_exists($file_path)) {
        echo '对不起,你要下载的文件不存在';
        return false;
    }
    $file_size = filesize($file_path);

    header("Content-type: application/octet-stream"); //通过这句代码客户端浏览器就能知道服务端返回的文件形式
    header("Accept-Ranges: bytes"); //告诉浏览器返回的文件大小是按照字节进行计算的
    header("Accept-Length: $file_size");  //告诉浏览器返回的文件大小
    header("Content-Disposition: attachment; filename=".$file_name); //告诉浏览器返回的文件的名称

    $fp = fopen($file_path,"r");
    $buffer_size = 1024;
    $cur_pos = 0;

    while(!feof($fp)&&$file_size>$cur_pos)
    {
        $buffer = fread($fp,$buffer_size);
        echo $buffer;
        $cur_pos += $buffer_size;
    }
    fclose($fp);
}
/*
 * 需要注意的是，如果文件较大，文件应该是被分成多段返回给客户端的，并不是等文件在服务端全部读取完毕后，一次性返回给客户端，因为这样子会增加服务器的负荷。所以我们需要在php代码中设置一次读取的字节数,比如我在上面的代码中通过$buffer_size=1024设置一次读取的字节数，每读取一次，就输出数据。
 * */