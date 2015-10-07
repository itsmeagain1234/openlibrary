<?php
session_start()
?>
<?php
$Regno=$_SESSION["REGNO"];
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "openlibrary";
$Regno=$_SESSION['REGNO'];
$pass=$_SESSION['password'];
$new_pass=$_POST['retype_pass'];
$pre_pass=$_POST['curr_pass'];
echo $pass;
echo $new_pass;
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$cmp=strcmp($pass,$pre_pass);
if($cmp==0)
{
$sql = "UPDATE phpro_users SET phpro_password='$new_pass' WHERE REGNO='$Regno'";

if (mysqli_query($conn, $sql)) {
echo " password  UPDATED SUCESFULY";


} else {
    echo "Error updating record: " . mysqli_error($conn);
}}
else
{
echo "Enter Previos Correctly";
}

?>
