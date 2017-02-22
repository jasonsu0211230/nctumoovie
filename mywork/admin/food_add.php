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

		<title>食物新增</title>
		<meta name="description" content="練習用">
		<meta name="author" content="jasonsu">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="../css/style.css">

	</head>

	<body>
		<?php
			if($_SESSION['username'] != null):
		?>
		
		
			
		<!-- 內容  -->
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<p class = "text-right">
							<a href='../php/logout.php'>登出</a>
						</p>
						<h1 class="text-center">後台</h1>
						<ul class="nav nav-pills">
							<li role="presentation" >
								<a href="food_list.php">food管理</a>
							</li>
							<li role="presentation" class="active">
								<a href="work_list.php">作品管理</a>
						
						</ul>
						<hr>
						<h2>文章新增</h2>
						<form method="post" action="../php/food_save.php" enctype="multipart/form-data">
							<div class="form-group">
								<label for="name">簡介</label>
								<textarea class="form-control" rows="1" id="name" name="name"></textarea>
							</div>
							<div class="form-group">
								<label for="image">圖片上傳</label>
								<input type="file" accept=".jpg , .png , .gif" id="image" name="image">
							</div>
							<!--<div class="form-group">
							<label for="video_path">影片上傳</label>
								<input type="file" accept=".mp4" id="video_path" name="video_path">
							</div>-->
							
							<div class="form-group">
							<label for="restaurant">餐廳</label>
					
								<textarea class="form-control" rows="1" id="restaurant" name="restaurant"></textarea>
							</div>
							
							<div class="form-group">
							<label for="price">價錢</label>
					
								<textarea class="form-control" rows="1" id="price" name="price"></textarea>
							</div>
							
							<div class="form-group">
								
								<label class="checkbox-inline" >
									<input type="checkbox" name="publish" value="1" checked>
									發佈 </label>
								<label class="checkbox-inline" >
									<input type="checkbox" name="publish" value="0">
									不發佈 </label>
								
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
		<?php else:?>
		<h1>尚未登入</h1>
		<?header('Location: index.php');?>
		<?php endif?>
	</body>
</html>
