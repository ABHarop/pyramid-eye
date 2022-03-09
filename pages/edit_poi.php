<?php include('header.php');?>
<body class="w3-black">
  <?php include('menu.php');?>
  <?php 
    include('dbcon.php');
    extract($_POST);
    if(isset($save)){   
      $poiId = $_POST['poiId'];
      $catId = $_POST['catId'];
      
      $pic = $_FILES["image"]["name"];
      if ($pic==""){	
        if ($_POST['image1']<>""){
          $pic=$_POST['image1'];
        }
        else
          $pic="default.gif";
      }
      else{
        $pic = $_FILES["image"]["name"];
        $type = $_FILES["image"]["type"];
        $size = $_FILES["image"]["size"];
        $temp = $_FILES["image"]["tmp_name"];
        $error = $_FILES["image"]["error"];
      
        if ($error > 0){
          die("Error uploading file! Code $error.");
          }
        else{
          //conditions for the file
          if($size > 100000000000){
            die("Format is not allowed or file size is too big!");
          }
          else{
            move_uploaded_file($temp, "../image/".$pic);
          }
        }
      
      }
      $schedule = date("Y-m-d H:i:s");
      $activity="updated POI information";
      $query=mysqli_query($con,"SELECT pass FROM employeetb WHERE employeeId='$employeeId' ")or die(mysqli_error($con));
      $row=mysqli_fetch_array($query);

      $pass = $row['pass'];
      if(password_verify($_POST["passwordold"], $pass)){
        mysqli_query($con,"UPDATE poitb SET photo='$pic', poi_name='$poi_name',gender='$gender',address='$address', nickname='$nickname', occupation='$occupation',bio='$bio' WHERE poiId=' ".$_GET['poiId']."' ");
        mysqli_query($con,"INSERT INTO historytb (employeeId,activity,schedule) VALUES('$employeeId','$activity','$schedule')")or die(mysqli_error($con));
        $err="<font color='white'>POI Detail Updated</font>";
        mysqli_query($con,"INSERT INTO relationtb1 (`catId`,`poiId`) VALUES ('$catId','$poiId') ");

      }
      else{
        $err="<font color='white'>Password Incorrect</font>";
      }
    }

    $poi=mysqli_query($con,"SELECT * FROM poitb WHERE poiId='".$_GET['poiId']."' ");
    $res=mysqli_fetch_assoc($poi);
  ?>

  <!-- Page Content -->
  <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
    <center>
      <h2 class="w3-text-light-grey" style="margin-top:-23%">Modify POI details</h2>
      <hr style="width:200px;margin-bottom:0%" class="w3-opacity">
    </center>

    <div class="w3-section"></div>
    <br>
    <center>
      <form method="POST" enctype="multipart/form-data" >
        <div class="container-register"><br />
          <center>
            <div style="padding-top:0%; font-size:18px"><?php echo @$err;?></div>
          </center>
          <hr>
          <input  name="employeeId" value="<?php echo $res['employeeId'];?>" hidden required>
          <a target="_blank" href="../image/<?php echo $res['photo'];?>">
          <img class="fill-date" style="background-color:black;height:200px" alt="Profile Picture" src="../image/<?php echo $res['photo'];?>">
          <input type="hidden" class="label-pay" name="image1" value="<?php echo $res['photo'];?>"> </a>
          <br />
          <input class="fill-in" placeholder="Full Name" name="poi_name" value="<?php echo $res['poi_name'];?>" required>
          <input class="fill-in" placeholder="No nickname" name="nickname" value="<?php echo $res['nickname'];?>">
          <br />
          <input class="fill-in" placeholder="No address data" name="address" value="<?php echo $res['address'];?>">
          <input class="fill-in" placeholder="No occupation data" name="occupation" value="<?php echo $res['occupation'];?>" >
          <br />
          <select name="gender" class="fill-in">
            <option value="<?php echo $res['gender'];?>"><?php echo $res['gender'];?></option>
            <?php 
              $q1=mysqli_query($con,"SELECT * FROM gendertb ");
              while($r1=mysqli_fetch_assoc($q1)){
                echo "<option value='".$r1['genderId']."'>".$r1['gender']."</option>";
              }
            ?>
          </select>
          <input type="file" class="fill-in" name="image"><br />
          <textarea class="fill-in bio" name="bio" placeholder="Enter brief info about the person" ><?php echo $res['bio'];?></textarea>
          <br/>
          <input name="poiId" value="<?php echo $res['poiId'];?>" hidden required>      
          <select name="catId" class="fill-in">
            <option value="">New Category</option>
            <?php 
              $q2=mysqli_query($con,"SELECT * FROM cattb ORDER BY category ASC");
              while($r2=mysqli_fetch_assoc($q2)){
                echo "<option value='".$r2['catId']."'>".$r2['category']."</option>";
              }
            ?>
          </select>
          <input class="fill-in" type="password" name="passwordold" placeholder="Enter your password" required>
          <br />
          <button type="submit" name="save" class="registerbtn fill-in" style="background-color:maroon">Save</button>
          <button class="registerbtn fill-in" style="background-color:#f44336" type="button" onClick="location.href='poi_details'"  >Back</button>
          <hr>
        </div>
      </form>
    </center>
  </div>
  <?php include 'footer.php'; ?>
  <!-- END PAGE CONTENT -->
</body>
</html>
