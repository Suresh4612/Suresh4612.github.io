<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "first";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn === false){
	die("ERROR: Could not connect. " 
		. mysqli_connect_error());
}

$txtName = $_REQUEST['txtName'];
$txtEmail = $_REQUEST['txtEmail'];
$txtPhone = $_REQUEST['txtPhone'];
$txtMessage = $_REQUEST['txtMessage'];

// database insert SQL code

$sql = "INSERT INTO form ( Name, Email, Phone, Message) VALUES ( '$txtName', '$txtEmail', '$txtPhone', '$txtMessage')";


if(mysqli_query($conn, $sql)){
	echo "<h3>data stored in a database successfully." 
		. " Please browse your localhost php my admin" 
		. " to view the updated data</h3>"; 

	echo nl2br("\n$txtName\n $txtEmail\n "
		. "$txtPhone\n $txtMessage");
} else{
	echo "ERROR: Hush! Sorry $sql. " 
		. mysqli_error($conn);
}
  
// Close connection
mysqli_close($conn);



?>