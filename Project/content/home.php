<?php
    include '../include/functionRetrieve.php';
    include '../template/quickHTML.php';
    include '../include/functionSession.php';
    session_start();
?>
<?php
    callHead('Home');
    echo '</head>';
?>
    <body class ="w3-gray">
        <?php callNavBar() ?>
        <div class="w3-center">
            <h1>
            Welcome to the struggle of code breaking on you every half second.
            <br>
            Please pray to your choice of higher being that this works.
            </h1>
            <small>I may have also greatly sinned.</small>
        </div>
        <div class="w3-display-container w3-display-middle w3-margin w3-padding-16">
            <p class="w3-center">Recent Game Sessions</p>
            <?php recentSessionHome(); ?>
        </div>
        <footer class="w3-container" style ="left: 0">
            <small>&copy; Jecay Chen</small>
        </footer>
    </body>
    </html>