<?php
    #enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    #adds PDO connection
    include 'connectPDO.php';

    #starts submit process
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        switch($_POST['database']){
            case 'registration':
                $userId = $_POST['user_id'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                try{
                    $sql = 'UPDATE registration
                            SET username = :username, password = :password
                            WHERE user_id = :user_id
                            ';
        
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(":user_id", $userId);
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":password", $hashedPassword);
                    $stmt->execute();
                }

                echo '<script type="text/javascript">
                window.onload = function(){alert("Registration Successfully Updated");}
                </script>';
                header("refresh:0;url='../content/admin.php'");
                break;

            case 'score':
                $scoreId = $_POST['score_id']
                $userId = $_POST['user_id'];
                $gameName = $_POST['gameName'];
                $win = $_POST['win'];
                $loss = $_POST['loss'];
                $draw = $_POST['draw'];
                $numGame = $win + $loss + $draw;

                try{
                    $sql = 'UPDATE score 
                            SET user_id = :user_id, game_name = :game_name, games_played = :games_played,
                                win = :win, loss = :loss, draw = :draw
                            WHERE score_id = :score_id
                            ';
        
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(":score_id", $scoreId);
                    $stmt->bindParam(":user_id", $userId);
                    $stmt->bindParam(":game_name", $gameName);
                    $stmt->bindParam(":games_played", $numGame);
                    $stmt->bindParam(":win", $win);
                    $stmt->bindParam(":loss", $loss);
                    $stmt->bindParam(":draw", $draw);
                    $stmt->execute();
                }

                echo '<script type="text/javascript">
                window.onload = function(){alert("Score Successfully Updated");}
                </script>';
                header("refresh:0;url='../content/admin.php'");
                break;

            case 'game_session':
                $sessionId = $_POST['session_id']
                $userId = $_POST['user_id'];
                $gameName = $_POST['gameName'];
                $win = $_POST['win'];
                $loss = $_POST['loss'];
                $draw = $_POST['draw'];
                $numGame = $win + $loss + $draw;

                try{
                    $sql = 'UPDATE game_session 
                            SET user_id = :user_id, game_name = :game_name, games_played = :games_played,
                                win = :win, loss = :loss, draw = :draw
                            WHERE session_id = :session_id
                            ';
        
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(":session_id", $sessionId);
                    $stmt->bindParam(":user_id", $userId);
                    $stmt->bindParam(":game_name", $gameName);
                    $stmt->bindParam(":games_played", $numGame);
                    $stmt->bindParam(":win", $win);
                    $stmt->bindParam(":loss", $loss);
                    $stmt->bindParam(":draw", $draw);
                    $stmt->execute();
                }

                echo '<script type="text/javascript">
                window.onload = function(){alert("Game_Session Successfully Updated");}
                </script>';
                header("refresh:0;url='../content/admin.php'");
                break;
            
            default:
                echo '<script type="text/javascript">
                window.onload = function(){alert("No Changes Were Made");}
                </script>';
                header("refresh:0;url='../content/admin.php'");
                break;
        }
        $pdo = null;
    }
?>