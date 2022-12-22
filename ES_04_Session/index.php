<?php session_start();?>
<html>
<head>
    <h1>WebApp</h1>
</head>
<body>
<?php
$_SESSION['id']="";
    if($_SESSION['id']=="pluto"){
        echo "Hai già effettuato l'accesso ".$_SESSION['id']."<br>";
        ?>
        <a href="riservata.php">Home profilo</a><br>
        <a href="logout.php">Logout</a><br>
        <?php   
    }else{
        echo "Non hai accesso alla pagina<br>"
        ?>
        <a href="login.php">Login</a><br>
        <a href="riservata.php">Home profilo</a><br>
        <?php        
    }
?>
</body>
</html>
