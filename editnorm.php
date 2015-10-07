<?php
session_start()
?>
<?php
$Regno=$_SESSION["REGNO"];
$EMAIL=$_SESSION["email"];
$MOB=$_SESSION["MOB"];
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "openlibrary";
$Regno=$_SESSION['REGNO'];
$Email=$_POST["new_email"];
$Mob=$_POST["new_no"];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$m=strcmp($EMAIL,$Email);
$n=strcmp($MOB,$Mob);
if($m==0 && $n==0)
{echo "emailid or mobile cannot be same as previos";
}

else if($Email==NULL && $Mob==NULL)

{
	echo "BOTH THE FIELDS ARE EMPTY";}

else if($Email !=NULL && $Mob==NULL){
$sql = "UPDATE phpro_users SET EMAILID='$Email' WHERE REGNO='$Regno'";

if (mysqli_query($conn, $sql)) {
echo "Email  UPDATED SUCESFULY";


} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}
else if($Email ==NULL && $Mob !=NULL){
$sql = "UPDATE phpro_users SET MOBNO='$Mob' WHERE REGNO='$Regno'";

if (mysqli_query($conn, $sql)) {
echo "Mobile number  UPDATED SUCESFULY";


} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}
else{
$sql = "UPDATE phpro_users SET MOBNO='$Mob',EMAILID='$Email' WHERE REGNO='$Regno'";

if (mysqli_query($conn, $sql)) {
echo "Mobile number and Email  UPDATED SUCESFULY";


} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}
mysqli_close($conn);
?>


