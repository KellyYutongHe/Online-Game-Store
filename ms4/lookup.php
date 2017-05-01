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
  //echo "using Database yhe29_User";
} else {
   echo "Error using  database: " . $conn->error;
}
// Query:
$id = $_POST['id'];
$sql = "USE yhe29;";
if ($conn->query($sql) === TRUE) {
  //echo "using Database yhe29_User";
} else {
   echo "Error using  database: " . $conn->error;
}
// Query:
$name = $_POST['name'];
$sql = "SELECT * FROM product WHERE name LIKE '%$name%';";
$result = $conn->query($sql);
if($result->num_rows > 0){

?>
<table class="table table-striped">
   <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Company</th>
      <th>Price</th>
      <th>Stock</th>
      <th>Sales</th>
      <th>Rating</th>
      <th>Department ID</th>
   </tr>

<?php
while($row = $result->fetch_assoc()){
?>
   <tr>
       <td><?php echo $row['id']?></td>
       <td><?php echo $row['name']?></td>
       <td><?php echo $row['companyID']?></td>
       <td><?php echo $row['price']?></td>
       <td><?php echo $row['stock']?></td>
       <td><?php echo $row['sales']?></td>
       <td><?php echo $row['rating']?></td>
       <td><?php echo $row['DID']?></td>
   </tr>

<?php
}
}
else {
        echo ":( Sorry we don't have what you are looking for in our store.";
      }
      ?>

          </table>


<?php
$conn->close();
?>

</body>
</html>
