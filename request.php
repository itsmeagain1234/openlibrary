<?php
$bookid= $_GET["book"];
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "openlibrary";
$Regno=$_SESSION['REGNO'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE bookdet SET status='2' WHERE bookid='$bookid'";

if (mysqli_query($conn, $sql)) {
    echo "<table><tr bgcolor=' #8D8DC2'><td> Accepted Succesfully</td></tr></table>";
	echo  "<a href='fetchbookdata.php'><button type='button'>GOBACK</button></a>";

} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>


