<?php
    session_start();
	require_once "../php/my_db.php";
	require_once "../php/functions.php";

	
		$save_result = user_save($_POST, $link);
		if($save_result){
			echo "儲存成功";
		}
		else{
			echo "儲存失敗";
		}
	
	header('refresh:2; url=../login.php');
	
?>
