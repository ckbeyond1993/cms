<?php
/**
 * upload.php
 *
 * Copyright 2013, Moxiecode Systems AB
 * Released under GPL License.
 *
 * License: http://www.plupload.com/license
 * Contributing: http://www.plupload.com/contributing
 */

#!! IMPORTANT:
#!! this file is just an example, it doesn't incorporate any security checks and
#!! is not recommended to be used in production environment as it is. Be sure to
#!! revise it and customize to your needs.

//其实不必太追究文件上传的过程,只需要提取我想要的参数进行适当的处理就OK了, by beyond!


// Make sure file is not cached (as it happens for example on iOS devices)
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


// Support CORS
// header("Access-Control-Allow-Origin: *");
// other CORS headers if any...
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit; // finish preflight CORS requests here
}


if ( !empty($_REQUEST[ 'debug' ]) ) {
    $random = rand(0, intval($_REQUEST[ 'debug' ]) );
    if ( $random === 0 ) {
        header("HTTP/1.0 500 Internal Server Error");
        exit;
    }
}

// header("HTTP/1.0 500 Internal Server Error");
// exit;


// 5 minutes execution time
@set_time_limit(5 * 60);

// Uncomment this one to fake upload time
usleep(5000);

// Settings
// $targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
$targetDir = 'upload_tmp';
//$uploadDir = 'upload';  //改变上传目录为我指定的上传目录
//$uploadDir = 'http://localhost/cms/upload/'.date('Y/m/d'); //不可以

$uploadDir = '../upload/'.date('Y/m/d'); //可以
//$uploadDir = 'E:/xampp/htdocs/cms/upload/'.date('Y/m/d'); //不知道是不是本地的原因，上面几种情况都不能正常的创建文件

//echo $uploadDir;exit;

$cleanupTargetDir = false; // Remove old files
$maxFileAge = 5 * 3600; // Temp file age in seconds


// Create target dir
if (!file_exists($targetDir)) {
    @mkdir($targetDir);
}

// Create target dir
if (!file_exists($uploadDir)) {
    //@mkdir($uploadDir);
    @mkdir($uploadDir,0777,true);  //*********** 去掉@可以查看错误,这里第三个参数一定要加上true，因为这是递归创建文件夹,被坑了好久，还一直以为是路径问题
}

// Get a file name
if (isset($_REQUEST["name"])) {
    $fileName = $_REQUEST["name"];
} elseif (!empty($_FILES)) {
    $fileName = $_FILES["file"]["name"];
} else {
    $fileName = uniqid("file_");
}

$md5File = @file('md5list.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$md5File = $md5File ? $md5File : array();

if (isset($_REQUEST["md5"]) && array_search($_REQUEST["md5"], $md5File ) !== FALSE ) {
    die('{"jsonrpc" : "2.0", "result" : null, "id" : "id", "exist": 1}');
}

$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
//$uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;
$uploadPath = $uploadDir . '/' . $fileName;

// Chunking might be enabled
$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;
/*echo '<pre>';
print_r($_REQUEST);
print_r($_FILES);exit;*/
/*
Array
(
    [id] => WU_FILE_0
    [name] => 6591fdc218306.png
    [type] => image/png
    [lastModifiedDate] => Wed Jul 08 2015 09:27:42 GMT+0800
    [size] => 5004
)
Array
(
    [file] => Array
        (
            [name] => 6591fdc218306.png
            [type] => image/png
            [tmp_name] => E:\xampp\tmp\phpA96C.tmp
            [error] => 0
            [size] => 5004
        )

)
*/

// Remove old temp files
if ($cleanupTargetDir) {
    if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
        die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
    }

    while (($file = readdir($dir)) !== false) {
        $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

        // If temp file is current file proceed to the next
        if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
            continue;
        }

        // Remove temp file if it is older than the max age and is not the current file
        if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
            @unlink($tmpfilePath);
        }
    }
    closedir($dir);
}


// Open temp file
if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
    die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
}

if (!empty($_FILES)) {
    if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
        die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
    }

    // Read binary input stream and append it to temp file
    if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
    }
} else {
    if (!$in = @fopen("php://input", "rb")) {
        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
    }
}

while ($buff = fread($in, 4096)) {
    fwrite($out, $buff);
}

@fclose($out);
@fclose($in);

rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");

$index = 0;
$done = true;
for( $index = 0; $index < $chunks; $index++ ) {
    if ( !file_exists("{$filePath}_{$index}.part") ) {
        $done = false;
        break;
    }
}
if ( $done ) {
    if (!$out = @fopen($uploadPath, "wb")) {
        die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
    }

    if ( flock($out, LOCK_EX) ) {
        for( $index = 0; $index < $chunks; $index++ ) {
            if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
                break;
            }

            while ($buff = fread($in, 4096)) {
                fwrite($out, $buff);
            }

            @fclose($in);
            @unlink("{$filePath}_{$index}.part");
        }

        flock($out, LOCK_UN);
    }
    @fclose($out);
}

// Return Success JSON-RPC response
die('{"jsonrpc" : "2.0", "result" : {"name" : "'.$_REQUEST['name'].'","path" : "'.$uploadPath.'"}, "id" : "'.$_REQUEST['id'].'"}');
//die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');