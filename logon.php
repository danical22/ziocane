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
         require_once './session.php';
         require_once './function.php';

         if( isset($loggedIn) && ($loggedIn) )
             echo "<h2>You are already logged in!</h2>";
         else{
             if(count($_POST)==0)
                 echo "<h3>Please before visit this page go <a href='index.php'>here</a> and enter your data!</h3>";
             else {
                 $conn = connectToDB($db_host, $db_user, $db_pass, $db_name);
                 if($conn != false) {
                     $user = sanitizeString($conn, $_POST['username']);
                     $pass = md5($_POST['password']);	/* md5 create the hash of the password */

                     if( validLogin($conn, "users", $user, $pass) ){
                         echo "<h1><span class='darkgray'>Successful</span> Login!</h1>";
                         echo "<h3>You have been successfully logged in!</h3><h3>Click <a href='./index.php'>here</a> to book your place!</h3>";
                         $_SESSION['user_danilo'] = $user;
                         $username = $user;
                         $_SESSION['pass_danilo'] = $pass;
                         $_SESSION['time_danilo'] = time();
                     }
                     else {
                         echo "<h3>Invalid username or password.</h3>
                    <h3>Please go <a href='index.php'>back</a> and try again!</h3>
                    <h3>If you are not register you can do a free registration <a href='./index.php'>here</a>!</h3>";
                     }
                 }
             }
         }
         ?>

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
