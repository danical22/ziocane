<?php 
require_once './session.php';

if(!$loggedIn) echo "<h1>Enter Your Data</h1>"; ?>
<div>
    <?php if($loggedIn): ?>
        <h2>You are already <span class='darkgray'>logged in</span>.</h2>
        <p>If you want to create a <span class='darkgray'>new account</span>, you must do the <a href='./logout.php'><span class='darkgray'>log out</span></a>.</p>
    <?php else: ?>
        <form id="UserData" method="post" action="registration.php" >
            <label for="Username"> Username: </label>
            <input type="email" id="Username" name="username" maxlength="36" placeholder="insert your email" style="width: 200px;"><br><br>
            <label for="Password"> Password: </label>
            <input type="password" id="Password" name="password" maxlength="36" placeholder="Choose a password" style="width: 200px;"><br><br>
            <label for="ConfirmPassword"> Confirm Password: </label>
            <input type="password" id="ConfirmPassword" name="confirmpwd" maxlength="36" placeholder="Re-enter the same password" onkeyup="checkPassword();" style="width: 200px;">
            <img id="imgpwd" class="no-border" src="" style="height: 25px; width: 25px; position: relative; margin-left: 10px; margin-top: -5px; visibility: hidden;">
            <br><br>
            <button type="submit" class="button" onclick="return checkRegistrationValues()"> Sign Up </button> <br><br>
        </form>
    <?php endif ?>
</div>