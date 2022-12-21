<?php
$name = $email = $gender = $checkbox = "";
if ($_SERVER['REQUEST_METHOD']=="POST") {
    if (isset ($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $checkbox = $_POST['checkbox'];


    }
}
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname ='users';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    if(! $conn ) {
    die('Could not connect: ' . mysqli_error($conn));
    }

    

    $sql = " INSERT INTO users(Name,Email,Gender,mail_status)
    VALUES ( '$name', '$email', '$gender' , '$checkbox' )" ;

    mysqli_query($conn,$sql);

    $result = mysqli_query($conn,$sql );
    
    if(! $result ) {
       die('Could not get data: ' . mysqli_error($conn));
    }
    

mysqli_close($conn);
?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
</head>

<body>
    <h1>User Registration Form </h1>
    <p> please fill this form to add user record </p>
    <form action="<?php $_PHP_SELF ?>" method="post">
        <div>
        <label >Name:</label>
        <input type="text"  name="name" id="name">
        </div>

        <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" >
        </div>
        <br>
        <div>
            <label for="gender">Gender:</label >
            <br>
            <input type="radio" name="gender" value="female">Female
            <br>
			<input type="radio" name="gender" value="male">Male
        </div>
        <br>
        <div>
            <input type="checkbox" name="checkbox">
            <label for="checkbox"> Receive E-mails from us </label>
            
        </div>

        <div>
        <input type="submit" name="submit">
        <button type="button" class="btn btn-primary" onclick="window.history.back();">Cancel</button>

        </div>
    </form>
</body>
</html>


