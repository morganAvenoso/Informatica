<?php session_start();?>
<html>
   <head>
   <style>
      .error {
         color: #FF0000;
      }
   </style>
   </head>
   <body>
      <?php
         $nameErr = $surErr = $emailErr = $Err = "";
         $name = $surname = $email = "";
         if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST['submit'])){
               if (empty($_POST["name"])) {
                  $nameErr = "*Name is required";
               }else {
                  $name = test_input($_POST["name"]);
                  if (!preg_match("/^[a-zA-Z ]*$/", $name)){
                     $nameErr = "*Invalid name";
                  }
               }
               if (empty($_POST["surname"])) {
                  $surErr = "*Surname is required";
               }else {
                  $surname = test_input($_POST["surname"]);
                  if (!preg_match("/^[a-zA-Z ]*$/", $surname)){
                     $surErr = "*Invalid surname";
                  }
               } 
               if($name=="admin" && $surname=="ad"){
                  $_SESSION['id'] ="pluto";
                  header("location: riservata.php");
               }else{
                  $Err="Credenziali errate";
				  $_SESSION['id']="errore";
               }
            }  
         }
      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      ?>
      <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <?php
    if($_SESSION['id']=="errore"){
        unset($_SESSION['id']);
        ?>
        <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <table>
                <tr>
                <td>
                    <span class = "error">Sei stato reindirizzato al login</span>
                </td>
                </tr>
                <tr>
                <td>Name:</td>
                <td><input type = "text" name = "name" placeholder="Name" value="<?=$name?>">
                    <span class = "error"><?=$nameErr;?></span>
                </td>
                </tr>
                <tr>
                <td>Surname:</td>
                <td><input type = "text" name = "surname" placeholder="Surname" value="<?=$surname?>">
                    <span class = "error"><?php echo $surErr;?></span>
                </td>
                </tr>
                <tr>
                </tr>
                <tr>
                <td><input type="submit" name="submit" value="Login">
                    <span class = "error"><?php echo $Err;?></span>
                </td>
                </tr>
            </table>
        </form>
    <?php
    }else{?>
        <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <table>
                <tr>
                <td>Name:</td>
                <td><input type = "text" name = "name" placeholder="Name" value="<?=$name?>">
                    <span class = "error"><?=$nameErr;?></span>
                </td>
                </tr>
                <tr>
                <td>Surname:</td>
                <td><input type = "text" name = "surname" placeholder="Surname" value="<?=$surname?>">
                    <span class = "error"><?php echo $surErr;?></span>
                </td>
                </tr>
                <tr>
                <tr>
                <td><input type="submit" name="submit" value="Login">
                    <span class = "error"><?php echo $Err;?></span>
                </td>
                </tr>
            </table>
        </form>
    <?php
    }
        echo "<h2>Input</h2><br>";
        echo "Name == admin";
        echo "<br>";
        
        echo "Surname == ad";
        echo "<br>";
         
        echo "Email == admin@gmail.com";
        echo "<br>";
    ?>
   </body>
</html>
