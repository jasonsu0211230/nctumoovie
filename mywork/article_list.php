<?php
require_once 'php/my_db.php';
require_once 'php/functions.php';
$all_article = get_all_article();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>文章列表</title>
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
							<li role="presentation" class="active">
								<a href="article_list.php">我的文章</a>
							</li>
							<li role="presentation">
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
						<?php if(!empty($all_article)):?>
							<?php	foreach($all_article as $row):?>
								<?php 
									$str = strip_tags($row['content']);
									$str = mb_substr($str,0,100);
								?>
								<div class="panel panel-default">
								  <div class="panel-heading"><a href="article.php?p=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></div>
								  <div class="panel-body">
								  	<span class="label label-primary"><?php echo $row['category'];?></span>
								  	<span class="label label-success"><?php echo $row['create_date'];?></span>
								    <?php echo $str . "...繼續閱讀";?>
								  </div>
								</div>

							<?php endforeach;?>
						<?php else: ?>
							<h1>沒資料</h1>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>

	</body>
</html>
