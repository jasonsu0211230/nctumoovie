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

		<title>作品新增</title>
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
						<form method="post" action="../php/work_save.php" enctype="multipart/form-data">
							<div class="form-group">
								<label for="intro">簡介</label>
								<textarea class="form-control" rows="5" id="intro" name="intro"></textarea>
							</div>
							<div class="form-group">
								<label for="image_path">圖片上傳</label>
								<input type="file" accept=".jpg , .png , .gif" id="image_path" name="image_path">
							</div>
							<!--<div class="form-group">
							<label for="video_path">影片上傳</label>
								<input type="file" accept=".mp4" id="video_path" name="video_path">
							</div>-->
							
							<div class="form-group">
							<label for="release_date">上映日期</label>
					
								<textarea class="form-control" rows="1" id="release_date" name="release_date"></textarea>
							</div>
							
							<div class="form-group">
							<label for="trailer">預告連結</label>
					
								<textarea class="form-control" rows="1" id="trailer" name="trailer"></textarea>
							</div>
							
							<div class="form-group">
								
								<label class="checkbox-inline" >
									<input type="checkbox" name="publish" value="1" checked>
									發佈 </label>
								<label class="checkbox-inline" >
									<input type="checkbox" name="publish" value="0">
									不發佈 </label>
								
							</div>
							
							<div class="form-group">
								
								<label class="checkbox-inline" >
									<input type="checkbox" name="released" value="1" checked>
									上映 </label>
								<label class="checkbox-inline" >
									<input type="checkbox" name="released" value="0">
									未上映 </label>
								
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
