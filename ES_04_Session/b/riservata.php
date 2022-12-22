<?php session_start();?>
<html>
<?php
if(isset($_SESSION['id'])){
    echo"<h1>Benvenuto nella pagina riservata</h1>";
    echo'<a href="index.php">Home</a><br>';
    echo'<a href="logout.php">Logout</a>';
    $_SESSION['id'] = "pluto";
?>
<?php
}else{ 
    echo"<h1>Non hai effettuato l'accesso</h1>";
    echo'<a href="login.php">Clicca qui per login</a><br>';
    echo'<a href="index.php">Torna alla home</a><br>';
}?>
</html>
