<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Login Form</h2>
    <div class="con">
    <form  method="get" action="validation.php">
            <div>
                <label for="first name" >First name: </label>
                <input type="text" name="firstName"  id="first name">
            <label style="color: red">
                <?php if (isset($_GET["firstName"])) {
    echo "First name required";
} ?>
            </label>
            </div>
            <div>
                <label for="last name" class="form-label">Last name</label>
                <input type="text" name="lastName"  id="last name">
                <label style="color: red">
                <?php if (isset($_GET["lastName"])) {
    echo "last name required";
} ?>
                </label>
            </div>
            <div>
                <label for="userName" >Username:</label>
                <input type="text" name="userName"  id="userName" placeholder="User name: ">
                <label style="color: red">
                <?php if (isset($_GET["userName"])) {
    echo "User name required";
} ?>
            </div>
            <div class="col-md-6">
                <label for="password" >Password:</label>
                <input type="password" name="password"  id="password">
                <label style="color: red">
                <?php if (isset($_GET["password"])) {
    echo "Password required";
} ?>
            </div>
            <div>
                <label for="inputAddress" >Address</label>
                <input type="text" name="address"  id="inputAddress" placeholder="Address: ">
            </div>
            <div class="col-md-6">
                <label for="inputCity" >City</label>
                <input type="text" name="city"  id="inputCity">
            </div>
            <div class="col-md-6">
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
            <div>
                Skills:
                MySQl
                <input name="skills[]"  type="checkbox" id="MySQL" value="MySQL">
                <label  for="MySQL"></label>
                PHP
                <input name="skills[]" type="checkbox" id="php" value="PHP">
                <label  for="php">
                </label>
            </div>
            <div>
                <button type="submit" >Sign in</button>
            </div>
        </form>
    </div>


</body>
</html>