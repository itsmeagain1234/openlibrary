<?php session_start()
?>
<?php
session_start();
$phpro_book=strtoupper(filter_var($_POST['bookasearch'],FILTER_SANITIZE_STRING));
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

$sql = "SELECT bookdet.bookid,bookdet.bookname,bookdet.author,bookdet.regno,bookdet.status,phpro_users.username FROM bookdet join  phpro_users on bookdet.regno=phpro_users.regno ";
$result = $conn->query($sql);
$m=substr($phpro_book,2);


if ($result->num_rows > 0) {
    // output data of each row
echo '<table border="1">';
echo "<tr bgcolor='#E6E6E6' >";
echo "<td>";
echo "<h4>";
echo "BOOK NAME";
echo "</h4>";
echo "</td>";
echo "<td>";
echo "<h4>";
echo "BOOK ID";
echo "<td>";
echo "<h4>";
echo "AUTHOR";
echo "</h4>";
echo "</td>";
echo "<td>";
echo "<h4>";
echo "REGNO";
echo "</h4>";
echo "</td>";
echo "</h4>";
echo "<td>";
echo "<h4>";
echo "OWNER";
echo "</h4>";
echo "</td>";
echo "<td>";
echo "<h4>";
echo "status";
echo "</h4>";
echo "</td>";
echo "</tr>";


    while($row = $result->fetch_assoc()) {
	
        if(((strtoupper($row["bookname"])==$phpro_book)||($row["author"]==$phpro_book))&&(($row["regno"]!=$Regno))){
	
        echo "<tr bgcolor='#B0B6B8'>";
        echo "<td>";
        echo  $row["bookname"];

        echo "</td>";
	echo "<td>";
	echo $row["bookid"];
	echo "</td>";
        echo "<td>";
        echo $row["author"];
        echo "</td>";
        echo "<td>";
        echo $row["regno"];
        echo "</td>";
        echo "<td>";
        echo $row["username"];
        echo "</td>";
	echo "<td>";
	if($row["status"]==1)
{	$bookid=$row['bookid'];
		echo "<a href=bookreq.php?bookid=$bookid>Request</a>";}
 
		elseif($row["status"]==2)
			echo "Awaiting Aproval";
			else
				echo "Not available";

	echo "</td";
	echo "</tr>";

	
                                         }

}
echo "</table>";
echo "<table>";
echo "<tr bgcolor='#8D8DC2'><td><a href=booksearch.html>SEARCH AGAIN</a></td></tr></table>";
}
else {
    echo "0 results";
}

$conn->close();
?>

