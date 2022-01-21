<?php 
require_once './session.php';

if( isset($loggedIn) && ($loggedIn) ): ?>
        <blockquote> <h2>You are already logged in!</h2></blockquote>
    <?php else:
        if( (isset($_GET["msg"])) && ($_GET["msg"]=="SessionTimeOutExpired") )
            echo "<p class='red'>Tmeout expired! <br>Please, login again! </p>";	?>
        <h1>If you already have an account enter your data here:</h1>
        <h3>if you don't have an account you can create a new one <u><a onclick='loadSection("./signup.php")'>Here </a></u></h3><br>
        <div>
            <form id="UserData" method="post" action="logon.php">
                <label for="Username"> Username: </label>
                <input type="text" id="Username" name="username" maxlength="30" placeholder="Insert your username" style="width: 200px;"><br><br>
                <label for="Password"> Password: </label>
                <input type="password" id="Password" name="password" maxlength="36" placeholder="Insert your password" style="width: 200px;"><br><br>
                <button type="submit" class="button" style="width: 100px" onclick="return checkLoginValues()"> Log In </button>
                <br><br>
            </form>
        </div>

    <?php endif ?>