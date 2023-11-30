<?php
    #enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    #adds PDO connection
    include 'connectPDO.php';

    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        #records username and password input
        $username = $_POST['username'];
        $password = $_POST['password'];
        #check if there are valid inputs; redirect back to admin if there wasn't
        if(empty($username)){
            echo '<script type="text/javascript">
            window.onload = function(){alert("Please Input a Username");}
            </script>';
            header("refresh:0;url='../content/admin.php'");
            throw new Exception();
        }
        if(empty($password)){
            echo '<script type="text/javascript">
            window.onload = function(){alert("Please Input a Password");}
            </script>';
            header("refresh:0;url='../content/admin.php'");
            throw new Exception();
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
    }

    $pdo = null;
?>