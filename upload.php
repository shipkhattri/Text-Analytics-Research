<?php
ob_start();
session_start();
include('db_conn.php');
include('session_var.php');
    
	if (isset($_POST["submit_add_news"]))
    {
			$c = $_POST["content"];
			$u = $_POST["url"];
			
			$target = "img/news/".basename($_FILES['image']['name']);
			$image= $_FILES['image']['name'];
        	
			$date = date('Y/m/d H:i:s');
		
			$sql = "INSERT recent_updates (`content`, `url`, `date`, `image`) 
					VALUES ('$c', '$u', '$date', '$image') ";
	    	$result=mysqli_query($conn,$sql);
	    	
	    	move_uploaded_file($_FILES['image']['tmp_name'],$target);
    }

    
    if (isset($_POST["submit_post"]))
    {
    	$id = $_POST["id"];
    	$t = $_POST["title"];
		$c = $_POST["content"];
		$date = $_POST["date"];
		$link = $_POST['link'];
		
		$target = "img/post/".basename($_FILES['image']['name']);
		$image= $_FILES['image']['name'];
		if($image != "")
		{
    		$sql3 = "UPDATE recent_posts SET title='$t', content='$c', date='$date',link='$link', image='$image' WHERE id='$id' ";
    	    $result=mysqli_query($conn,$sql3);
    	    move_uploaded_file($_FILES['image']['tmp_name'],$target);
        }
        else{
            $sql3 = "UPDATE recent_posts SET title='$t', content='$c', date='$date', link='$link' WHERE id='$id' ";
    	    $result=mysqli_query($conn,$sql3);
        }
	}
    header('Location: admin_index.php');
?>