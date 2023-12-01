<?php
    #enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();

    #starts submit process
    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $keys = array_keys($_POST);
    
        $_SESSION['adminData'] = array();
    
        foreach($keys as $key){
            if(isset($_POST[$key])){
                $_SESSION['adminData'][$key] = $_POST[$key];
            }
        }
        switch($_SESSION['adminData']['crud']){
            case 'create':
                echo '<script type="text/javascript">
                window.onload = function(){alert("create");}
                </script>';
                header("refresh:0;url='../include/functionAdminCreate.php'");
                break;
            case 'read':
                echo '<script type="text/javascript">
                window.onload = function(){alert("read");}
                </script>';
                header("refresh:0;url='../include/functionAdminRead.php'");
                break;
            case 'update':
                echo '<script type="text/javascript">
                window.onload = function(){alert("update");}
                </script>';
                header("refresh:0;url='../include/functionAdminUpdate.php'");
                break;
            case 'delete':
                echo '<script type="text/javascript">
                window.onload = function(){alert("delete");}
                </script>';
                header("refresh:0;url='../include/functionAdminDelete.php'");
                break;
            default:
                echo '<script type="text/javascript">
                window.onload = function(){alert("Unsuccessful");}
                </script>';
                header("refresh:0;url='../content/admin.php'");
        }
    }
?>