<?php 
    #general head template
    function callHead($name){
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <title>'.$name.'</title>
        ';
    }
    function callFooter(){
        echo'
            <footer class="">
            <p><small>&copy;'.date('Y').' Jecay Chen</small></p>
            </footer>
        </html>
        ';
    }
    function callNavBar(){
        if(isset($_SESSION['username'])){
            echo '
                <div class="w3-bar w3-black" style="width: 100%">
                    <a href="home.php" class="w3-bar-item w3-button">Home</a>
                    <div class="w3-dropdown-hover">
                        <button class="w3-button">Games</button>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4">
                            <a href="rps.php" class="w3-bar-item w3-button">Rock Paper Scissors</a>
                            <a href="blackjack.php" class="w3-bar-item w3-button">Blackjack</a>
                        </div>
                    </div>
                    <a href="logout.php" class="w3-bar-item w3-button w3-right">Logout</a>
                    <a href="profile.php" class="w3-bar-item w3-button w3-right">Profile</a>
                </div>
            ';
        }else{
            echo '
                <div class="w3-container w3-bar w3-black" style="width: 100%">
                    <a href="home.php" class="w3-bar-item w3-button">Home</a>
                    <div class="w3-dropdown-hover">
                        <button class="w3-button">Games</button>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4">
                            <a href="rps.php" class="w3-bar-item w3-button">Rock Paper Scissors</a>
                            <a href="blackjack.php" class="w3-bar-item w3-button">Blackjack</a>
                        </div>
                    </div>
                    <a href="login.php" class="w3-bar-item w3-button w3-right">Login</a>
                </div>
            ';
        }
    }
?>