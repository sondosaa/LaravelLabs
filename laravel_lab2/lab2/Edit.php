<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>

*{
    padding: 0%;
    margin: 0%;
    box-sizing: border-box;
}

label,input{
    padding: 0.2rem;
    margin: 1rem;
}
h2{
    text-align: center;
    margin: 6rem 0rem;
}
.container{
    background-color: rgb(35, 161, 161);
    width: 40vw;
    
    margin: 3rem auto;
    text-align: center;
    border-radius: 10px;
}
    </style>
</head>

<body>
    <div class="container">
        <form  method="get" action="Edit_validation.php">
            <div >
                <label for="first name" >First name: </label>
                <input type="text" name="firstName"  id="first name">
            <label style="color: red">
                <?php if (isset($_GET["firstName"])) {
    echo "First name required";
} ?>
            </label>
            </div>
            <div >
                <label for="last name" >Last name</label>
                <input type="text" name="lastName"  id="last name">
                <label style="color: red">
                <?php if (isset($_GET["lastName"])) {
    echo "last name required";
} ?>
                </label>
            </div>
            <div >
                <label for="userName" >Username:</label>
                <input type="text" name="userName"  id="userName" placeholder="User name: ">
                <label style="color: red">
                <?php if (isset($_GET["userName"])) {
    echo "User name required";
} ?>
            </div>
            <div >
                <label for="password" >Password:</label>
                <input type="password" name="password" id="password">
                <label style="color: red">
                <?php if (isset($_GET["password"])) {
    echo "Password required";
} ?>
            </div>
            <div >
                <label for="inputAddress" >Address</label>
                <input type="text" name="address"  id="inputAddress" placeholder="Address: ">
            </div>
            <div>
                <label for="inputCity" >City</label>
                <input type="text" name="city" id="inputCity">
            </div>
            <div >
                Gender:
                <input type="radio" name="gender" value="male" id="male">
                <label for="male">Male</label>
                <input type="radio" name="gender" value="female" id="female" style="margin-left:50px;">
                <label for="female">Female</label>
                <label style="color: red">
                <?php if (isset($_GET["gender"])) {
    echo "No gender was provided.";
} ?>
                </label>
            </div>
            <div >
                Skills:
                MySQl
                <input name="skills[]"  type="checkbox" id="MySQL" value="MySQL">
                <label class="form-check-label" for="MySQL"></label>
                PHP
                <input name="skills[]"  type="checkbox" id="php" value="PHP">
                <label  for="php">
                </label>
            </div>
            <div >
                <button type="submit" >Sign in</button>
            </div>
        </form>
    </div>
    <?php
     if (isset($_GET["info"])) {
         try {
             $something = -1;
             $file_in_array = file("form.txt");
             foreach ($file_in_array as $key => $value) {
                 if ($value == $_GET["info"]."".PHP_EOL) {
                     $something = $key;
                 }
             }
         } catch (Exception $e) {
             e->get_message();
         }
         session_start();
         $_SESSION["line"]=$something;
         echo $something;
     }?>
</body>

</html>