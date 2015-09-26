<?php
session_start()
?>
<?php
$bookID=$_POST['bookid'];
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "openlibrary";
$Regno=$_SESSION['REGNO'];
$bookid=$_GET["bookid"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE bookdet SET status='3',Request='$Regno' WHERE bookid='$bookid'";

if (mysqli_query($conn, $sql)) {
    echo "<table><tr bgcolor='#8D8DC2'><td>Requet Sent </td></tr></table>";
	echo  "<a href='booksearch.html'><button type='button'>GOBACK</button></a>";

} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
