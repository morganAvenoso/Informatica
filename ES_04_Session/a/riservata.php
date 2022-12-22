<?php session_start();?>
<html>
<?php
if($_SESSION['id']=="pluto"){
    echo"<h1>Benvenuto nella pagina riservata</h1>";
    echo'<a href="index.php">Home</a><br>';
    echo'<a href="logout.php">Logout</a>';
    $_SESSION['id'] = "pluto";
?>
<?php
}else{ 
    $_SESSION['id']="errore";   
    header("location: login.php");
}?>
</html>
