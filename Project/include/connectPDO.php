 <?php
    #Set and Connect DSN
    try{
        $dsn = 'mysql:host=localhost;dbname=project';
        $username = "root";
        $password = "root";

        $pdo = new PDO($dsn,$username,$password);
        
    }catch(PDOException $e){
         die("PDO Sign In Error: ".$e->getMessage());
    }
?>