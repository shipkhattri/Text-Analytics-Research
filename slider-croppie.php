<?php
ob_start();
session_start();

	include('db_conn.php');
	include('session_var.php');
//	$t = (int)(time()/10);
$image_name = 'img/uploads/about.png';
if (isset($_POST['image']))
{
	$image = $_POST['image'];

	list($type, $image) = explode(';',$image);
	list(, $image) = explode(',',$image);

	$image = base64_decode($image);	
	file_put_contents($image_name, $image);
	
	$sql = "UPDATE about SET image='$image_name' WHERE id=1 ";
    $result=mysqli_query($conn,$sql);  
		
}



if(isset($_POST['submitslider'])){
	

	
	$q = "SELECT * FROM slider";
	$res = mysqli_query($conn,$q);
	$count=mysqli_num_rows($res);
	if($count<7)
	{
	$sql = "INSERT slider (`image`) VALUES ('$image_name') ";
	$result=mysqli_query($conn,$sql);
	header("location:admin_index.php");
	}

}

?>