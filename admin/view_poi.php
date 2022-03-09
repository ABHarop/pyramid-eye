<?php include('session.php'); ?>
<!DOCTYPE html>
<html>
  <title><?php include('../pages/title.php'); ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/w3.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
    .w3-row-padding img {margin-bottom: 12px}
    /* Set the width of the sidebar to 120px */
    .w3-sidebar {width: 120px;background: #222;}
    /* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
    #main {margin-left: 120px}
    /* Remove margins from "page content" on small screens */
    @media only screen and (max-width: 600px) {#main {margin-left: 0px}}
  </style>
  <body class="w3-black bottom-text" style="background-image: url('css/employee.jpg');background-repeat: no-repeat;background-position: center;">
    <?php include('dbcon.php');
      $poi=mysqli_query($con,"SELECT * FROM poitb WHERE poiId='".$_GET['poiId']."' ");
      $res=mysqli_fetch_assoc($poi);
    ?>

    <!-- Page Content -->
    <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
      <center>
        <h2 class="w3-text-light-grey" style="margin-top:-4%;text-align:centre">POI Info</h2>
      </center>
        <div class="w3-section"></div>
        <br>
      <center>
        <form method="POST" enctype="multipart/form-data" >
          <div class="container-register" style="margin-top:0%"><br/>
            <hr>
            <a target="_blank" href="../image/<?php echo $res['photo'];?>">
            <img class="fill-date" style="height:200px;margin-top:16px;background-color:#001a00;border: 0.2px solid rgb(43, 40, 36);" alt="Profile Picture" src="../image/<?php echo $res['photo'];?>">
            <input type="hidden" class="poidetail" style="margin-top:2%" value="<?php echo $res['photo'];?>"></a>
            <br />
            <input class="label-pay poidetail" value="<?php echo $res['poi_name'];?>" readonly required>
            <input class="poidetail" placeholder="No nickname..." value="<?php echo $res['nickname'];?>" readonly>
            <br />
            <input class="poidetail" placeholder="No address data..." value="<?php echo $res['address'];?>" readonly>
            <input class="poidetail" placeholder="No occupation data..." value="<?php echo $res['occupation'];?>" readonly required>
            <br />
            <input class="poidetail" value="<?php echo $res['gender'];?>" readonly>
            <input class="poidetail" value="<?php echo $res['employeeId'];?>" readonly>
            <br/>
            <textarea class="fill-in bio"  style="color:white;border: 0.2px solid rgb(43, 40, 36);background-color:#001a00;height:200px" placeholder="No bio data..." readonly ><?php echo $res['bio'];?></textarea>
            <br/>
            <br />
            <button type="button" class="registerbtn fill-in" style="background-color:#f44336" onClick="location.href='poi'" >Back</button>
            <hr>
          </div>

        </form>
      </center>
      <!-- End Contact Section -->
      <!-- END PAGE CONTENT -->
    </div>
  </body>
</html>
