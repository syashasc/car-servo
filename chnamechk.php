<?php

// Create connection
$conn = new mysqli('localhost', 'root', '' );
session_start();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully.";

mysqli_select_db($conn,"car servo");
//echo "DB selected Successfully.";
$name = $_POST['uname'];
$nme = $_POST['nnme'];
$rme = $_POST['rnme'];
$email = $_POST['email'];
$selps ="SELECT Email FROM user_details WHERE Full_Name='$_SESSION[username]'";
$rr=mysqli_query($conn,$selps);
$s=mysqli_fetch_row($rr);
//echo implode($s);
if(implode($s)==$email)
{
	if($nme==$rme)
	{
		$sql="UPDATE user_details set Full_Name='$nme' where Email='$email'";
		if($conn->query($sql)===TRUE)
		{
			header("location: chnamelog.php");
		}
		else
		{
			header("location: chnamefail.php");
		} 
	}
	else
	{
		header("location: chnamefail.php");
	} 
}	
else
{
	header("location: chnamefail.php");
} 
?>