<?php
	session_start();   
	require_once 'my_db.php' ;
	require_once 'functions.php';
	
	
	if( isset( $_POST['username']) && isset($_POST['password']) )
	{
		
		$has_user = login($_POST['username'], $_POST['password']);
		
		if($has_user)
		{
			$_SESSION['is_login'] = TRUE;
			$_SESSION['username']=$_POST['username'];
			
		}
		else
		{
			$_SESSION['is_login'] = FALSE;
			$_SESSION['msg'] = '登入失敗，請確認帳號密碼';
			
		}
	}
	
	header('Location: ../admin/index.php');
	
?>

