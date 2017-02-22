<?php
session_start();
require_once "../php/my_db.php";
require_once "../php/functions.php";
$article = get_article($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>文章編輯</title>
		<meta name="description" content="練習用">
		<meta name="author" content="jasonsu">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="../css/style.css">

	</head>

	<body>
		<?php
			if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == TRUE):
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
							<li role="presentation" class="active">
								<a href="article_list.php">文章管理</a>
							</li>
							<li role="presentation">
								<a href="work_list.php">作品管理</a>
						
						</ul>
						<hr>
						<h2>文章編輯</h2>
						<form method="post" action="../php/article_save.php">
							<input type="hidden" name="id"	value="<?php echo $article['id'];?>">
							<div class="form-group">
								<label for="title">標題</label>
								<input type="text" class="form-control" id="title" name = "title" placeholder="請輸入標題" value="<?php echo $article['title'];?>">
							</div>
							<div class="form-group">
								<label for="category">分類</label>
								<select class="form-control" name="category">
									<option value="心得" <?php if($article['category'] == "心得"){echo "selected";}?>>心得</option>
									<option value="消息" <?php if($article['category'] == "消息"){echo "selected";}?>>消息</option>
									<option value="新聞" <?php if($article['category'] == "新聞"){echo "selected";}?>>新聞</option>

								</select>
							</div>
							<div class="form-group">
								<label for="content">內容</label>
								<textarea class="form-control" rows="5" id="content" name="content" ><?php echo $article['content']?></textarea>
							</div>
							<div class="form-group">
								
								<label class="checkbox-inline" >
									<input type="checkbox" name="publish" value="1" <?php echo ($article['publish'] == "1")?"checked":"";?>>
									發佈 </label>
								<label class="checkbox-inline" >
									<input type="checkbox" name="publish" value="0" <?php echo ($article['publish'] == "0")?"checked":"";?>>
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
