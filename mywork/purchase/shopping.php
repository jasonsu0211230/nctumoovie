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

		<title>購物選單</title>
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
		<div class="container" align="left">
			<a href="index.php"><img src="../images/logo1.PNG"></a>
		</div>
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<p class = "text-right">
							<a href='../php/logout.php'>登出</a>
						</p>
						<h1 class="text-center">食物選單</h1>
						
						<hr>
						
						<?php if(!empty($dates)):?>
							<form action="../php/food_order.php" method="post" enctype="multipart/form-data">
							<table class = "table table-hover">
								<tr>
									<td>品項</td>
									<td>餐廳</td>
									<td>價錢</td>
									<td>圖片</td>
									<td>數量</td>
									
								</tr>
					
							<?php foreach($dates as $row):?>
							
								
								
								<tr>
									<td><?php echo $row['name']; ?></td>
									<td><?php echo $row['restaurant']; ?></td>
									<td><?php echo $row['price']; ?></td>
									<td><?php if($row['image']):?><img src='../<?php echo $row['image']; ?>' class ="list_cover"><?php endif;?></td>
									
									<td>
										
									<div class="form-group">
										<select name="food_number[]">
											<option>1</option>
											<option>2</option>
											<option>3</option>
										</select>
										
									</div>
										
									</td>
								
								</tr>
								<?php endforeach; ?>
									<div class="form-group">
								<label for="cinema">影城</label>
								<textarea class="form-control" rows="1" id="cinema" name="cinema"></textarea>
							</div>
									<div class="form-group">
								<label for="get_time">取餐時間</label>
								<textarea class="form-control" rows="1" id="get_time" name="get_time"></textarea>
							</div>
								<button type="submit" class="btn btn-default">
								送出
								</button>
								
							</form>
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
		<p><?php echo $_SESSION['is_login']?></p>
		<?header('Location: ../index.php'); ?>
		<?php endif ?>
	</body>
</html>
