<?php
    include '../include/functionRetrieve.php';
    include '../template/quickHTML.php';
    include '../include/functionSession.php';
    session_start();
?>
<?php
    callHead('Register');
    echo '</head>';
?>
    <body>
        <?php callNavBar() ?>
        <div class="login">
            <form action="../include/createAccount.php" method="POST" class="login">
                <p>Create an Account</p>
                <label for="username">Enter Username</label>
                <input type="text" name="username" id="username">
                <br>
                <label for="password">Enter Password</label>
                <input type="password" name="password" id="password">
                <br>
                <small><a href="login.php">Already Have An Account?</a></small>
                <br>
                <input type="submit" value="Create">
            </form>
        </div>
    </body>
    
<?php
    callFooter();
?>
