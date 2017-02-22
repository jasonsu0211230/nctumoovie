<?php
session_start();
//require_once "../php/my_db.php";
//require_once "../php/functions.php";
//$dates = get_publish_article();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>註冊</title>
		<meta name="description" content="練習用">
		<meta name="author" content="jasonsu">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="../css/style.css">

	</head>

	<body>
		
		
		
			
		<!-- 內容  -->
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<p class = "text-right">
							<a href='../php/logout.php'>登出</a>
						</p>
						<h1 class="text-center">註冊</h1>
						
						<hr>
						<h2>註冊會員</h2>
						<form method="post" action="php/user_save.php" enctype="multipart/form-data">
							<div class="form-group">
								<label for="username">信箱</label>
								<textarea class="form-control" rows="1" id="username" name="username"></textarea>
							</div>
							
							
							<div class="form-group">
							<label for="password">密碼</label>
					
								<textarea class="form-control" rows="1" id="password" name="password"></textarea>
							</div>
							
							<div class="form-group">
							<label for="name">名字</label>
					
								<textarea class="form-control" rows="1" id="name" name="name"></textarea>
							</div>
							
							
							
						

							<button type="submit" class="btn btn-default">
								存檔
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<!-- 頁尾  -->
		<div class="footer">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<p class="text-center">
							&copy; Jason Su all rights reserved.
						</p>

					</div>
				</div>
			</div>
		</div>
		
		
		
		
	</body>
</html>
