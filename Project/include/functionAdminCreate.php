<?php
    #enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    #adds PDO connection
    include 'connectPDO.php';
    session_start();
    
    switch($_SESSION['adminData']['table']){
        case 'registration':
            #records username and password input
            $username = $_SESSION['adminData']['username'];
            $password = $_SESSION['adminData']['password'];

            #check if there are valid inputs; redirect back to admin if there wasn't
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

            try{
                #check username for copies
                $sql = "SELECT user_id
                        FROM registration
                        WHERE username = ?
                       ";
    
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$username]);
                #checks to see if there was any matches and if there was, redirect back to login
                $result = $stmt->fetch();
                if(!empty($result)){
                    echo '<script type="text/javascript">
                    window.onload = function(){alert("Username Already Taken");}
                    </script>';
                    header("refresh:0;url='../content/admin.php'");
                    throw new Exception();
                }
                
                #insert registration data
                #hash password
                $hashedPassword=password_hash($password, PASSWORD_BCRYPT);
    
                $sql = "INSERT INTO registration(username, password)
                            VALUES (:username, :password);
                       ";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":password", $hashedPassword);
                $stmt->execute();
            }
            catch(PDOException $e){
                die("addRegistration Error: ".$e->getMessage());
            }
            echo '<script type="text/javascript">
            window.onload = function(){alert("Registration Successfully Created");}
            </script>';
            header("refresh:0;url='../content/admin.php'");

            break;
        
        case 'score':
            #records score input
            $userId = $_SESSION['adminData']['user_id'];
            $gameName = $_SESSION['adminData']['gameName'];
            $win = $_SESSION['adminData']['win'];
            $loss = $_SESSION['adminData']['loss'];
            $draw = $_SESSION['adminData']['draw'];
            $numGame = $win + $loss + $draw;

            #check if needed variables are empty
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
                #insert score data
                $sql = 'INSERT INTO score(user_id, game_name, games_played, win, loss, draw)
                        VALUES (:user_id, :game_name, :games_played, :win, :loss, :draw)
                        ';
        
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(":user_id", $userId);
                    $stmt->bindParam(":game_name", $gameName);
                    $stmt->bindParam(":games_played", $numGame);
                    $stmt->bindParam(":win", $win);
                    $stmt->bindParam(":loss", $loss);
                    $stmt->bindParam(":draw", $draw);
                    $stmt->execute();
            }
            catch(PDOException $e){
                die("addRegistration Error: ".$e->getMessage());
            }
            echo '<script type="text/javascript">
            window.onload = function(){alert("Score Successfully Created");}
            </script>';
            header("refresh:0;url='../content/admin.php'");

            break;
        
        case 'game_session':
            #records game_session input
            $userId = $_SESSION['adminData']['user_id'];
            $gameName = $_SESSION['adminData']['gameName'];
            $win = $_SESSION['adminData']['win'];
            $loss = $_SESSION['adminData']['loss'];
            $draw = $_SESSION['adminData']['draw'];
            $numGame = $win + $loss + $draw;

            #check if needed variables are empty
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
                #insert score data
                $sql = 'INSERT INTO game_session(user_id, game_name, games_played, win, loss, draw)
                        VALUES (:user_id, :game_name, :games_played, :win, :loss, :draw)
                        ';
        
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(":user_id", $userId);
                    $stmt->bindParam(":game_name", $gameName);
                    $stmt->bindParam(":games_played", $numGame);
                    $stmt->bindParam(":win", $win);
                    $stmt->bindParam(":loss", $loss);
                    $stmt->bindParam(":draw", $draw);
                    $stmt->execute();
            }
            catch(PDOException $e){
                die("addRegistration Error: ".$e->getMessage());
            }
            echo '<script type="text/javascript">
            window.onload = function(){alert("Game Session Successfully Created");}
            </script>';
            header("refresh:0;url='../content/admin.php'");
            
            break;
        
        default:
            echo '<script type="text/javascript">
            window.onload = function(){alert("adminCreate Failed");}
            </script>';
            header("refresh:0;url='../content/admin.php'");
    }

    $pdo = null;
?>