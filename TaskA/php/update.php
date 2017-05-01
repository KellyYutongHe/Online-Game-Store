<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Project 1 Milestone 3 - Online Video Game Store</title>
<link href="../styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="mainContainer">
  <div class="header">
      <div class="logo">
          VIDEO <span>GAMES</span><br />
            <div class="author"></div>
        </div>
        <div class="search">
       

        <form action="../search/lookup.php" method="post">
          <div class="searchIcon"><img src="../images/searchIcon.png" alt="" /></div>
            SEARCH:<input type="text" name="name"/>
            <div class="searchButton">
            <input type="submit"></input>
            </div>
            <!-- <div class="searchButton"><a href=""><img src="images/searchButton.png" alt="" /></a></div> -->
        </form>
        </div>
    </div>
      
    <div class="menu">
      <ul>
          <li class="active"><a href="../index.html">HOME</a></li>
            <li><a href="../PlayStation/ps.php">PlayStation</a></li>
            <li><a href="../XBOX/xbox.php">XBOX</a></li>
            <li><a href="../NINTENDO/nintendo.php">NINTENDO</a></li>
            <li><a href="../accessories/accessories.php">ACCESSORIES</a></li>
            <li><a href="../management/management.php">Product Management</a></li>
        </ul>
    </div>

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
$id = $_POST['id'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$sql = "UPDATE product SET price = '$price', stock = '$stock' WHERE id = '$id';";
$result = $conn->query($sql);

if ($result === TRUE) {
    echo "<script type='text/javascript'>alert('Product Updated');</script>";
} else {
	
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>


<?php
$conn->close();
?>

</body>
</html>
