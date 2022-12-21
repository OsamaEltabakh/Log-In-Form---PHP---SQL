<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.min.css">
    

</head>
<body>
    
    <h1> User Details</h1>
    
    <a  href='http://localhost/lab%204/Reg_form.php'>
        <button > Add New User </button>   
    </a> 
        <?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname ='users';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    if(! $conn ) {
    die('Could not connect: ' . mysqli_error($conn));
    }

    

    $sql = 'SELECT U_id , Name, Email , Gender , Mail_status FROM users';
   mysqli_select_db($conn,$dbname);
   $result = mysqli_query($conn,$sql );

   if(! $result ) {
    die('Could not get data: ' . mysqli_error($conn));
 }

 echo "<table border>

  <th>U_id</th>

 <th>Name</th>
 
 <th>Email</th>
 
 <th>Gender</th>

 <th>Mail status</th>
 
 </tr>"; 
 if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";

    echo "<td>" . $row['U_id'] ."</td>" ;
    echo "<td>" . $row['Name']  ."</td>" ;
    echo "<td>" . $row['Email']  ."</td>" ;
    echo "<td>" . $row['Gender']  ."</td>" ;
    echo "<td>" . $row['Mail_status']  ."</td>" ;

    echo "</tr>";
 }

} else {
    echo "0 results";
  }
 
 
 mysqli_close($conn);




    ?>
    
</body>
</html>