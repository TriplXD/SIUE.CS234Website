<?php
    include '../include/functionRetrieve.php';
    include '../include/functionSession.php';
    include '../include/functionAdminRead.php';
    include '../template/quickHTML.php';
    session_start();
    $_SESSION['adminData'] = null;
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
        <form action="../include/functionAdminSwitch.php" method="POST" class="">
            <div>
                <div>
                    <h2 class="">Select CRUD Operation</h2>
                    <input type="radio" id="create" name="crud" value="create" checked>
                    <label for="create">Create</label>
                    <br>
                    <!--
                    <input type="radio" id="read" name="crud" value="read" checked>
                    <label for="read">Read</label>
                    <br>
                    -->
                    <input type="radio" id="update" name="crud" value="update">
                    <label for="update">Update</label>
                    <br>
                    <input type="radio" id="delete" name="crud" value="delete">
                    <label for="delete">Delete</label>
                </div>
                <div>
                    <h2 class="">Select Table To Edit</h2>
                    <input type="radio" id="registration" name="table" value="registration">
                    <label for="registration">registration</label>
                    <br>
                    <input type="radio" id="score" name="table" value="score">
                    <label for="score">score</label>
                    <br>
                    <input type="radio" id="game_session" name="table" value="game_session" checked>
                    <label for="game_session">game_session</label>
                </div>
            </div>
            <div>
                <h2 class="">User Inputs</h2>
                <label for="user_id">Enter user_id</label>
                <input type="text" id="user_id" name="user_id">
                <br>
                <label for="score_id">Enter score_id</label>
                <input type="text" id="score_id" name="score_id">
                <br>
                <label for="session_id">Enter game_session_id</label>
                <input type="text" id="session_id" name="session_id">
                <br>
                <label for="username">Enter username</label>
                <input type="text" id="username" name="username">
                <br>
                <label for="password">Enter password</label>
                <input type="text" id="password" name="password">
                <br>
                <label for="gameName">Enter game_name</label>
                <input type="text" id="gameName" name="gameName">
                <br>
                <label for="win">Enter win</label>
                <input type="text" id="win" name="win">
                <br>
                <label for="loss">Enter loss</label>
                <input type="text" id="loss" name="loss">
                <br>
                <label for="draw">Enter draw</label>
                <input type="text" id="draw" name="draw">
            </div>
            <div>
                <input type="submit" value="Confirm Edit">
            </div>
        </form>
    </div>
</body>

<?php
    callFooter();
?>