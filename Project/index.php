<?php
    include 'include/functionRetrieve.php';
    include 'template/quickHTML.php';
    include 'include/functionSession.php';
    session_start();
?>
<?php
    callHead('Home');
    echo '</head>';
    header("refresh:0;url='content/home.php'");
?>
<?php
    callFooter();
?>
