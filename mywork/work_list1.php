<?php
require_once 'php/my_db.php';
require_once 'php/functions.php';
$all_work = get_publish_work();
$rest_ofwork = get_unpublish_work();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>作品列表</title>
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
						<h1 class="text-center">MOOVIE</h1>
						<ul class="nav nav-pills">
							<li role="presentation">
								<a href="work_list.php" class="active">電影訂票</a>
							</li>
							<li role="presentation">
								<a href="">影城訂票</a>
							</li>
							<li role="presentation" >
								<a href="">網友討論</a>
							</li>
							<li role="presentation">
								<a href="">電影影評</a>
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
					<h2>電影列表</h2>
					<ul class="nav nav-pills">
				
							<li role="presentation" >
								<a href="work_list.php">現正熱映</a>
							</li>
							<li role="presentation" class="active">
								<a href="work_list1.php">即將上映</a>
							</li>
							<li role="presentation">
								<a href="">訂票排行</a>
							</li>
							
						</ul>
					<?php if(!empty($rest_ofwork)):?>
						<?php foreach($rest_ofwork as $work):?>
						<div class="col-xs-12 col-sm-4 col-md-3">
						<a target="_blank" href = '<?php echo $work['trailer'];?>' class="thumbnail">
							
								
								<img src="<?php echo $work['image_path']?>" class= "img-responsive">
							
							<div class="work_info">
								<p>上映日期:<?php echo $work['release_date'];?></p>
								<?php echo $work['intro'];?>
							</div>
							
						</a>
						</div>
						<?php endforeach;?>
					<?php else:?>
						<h1> 沒資料</h1>
					<?php endif;?>
						
								
						

					
				</div>
			</div>
		</div>
		
		
		
		
	</body>
</html>
