<?php
    session_start();
	require_once "../php/my_db.php";
	require_once "../php/functions.php";

	if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == TRUE){
		$save_result = work_del($_GET['id']);
		if($save_result){
			echo "刪除成功";
		}
		else{
			echo "刪除失敗";
		}
	}
	header('refresh:5; url=../admin/work_list.php');
	
?>
