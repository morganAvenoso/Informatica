<html>
   
   <head>
      <link rel="stylesheet" type="text/css" href="es_03_validation/style.css">
   </head>
   
   <body>
      <?php
         // define variables and set to empty values
         $nameErr = $surErr = $emailErr = $genderErr = $dateErr = $phoneErr = $addErr = $proErr = $cityErr = $nickErr = $pswErr = "";
         $name = $surname = $email = $gender = $date = $phone = $add = $houseNumber = $CAP = $province = $city = $nickname = $password = "";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
            if (empty($_POST["email"])) {
               $emailErr = "*Email is required";
            }else {
               $email = test_input($_POST["email"]);
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "*Invalid email format"; 
               }
            }
            if (empty($_POST["date"])) {
               $dateErr = "*Date is required";
            }
            else
            {
               $date = test_input($_POST["date"]);
            }
            if(!empty($_POST["phone"])){
               $phone = test_input($_POST["phone"]);
               if($phone<1000000000 || $phone>999999999){
                  $phoneErr = "*Number must have 10 digits and spaces";
               }
            }
            if(empty($_POST["address"]) || empty($_POST["houseNumber"]) || empty($_POST["CAP"])){
               $addErr = "*Field required";
            }else{
               $add = test_input($_POST["address"]);
               $houseNumber = test_input($_POST["houseNumber"]);
               $CAP = test_input($_POST["CAP"]);
               if(!preg_match("/^[a-zA-Z\s]*$/", $add) ){
                  $addErr = "*Invalid address ";
               }elseif(!preg_match("/^[0-9]*$/", $houseNumber)){
                  $addErr = "*Invlid House number";
               }elseif(!preg_match("/^[0-9]*$/", $CAP || $CAP<9999 || $CAP>100000)){
                  $addErr = "*Invalid CAP";
               }
            }   
            if(empty($_POST["province"])){
               $proErr = "*Province is required";
            }
            else{
               $province = test_input($_POST["province"]);
               if(!preg_match("/^[a-zA-Z]*$/", $province)){
                  $proErr = "*Invalid input";
               }
            }
            if(empty($_POST["residence"])){
               $cityErr = "*The residence is required";
            }else{
               $city = test_input($_POST["residence"]);
               if(!preg_match("/^[a-zA-Z]*$/", $city)){
                  $cityErr = "*The residence is invalid";
               }
            }
            if(empty($_POST["nickname"])){
               $nickErr = "*Nickname is required";
            }else{
               $nickname = test_input($_POST["nickname"]);
               if($nickname == $surname || $nickname == $name){
                  $nickErr = "*Nickname cannot be the name o the surname";
               }
            }
            if(empty($_POST["psw"])){
               $pswErr = "*Password required";
            }else{
               $password = test_input($_POST["psw"]);
               if(!preg_match("/^(?=.*\d)(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])[0-9a-zA-Z[:punct:]]{8,20}$/", $password)){
                  $pswErr = "*Invalid password";
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
     
      <h2>LOGIN</h2>
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
               <td>E-mail: </td>
               <td><input type = "text" name = "email" placeholder="Email" value="<?=$email?>">
                  <span class = "error"><?php echo $emailErr;?></span>
               </td>
            </tr>
            <tr>
               <td>Birth day:</td>
               <td><input type = "date" name = "date" style="width: 170px;" value="<?=$date?>">
                  <span class = "error"><?php echo $dateErr;?></span>
               </td>
            </tr>
            <tr>
               <td>Phone</td>
               <td><input type = "phone" name = "phone" placeholder="Phone number" value="<?=$phone?>">
                  <span class = "error"><?php echo $phoneErr;?></span>
               </td>
            </tr>
            <tr>
               <td>Address:</td>
               <td>
                  <input type = "text" name = "address" placeholder = "Address" value="<?=$add?>"><input type= "text" name = "houseNumber" placeholder="Number" style="width: 57px;" value="<?=$houseNumber?>"><input type= "text" name = "CAP" placeholder="CAP" style="width: 45px;" value="<?=$CAP?>">
                  <span class = "error"><?php echo $addErr?></span>
               </td>
            </tr>
				<tr>
               <td>Province</td>
               <td><input type = "text" name = "province" placeholder="Province" value="<?=$province?>">
                  <span class = "error"><?php echo $proErr?></</span>
               </td>
            </tr>
            <tr>
               <td>City of residence</td>
               <td><input type = "text" name = "residence" placeholder="City" value="<?=$city?>">
                  <span class = "error"><?php echo $cityErr?></</span>
               </td>
               </tr>
            <td>
            <tr>
               <td>Nickname</td>
               <td><input type = "text" name = "nickname" placeholder="Username" value="<?=$nickname?>">
                  <span class = "error"><?php echo $nickErr?></</span>
               </td>
               </tr>
            <td>
            <tr>
               <td>Password</td>
               <td><input type = "text" name = "psw" placeholder="password" value="<?=$password?>">
                  <span class = "error"><?php echo $pswErr?></</span>
               </td>
               </tr>
            <td>
               <input type = "submit" name = "submit" value = "Submit"> 
            </td>
         </table>
      </form>
      
      <?php
         echo "<h2>Input</h2>";
         echo $name;
         echo "<br>";
        
         echo $surname;
         echo "<br>";
         
         echo $email;
         echo "<br>";
         
         echo $date;
         echo "<br>";

         echo $phone;
         echo "<br>";

         echo "$add $houseNumber $CAP";
         echo "<br>";

         echo $province;
         echo "<br>";

         echo $city;
         echo "<br>";

         echo $nickname;
         echo "<br>";

         echo $password;
         echo "<br>";
      ?>
   
   </body>
</html>
