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
$companyID = $_POST['companyID'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$rating = $_POST['rating'];
$sql = "INSERT INTO product (name,companyID,price,stock,sales,rating,DID) values ('$name', '$companyID', '$price', '$stock', 0, '$rating', 1);";
$result = $conn->query($sql);

if ($result === TRUE) {
    echo "<script type='text/javascript'>alert('Insert Success');</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>


<?php
$conn->close();
?>

</body>
</html>
