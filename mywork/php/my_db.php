<?php
	$host = 'localhost';
	$dbuser = 'root';
	$dbpw = 'jasonsu88';
	$dbname = 'my_db';
	
	$link = mysql_connect($host, $dbuser, $dbpw);
	
	if($link)
	{
		mysql_query("SET NAMES utf8");
		
		$db = mysql_select_db($dbname, $link);
		
		if($db)
		{
			//echo "以連接";
		}
		else{
			echo "未連結到資料庫 {$dbname} , 錯誤訊息 :</br> " . mysql_error();
		}
		
	}
	else{
		echo "未連結到資料庫 {$dbname} , 錯誤訊息 :</br> " . mysql_error();
	}
?>