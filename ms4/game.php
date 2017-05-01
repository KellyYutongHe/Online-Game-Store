<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Project 1 Milestone 3 - Online Video Game Store</title>
    <link href="../TaskA/styles.css" rel="stylesheet" type="text/css" />
    <!-- Form ref here -->
    <!-- <script src="../form_src/scriptaculous/lib/prototype.js" type="text/javascript"></script>
    <script src="../form_src/scriptaculous/src/effects.js" type="text/javascript"></script>
    <script type="text/javascript" src="validation.js"></script> -->
    <!-- <link title="style1" rel="stylesheet" href="../form_src/style.css" type="text/css" /> --></head>
<body>

<script>
  alert('message');
</script>

<div class="mainContainer">
    <div class="header">
        <div class="logo">
            VIDEO <span>GAMES</span><br />
            <div class="author"></div>
        </div> <!-- End of logo -->

        <div class="search">
            <div class="searchIcon"><img src="../images/searchIcon.png" alt="" /></div>SEARCH:<input name="" type="text" />
            <div class="searchButton"><a href=""><img src="../images/searchButton.png" alt="" /></a></div>
        </div>

    </div> <!-- End of header -->

    <div class="userId">
        <a href="../signup/start.html">Sign Up    </a>
        <a href="../checkout/start.html">Checkout    </a>
        <a href="../cart/start.html">Cart</a>
    </div> <!-- End of userID -->

    <div class="menu">
        <ul>
            <li><a href="../index.html">HOME</a></li>
            <li class="active"><a href="start.html">PlayStation</a></li>
            <li><a href="../XBOX/start.html">XBOX</a></li>
            <li><a href="../NINTENDO/start.html">NINTENDO</a></li>
            <li><a href="../accessories/start.html">ACCESSORIES</a></li>
            <li><a href="../PC/start.html">PC</a></li>
            <li><a href="../rewards/start.html">REWARDS</a></li>           
        </ul>
        <ul>
            <li><a href="../products/start.html">PRODUCT LOOKUP</a></li>
            <li><a href="../support/start.html">SUPPORT</a></li>
            <li><a href="../management/start.html">System Management</a></li>
        </ul>

    </div><!-- End of menu -->

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
$sql = "select 'Game' as type,id,name,platform,year,genre, 'None' as color, 'None' as memory from game where game.platform like '%PS%' union select 'Console' as type,id,name,platform, 'None' as year, 'None' as genre, color, memory from console where console.platform = 'Play Station'";

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
</div> <!-- End of footer -->


</div>  <!-- End of main container -->



<script type="text/javascript">
//<![CDATA[
<!--
// Alternative Style: Working With Alternate Style Sheets
// http://www.alistapart.com/articles/alternate/
function setActiveStyleSheet(title) {
    var i, a, main;
    for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
        if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title")) {
        a.disabled = true;
        }   
        if(a.getAttribute("title") == title) {
            a.disabled = false;
        }
    }
}
</script>

</body>
</html>