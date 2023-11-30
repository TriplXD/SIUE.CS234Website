<?php
    #enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    #adds PDO connection
    include 'connectPDO.php';

    #starts registration process
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        #records username and password input
        $username = $_POST['username'];
        $password = $_POST['password'];
        #check if there are valid inputs; redirect back to login if there was
        if(empty($username)){
            echo '<script type="text/javascript">
            window.onload = function(){alert("Please Input a Username");}
            </script>';
            header("refresh:0;url='../content/login.php'");
            exit();
        }
        if(empty($password)){
            echo '<script type="text/javascript">
            window.onload = function(){alert("Please Input a Password");}
            </script>';
            header("refresh:0;url='../content/login.php'");
            exit();
        }

        try{
            #check for username in database
            $sql = "SELECT username, password
                    FROM registration
                    WHERE username = ?
                   ";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$username]);

            #checks to see if there was any matches; if there wasnt, redirect back to login
            $result = $stmt->fetch();
            if(empty($result)){
                echo '<script type="text/javascript">
                window.onload = function(){alert("Invalid Info, Please Try Again");}
                </script>';
                header("refresh:0;url='../content/login.php'");
                exit();
            }
            
            #check password
            $hashedPassword = $result['password'];
            
            if(password_verify($password,$hashedPassword)){
                echo '<script type="text/javascript">
                window.onload = function(){alert("Login Successful");}
                </script>';
                include '../include/functionSession.php';
                startSession($username);
                if($_SESSION['username'] == 'admin'){
                    validateAdmin();
                    header("refresh:0;url='../content/admin.php'");
                }
                header("refresh:0;url='../content/profile.php'");
            }
            else{
                echo '<script type="text/javascript">
                window.onload = function(){alert("Invalid Info, Please Try Again");}
                </script>';
                header("refresh:0;url='../content/login.php'");
            }
        }
        catch(PDOException $e){
            die("addRegistration Error: ".$e->getMessage());
        }
    }

    $pdo = null;
?>