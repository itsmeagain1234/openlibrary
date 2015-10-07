<?php
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "openlibrary";
$Regno=$_SESSION['REGNO'];
$id=$_GET["bookid"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql="DELETE FROM bookdet WHERE bookid='$id'";
if (mysqli_query($conn, $sql)) 
{
	echo "book deleted";
}
else
{
	echo "error";
}
?>
