<?php
ob_start();
session_start();

	include('db_conn.php');
	include('session_var.php');
//	$t = (int)(time()/10);
$image_name = 'img/uploads/'.time().'.png';
if (isset($_POST['image']))
{
	$image = $_POST['image'];

	list($type, $image) = explode(';',$image);
	list(, $image) = explode(',',$image);

	$image = base64_decode($image);	
	file_put_contents($image_name, $image);
	$sql = "UPDATE `members` SET `photo`='$image_name' WHERE id = ".$_SESSION['user_id'];
    $result=mysqli_query($conn,$sql); 
    header("location:member_edit.php");
		
}	


if (isset($_POST["submit"]))
    {
		$email = $_POST["email"];
		$pass = $_POST["pass"];
		//$dob = $_POST["dob"];
		$dob= date_create($_POST["dob"]);
		$status = $_POST["status"];
		$address = $_POST["address"];
		$phone = $_POST["phone"];
		$about = $_POST["about"];
		$intrest = $_POST["intrest"];
		$rg = $_POST["rg"];
		$gs = $_POST["gs"];
		$orcid = $_POST["orcid"];
		$linkedin = $_POST["linkedin"];
		$resercher_id = $_POST["resercher_id"];
		$site = $_POST["site"];
        $dob_f = date_format($dob,"Y-m-d");
    	$sql = "UPDATE `members` SET `email`='$email',`password`='$pass',`phone`='$phone',`dob`='$dob_f',`address`='$address',`about`='$about',`research_gate`='$rg',`orcid`='$orcid',`google_scholar`='$gs',`researcher_id`='$resercher_id',`linkedin`='$linkedin',`personal_site`='$site',`current_status`='$status', `research_intrest`='$intrest' WHERE id = ".$_SESSION['user_id'];
    	$result=mysqli_query($conn,$sql);   
    	if($result)
    	{
    		header("location:member_edit.php");
    	}
    	else{
    		echo "Error description:" . mysqli_error($conn);
    	}
    	//echo $intrest;
		//header("location:member_edit.php");
    }	
if (isset($_POST["submit2"]))
    {
    	$sql = "UPDATE `members` SET `photo`='$image_name' WHERE id = ".$_SESSION['user_id'];
    	$result=mysqli_query($conn,$sql);   
	//	header("location:member_edit.php");
    }
if (isset($_POST["submit_publication"]))
    {
		$id = $_POST["id"];
		$title = $_POST["title"];
		$author = $_POST["author"];
		$doi = $_POST["doi"];
		$date_published = $_POST["publication_date"];
		$abstract = $_POST["abstract"];
		$link = $_POST["link"];
		$impact_factor = $_POST["impact_factor"];
		$journal = $_POST["journal"];
    	$sql = "UPDATE `publications` SET `title`='$title',`authors`='$author',`doi`='$doi',`journal`='$journal',`date_published`='$date_published',`date_uploded`='".date("Y-m-d")."',`abstract`='$abstract',`link`='$link',`impact_factor`='$impact_factor' WHERE id = ".$id;
    	$result=mysqli_query($conn,$sql);   
		header("location:member_edit.php");
    }
if (isset($_POST["add_publication"]))
{
	$title = $_POST["title"];
	$author = $_POST["author"];
	$doi = $_POST["doi"];
	$journal = $_POST["journal"];
	$publication_date= date_create($_POST["publication_date"]);
	$publication_date_f = date_format($publication_date,"Y-m-d");
	//$publication_date = $_POST["publication_date"];
	$abstract = $_POST["abstract"];
	$link = $_POST["link"];
	$impact_factor = $_POST["impact_factor"];
	$sql = "INSERT INTO `publications`(`title`, `authors`, `doi`, `journal`, `date_published`, `date_uploded`, `abstract`, `link`, `impact_factor`) VALUES ('$title','$author','$doi','$journal','$publication_date_f','".date("Y-m-d")."','$abstract','$link', '$impact_factor')";
	$result=mysqli_query($conn,$sql);  
	header("location:admin_publication.php");
}	


?>