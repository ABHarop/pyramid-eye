<?php include('header.php');?>
<body class="w3-black">
  <?php include('menu.php');?>
  <?php 
    include('dbcon.php');
    extract($_POST);
    if(isset($save)){ 
      $category = $_POST['category'];
      $query2=mysqli_query($con,"SELECT * FROM cattb WHERE category='$category' ")or die(mysqli_error($con));
      $count=mysqli_num_rows($query2);
      if($count>0){
        $err="<font color='white'>Category Already Exists</font>";
      }
      else{
        mysqli_query($con,"UPDATE cattb SET category='$category' WHERE catId=' ".$_GET['catId']."' ");
        // mysqli_query($con,"INSERT INTO admin_log(adminId,activity,schedule) VALUES('$adminId','$activity','$schedule')")or die(mysqli_error($con));
        $err="<font color='white'>Category Updated</font>";
      }
    }
    $cat=mysqli_query($con,"SELECT * FROM cattb WHERE catId='".$_GET['catId']."' ");
    $res=mysqli_fetch_assoc($cat);
  ?>

  <!-- Page Content -->
  <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
    <center>
      <h2 class="w3-text-light-grey" style="margin-top:-23%">Modify Category details</h2>
      <hr style="width:200px;margin-bottom:0%" class="w3-opacity">
    </center>

    <div class="w3-section"></div><br>
    <center>
      <form method="POST" enctype="multipart/form-data" >
        <div class="container-register"><br />
          <center>
            <div style="padding-top:0%; font-size:18px"><?php echo @$err;?></div>
          </center>
          <hr>
          <textarea class="fill-in bio" name="category" required ><?php echo $res['category'];?></textarea><br/>
          <br />
          <button type="submit" name="save" class="registerbtn fill-in" style="background-color:maroon">Save</button>
          <button class="registerbtn fill-in" style="background-color:#f44336" type="button" onClick="location.href='category'"  >Back</button>

          <hr>
        </div>
      </form>
    </center>
  </div>
  <?php include 'footer.php'; ?>
  <!-- END PAGE CONTENT -->
  </div>
</body>
</html>
