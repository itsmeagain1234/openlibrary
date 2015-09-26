<?php session_start() ?>
<?php
$bookname=$_POST['bookname'];
$authorname=$_POST['authorname'];
$publisher=$_POST['publisher'];
$tags=$_POST['tags'];
$status=1;
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "openlibrary";
$Regno=$_SESSION['REGNO'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO bookdet(bookid,REGNO,bookname,author,status,tags)
VALUES (NULL,'$Regno','$bookname','$authorname ','$status','$tags')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
<html>
<body>
<p>
<?php echo $bookname;?>
<a href="bookadd.html">Add Another Book</a>
</p>
</body>
</html>

