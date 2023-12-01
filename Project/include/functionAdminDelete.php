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
            $userId = $_SESSION['adminData']['user_id'];

            if(empty($userId)){
                echo '<script type="text/javascript">
                window.onload = function(){alert("Please Input a UserId");}
                </script>';
                header("refresh:0;url='../content/admin.php'");
                exit();
            }
            try{
                $sql = 'DELETE FROM registration
                        WHERE user_id = :user_id
                        ';
    
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":user_id", $userId);
                $stmt->execute();
            }catch(PDOException $e){
                die("addRegistration Error: ".$e->getMessage());
            }

            echo '<script type="text/javascript">
            window.onload = function(){alert("Registration Successfully Deleted");}
            </script>';
            header("refresh:0;url='../content/admin.php'");
            break;

        case 'score':
            $scoreId = $_SESSION['adminData']['score_id'];

            if(empty($scoreId)){
                echo '<script type="text/javascript">
                window.onload = function(){alert("Please Input a ScoreId");}
                </script>';
                header("refresh:0;url='../content/admin.php'");
                exit();
            }
            try{
                $sql = 'DELETE FROM score
                        WHERE score_id = :score_id
                        ';
    
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":score_id", $scoreId);
                $stmt->execute();
            }catch(PDOException $e){
                die("addRegistration Error: ".$e->getMessage());
            }

            echo '<script type="text/javascript">
            window.onload = function(){alert("Score Successfully Deleted");}
            </script>';
            header("refresh:0;url='../content/admin.php'");
            break;

        case 'game_session':
            $sessionId = $_SESSION['adminData']['session_id'];

            if(empty($sessionId)){
                echo '<script type="text/javascript">
                window.onload = function(){alert("Please Input a Game Session Id");}
                </script>';
                header("refresh:0;url='../content/admin.php'");
                exit();
            }
            try{
                $sql = 'DELETE FROM game_session
                        WHERE session_id = :session_id
                        ';
    
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":session_id", $sessionId);
                $stmt->execute();
            }catch(PDOException $e){
                die("addRegistration Error: ".$e->getMessage());
            }

            echo '<script type="text/javascript">
            window.onload = function(){alert("Game_Session Successfully Deleted");}
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