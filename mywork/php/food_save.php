<?php
    session_start();
	require_once "../php/my_db.php";
	require_once "../php/functions.php";
//print_r($_POST);



	if($_SESSION['username'] != null){
		
		if(file_exists($_FILES['image']['tmp_name']))
		{
			$folder = "images/";
			//定義圖片資料夾
			
			$file_name = $_FILES['image']['name'];
			
			move_uploaded_file($_FILES['image']['tmp_name'],"../" . $folder . $file_name);
			
			$_POST['image'] = $folder . $file_name;
		}
		
		//print_r($_POST);
	$save_result = food_save($_POST, $link);
	 
		if($save_result){
			echo "儲存成功";
		}
		else{
			echo "儲存失敗";
		}
	}
	//header('refresh:5; url=../admin/work_list.php');
	header('refresh:1; url=../admin/food_list.php');

?>
