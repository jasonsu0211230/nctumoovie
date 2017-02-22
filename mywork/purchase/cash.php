<?php
session_start();
require_once "../php/my_db.php";
require_once "../php/functions.php";
$dates = get_all_food();
$order = get_order($_SESSION['order_id']);
//print_r($_SESSION['order_id']);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>結帳清單</title>
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
						
						<h1 class="text-center">結帳清單</h1>
						
						<hr>
						<?php $item_name = array();
							for($i=0;$i<=10;$i++){
							$item_name[$i]="item"."$i";
						}?>
						<?php if(!empty($dates)):?>
							
							<table class = "table table-hover">
								<tr>
									<td>品項</td>
									
									<td>價錢</td>
									<td>圖片</td>
									<td>數量</td>
									<td>小計</td>
								</tr>
							<?php 
								$total =0;
							?>
							<?php foreach($dates as $key => $row):?>
							
								
								
								<tr>
									<td><?php echo $row['name']; ?></td>
									
									<td><?php echo $row['price']; ?></td>
									<td><?php if($row['image']):?><img src='../<?php echo $row['image']; ?>' class ="list_cover"><?php endif;?></td>
									
									<td><?php echo $order["{$item_name[$key]}"];?></td>
									<td><?php echo $row['price']*$order["{$item_name[$key]}"];?></td>
									<?php $total=$total+$row['price']*$order["{$item_name[$key]}"];?>
								</tr>
								<?php endforeach; ?>
								
							</table>
							<p align="right"><?php echo "總計: {$total}元"?></p>
							<a href="../index.php" class="btn btn-info" align="center">結帳</a>
						<?php else: ?>
							<h1>尚無購買</h1>
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
