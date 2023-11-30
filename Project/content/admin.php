<?php
    include '../include/functionRetrieve.php';
    include '../include/functionSession.php';
    include '../include/functionAdminRead.php';
    include '../template/quickHTML.php';
    session_start();
?>
<?php
    callHead('Admin');
    echo '</head>';
?>

<body class ="w3-gray">
    <?php callNavBar(); ?>
    <div class="scrollable">
        <?php retrieveAllRegistration() ?>
    </div>
    <div class="scrollable">
        <?php retrieveAllScore() ?>
    </div>
    <div class="scrollable">
        <?php retrieveAllGameSession() ?>
    </div>

    <div>
        <form action=".../include/functionAdminCreate.php" method="POST" class="create">
            <p>Create</p>
            <label for="username">Enter Username</label>
            <input type="text" name="username" id="username">
            <br>
            <label for="password">Enter Password</label>
            <input type="password" name="password" id="password">
            <br>
            <input type="submit" value="Create">
        </form>
    </div>

    <div>
        <form action=".../include/functionAdminCreate.php" method="POST" class="create">
            <p>Update</p>
            <label for="username">Enter Username</label>
            <input type="text" name="username" id="username">
            <br>
            <label for="password">Enter Password</label>
            <input type="password" name="password" id="password">
            <br>
            <label for="username">Enter e</label>
            <input type="text" name="username" id="username">
            <br>
            <input type="submit" value="Update">
        </form>
    </div>
</body>

<?php
    callFooter();
?>