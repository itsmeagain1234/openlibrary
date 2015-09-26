<?php session_start() ?>
<?php
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

$sql = "SELECT bookdet.bookid,bookdet.bookname,bookdet.author,bookdet.regno,bookdet.status,bookdet.Request,phpro_users.username FROM bookdet join  phpro_users on bookdet.regno=phpro_users.regno ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo "<html>";
echo "<head></head>";
echo "<body>";
echo "<link type='text/css' rel='phpstyle' href='phpstyle.css'/>";
echo '<table border="1">';
echo "<tr>";
echo "<td>";
echo "<h1>";
echo "BOOK NAME";
echo "</h1>";
echo "</td>";
echo "<td>";
echo "<h1>";
echo "AUTHOR";
echo "</h1>";
echo "</td>";
echo "<td>";
echo "<h1>";
echo "STATUS";
echo "</h1>";
echo "</td>";
echo "</tr>";
echo "</body>";
echo "</html>";

    while($row = $result->fetch_assoc()) {
	if($Regno == $row["regno"]){
	echo "<tr>";
	echo "<td>";
        echo  $row["bookname"];
	
	echo "</td>";
	echo "<td>";
	echo $row["author"];
	echo "</td>";
	echo "<td>";
	if($row["status"]==1){
	echo "AVAILABLE";
	}
	elseif($row["status"]==2){
	echo "BORROWED";
	}
	else{
	$bookidval=$row["bookid"];
	echo "<p> <a href=request.php?book=$bookidval>ACCEPT</a> <br>";
	echo "<a href=denie.php?book=$bookidval>DENIE</a></p> ";

}

echo "</td>";
echo "<td>";
echo $row["Request"];
echo "</td>";
echo "</tr>";
    }}
echo "</table>";
echo "<form >";
echo "<table>";
echo "<tr>";
echo "<td>";
//echo '<a href="">SearchBook</a>' ;
echo "</td>";
echo "</tr>";
echo "</table>";

echo "</form>";

} else {
    echo "0 results";
}
$conn->close();
?>
