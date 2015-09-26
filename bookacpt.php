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

$sql="SELECT phpro_user.USERNAME,phpro_user.MOBNO from phpro_user join bookdet on phpro.REGNO=bookdet.Request";
$result=$conn->query($sql);
if($result->num_rows>0)
{
echo "<html><body><p>The books Requested by users</p>";
echo "<table border='1'";
echo "<tr>";
echo "<td>";
echo "USERNAME";
echo "</td>";
echo "<td>";
echo "MOBILE";
echo "</td>";
echo "<td>";
echo "<ACCEPT>"
echo "</tr>";
while($row=$result->fetch_assoc())
{
echo "<tr><td>";
echo $row["USERNAME"];
echo "</td>";
echo "<td>";
echo $row["MOBNO"];
echo "<td>";
ech````
echo "</tr>";

}

