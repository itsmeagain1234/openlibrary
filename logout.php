<?php
// Begin the session
session_start();

// Unset all of the session variables.
session_unset();

// Destroy the session.
session_destroy();
?>
<html>
<head>
<title>Logged Out</title>
</head>

<body onload="login.html">
<h1>Logged Out</h1>
<a href="login.html">LOGIN AGAIN</a>
</body>
</html>
