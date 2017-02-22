<?php
    session_start();
	require_once "../php/my_db.php";
	require_once "../php/functions.php";

	if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == TRUE){
	
		if(file_exists($_FILES['image_path']['tmp_name']))
		{
			$folder = "images/";
			//定義圖片資料夾
			
			$file_name = $_FILES['image_path']['name'];
			
			move_uploaded_file($_FILES['image_path']['tmp_name'],"../" . $folder . $file_name);
			
			$_POST['image_path'] = $folder . $file_name;
		}
		else if(file_exists($_FILES['video_path']['tmp_name']))
		{
			$folder = "video/";
			//定義圖片資料夾
			
			$file_name = $_FILES['video_path']['name'];
			
			move_uploaded_file($_FILES['video_path']['tmp_name'],"../" . $folder . $file_name);
			
			$_POST['video_path'] = $folder . $file_name;
		}
		//print_r($_POST);
	$save_result = work_save($_POST, $link);
	 
		if($save_result){
			echo "儲存成功";
		}
		else{
			echo "儲存失敗";
		}
	}
	//header('refresh:5; url=../admin/work_list.php');
	header('refresh:1; url=../admin/work_list.php');

?>
