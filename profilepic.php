<?php session_start();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "openlibrary";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT regno, username, profilepic  FROM phpro_users ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
	if($row['regno']==$_SESSION['REGNO'])
{
echo "<html><head><style>#parent{width:200px;} #parent img{max-width:100%;height:auto;}</style></head><body>";
echo "<h4>";
echo "RegNo: " . $row["regno"];// " - Name: " . $row["username"] ;
echo "</h4>";
echo "<h4>";
echo "Name :". $row["username"];
echo "</h4>";

        echo "<br>";
        echo '<div id="parent"><img src="data:image/jpeg;base64,'.base64_encode( $row['profilepic'] ).'"/></div></body></html>';
    }
} else {
    echo "0 results";
}
$conn->close();
?>

