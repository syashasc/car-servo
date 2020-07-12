<?php
session_start();
// Create connection
$conn = new mysqli('localhost', 'root', '' );

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully."."<br>";

mysqli_select_db($conn,"car servo");
//echo "DB selected Successfully""."<br>";

 $u=$_SESSION['username'];
 $row["accessories_name"]=$_SESSION['accessories_name'];
$sql="DELETE from cart WHERE user_name='$u' AND accessories_name='$row[accessories_name]'";

if($conn->query($sql)===TRUE)
    {
		header("location:accessories.php");
    }
?>
