<!DOCTYPE html>
<html>
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<?php
require_once('db_setup.php');
$sql = "USE yhe29;";
if ($conn->query($sql) === TRUE) {
   // echo "using Database yhe29";
} else {
   echo "Error using  database: " . $conn->error;
}
// Query:
$id = $_POST['id'];
$sql = "SELECT * FROM customer";

$result = $conn->query($sql);

if($result->num_rows > 0){

?>
   <table class="table table-striped">
      <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Phone</th>
         <th>Email</th>
 	 <th>Points</th>
         <th>Username</th>
         <th>Hashed Password</th>
         <th>Privilege Level</th>
      </tr>

<?php
while($row = $result->fetch_assoc()){
?>
      <tr>
          <td><?php echo $row['id']?></td>
          <td><?php echo $row['name']?></td>
          <td><?php echo $row['phone']?></td>
          <td><?php echo $row['email']?></td>
          <td><?php echo $row['points']?></td>
          <td><?php echo $row['username']?></td>
          <td><?php echo $row['hpasswd']?></td>
          <td><?php echo $row['privilege']?></td>
      </tr>

<?php
}
}
else {
        echo "User not found";
}
?>

    </table>

<?php
$conn->close();
?>

</body>
</html>

