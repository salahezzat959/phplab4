<?php
echo "<h3> Registration data </h3>";
echo "<a href='./index.html'> <button> Add new user</button></a>";
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
$sql = "INSERT INTO users (namee, email, gender , mail_statuss) VALUES ('$name', '$email', '$gender', '$check')";
mysqli_query($conn, $sql);



if( isset($_POST['submit'] )){
  $sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

echo "<table border='1'>";
echo "<tr>
<th>ID</th>
<th>Namee</th>
<th>Email</th>
<th>Gender</th>
<th>Mail_status</th>
</tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>". "{$row['id'] }"."</td>
    <td>". "{$row['Namee'] }"."</td> 
    <td>". "{$row['Email']}" ."</td>
    <td>"."{$row['gender']}"."</td> ".
    "<td>"."{$row['mail_statuss'] }"."</td>
    </tr>";
}

echo "</table>";

mysqli_close($conn);
}
?>