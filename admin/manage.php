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
  <body class="w3-black" style="margin-top:15%">
    <?php include('../database/dbcon.php');
      extract($_POST);
      if(isset($save)){   
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
        $query2=mysqli_query($con,"SELECT username FROM employeetb WHERE username='$username' ")or die(mysqli_error($con));
        $count=mysqli_num_rows($query2);
        if($count<>0){
          mysqli_query($con,"UPDATE employeetb SET photo='$pic', employee_name='$employee_name',photo='$pic',phone='$phone', gender='$gender', address='$address',status='$status' WHERE employeeId=' ".$_GET['employeeId']."' ");
          $err="<font color='white'>Saved, Username Exists</font>";
        } else{
            mysqli_query($con,"UPDATE employeetb SET photo='$pic', employee_name='$employee_name',photo='$pic',phone='$phone', gender='$gender', address='$address',username='$username',status='$status' WHERE employeeId=' ".$_GET['employeeId']."' ");
          $err="<font color='white'>Employee Detail Updated</font>";
        }
      }
      $poi=mysqli_query($con,"SELECT * FROM employeetb WHERE employeeId='".$_GET['employeeId']."' ");
      $res=mysqli_fetch_assoc($poi);
    ?>

    <!-- Page Content -->
    <!-- Contact Section -->
      <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
        <center>
          <h2 class="w3-text-light-grey" style="margin-top:-23%">Modify Staff Details</h2>
          <hr style="width:200px;margin-bottom:0%" class="w3-opacity">
        </center>
        <div class="w3-section"></div>
        <br>
        <center>
          <form method="POST" enctype="multipart/form-data" >
            <div class="container-register">
              <br>
              <center>
                <div style="padding-top:0%; font-size:18px"><?php echo @$err;?></div>
              </center>
              <hr>
              <img class="fill-date" style="background-color:black;height:200px" alt="Profile Picture" src="../image/<?php echo $res['photo'];?>">
              <input type="hidden" class="label-pay" name="image1" value="<?php echo $res['photo'];?>"> <br />
              <input class="fill-in" name="employee_name" value="<?php echo $res['employee_name'];?>" required>
              <select name="gender" class="fill-in" required>
                <option value="<?php echo $res['gender'];?>"><?php echo $res['gender'];?></option>
                <?php 
                  $q1=mysqli_query($con,"SELECT * FROM gendertb ");
                  while($r1=mysqli_fetch_assoc($q1)){
                    echo "<option value='".$r1['genderId']."'>".$r1['gender']."</option>";
                  }
                ?>
              </select>
              <br />
              <input class="fill-in" placeholder="No phone data..." name="phone" value="<?php echo $res['phone'];?>">
              <input class="fill-in" placeholder="No address data..." name="address" value="<?php echo $res['address'];?>">
              <br/>
              <input class="fill-in" type="file"  name="image">
              <input class="fill-in" value="<?php echo $res['joinDate'];?>" readonly>
              <br/>
              <input class="fill-in" placeholder="Username" name="username" value="<?php echo $res['username'];?>" required>
              <select name="status" class="fill-in" required>
                <option value="<?php echo $res['status'];?>"><?php echo $res['status'];?></option>
                <?php 
                  $q2=mysqli_query($con,"SELECT * FROM statustb ORDER BY status ASC");
                  while($r2=mysqli_fetch_assoc($q2)){
                    echo "<option value='".$r2['status']."'>".$r2['status']."</option>";
                  }
                ?>
              </select>
              <br />
              <button type="submit" name="save" class="registerbtn fill-in" style="background-color:maroon">Save</button>
              <button class="registerbtn fill-in" style="background-color:#f44336" type="button" onClick="location.href='staff'"  >Back</button>
              <hr>
            </div>
          </form>
        </center>
      </div>
      <center>
        <p class="bottom-text" style="background-color:black">Developed For<br />Advance Reconnaissance for<br />Operational Plague</p>
      </center>
      <!-- END PAGE CONTENT -->
    </div>
  </body>
</html>
