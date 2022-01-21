<?php

//This function sanitize the string from possible problems.
function sanitizeString($conn, $var) {
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    $var = mysqli_real_escape_string($conn, $var);
    return $var;
}

//This function checks if all the values necessary for the registration of a new user are set in $_POST variable.<BR>
//True if all the values are not empty, false otherwise.
function validRegistrationValues() {

    $toReturn = true;
    if( empty($_POST['username']) ){
        echo "<p>The username is not set!</p>";
        $toReturn = false;
    }
    if( empty($_POST['password']) ){
        echo "<p>The password is not set!</p>";
        $toReturn = false;
    }
    if( empty($_POST['confirmpwd']) ){
        echo "<p>You don't fill the field of confirmation password!</p>";
        $toReturn = false;
    }
    if($_POST['confirmpwd']!==$_POST['password']) {
        echo "<p> The 2 password must be equal!</p>";
        $toReturn = false;
    }
    return $toReturn;
}

//Filter to check a proper email format
function checkEmail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        return false;
    else return true;
}

//Checks if all the values necessary for the login are set in $_POST variable.
//True if all the values are not empty, false otherwise.
function validLoginValues() {
    $toReturn = true;
    if( empty($_POST['username']) ){
        #echo "<p>The username is not set!</p>";
        $toReturn = false;
    }
    if( empty($_POST['password']) ){
        #echo "<p>The password is not set!</p>";
        $toReturn = false;
    }
    return $toReturn;
}

//Checks if a username is already present in the database or not.
//True if the username doesn't exist, false otherwise.
function validUserName($conn, $table, $username) {
    $toReturn = false;
    $res = mysqli_query($conn, "SELECT * FROM $table WHERE username='$username'");
    if (!$res)
        echo "<p>Error during username checking!</p>";
    else {
        $row = mysqli_fetch_array($res);
        if(empty($row['username']))
            $toReturn = true;
    }
    //mysqli_free_result($res);
    return $toReturn;
}

//this function check the login values
function validLogin($conn, $table, $username, $password) {
    $toReturn = true;
    $res = mysqli_query($conn, "SELECT * FROM $table WHERE username='$username'");
    if ($res==false) {
        echo "<p>Error during username checking!</p>";
        $toReturn = false;
    }
    else {
        $row = mysqli_fetch_array($res);
        if(( empty($row['username']) )||( empty($row['password']) ))
            $toReturn = false;

        if(( $username != $row['username'] )||( $password != $row['password'] ))
            $toReturn = false;
    }
    return $toReturn;
}

//This function create a link to database.
function connectToDB($server, $user, $pass, $database){
    $conn = mysqli_connect($server, $user, $pass, $database);
    if($conn == false){
        echo "Connection Error (".mysqli_connect_errno().")".mysqli_connect_error();
        return false;
    }
    if( !mysqli_set_charset($conn, "utf8") ) {
        echo "Error loading set utf8:" . mysqli_error($conn);
        mysqli_close($conn);
        return false;
    }

    return $conn;
}

?>