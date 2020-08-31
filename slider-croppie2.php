<?php
ob_start();
session_start();

	include('db_conn.php');
	include('session_var.php');

$image_name = 'img/slider/'.time().'.png';
if (isset($_POST['image']))
{
	$image = $_POST['image'];

	list($type, $image) = explode(';',$image);
	list(, $image) = explode(',',$image);

	$image = base64_decode($image);	
	file_put_contents($image_name, $image);
	
	$sql = "INSERT slider (`image`) VALUES ('$image_name') ";
	$result=mysqli_query($conn,$sql); 
		
}


?>