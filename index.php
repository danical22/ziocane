<?php
require_once './session.php'
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Danilo</title>
    <link rel="stylesheet" href="./css/Style.css" type="text/css" />
    <script type="text/javascript" src="./lib/javascript.js"></script>
    <script type="text/javascript" src="./lib/jquery-3.4.1.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
</head>
<body>
<div id="wrap">
    <!-- header part -->
    <div id="wrapHeader">
	    <div id='header'>
	        <img id="logo" src="./img/logo.png">
	    </div>
	</div>

    <div id="menu">
	    <h2> Menù </h2>
	    <ul class="sidemenu">
	        <li><a id="home" href="index.php"> Home </a></li>
	        <li><a id="purchase" onclick='loadSection("./purchase.php")'> Purchase </a></li>
	        <?php
	        if( isset($loggedIn) && ($loggedIn) ) {
	            echo "<li><a id='logout' onclick='loadSection(\"./logout.php\")'> Logout </a></li>";
	        }
	        else {
	            echo "<li><a id='signup' onclick='loadSection(\"./signup.php\")'> Sign Up </a></li>";
	            echo "<li><a id='login' onclick='loadSection(\"./login.php\")'> Login </a></li>";
	        }
	        ?>
	    </ul>
	</div>

    <!-- main part -->
    <div id="main">

        <?php
        if( isset($loggedIn) && ($loggedIn) ) {
            echo "<h1>Welcome <i>$username</i></h1>"; //message if logged
        }
        else {
            echo "<h1>Welcome visitor!</h1>"; //message for visitors
        }
        ?>
        <p>inserire testo qui</p>

    </div>

    <!-- footer part -->
    <div>
        <div id="footer">
	    <div class="footer-left">
	        <p> <strong>Danilo's site </strong> <a href="mailto:danilo.calandra22@gmail.com">Contact Me</a></p>
	    </div>
	</div>
    </div>
</div>
</body>
</html>