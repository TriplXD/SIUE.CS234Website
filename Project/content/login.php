<?php
    include '../include/functionRetrieve.php';
    include '../template/quickHTML.php';
    include '../include/functionSession.php';
    session_start();
?>
<?php
    callHead('Login');
    echo '</head>';
?>
    <body>
        <?php callNavBar() ?>
        <div>
            <form action="../include/loginAccount.php" method="POST" class="login">
                <p>Login</p>
                <label for="username">Enter Username</label>
                <input type="text" name="username" id="username">
                <br>
                <label for="password">Enter Password</label>
                <input type="password" name="password" id="password">
                <br>
                <small><a href="register.php">Need An Account?</a></small>
                <br>
                <input type="submit" value="Login">
            </form>
        </div>
    </body>
    
<?php
    callFooter();
?>
