<?php
session_start();
require_once "../php/my_db.php";
require_once "../php/functions.php";
$dates = get_all_work();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>作品管理</title>
		<meta name="description" content="練習用">
		<meta name="author" content="jasonsu">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="../css/style.css">
		<!-- 載入 JQUERY CDN -->
		<script src = "//code.jquery.com/jquery-1.11.3.min.js"></script>
		
		<script src="../js/admin.js"></script>
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
							<li role="presentation">
								<a href="work_list.php" class="active">作品管理</a>
						
						</ul>
						<hr>
						<a href="work_add.php" class="btn btn-info">新增作品<span class="glyphicon glyphicon-plus-sign"></span></a>	
						<?php if(!empty($dates)):?>
							<table class = "table table-hover">
								<tr>
									<td>簡介</td>
									<td>圖片</td>
									<td>是否上映</td>
									<td>是否發布</td>
									<td>上傳時間</td>
									<td>管理動作</td>
									
								</tr>
							
							<?php foreach($dates as $row):
								$title = strip_tags($row['intro']);
								$title = mb_substr($title,0 ,10);
								
								
								?>
								
								
								<tr>
									<td><?php echo $title; ?></td>
									<td><?php if($row['image_path']):?><img src='../<?php echo $row['image_path']; ?>' class ="list_cover"><?php endif;?></td>
									<td><?php echo $row['released']; ?></td>
									<td><?php echo $row['publish']; ?></td>
									<td><?php echo $row['create_date']; ?></td>
									<td>
										<a href="work_edit.php?id=<?php echo $row['id']; ?>">編輯</a>
										<a href="../php/work_del.php?id=<?php echo $row['id']; ?>" class="del">刪除</a>
									</td>
								</tr>
								<?php endforeach; ?>
							</table>
							
							
						<?php else: ?>
							<h1>尚無文章</h1>
						<?php endif; ?>
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
		<?php else: ?>
		<h1>尚未登入</h1>
		<?header('Location: index.php'); ?>
		<?php endif ?>
	</body>
</html>
