<html>
<head>
<title>Login con is set</title>
</head> 
<body>
    <?php    
    if(isset($_POST['submit'])){
        if($_POST['nome']!="morgan" || $_POST['psw']!="admin")
            echo"Nome utente o password errati";
        else
            echo"Benvenuto amministratore";  
    }
    else{
        ?>
        <h2>Credenziali di accesso</h2>
        <form action="index.php" method="post">
        <label for="nome">Nome:</label><br>
        <input class="user" type="text" name="nome" placeholder="Username"><br>
        <label for="psw">Password</label><br>
        <input type="text" name="psw" placeholder="Password"><br><br>
        <input type="submit" name="submit" value="Login">
        </form>
        <?php
    }?>
</body>
</html>

