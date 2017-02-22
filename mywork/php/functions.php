<?php
	function get_publish_article(){
   	$dates = array();
	$sql = "SELECT * FROM `article` ";
	$result = mysql_query($sql);
	if($result){
		if(mysql_num_rows($result) > 0){
			while($row = mysql_fetch_assoc($result)){
				$dates[] = $row;
			}
		
			
		}
		mysql_free_result($result);
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $dates;
	
   }
   function get_all_article(){
   	$dates = array();
	$sql = "SELECT * FROM `article` WHERE `publish` = 1;";
	$result = mysql_query($sql);
	if($result){
		if(mysql_num_rows($result) > 0){
			while($row = mysql_fetch_assoc($result)){
				$dates[] = $row;
			}
		
			
		}
		mysql_free_result($result);
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $dates;
	
   }
   function get_article($id){
   	$article = null;
	$sql = "SELECT * FROM `article` WHERE `id` = {$id};";
	$result = mysql_query($sql);
	if($result){
		if(mysql_num_rows($result) == 1 ){
				$article = mysql_fetch_assoc($result);
			}	
		mysql_free_result($result);
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $article;
	
   }
   
   
   
   
   
   
   
   
   
   
   
   function login($username = NULL, $password = NULL)
   {
   	$has_user = FALSE;
	$sql = "SELECT * FROM `user` WHERE `username` = '{$username}' AND `password` = '{$password}';";
	$result = mysql_query($sql);
	if($result){
		if(mysql_num_rows($result) == 1)
		{
			$has_user = true;
		}
		mysql_free_result($result);
		$_SESSION['username']=$username;
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息: " . mysql_error();
	}
	return $has_user;
	
   }
   function article_save($data, $link){
   	$save_result = false;
	date_default_timezone_set('Asia/Taipei');
	$time = date("Y-m-d H:i:s");
	if(isset($data['id']))
	{
		$sql = "UPDATE `article` SET 
		`title` = '{$data['title']}' ,
		`category` = '{$data['category']}' ,
		`content` = '{$data['content']}' ,
		`publish` = '{$data['publish']}' ,
		`modify_date` = '{$time}'
		
		where `id` = {$data['id']};";
		
	}
	else {
	
	$sql = "INSERT INTO `article` (`title` , `category` , `content` , `publish` , `create_date`)
			VALUE ( '{$data['title']}' , '{$data['category']}' , '{$data['content']}', '{$data['publish']}' , '{$time}' );";
	}
	$result = mysql_query($sql);
	if($result){
		if(!isset( $data['id'] ) )
		{
		$new_id = mysql_insert_id($link);
		echo "執行成功，新增後的id 為 {$new_id}";
		}
		$save_result = true;
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $save_result;
   }
   function article_del($id){
   	$del_result = false;
	$sql = "DELETE FROM `article` WHERE `id` = {$id};";
	$result = mysql_query($sql);
	if($result){
	
		$del_result = true;
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $del_result;
   }
   /////////////////////////////////////////////////////////
   
   function get_publish_order(){
   	$dates = array();
	$sql = "SELECT * FROM `order_list` ";
	$result = mysql_query($sql);
	if($result){
		if(mysql_num_rows($result) > 0){
			while($row = mysql_fetch_assoc($result)){
				$dates[] = $row;
			}
		
			
		}
		mysql_free_result($result);
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $dates;
	
   }
   function get_all_order(){
   	$dates = array();
	$sql = "SELECT * FROM `order_list` ";
	$result = mysql_query($sql);
	if($result){
		if(mysql_num_rows($result) > 0){
			while($row = mysql_fetch_assoc($result)){
				$dates[] = $row;
			}
		
			
		}
		mysql_free_result($result);
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $dates;
	
   }
   function get_order($id){
   	$article = null;
	$sql = "SELECT * FROM `order_list` WHERE `id` = {$id};";
	$result = mysql_query($sql);
	if($result){
		if(mysql_num_rows($result) == 1 ){
				$article = mysql_fetch_assoc($result);
			}	
		mysql_free_result($result);
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $article;
	
   }
   
    function order_save($data, $link){
   	$save_result = false;
	date_default_timezone_set('Asia/Taipei');
	$time = date("Y-m-d H:i:s");
	if(isset($data['id']))
	{
		
		$set_field = array();
		
		foreach($data as $key => $value){
			$set_field[]= "`{$key}` = '{$value}'";
		}
		$set_field[]= "`order_time` = '{$time}'";
		
		$sql = "UPDATE `order_list` SET " . join(",", $set_field) . "WHERE `id` = {$data['id']};";
		
		
		
		
		
	}
	else {
	
	$field = array();
	$field_value = array();
		foreach($data as $key => $value){
			$field[] = "`{$key}`";
			$field_value[] = "'{$value}'";
		}
		$field[]= "`order_time`";
		$field_value[]= "'{$time}'";
		$sql = "INSERT INTO `order_list` (" .join("," , $field) . ")
				VALUE(" . join(", " , $field_value) . ");";
		
	}
	$result = mysql_query($sql);
	if($result){
		if(!isset( $data['id'] ) )
		{
		$new_id = mysql_insert_id($link);
		echo "執行成功，新增後的id 為 {$new_id}";
		$_SESSION['order_id']=$new_id;
		}
		$save_result = true;
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $save_result;
		
	}
	
   
   function order_del($id){
   	$del_result = false;
	$sql = "DELETE FROM `order_list` WHERE `id` = {$id};";
	$result = mysql_query($sql);
	if($result){
	
		$del_result = true;
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $del_result;
   }
   
   
   ////////////////////////////////////////////////////////////
   
   function get_publish_work(){
   	$dates = array();
	$sql = "SELECT * FROM `works` WHERE `publish` = 1";
	$result = mysql_query($sql);
	if($result){
		if(mysql_num_rows($result) > 0){
			while($row = mysql_fetch_assoc($result)){
				$dates[] = $row;
			}
		
			
		}
		mysql_free_result($result);
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $dates;
	
   }
   
    function get_unpublish_work(){
   	$dates = array();
	$sql = "SELECT * FROM `works` WHERE `publish` = 0";
	$result = mysql_query($sql);
	if($result){
		if(mysql_num_rows($result) > 0){
			while($row = mysql_fetch_assoc($result)){
				$dates[] = $row;
			}
		
			
		}
		mysql_free_result($result);
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $dates;
	
   }
   function get_all_work(){
   	$dates = array();
	$sql = "SELECT * FROM `works`  ;";
	$result = mysql_query($sql);
	if($result){
		if(mysql_num_rows($result) > 0){
			while($row = mysql_fetch_assoc($result)){
				$dates[] = $row;
			}
		
			
		}
		mysql_free_result($result);
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $dates;
	
   }
   function get_work($id){
   	$article = null;
	$sql = "SELECT * FROM `works` WHERE `id` = {$id};";
	$result = mysql_query($sql);
	if($result){
		if(mysql_num_rows($result) == 1 ){
				$article = mysql_fetch_assoc($result);
			}	
		mysql_free_result($result);
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $article;
	
   }
   
   
   
   
   
 
   
   
   function work_del($id){
   	$del_result = false;
	$work = get_work($id);
	
	if(file_exists("../" . $work['image_path']))
	{
		

	
		unlink("../" . $work['image_path']);
	}
	/*if(file_exists("../" . $work['video_path']))
	{
		unlink("../" . $work['video_path']);
	}*/
	$sql = "DELETE FROM `works` WHERE `id` = {$id};";
	$result = mysql_query($sql);
	if($result){
	
		$del_result = true;
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $del_result;
   }
   
   
    function work_save($data, $link){
   	$save_result = false;
	date_default_timezone_set('Asia/Taipei');
	$time = date("Y-m-d H:i:s");
	if(isset($data['id']))
	{
		
		$set_field = array();
		
		foreach($data as $key => $value){
			$set_field[]= "`{$key}` = '{$value}'";
		}
		$set_field[]= "`modify_date` = '{$time}'";
		
		$sql = "UPDATE `works` SET " . join(",", $set_field) . "WHERE `id` = {$data['id']};";
		
		
		
		
		
	}
	else {
	
	$field = array();
	$field_value = array();
		foreach($data as $key => $value){
			$field[] = "`{$key}`";
			$field_value[] = "'{$value}'";
		}
		$field[]= "`create_date`";
		$field_value[]= "'{$time}'";
		$sql = "INSERT INTO `works` (" .join("," , $field) . ")
				VALUE(" . join(", " , $field_value) . ");";
		
	}
	$result = mysql_query($sql);
	if($result){
		if(!isset( $data['id'] ) )
		{
		$new_id = mysql_insert_id($link);
		echo "執行成功，新增後的id 為 {$new_id}";
		}
		$save_result = true;
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $save_result;
   }
	
	/////////////////////////////////////////////////////////////////////////////////
	 function user_save($data, $link){
   	$save_result = false;
	date_default_timezone_set('Asia/Taipei');
	$time = date("Y-m-d H:i:s");
	if(isset($data['id']))
	{
		
		$set_field = array();
		
		foreach($data as $key => $value){
			$set_field[]= "`{$key}` = '{$value}'";
		}
		
		
		$sql = "UPDATE `user` SET " . join(",", $set_field) . "WHERE `id` = {$data['id']};";
		
		
		
		
		
	}
	else {
	
	$field = array();
	$field_value = array();
		foreach($data as $key => $value){
			$field[] = "`{$key}`";
			$field_value[] = "'{$value}'";
		}
		
		$sql = "INSERT INTO `user` (" .join("," , $field) . ")
				VALUE(" . join(", " , $field_value) . ");";
		
	}
	$result = mysql_query($sql);
	if($result){
		if(!isset( $data['id'] ) )
		{
		$new_id = mysql_insert_id($link);
		echo "執行成功，新增後的id 為 {$new_id}";
		}
		$save_result = true;
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $save_result;
   }
	
	
	
	////////////////////////////////////////////////////////////////////////////////
	
	
	 function get_publish_food(){
   	$dates = array();
	$sql = "SELECT * FROM `foods` WHERE `publish` = 1";
	$result = mysql_query($sql);
	if($result){
		if(mysql_num_rows($result) > 0){
			while($row = mysql_fetch_assoc($result)){
				$dates[] = $row;
			}
		
			
		}
		mysql_free_result($result);
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $dates;
	
   }
   
    function get_unpublish_food(){
   	$dates = array();
	$sql = "SELECT * FROM `foods` WHERE `publish` = 0";
	$result = mysql_query($sql);
	if($result){
		if(mysql_num_rows($result) > 0){
			while($row = mysql_fetch_assoc($result)){
				$dates[] = $row;
			}
		
			
		}
		mysql_free_result($result);
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $dates;
	
   }
   function get_all_food(){
   	$dates = array();
	$sql = "SELECT * FROM `foods`  ;";
	$result = mysql_query($sql);
	if($result){
		if(mysql_num_rows($result) > 0){
			while($row = mysql_fetch_assoc($result)){
				$dates[] = $row;
			}
		
			
		}
		mysql_free_result($result);
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $dates;
	
   }
   function get_food($id){
   	$article = null;
	$sql = "SELECT * FROM `foods` WHERE `id` = {$id};";
	$result = mysql_query($sql);
	if($result){
		if(mysql_num_rows($result) == 1 ){
				$article = mysql_fetch_assoc($result);
			}	
		mysql_free_result($result);
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $article;
	
   }
   
   
   
   
   
 
   
   
   function food_del($id){
   	$del_result = false;
	$food = get_food($id);
	
	if(file_exists("../" . $food['image']))
	{
		

	
		unlink("../" . $food['image']);
	}
	/*if(file_exists("../" . $work['video_path']))
	{
		unlink("../" . $work['video_path']);
	}*/
	$sql = "DELETE FROM `foods` WHERE `id` = {$id};";
	$result = mysql_query($sql);
	if($result){
	
		$del_result = true;
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $del_result;
   }
   
   
    function food_save($data, $link){
   	$save_result = false;
	date_default_timezone_set('Asia/Taipei');
	$time = date("Y-m-d H:i:s");
	if(isset($data['id']))
	{
		
		$set_field = array();
		
		foreach($data as $key => $value){
			$set_field[]= "`{$key}` = '{$value}'";
		}
		$set_field[]= "`modify_date` = '{$time}'";
		
		$sql = "UPDATE `foods` SET " . join(",", $set_field) . "WHERE `id` = {$data['id']};";
		
		
		
		
		
	}
	else {
	
	$field = array();
	$field_value = array();
		foreach($data as $key => $value){
			$field[] = "`{$key}`";
			$field_value[] = "'{$value}'";
		}
		$field[]= "`create_date`";
		$field_value[]= "'{$time}'";
		$sql = "INSERT INTO `foods` (" .join("," , $field) . ")
				VALUE(" . join(", " , $field_value) . ");";
		
	}
	$result = mysql_query($sql);
	if($result){
		if(!isset( $data['id'] ) )
		{
		$new_id = mysql_insert_id($link);
		echo "執行成功，新增後的id 為 {$new_id}";
		
		}
		$save_result = true;
	}
	else{
		echo "{$sql} 語法執行失敗，錯誤訊息:" . mysql_error();
	}
	return $save_result;
   }
	
	
   
?>