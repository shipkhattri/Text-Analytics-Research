<?php
ob_start();
session_start();
include('db_conn.php');
include('session_var.php');
  
	if (isset($_POST["submit_add_research"]))
    {
        $target = "img/research/".time();
		$image= $_FILES['image']['name'];
		
    	$title = $_POST["title"];
		$about = $_POST["about"];
		$author = $_SESSION['user_id'];
		
    	$sql = "INSERT INTO `research`(`title`, `about`, `date_post`, `author`, `image`) VALUES ('$title','$about','".date("Y-m-d")."','$author','$target')";
    	$result=mysqli_query($conn,$sql);
    	 
	    move_uploaded_file($_FILES['image']['tmp_name'],$target);
    }
    
    if (isset($_POST["submit_edit_research"]))
    {
        $id = $_POST["id"];
    	$t = $_POST["title"];
		$a = $_POST["about"];
		
		$target = "img/research/".time();
		$image= $_FILES['image']['name'];
		if($image != "")
		{
    		$sql3 = "UPDATE research SET title='$t', about='$a', image='$target' WHERE id='$id' ";
    	    $result=mysqli_query($conn,$sql3);
    	    move_uploaded_file($_FILES['image']['tmp_name'],$target);
        }
        else{
            $sql3 = "UPDATE research SET title='$t', about='$a' WHERE id='$id' ";
    	    $result=mysqli_query($conn,$sql3);
    	    if($result)
    	        {echo '<script>alert("Welcome to Geeks for Geeks")</script>'; }
    	    else{echo '<script>alert("noooooooooooooooo")</script>'; }
        }
    }
    
        header('Location: admin_research.php');
?>