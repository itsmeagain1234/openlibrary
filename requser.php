<?php
$ReqReg=$_GET['req'];
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "openlibrary";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql="SELECT * from phpro_users";
$result=$conn->query($sql);

if($result ->num_rows>0)
{
echo '<table border="3">';
echo "<tr bgcolor='#E6E6E6'>";
echo "<td><h5>REQUESTER_NAME</h5></td>";
echo "<td><h5>MOBILE_NUMBER</h5></td>";
echo "<td><h5>EMAIL_ID</h5></td>";
echo "<td><h5>GENDER</h5></td>";
echo "</tr>";


    while($row = $result->fetch_assoc()) {
	if($row["REGNO"] ==$ReqReg){
		{
			echo "<tr bgcolor='#B0B6B8'>";
			echo "<td>";
			echo $row["USERNAME"];
			echo "</td>";
			echo "<td>";
			echo $row["MOBNO"];
			echo "</td>";
			echo "<td>";
			echo $row["EMAILID"];
			echo "<td>";
			echo $row["GENDER"];
			echo "</td>";
			echo "</tr>";
		}
}
}
echo "</table>";
echo "<table><tr bgcolor='#8D8DC2'><td><a href=fetchbookdata.php>GO_BACK_TO_PREVIOU_STAGE</a></td></tr></table>";
}
else{
	echo "FAILED";
}
?>
