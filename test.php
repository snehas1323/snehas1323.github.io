<?php
require_once("config.php");

if(isset($_POST['no'])&&isset($_POST['count'])){
	$s_no=mysqli_real_escape_string($link,$_POST['no']);
	$count=mysqli_real_escape_string($link,$_POST['count']);
	if($count>'1'){
	$count=$count-1;
	$sql = "Update model set count=$count where serial_no=$s_no";
	mysqli_query($link,$sql);
	}
	else if($count='1'){
	$sql = "delete from model where serial_no=$s_no";
	mysqli_query($link,$sql);		
	}
}
?>