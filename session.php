<?php	/** --- session handler --- **/

session_start(); //time in seconds -> 3 days 60*60*24*3
$SessionTime=2592000;

/** cookie 
if ( !isset($_SERVER["HTTP_COOKIE"]) ) {	# If I have a cookie it's impossible to enter in this "if"
    if( isset($_GET["ExistCookie"]) )	# If I have this GET and I don't have the cookie, the cookies are disabled!
            die("<p style='color:red'> Your cookies <strong>are disabled</strong>!<br>
                    <strong>Without cookies you can't navigate on this website!</strong>.<br>
                    <a href='http://www.whatarecookies.com/enable.asp'>Here</a> are the instructions how to enable cookies in all most famous web browser.</p>
                    <p>After enabling cookies, please reload the page!</p>");
    else {	// This statement should be executed only the first time that the user visit the page and after the logout
        if( isset($_GET["msg"]))
            header("Location: http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."&ExistCookie=TestValue");
        else
            header("Location: http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."?ExistCookie=TestValue");
        exit();
    }
}
**/

function destroySession() {
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 2592000, '/');
    }
    session_unset(); 	// empty session
    session_destroy();	// destroy session
}

/** Check if the user is already loggedIn, if the timeout was expired the session is destroyed and the user will be redirect to the login page **/
    if( isset($_SESSION['user_danilo']) ) {
        $username = $_SESSION['user_danilo'];

        if( isset($_SESSION['time_danilo']) ) {
            $diff = time() - $_SESSION['time_danilo'];	//difference between actual time and last interaction time
            if($diff > $SessionTime) {
                $loggedIn = FALSE;
                destroySession();
                header('HTTP/1.1 307 temporary redirect');	//redirect client to login page
                header('Location:login.php?msg=SessionTimeOutExpired');
                exit;
            }
        }

        $_SESSION['time_danilo'] = time();
        $loggedIn = TRUE;
    } else {
        $loggedIn = FALSE;
    }


$db_host = "localhost";
$db_user = "admin";
$db_pass = "admin";
$db_name = "db";
?>