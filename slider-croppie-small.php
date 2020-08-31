<?php
ob_start();
session_start();

	include('db_conn.php');
	include('session_var.php');

$image_name = 'img/news/'.time().'.png';
if (isset($_POST['image']))
{
	$image = $_POST['image'];
    $date = date('Y/m/d H:i:s');
    
	list($type, $image) = explode(';',$image);
	list(, $image) = explode(',',$image);

	$image = base64_decode($image);	
	file_put_contents($image_name, $image);
	
	$sql = "INSERT recent_updates ( `date`, `image`) 
					VALUES ( '$date', '$image_name') ";
	$result=mysqli_query($conn,$sql);
		
}

?>