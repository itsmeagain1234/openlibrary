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
echo "<html><head><style>#parent img{height: 250px; width:250px; border-radius: 50%; box-shadow: 0 0 8px rgba(225, 139, 0, 16);	-webkit-box-shadow: 0 0 8px rgba(225, 139, 0, 16);	-moz-box-shadow: 0 0 8px rgba(225, 139, 0, 16);}</style></head><body>";
echo "<h3><font color='white'>";
echo $row["username"];
echo "&nbsp;&nbsp;&nbsp";
echo $row["regno"];
echo "</font></h3>";
        echo '<div id="parent"><img src="data:image/jpeg;base64,'.base64_encode( $row['profilepic'] ).'"/></div></body></html>';
    }
} else {
    echo "0 results";
}
$conn->close();
?>

