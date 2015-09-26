<?php
session_start();
$phpro_book=strtoupper(filter_var($_POST['bookasearch'],FILTER_SANITIZE_STRING));
$mess=$phpro_book;
$servername="localhost";
$username="root";
$password="admin123";
$dbname="openlibrary";
$conn=new mysqli($servername,$username,$password,$dbname);
#if($conn->connect_error){
#die("Connection failed:".conn->connect_error);
#}
echo $phpro_book;
$m="connection done";
$sql="SELECT bookname,author,Tags FROM bookdet";
$result=$conn->query($sql);
$m="data fetched";
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
		$uperbook=strtoupper($row["bookname"]);
		if($phpro_book==$uperbook)||($row["author"]==$phpro_book)) 	{
			$m= $row["bookname"];
																			}
										}

										}
else					{
$m="0 results";
						}
						
$conn->close();
?>
<html>
<body>
<p>
<?php echo  ?>
</p>
</body>
</html>

