 <?php
/**
*  定义连接数据库的函数
*  @param $server        string  服务器名
*  @param $username      string  数据库登录用户名
*  @param $password      string  数据库密码
*  @param $dbName        string  选择的数据库名
*  @author power
*  @tel 15072391772
*/
	function connectDB($server="localhost",$username="root",$password="123456",$dbName="e1407_caikan"){
			$link=mysql_connect("$server","$username","$password");
			mysql_select_db("$dbName",$link);
			mysql_query("set names utf8");
	}
	
	
	/*
	*  查一条记录
	*  @param  $table  string  表名
	*  @param  $*      string  字段名
	*  @param  $cols   string  字段名
	*  @param  $id      int     ID值
	*/
	function getOne($con=1,$area='`title`,`content`',$table='news'){
		$sql="SELECT $area FROM `$table` WHERE $con";
		//echo $sql;exit;
		$result=mysql_query($sql) or die(mysql_error());
		return mysql_fetch_assoc($result);;
	}
/* 		function getOne($id,$area='`title`,`content`',$table='news',$cols='id'){
		$sql="SELECT $area FROM `$table` WHERE `$cols`='$id'";
		//echo $sql;exit;
		$result=mysql_query($sql) or die(mysql_error());
		return mysql_fetch_assoc($result);
	} */
	
	
	
	/*
	 *  查询列表  
	 *  @param  $offset   int      偏移量
	 *  @param  $perpage  int      每页条数
	 *  @param  $area     string   字段名
	 *  @param  $table    string   表名
	 *  @param  $order    string   正/倒序
	 *  return  $data     array    二维数组
	 */
/* 	 	function getList($offset,$perpage,$table='news',$order='DESC'){
		$sql="SELECT * FROM `$table` ORDER BY `id` $order LIMIT $offset,$perpage"; */
	function getList($offset,$perpage,$table='news',$order='DESC',$con=1,$inner="",$id="id",$zd="*"){
	// getList($offset,$perpage,'`news`','desc',1,'inner join `category` on `news`.`cate_id`=`category`.`id`','`news`.`*`,'`news`.`id`','`news`.`*`,`category`.`name`')
	// select `news`.`*`,`category`.`name` from `news` inner join `category` on `news`.`cate_id`=`category`.`id` where 1 order by $id desc limit $offset,$perpage
		$sql="SELECT $zd FROM $table $inner WHERE $con ORDER BY $id $order LIMIT $offset,$perpage";
		//echo $sql;//exit;
		$data=array();
		$result=mysql_query($sql) or die(mysql_error());
		while($assoc=mysql_fetch_assoc($result)){
		$data[]=$assoc;	
    }
	  return $data;
  }
	
	
	
	/*
	*  新增一条记录
	*  @param  $table                 string 表名
	*  @param  $arr                   array  $_POST数组
	*  return  mysql_affected_rows()  int    影响行数
	*/
	function add($arr=array(),$table='news'){
		$str1="";
		$str2="";
		foreach($arr as $k=>$v){
			$str1.="`$k`,";//飘号
			$str2.="'$v',";//单引号
		}
		$str1=substr($str1,0,-1);
		$str2=substr($str2,0,-1);
		$sql="INSERT INTO `$table` ($str1) VALUES ($str2)";
		mysql_query($sql) or die(mysql_error());
		return mysql_affected_rows();
	}
	
	
	/*
	*  删除一条记录
	*  @param  $id      int      ID值
	*  @param  $table   string   表名
	*  @param  $cols    string   字段名
	*  return  影响行数
	*/
	function del($con=1,$table='news'){
		$sql="DELETE FROM `$table` WHERE $con";
		mysql_query($sql) or die(mysql_error());
		return mysql_affected_rows();
	}

	
	/*
	*  修改 一条记录
	*  @param  $id     int      ID值
	*  @param  $arr    array    $_POST数组
	*  @param  $cols   string   字段名
	*  @param  $table  string   表名
	*/
	function update($con=1,$table='news',$arr=array()){
	    $str="";
		foreach($arr as $k=>$v){
			$str.="`$k`='$v',";
	    }
		$str=substr($str,0,-1);
		$sql="UPDATE `$table` SET $str WHERE $con";
		//echo $sql;exit;
		mysql_query($sql) or die(mysql_error());
		return mysql_affected_rows();
	}
	
	
	/*
	*  取一行 
	*  @param  $username   string    字段名
	*  @param  $password   string    字段名
	*  @param  $area       string    字段名
	*  @param  $table      string    表名
	*  return  $assoc      array     数组
	*/
/* 	function fetchRow($con=1,$area='`id`,`username`,`password`',$table='admins') {
	   $sql="SELECT $area FROM `$table` WHERE $con";
		 $result=mysql_query($sql) or die(mysql_error());
		 $assoc=mysql_fetch_assoc($result);
		 //$num=mysql_num_rows($result);
		 return $assoc;
	 }  */
	
	
  /* 
	*返回操作条数 
	*  @param  $username   string    字段名
	*  @param  $password   string    字段名
	*  @param  $area       string    字段名
	*  @param  $table      string    表名
	*  return  $num        array     数组
	*/
	function getRecordNum($con=1,$area='`id`,`username`,`password`',$table='admins'){
		 $sql="SELECT $area FROM `$table` WHERE $con";
		 //echo $sql;die;
		 $result=mysql_query($sql) or die(mysql_error());
		 $num=mysql_num_rows($result);
		 return $num;
	 }
	 
	 

	 

	 ?>