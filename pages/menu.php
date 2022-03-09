<?php session_start();
if(empty($_SESSION['employeeId'])):
header('Location:../');
endif;

include('../database/dbcon.php');

$stmt1 = $con->prepare('SELECT photo, employee_name FROM employeetb WHERE employeeId = ?');
// In this case we can use the account ID to get the account info.
$stmt1->bind_param('i', $_SESSION['employeeId']);
$stmt1->execute();
$stmt1->bind_result($photo,$employee_name);
$stmt1->fetch();
$stmt1->close();

?>


<!DOCTYPE html>
<html>
<title><?php include('title'); ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body, h1,h2,h3,h4,h5,h6 {font-family:Arial, Helvetica, sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>
<body class="w3-black" style="background-color:#000033">

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  <img src="../image/<?=$photo?>" style="width:100%;height:20%">
  <textarea class="w3-bar-item bio" style="color:#00FFCC;background-color:black;margin-top:12px;margin-bottom:16px;border: 0px solid #ccc;font-size:16px;font-weight: lighter;text-align:center;word-wrap: break-word;" readonly><?=$employee_name?></textarea>
  <a href="home" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>
  <a href="new_poi" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-user w3-xxlarge"></i>
    <p>NEW POI</p>
  </a>
  <a href="poi_details" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-user w3-xxlarge"></i>
    <p>ALL POI</p>
  </a>
  <a href="category" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>CATEGORY</p>
  </a>
  <a href="new_employee" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>NEW STAFF</p>
  </a>
  <a href="logout" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>LOGOUT</p>
  </a>
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="home" class="w3-bar-item w3-button" style="width:20% !important">HOME</a>
    <a href="new_poi" class="w3-bar-item w3-button" style="width:20% !important">NEW POI</a>
    <a href="poi_details" class="w3-bar-item w3-button" style="width:20% !important">ALL POI</a>
    <a href="category" class="w3-bar-item w3-button" style="width:20% !important">CATEGORY</a>
    <a href="new_employee" class="w3-bar-item w3-button" style="width:20% !important">STAFF</a>
    <a href="logout" class="w3-bar-item w3-button" style="width:20% !important">LOGOUT</a></a>
  </div>
</div>

<!-- Page Content -->
<div class="w3-padding-medium" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-24 w3-center w3-black" id="home" style="background-color:#000033">
    <h1 class="w3-jumbo"><span class="w3-hide-small">Pyramid</span> Eye</h1>
  </header>


  </div>
  
    <!-- Footer -->
  <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">

  </footer>

<!-- END PAGE CONTENT -->
</div>

</body>
</html>
