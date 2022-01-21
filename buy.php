<?php
require_once './session.php';
require_once './function.php';

/*da fare sencondo esigenze, da implementare qui e su DB */

echo "pagina completamente da implementare, guarda codice";

/*
    $conn = connectToDB($db_host, $db_user, $db_pass, $db_name);
    if($conn !== false) {

        try {

            $res = mysqli_query($conn, "INSERT INTO tickets (ticket, day, username) VALUES ('$_POST[0]', '...')");
            if (!$res)
                throw new Exception("<p style='color:red'>Insertion avoided! It's impossible to register your ticket!</p>");

            echo "<h1>Ticket <strong><span class='darkgray'>$user</span></strong> successfully buyed!</h1>";
        }
        catch (Exception $e) {
            mysqli_rollback($conn);
            echo $e->getMessage();
        }
        mysqli_close($conn);
    }
*/
?>