<?php
    session_start();
	require_once "../php/my_db.php";
	require_once "../php/functions.php";

	if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == TRUE){
		$save_result = article_save($_POST, $link);
		if($save_result){
			echo "儲存成功";
		}
		else{
			echo "儲存失敗";
		}
	}
	header('refresh:2; url=../admin/article_list.php');
	
?>
