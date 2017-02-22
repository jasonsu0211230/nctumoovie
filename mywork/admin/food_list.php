<?php
session_start();
require_once "../php/my_db.php";
require_once "../php/functions.php";
$dates = get_all_food();
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
								<a href="food_list.php" class="active">食物管理</a>
							</li>
							<li role="presentation">
								<a href="work_list.php" >作品管理</a>
						
						</ul>
						<hr>
						<a href="food_add.php" class="btn btn-info">新增食物<span class="glyphicon glyphicon-plus-sign"></span></a>	
						<?php if(!empty($dates)):?>
							<table class = "table table-hover">
								<tr>
									<td>品項</td>
									<td>餐廳</td>
									<td>價錢</td>
									<td>圖片</td>
									<td>管理動作</td>
									
								</tr>
							
							<?php foreach($dates as $row):?>
							
								
								
								<tr>
									<td><?php echo $row['name']; ?></td>
									<td><?php echo $row['restaurant']; ?></td>
									<td><?php echo $row['price']; ?></td>
									<td><?php if($row['image']):?><img src='../<?php echo $row['image']; ?>' class ="list_cover"><?php endif;?></td>
									
									
									<td>
										<a href="food_edit.php?id=<?php echo $row['id']; ?>">編輯</a>
										<a href="../php/food_del.php?id=<?php echo $row['id']; ?>" class="del">刪除</a>
									</td>
								</tr>
								<?php endforeach; ?>
							</table>
							
							
						<?php else: ?>
							<h1>尚無食物</h1>
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
