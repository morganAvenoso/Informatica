<html>
    <head>
        <title> Pagina riservata </title>
    </head>
<body>
    <?php 
    $user=$_POST["nome"];
    $psd=$_POST["psw"];
    if($user!="Morgan"||$psd!="admin")
    echo"<h3> Nome utente o password errati.</h3>";
    else
    echo "<h3> Benvenuto nell'area personale</h3>";
    ?>
</body>
</html>
