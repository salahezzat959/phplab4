
<html>
  <head>
    <style>
        .button {
            padding: 8px;
            background-color: green;
            color: white;
            font-size:15px;
            list-style-type: none;
            margin-left:200px;
            margin-bottom:20px;
        }
    </style>
    </head>
    </html>
<?php
echo "<h3> Registration data </h3>";
echo "<a   href='./index.html'> <button class ='button'> Add new user</button></a>";
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$check = $_POST['check'];

$conn = mysqli_connect("localhost", "root", "", "regist");
if(! $conn ) {
    die('Could not connect: ' . mysqli_error($conn));
 }

//  $sql="CREATE TABLE users ( id INT NOT NULL AUTO_INCREMENT,
//    namee VARCHAR(20) NOT NULL,
//    email  VARCHAR(20) NOT NULL,
//    gender  VARCHAR(20) NOT NULL,
//    mail_statuss  Boolean NOT NULL,
//    primary key ( id ))";
// mysqli_query($conn ,$sql);
$sql = "INSERT INTO users (Namee, Email, gender , mail_statuss) VALUES ('$name', '$email', '$gender', '$check')";
$retval=mysqli_query($conn, $sql);

  
?>
<table border="1">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Gender</th>
      <th>mail_statuss</th>
    </tr>
  </thead>

<tbody>
  <?php
  $sql1 = "SELECT id ,Namee , Email , gender, mail_statuss FROM users";
$result = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result) > 0){
  foreach($result as $row) {
    ?>
    <tr>
      <td> <?=$row['id']?></td>
      <td> <?=$row['Namee']?></td>
      <td> <?=$row['Email']?></td>
      <td> <?=$row['gender']?></td>
      <td> <?=$row['mail_statuss']?></td>
    </tr>
    
    <?php
  }
  ?>
</tbody>
</table>
<?php
}
else {
  echo "0 results";
}
mysqli_close($conn);
?>