<?php
/*** begin our session ***/
session_start();

$phpro_username = filter_var($_POST['First_Name'], FILTER_SANITIZE_STRING);
$phpro_REGNO = filter_var($_POST['regno'], FILTER_SANITIZE_STRING);
$phpro_Email=filter_var($_POST['Email_Id'],FILTER_SANITIZE_STRING);
$phpro_mob=filter_var($_POST['Mobile_Number'],FILTER_SANITIZE_STRING);
$phpro_prof=$_POST['profilepic'];
    /*** now we can encrypt the password ***/
//    $phpro_password = sha1( $phpro_password );
    
    /*** connect to database ***/
    /*** mysql hostname ***/
    $mysql_hostname = 'localhost';

    /*** mysql username ***/
    $mysql_username = 'root';

    /*** mysql password ***/
    $mysql_password = 'admin123';

    /*** database name ***/
    $mysql_dbname = 'openlibrary';

    try
    {
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the insert ***/
        $stmt = $dbh->prepare("INSERT INTO phpro_users (USERNAME,EMAILID,MOBNO,REGNO,profilepic ) VALUES (:phpro_username, :phpro_Email,:phpro_mob,:phpro_REGNO ,:phpro_prof)");

        /*** bind the parameters ***/
        $stmt->bindParam(':USERNAME', $phpro_username, PDO::PARAM_STR);
        $stmt->bindParam(':phpro_password', $phpro_password, PDO::PARAM_STR, 40);
	$stmt->bindParam(':REGNO',$phpro_REGNO,PDO::PARAM_STR);
	$stmt->bindParam(':MOBNO',$phpro_mob,PDO::PARAM_INT);
	$stmt->bindParam(':EMAILID',$phpro_Email,PDO::PARAM_STR);
	$stmt->bindParam(':profilepic',$phpro_prof,PDO::PARAM_LOB);
        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** unset the form token session variable ***/
        unset( $_SESSION['form_token'] );

        /*** if all is done, say thanks ***/
        $message = 'New user added';
    }
    catch(Exception $e)
    {
        /*** check if the username already exists ***/
        if( $e->getCode() == 23000)
        {
            $message = 'Username already exists';
        }
        else
        {
            /*** if we are here, something has gone wrong with the database ***/
            $message = 'We are unable to process your request. Please try again later"';
        }
    }

?>
<html>
<head>
<title>PHPRO Login</title>
</head>
<body>
<p><?php echo $message; ?>
</body>
</html>

