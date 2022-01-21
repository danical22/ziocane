<?php
require_once './session.php';
require_once './function.php';

        if(count($_POST)===0) {
            if( isset($loggedIn) && ($loggedIn) ) {
                echo "<h2>You are already <span class='darkgray'>logged in</span>.</h2>",
                "<p>If you want to create a <span class='darkgray'>new account</span>, you must do the <a href='./logout.php'>log out</a>.</p>";
            }
            else
                echo "<h3>Please before visit this page go <a href='signup.php'>here</a> and enter your data!</h3>";
        }
        elseif( !validRegistrationValues() )
            echo "<h3>You entered some invalid data! Please go <a href='signup.php'>here</a> and try again!</h3>";
        else{
            /** @var mysqli $conn */
            $conn = connectToDB($db_host, $db_user, $db_pass, $db_name);
            if($conn !== false) {
                $user = sanitizeString($conn, $_POST['username']);
                $pass = md5($_POST['password']);		/* md5 create the hash of the password */
                $confpass = md5($_POST['confirmpwd']);

                try {
                    if(!checkEmail($user))
                        throw new Exception("Invalid Email");

                    if(!mysqli_autocommit($conn, FALSE))
                        throw new Exception("Impossible to set autocommit to FALSE");

                    if( !validUserName($conn, "users", $_POST['username']) )
                        throw new Exception("<h3>The chosen username is already in use.<br>".
                            "Please go <a href='index.php'>back</a> and try another one!</h3>".
                            "<h3>Are you already registered? Please, go <a href='index.php'>here</a> and login!</h3>");

                    $res = mysqli_query($conn, "SELECT * FROM users LOCK IN SHARE MODE");
                    if(!$res)	/* LOCK in SHARE MODE - lock while the table in write mode for preventing a concurrency access */
                        throw new Exception("Lock table failed!");
                    mysqli_free_result($res);

                    $res = mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$user', '$pass')");
                    if (!$res)
                        throw new Exception("<p style='color:red'>Insertion avoided! It's impossible to register your account!</p>");

                    if(!mysqli_commit($conn))
                        throw new Exception("<p style='color:red'>Impossible to commit the operation!</p>");

                    echo "<h1>User <strong><span class='darkgray'>$user</span></strong> successfully registered!</h1>";
                    echo "<h3>Click <a href='./login.php'>here</a> to login!</h3>";

                    if(!mysqli_autocommit($conn, TRUE))
                        throw new Exception("Impossible to set autocommit to TRUE");
                }
                catch (Exception $e) {
                    mysqli_rollback($conn);
                    mysqli_autocommit($conn, TRUE);
                    echo $e->getMessage();
                }
                mysqli_close($conn);
            }
        }
        ?>