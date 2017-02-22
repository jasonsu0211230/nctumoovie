<?php
require_once 'php/my_db.php';
require_once 'php/functions.php';
$work = get_work($_GET['w']);
$title = strip_tags($work['intro']);
$title = mb_substr($title,0 ,10);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php echo $title;?></title>
		<meta name="description" content="練習用">
		<meta name="author" content="jasonsu">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	</head>

	<body>
		<!-- 頁首  -->
		<div class="jumbotron">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h1 class="text-center">我的作品網站</h1>

						<ul class="nav nav-pills">
							<li role="presentation">
								<a href="index.php">首頁</a>
							</li>
							<li role="presentation" >
								<a href="article_list.php">我的文章</a>
							</li>
							<li role="presentation" class="active">
								<a href="work_list.php">我的作品</a>
							</li>
							<li role="presentation">
								<a href="about.php">關於我</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- 內容  -->
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<?php if($work['video_path']):?>
								<div class="embed-responsive embed-responsive-16by9">
									<video src="<?php echo $work['video_path'];?>" <?php if($work['image_path']){echo "poster='{$work['image_path']}'";}?> controls></video>
								</div>
							<?php else:?>
								<img src="<?php echo $work['image_path']?>" class= "img-responsive">
							<?php endif;?>
							<div class="work_info">
								<p><?php echo $work['create_date'];?></p>
								<?php echo $work['intro'];?>
							</div>
					</div>
				</div>
			</div>
		</div>

	</body>
</html>
