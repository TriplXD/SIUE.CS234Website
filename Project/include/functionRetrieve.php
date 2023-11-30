<?php
    #enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    #recent game_session retrieval for index
    function recentSessionHome(){
        #adds PDO connection
        include 'connectPDO.php';

        try{
            #selects recent 10 game_sessions
            $sql = "SELECT username, game_name, games_played, win, loss, draw
                    FROM game_session
                    INNER JOIN registration
                    ON registration.user_id = game_session.user_id
                    ORDER BY session_id
                    DESC LIMIT 10
                    ";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();
            #create table
            echo '<table border="1">';
            echo '<tr><th>Username</th><th>Game</th><th># of Games</th><th>Win</th>
            <th>Loss</th><th>Draw</th></tr>';
            foreach($results as $result){
                echo '<tr><td>'.$result['username'].'</td>
                <td>'.$result['game_name'].'</td>
                <td>'.$result['games_played'].'</td>
                <td>'.$result['win'].'</td>
                <td>'.$result['loss'].'</td>
                <td>'.$result['draw'].'</td></tr>';
            }
        }catch(PDOExceptions $e){
            die("Game_Session Retrieve Error: ".$e->getMessage());
        }
        $pdo = null;
    }

    function retrieveProfileStat($username){
        #adds PDO connection
        include 'connectPDO.php';

        try{
            #selects score from registration for profile
            $sql = "SELECT game_name, games_played, win, loss, draw
                    FROM score
                    INNER JOIN registration
                    ON registration.user_id = score.user_id
                    WHERE username = ?
                    ";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$username]);
            $results = $stmt->fetchAll();

            #create table
            echo '<table border="1">';
            echo '<tr><th>Game</th><th># of Games</th><th>Win</th><th>Loss</th><th>Draw</th></tr>';
            foreach($results as $result){
                echo '<tr>
                <td>'.$result['game_name'].'</td>
                <td>'.$result['games_played'].'</td>
                <td>'.$result['win'].'</td>
                <td>'.$result['loss'].'</td>
                <td>'.$result['draw'].'</td></tr>';
            }
        }catch(PDOExceptions $e){
            die("Game_Session Retrieve Error: ".$e->getMessage());
        }
        $pdo = null;
    }
    
    function retrieveSession($username){
        #adds PDO connection
        include 'connectPDO.php';

        try{
            #selects
            $sql = "SELECT game_name, games_played, win, loss, draw
                    FROM game_session
                    INNER JOIN registration
                    ON registration.user_id = game_session.user_id
                    WHERE username = ?
                    ";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$username]);
            $results = $stmt->fetchAll();

            #create table
            echo '<table border="1">';
            echo '<tr><th>Username</th><th>Game</th><th># of Games</th><th>Win</th>
            <th>Loss</th><th>Draw</th></tr>';
            foreach($results as $result){
                echo '<tr>
                <td>'.$result['game_name'].'</td>
                <td>'.$result['games_played'].'</td>
                <td>'.$result['win'].'</td>
                <td>'.$result['loss'].'</td>
                <td>'.$result['draw'].'</td></tr>';
            }
        }catch(PDOExceptions $e){
            die("Game_Session Retrieve Error: ".$e->getMessage());
        }
        $pdo = null;
    }
?>