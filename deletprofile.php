<?php session_start(); ?>
<?php
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "openlibrary";
$pass=$_SESSION["password"];
$Regno=$_SESSION["REGNO"];
$PASS=$_POST["password"];
echo "password from page".$PASS;
echo "password from session".$pass;
echo "regno form session ".$Regno;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($pass==$PASS){
$sql="DELETE FROM phpro_users WHERE REGNO='$Regno'";
if (mysqli_query($conn, $sql))
{
        echo "book deleted";
}
else
{
        echo "error";
}}
else{
echo "enter correct password";
}
?>
~

