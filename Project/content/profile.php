<?php
    include '../include/functionRetrieve.php';
    include '../template/quickHTML.php';
    include '../include/functionSession.php';
    session_start();
?>
<?php
    callHead('Profile');
    echo '</head>';
?>
<?php
    try{
        if(!isset($_SESSION['username'])){
            echo $_SESSION["username"];
            echo '<script type="text/javascript">
                    window.onload = function(){alert("Please Login");}
                    </script>';
            header("refresh:0;url='../index.php'");
            exit();
        }
        if($_SESSION['username'] == "admin" && isset($_SESSION['WHOAREYOU'])){
            if($_SESSION['WHOAREYOU'] == "iamadmin")
                header("refresh:0;url='../content/admin.php'");
                exit();
        }

        $username = $_SESSION['username'];

    }catch(Exception $e){
        die("Profile Error: ".$e->getMessage());
    }
?>
<body>
    <?php callNavBar() ?>
    <h1>Welcome, <?php echo $username ?></h1>
    <div>

    </div>
</body>
<?php
    callFooter();
?>