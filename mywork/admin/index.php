<?php
	session_start();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>首頁</title>
		<meta name="description" content="練習用">
		<meta name="author" content="jasonsu">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="../css/style.css">

	</head>

	<body>
		<?php
			if($_SESSION['username'] != null):
				
			header('Location: food_list.php');
		?>
		
		<?php else:?>
		<!-- 內容  -->
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-sm-offset-4 col-lg-2 col-lg-offset-5">
						<h1>後台登入</h1>
						<form method = "post" action = "../php/check_login.php">
							<?php
							
								if(isset($_SESSION['msg'])){
									echo "<p class = 'danger'>{$_SESSION['msg']}</p>";
								}
							?>
							 <div class="form-group">
							    <label for="username">帳號</label>
							    <input type="text" class="form-control" id="username" name="username" placeholder="Email">
							  </div>
							  <div class="form-group">
							    <label for="password">密碼</label>
							    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
							  </div>
							<button type="submit" class="btn btn-default">登入</button>
						</form>

					</div>
				</div>
			</div>
		</div>
		<?php endif?>
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
