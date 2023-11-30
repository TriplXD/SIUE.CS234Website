<?php
    #enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    #adds PDO connection
    include 'connectPDO.php';

    #starts submit process
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        start_session();

        #records game data
        $username = $_SESSION['username'];
        $gameName = $_SESSION['gameName'];
        $win = $_SESSION['win'];
        $loss = $_SESSION['loss'];
        $draw = $_SESSION['draw'];
        $numGame = $win + $loss + $draw;

        #destroy session game data
        $_SESSION['gameName'] = null;
        $_SESSION['win'] = null;
        $_SESSION['loss'] = null;
        $_SESSION['draw'] = null;
        
        #prevents 0 value updates
        if($numGame == 0){
            echo '<script type="text/javascript">
            window.onload = function(){alert("No data recorded");}
            </script>';
            header("refresh:0;url='../index.php'");
            exit();
        }

        try{
            #retrieve user_id from username
            $sql = 'SELECT user_id
                    FROM registration
                    WHERE username = :username
                    ';

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            $results = $stmt->fetchAll();
            $userId = $results['user_id'];

            #retireve score information using user_id and game_name
            $sql = 'SELECT score.score_id, games_played, win, loss, draw
                    FROM registration
                    INNER JOIN score
                    ON registration.user_id = score.user_id
                    WHERE registration.user_id = :user_id AND score.game_name = :gamename
                    ';

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":user_id", $userId);
            $stmt->bindParam(":gamename", $gameName);
            $stmt->execute();
            $results = $stmt->fetchAll();

            #checks to see if there was a valid entry; if no entry, create new entry
            if(empty($result)){
                #insert into score
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

                echo '<script type="text/javascript">
                window.onload = function(){alert("New Score Recorded");}
                </script>';

            }else{
                #retrieve and update score
                $newWin = $win + $results['win'];
                $newLoss = $loss + $results['loss'];
                $newDraw = $draw + $results['draw'];
                $newNumGame = $newWin + $newLoss + $newDraw;

                $sql = 'UPDATE score 
                        SET games_played = :games_played, win = :win, loss = :loss, draw = :draw
                        WHERE user_id = :user_id AND game_name = :game_name
                        ';
                    
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":user_id", $userId);
                $stmt->bindParam(":game_name", $gameName);
                $stmt->bindParam(":games_played", $newNumGame);
                $stmt->bindParam(":win", $newWin);
                $stmt->bindParam(":loss", $newLoss);
                $stmt->bindParam(":draw", $newDraw);
                $stmt->execute();

                echo '<script type="text/javascript">
                window.onload = function(){alert("Score Has Been Updated");}
                </script>';
            }

            #insert into game_session
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
            
            echo '<script type="text/javascript">
            window.onload = function(){alert("New Session Recorded");}
            </script>';
            header("refresh:0;url='../index.php'");

        }catch(PDOException $e){
            die("Game Data Submit Error: ".$e->getMessage());
        }
    }

    $pdo = null;
?>