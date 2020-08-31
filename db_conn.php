<?php
	$conn=mysqli_connect("199.79.62.107","textajfo_ta","text_analytics","textajfo_text_analytics");
	if ($conn->connect_error)
	{
	    die("Connection failed: " . $conn->connect_error);
    }
		
	$connect = new PDO("mysql:host=199.79.62.107;dbname=textajfo_text_analytics;charset=utf8mb4", "textajfo_ta", "text_analytics");
?>