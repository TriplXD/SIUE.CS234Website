<?php
    #enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    #Read all registration
    function retrieveAllRegistration(){
        #adds PDO connection
        include 'connectPDO.php';

        try{
            #selects all registrations
            $sql = "SELECT *
                    FROM registration
                    ";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();

            #create table
            echo '<table border="1">';
            echo '<tr><th>User_Id</th><th>Username</th><th>Password</th></tr>';
            foreach($results as $result){
                echo '<tr>
                <td>'.$result['user_id'].'</td>
                <td>'.$result['username'].'</td>
                <td>'.$result['password'].'</td></tr>';
            }
        }catch(PDOExceptions $e){
            die("Game_Session Retrieve Error: ".$e->getMessage());
        }
        $pdo = null;
    }

    #Read all score
    function retrieveAllScore(){
        #adds PDO connection
        include 'connectPDO.php';

        try{
            #selects
            $sql = "SELECT *
                    FROM score
                    ";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();

            #create table
            echo '<table border="1">';
            echo '<tr><th>Score_Id</th><th>User_Id</th><th>Game_Name</th><th>Games_Played</th>
            <th>Win</th><th>Loss</th><th>Draw</th></tr>';
            foreach($results as $result){
                echo '<tr>
                <td>'.$result['score_id'].'</td>
                <td>'.$result['user_id'].'</td>
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
    
    #Read all game_session
    function retrieveAllGameSession(){
        #adds PDO connection
        include 'connectPDO.php';

        try{
            #selects
            $sql = "SELECT *
                    FROM game_session
                    ";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();

            #create table
            echo '<table border="1">';
            echo '<tr><th>Session_Id</th><th>User_Id</th><th>Game_Name</th><th>Games_Played</th>
            <th>Win</th><th>Loss</th><th>Draw</th></tr>';
            foreach($results as $result){
                echo '<tr>
                <td>'.$result['session_id'].'</td>
                <td>'.$result['user_id'].'</td>
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