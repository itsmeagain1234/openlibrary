<?php
$link = mysqli_connect("localhost", "root", "admin123", "openlibrary");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_POST['username']);
$paswd = mysqli_real_escape_string($link, $_POST['pwd1']);
$gender=mysqli_real_escape_string($link, $_POST['Gender']);
$Regno=mysqli_real_escape_string($link, $_POST['regno']);
$Email=mysqli_real_escape_string($link, $_POST['Email_Id']);
$mob=mysqli_real_escape_string($link, $_POST['Mobile_Number']);
if (isset($_FILES['profilepic'])) {
echo "profile pic has something";
}
else
{
echo "profile pic is blank";
}


if (isset($_FILES['profilepic']) && $_FILES['profilepic']['size'] > 0) {


// Temporary file name stored on the server

$tmpName = $_FILES['profilepic']['tmp_name'];


// Read the file

$fp = fopen($tmpName, 'r');

$data = fread($fp, filesize($tmpName));

$data = addslashes($data);

fclose($fp);
 
// attempt insert query execution
$sql = "INSERT INTO phpro_users (USERNAME,phpro_password,GENDER,REGNO,EMAILID,MOBNO,profilepic)VALUES ('$name', '$paswd', '$gender','$Regno','$Email','$mob','$data')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
else
{
echo "something is wrong";
}
 
// close connection
mysqli_close($link);
?>
