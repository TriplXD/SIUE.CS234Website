<?php
    function startSession($username){
        if(!isset($_SESSION["username"])){
            session_start();
        }

        $_SESSION["username"] = $username;
    }

    function validateAdmin(){
        if(!isset($_SESSION["username"])){
            session_start();
        }
        
        $_SESSION["WHOAREYOU"] = "iamadmin";
    }

    function destroySession(){
        if(!isset($_SESSION["username"])){
            session_start();
        }
        $_SESSION = array();
        session_destroy();
        echo '<script type="text/javascript">
                window.onload = function(){alert("Logout Successful");}
                </script>';
        header("refresh:0;url='../index.php'");
    }
?>