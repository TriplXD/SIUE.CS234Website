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

                try{
                    $sql = 'DELETE FROM registration
                            WHERE user_id = :user_id
                            ';
        
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(":user_id", $userId);
                    $stmt->execute();
                }

                echo '<script type="text/javascript">
                window.onload = function(){alert("Registration Successfully Deleted");}
                </script>';
                header("refresh:0;url='../content/admin.php'");
                break;

            case 'score':
                $scoreId = $_POST['score_id']

                try{
                    $sql = 'DELETE FROM score
                            WHERE score_id = :score_id
                            ';
        
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(":score_id", $scoreId);
                    $stmt->execute();
                }

                echo '<script type="text/javascript">
                window.onload = function(){alert("Score Successfully Deleted");}
                </script>';
                header("refresh:0;url='../content/admin.php'");
                break;

            case 'game_session':
                $sessionId = $_POST['session_id']

                try{
                    $sql = 'DELETE FROM game_session
                            WHERE session_id = :session_id
                            ';
        
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(":session_id", $sessionId);
                    $stmt->execute();
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
    }
?>