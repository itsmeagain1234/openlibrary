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

$sql = "SELECT bookdet.bookid,bookdet.bookname,bookdet.author,bookdet.regno,bookdet.status,bookdet.Request,phpro_users.username FROM bookdet join  phpro_users on bookdet.regno=phpro_users.regno ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo '<table border="3">';
echo "<tr bgcolor='#E6E6E6'>";
echo "<td>";
echo "<h5>";
echo "BOOK NAME";
echo "</h5>";
echo "</td>";
echo "<td>";
echo "<h5>";
echo "AUTHOR";
echo "</h5>";
echo "</td>";
echo "<td>";
echo "<h5>";
echo "STATUS";
echo "</h5>";
echo "</td>";
echo "</tr>";
while($row = $result->fetch_assoc()) {
        if($Regno == $row["Request"]){
        echo "<tr bgcolor='#B0B6B8' >";
        echo "<td>";
        echo  $row["bookname"];

        echo "</td>";
        echo "<td>";
        echo $row["author"];
        echo "</td>";
        echo "<td>";
        if($row["status"]==3){
        echo "Awaiting aproval";
        }
        elseif($row["status"]==2){
	$det=$row["regno"];
        echo "<a href=bookownerdet.php?own=$det>ACCEPTED</a>";
}
else{ 
echo "Not accepted";
}

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

