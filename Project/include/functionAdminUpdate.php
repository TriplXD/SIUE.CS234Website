<?php
    #enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    #adds PDO connection
    include 'connectPDO.php';
    session_start();

    #starts submit process
    switch($_SESSION['adminData']['table']){
        case 'registration':
            #retrieve inputs
            $userId = $_SESSION['adminData']['user_id'];
            $username = $_SESSION['adminData']['username'];
            $password = $_SESSION['adminData']['password'];
            #check if there are valid inputs; redirect back to admin if there wasn't
            if(empty($userId)){
                echo '<script type="text/javascript">
                window.onload = function(){alert("Please Input a Username");}
                </script>';
                header("refresh:0;url='../content/admin.php'");
                exit();
            }
            if(empty($username)){
                echo '<script type="text/javascript">
                window.onload = function(){alert("Please Input a Username");}
                </script>';
                header("refresh:0;url='../content/admin.php'");
                exit();
            }
            if(empty($password)){
                echo '<script type="text/javascript">
                window.onload = function(){alert("Please Input a Password");}
                </script>';
                header("refresh:0;url='../content/admin.php'");
                exit();
            }
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
            }catch(PDOException $e){
                die("addRegistration Error: ".$e->getMessage());
            }

            echo '<script type="text/javascript">
            window.onload = function(){alert("Registration Successfully Updated");}
            </script>';
            header("refresh:0;url='../content/admin.php'");
            break;

        case 'score':
            $scoreId = $_SESSION['adminData']['score_id'];
            $userId = $_SESSION['adminData']['user_id'];
            $gameName = $_SESSION['adminData']['gameName'];
            $win = $_SESSION['adminData']['win'];
            $loss = $_SESSION['adminData']['loss'];
            $draw = $_SESSION['adminData']['draw'];
            $numGame = $win + $loss + $draw;

            #check if needed variables are empty
            if(empty($scoreId)){
                echo '<script type="text/javascript">
                window.onload = function(){alert("Please Input ScoreId");}
                </script>';
                header("refresh:0;url='../content/admin.php'");
                exit();
            }
            if(empty($userId)){
                echo '<script type="text/javascript">
                window.onload = function(){alert("Please Input UserId");}
                </script>';
                header("refresh:0;url='../content/admin.php'");
                exit();
            }
            if(empty($gameName)){
                echo '<script type="text/javascript">
                window.onload = function(){alert("Please Input a Game Name");}
                </script>';
                header("refresh:0;url='../content/admin.php'");
                exit();
            }
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
            }catch(PDOException $e){
                die("addRegistration Error: ".$e->getMessage());
            }

            echo '<script type="text/javascript">
            window.onload = function(){alert("Score Successfully Updated");}
            </script>';
            header("refresh:0;url='../content/admin.php'");
            break;

        case 'game_session':
            $sessionId = $_SESSION['adminData']['session_id'];
            $userId = $_SESSION['adminData']['user_id'];
            $gameName = $_SESSION['adminData']['gameName'];
            $win = $_SESSION['adminData']['win'];
            $loss = $_SESSION['adminData']['loss'];
            $draw = $_SESSION['adminData']['draw'];
            $numGame = $win + $loss + $draw;

            #check if needed variables are empty
            if(empty($scoreId)){
                echo '<script type="text/javascript">
                window.onload = function(){alert("Please Input ScoreId");}
                </script>';
                header("refresh:0;url='../content/admin.php'");
                exit();
            }
            if(empty($userId)){
                echo '<script type="text/javascript">
                window.onload = function(){alert("Please Input UserId");}
                </script>';
                header("refresh:0;url='../content/admin.php'");
                exit();
            }
            if(empty($gameName)){
                echo '<script type="text/javascript">
                window.onload = function(){alert("Please Input a Game Name");}
                </script>';
                header("refresh:0;url='../content/admin.php'");
                exit();
            }
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
            }catch(PDOException $e){
                die("addRegistration Error: ".$e->getMessage());
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
?>