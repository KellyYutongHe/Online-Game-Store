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
       

        <form action="../php/lookup.php" method="post">
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
            <li><a href="../management/start.html">Product Management</a></li>
        </ul>
    </div>

    <?php
require_once('../db/db_setup.php');
$sql = "USE yhe29;";
if ($conn->query($sql) === TRUE) {
   // echo "using Database yhe29";
} else {
   echo "Error using  database: " . $conn->error;
}
// Query:
$id = $_POST['id'];
$sql = "select 'Game' as type,id,name,platform,year,genre, 'None' as color, 'None' as memory from game where game.platform like 'X%' union select 'Console' as type,id,name,platform, 'None' as year, 'None' as genre, color, memory from console where console.platform = 'XBOX'";
$result = $conn->query($sql);

if($result->num_rows > 0){

?>
<div style="height:500px ;width:100%; border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto; background-color:rgba(255, 255, 255, 0.8);">
   <table class="table table-striped">
      <tr>
   <th>Type</th>
         <th>ID</th>
         <th>Name</th>
         <th>Platform</th>
         <th>Year</th>
   <th>Genre</th>
   <th>Color</th>
         <th>Memory</th>
      </tr>

<?php
while($row = $result->fetch_assoc()){
?>
      <tr>
    <td><?php echo $row['type']?></td>
          <td><?php echo $row['id']?></td>
          <td><?php echo $row['name']?></td>
          <td><?php echo $row['platform']?></td>
          <td><?php echo $row['year']?></td>
          <td><?php echo $row['genre']?></td>
          <td><?php echo $row['color']?></td>
          <td><?php echo $row['memory']?></td>
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
</div><!-- display list ends here -->







</div>
<div class="footer">
  <div class="footerContainer">
      <div class="icons">
          <ul>
              <li><a href=""><img src="../images/facebookIcon.png" alt="" /></a></li>
                <li><a href=""><img src="../images/twitterIcon.png" alt="" /></a></li>
            </ul>
        </div>
        
    </div>
</div>

</body>
</html>
