<?php
    session_start();
	require_once "../php/my_db.php";
	require_once "../php/functions.php";

	if($_SESSION['username'] != null){
		$save_result =food_del($_GET['id']);
		if($save_result){
			echo "刪除成功";
		}
		else{
			echo "刪除失敗";
		}
	}
	header('refresh:1; url=../admin/food_list.php');
	
?>
