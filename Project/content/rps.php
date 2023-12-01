<?php
    include '../include/functionRetrieve.php';
    include '../template/quickHTML.php';
    include '../include/functionSession.php';
    session_start();
    #fix interaction below
    if(isset($_SESSION['gameName'])){
        echo '<script type="text/javascript">
            window.onload = function(){alert("Old Scores Detected. Submitting Now.");}
            </script>';
        include '../include/functionSubmit.php';
    }else{
        $_SESSION['gameName'] = 'Rock Paper Scissors';
    }
?>
<?php
    callHead('Rock Paper Scissors');
    echo '</head>';
?>

<body>
    <?php callNavBar(); ?>
    <div>
        <form action="../include/rpsLogic.php" method="POST">
            <label>
                <input type="radio" id="rock" name="rps" value="rock" checked>
                <img src="../images/rock.png" alt="rock" height="200" width="200">
            </label>
            <br>
            <label>
                <input type="radio" id="paper" name="rps" value="paper">
                <img src="../images/paper.png" alt="paper" height="200" width="200">
            </label>
            <br>
            </label>
                <input type="radio" id="scissors" name="rps" value="scissors">
                <img src="../images/scissor.png" alt="scissor" height="200" width="200">
            </label>
            <br>
            <input type="submit" value="Submit">
            </form>
    </div>
</body>

<?php
    callFooter();
?>