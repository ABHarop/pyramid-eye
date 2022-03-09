<?php include('header.php');?>
<body class="w3-black">
  <?php include('menu.php');?>
  <?php
    include('dbcon.php');
    $poi=mysqli_query($con,"SELECT * FROM poitb WHERE poiId='".$_GET['poiId']."' ");
    $res=mysqli_fetch_assoc($poi);
  ?>

  <!-- Page Content -->
  <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
    <center>
      <h2 class="w3-text-light-grey" style="margin-top:-23%;text-align:centre">POI details</h2>
      <hr style="width:200px;margin-bottom:0%" class="w3-opacity">
    </center>
    <div class="w3-section"></div><br>
    <center>
      <form method="POST" enctype="multipart/form-data" >
        <div class="container-register" style="margin-top:0%"><br/>
          <hr>
          <a target="_blank" href="../image/<?php echo $res['photo'];?>">
          <img class="fill-date" style="height:200px;margin-top:16px;background-color:#001a00;border: 0.2px solid rgb(43, 40, 36);" alt="Profile Picture" src="../image/<?php echo $res['photo'];?>">
          <input type="hidden" class="poidetail" style="margin-top:2%" value="<?php echo $res['photo'];?>"> </a> <br />
          <input class="label-pay poidetail" value="<?php echo $res['poi_name'];?>" readonly required>
          <input class="poidetail" placeholder="No nickname..." value="<?php echo $res['nickname'];?>" readonly><br />
          <input class="poidetail" placeholder="No address data..." value="<?php echo $res['address'];?>" readonly>
          <input class="poidetail" placeholder="No occupation data..." value="<?php echo $res['occupation'];?>" readonly required><br />
          <input class="poidetail" value="<?php echo $res['gender'];?>" readonly>
          <input class="poidetail" value="<?php echo $res['employeeId'];?>" readonly><br/>
          <textarea class="fill-in bio"  style="color:white;border: 0.2px solid rgb(43, 40, 36);background-color:#001a00;height:200px" placeholder="No bio data..." readonly ><?php echo $res['bio'];?></textarea><br/>
          <br />
          <button type="button" class="registerbtn fill-in" style="background-color:#f44336" onClick="location.href='home'"  >Back</button>

          <hr>
        </div>
      </form>
    </center>
    <!-- End Contact Section -->
  </div>

  <?php include 'footer.php'; ?>
  <!-- END PAGE CONTENT -->
  <script>
    var field = document.querySelector('#regdate');
    var date = new Date();
    //set date
    field.value = date.getFullYear().toString() + '-' + (date.getMonth() + 1).toString().padStart(2, 0) + '-' + date.getDate().toString().padStart(2, 0);
  </script>
</body>
</html>
