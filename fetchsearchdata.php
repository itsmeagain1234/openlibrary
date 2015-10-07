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
$Flag=0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
                        }

$sql = "SELECT bookdet.bookid,bookdet.bookname,bookdet.author,bookdet.regno,bookdet.status,bookdet.Topic,phpro_users.username FROM bookdet join  phpro_users on bookdet.regno=phpro_users.regno ";
$result = $conn->query($sql);
$m=substr($phpro_book,2);


if ($result->num_rows > 0) {
    // output data of each row

echo "<html>
<head>
    <title>DELETE BOOK</title>
</head>
<style type='text/css'>
    #wrapper {
        width:500px;
        margin:0 auto;
        font-family:Verdana, sans-serif;
}
.wrapper iframe::-webkit-scrollbar {
    width: 5px;
}
.wrapper iframe::-webkit-scrollbar-track {
    background-color: #eaeaea;
    border-left: 1px solid #ccc;
}
.wrapper iframe::-webkit-scrollbar-thumb {
    background-color: #ccc;
}
.wrapper iframe::-webkit-scrollbar-thumb:hover {
	background-color: #aaa;
}

    legend {
        color:#0481b1;
        font-size:14px;
        padding:0 10px;
        background:#fff;
        -moz-border-radius:4px;
        box-shadow: 0 1px 5px rgba(4, 129, 177, 0.5);
        padding:5px 10px;
        text-transform:uppercase;
        font-family:Helvetica, sans-serif;
        font-weight:bold;
    }
    fieldset {
        border-radius:4px;
        background: #fff;
        background: -moz-linear-gradient(#fff, #f9fdff);
        background: -o-linear-gradient(#fff, #f9fdff);
        background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fff), to(#f9fdff)); /
        background: -webkit-linear-gradient(#fff, #f9fdff);
        padding:20px;
        border-color:rgba(4, 129, 177, 0.4);
    }
    input,
    textarea {
        color: #373737;
        background: #fff;
        border: 1px solid #CCCCCC;
        color: #aaa;
        font-size: 14px;
        line-height: 1.2em;
        margin-bottom:15px;

        -moz-border-radius:4px;
 -webkit-border-radius:4px;
        border-radius:4px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset, 0 1px 0 rgba(255, 255, 255, 0.2);
    }
    input[type='text'],
    input[type='password']{
        padding: 8px 6px;
        height: 22px;
        width:280px;
    }
    input[type='text']:focus,
    input[type='password']:focus {
        background:#f5fcfe;
        text-indent: 0;
        z-index: 1;
        color: #373737;
        -webkit-transition-duration: 400ms;
        -webkit-transition-property: width, background;
        -webkit-transition-timing-function: ease;
        -moz-transition-duration: 400ms;
        -moz-transition-property: width, background;
        -moz-transition-timing-function: ease;
        -o-transition-duration: 400ms;
        -o-transition-property: width, background;
        -o-transition-timing-function: ease;
        width: 380px;

        border-color:#ccc;
        box-shadow:0 0 5px rgba(4, 129, 177, 0.5);
        opacity:0.6;
    }
    input[type='submit']{
        background: #222;
        border: none;
        text-shadow: 0 -1px 0 rgba(0,0,0,0.3);
        text-transform:uppercase;
        color: #eee;
        cursor: pointer;
        font-size: 15px;
        margin: 5px 0;
        padding: 5px 22px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-border-radius:4px;
        -webkit-box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
        box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
    }
button[type='button']{
        background: #222;
        border: none;
        text-shadow: 0 -1px 0 rgba(0,0,0,0.3);
        text-transform:uppercase;
        color: #eee;
        cursor: pointer;
        font-size: 15px;
        margin: 5px 0;
        padding: 5px 22px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-border-radius:4px;
        -webkit-box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
        box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
}
    textarea {
        padding:3px;
        width:96%;
        height:100px;
    }
    textarea:focus {
        background:#ebf8fd;
        text-indent: 0;
        z-index: 1;
        color: #373737;
        opacity:0.6;
        box-shadow:0 0 5px rgba(4, 129, 177, 0.5);
        border-color:#ccc;
    }
    .small {
        line-height:14px;
        font-size:12px;
        color:#999898;
        margin-bottom:3px;
    }
table {
align:center;
}
table, th, td {
   height: 10px;
font-size:12px;
white-space: ;
}
</style>";
echo  "<body><div id='wrapper'><form><fieldset><legend>Book Search</legend><table border='3' bordercolor=#0481b1 align='left' > ";
echo "<tr bgcolor='#E6E6E6' >";
echo "<th nowrap>";
echo "BOOK NAME";
echo "</th>";
echo "<th nowrap>";
echo "BOOK ID";
echo "<th>";
echo "AUTHOR";
echo "</th>";
echo "<th>";
echo "REGNO";
echo "</th>";
echo "<th>";
echo "OWNER";
echo "</th>";
echo "<th>";
echo "STATUS";
echo "</th>";
echo "</tr>";

//echo"</div>";
    while($row = $result->fetch_assoc()) {
$topic=strtoupper($row["Topic"]);
$author=strtoupper($row["author"]);	
        if(((strtoupper($row["bookname"])==$phpro_book)||($author==$phpro_book)|| ($topic==$phpro_book))&&(($row["regno"]!=$Regno))){
	$Flag=1;
        echo "<div><tr>";
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

	echo "</td>";
	echo "</tr></div>";

	
                                         }

}
echo "</table>";
if($Flag!=1)
echo "<h2>Books Not Found</h2>";
echo "<a href=booksearch.html><button type='button'>SEARCH AGAIN</button></a></fieldset></form></div></body></html>";
}
else {
    echo "0 results";
}

$conn->close();
?>

