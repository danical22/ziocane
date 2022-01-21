<?php
require_once './session.php';

if($loggedIn) echo "<h1>Buy your ticket</h1>"; ?>
<div>
    <?php if(!$loggedIn): ?>
        <h2>You need to be <span class='darkgray'>logged in</span> to purchase.</h2>
    <?php else: ?>
        <form id="UserPurchase" method="post" action="buy.php" >
            <label for="Concert"> Concert: </label>
            <input type="text" id="concert" name="concert" maxlength="36" style="width: 200px;"><br><br>
            <label for="date"> Date: </label>
            <input type="text" id="date" name="date" maxlength="36" placeholder="pick a date" style="width: 200px;"><br><br>
            <label for="Ticket"> type of ticket: </label>
            <input type="text" id="ticket" name="Ticket" maxlength="36" placeholder="select type of ticket" style="width: 200px;">
            <br><br>
            <button type="submit" class="button"> Buy </button> <br><br>
        </form>
    <?php endif ?>
</div>