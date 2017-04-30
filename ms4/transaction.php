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
$sql = "SELECT * FROM transaction";

$result = $conn->query($sql);

if($result->num_rows > 0){

?>
   <table class="table table-striped">
      <tr>
         <th>ID</th>
         <th>Customer ID</th>
         <th>Product ID</th>
         <th>Rating</th>
 	 <th>Date</th>
      </tr>

<?php
while($row = $result->fetch_assoc()){
?>
      <tr>
          <td><?php echo $row['id']?></td>
          <td><?php echo $row['cusID']?></td>
          <td><?php echo $row['proID']?></td>
          <td><?php echo $row['rating']?></td>
          <td><?php echo $row['date']?></td>
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

