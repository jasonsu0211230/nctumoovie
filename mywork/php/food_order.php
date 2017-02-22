<?php
session_start();
require_once "../php/my_db.php";
require_once "../php/functions.php";
$all_food = get_all_food();
//print_r($_POST['food_number']);
date_default_timezone_set('Asia/Taipei');
$time = date("Y-m-d H:i:s");
$item_name = array();
for($i=0;$i<=10;$i++){
	$item_name[$i]="item"."$i";
}
$food_number = array();
//print_r($item_name);
if ($_SESSION['username'] != null) {

	foreach ($_POST['food_number'] as $key => $value) :

		$_POST["{$item_name[$key]}"]= $value;
		
	endforeach;
	//print_r($food_number);
	

	$_POST['username'] = $_SESSION['username'];

	//$_POST['order_time'] = $time;

	if (isset($_POST['food_number'])) {
		unset($_POST['food_number']);
	}
	$save_result = order_save($_POST, $link);
	if ($save_result) {
		echo "儲存成功";
	} else {
		echo "儲存失敗";
	}
	
}

header('refresh:5; url=../purchase/cash.php');
			?>
