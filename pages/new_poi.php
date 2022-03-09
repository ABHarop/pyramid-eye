<?php include('header.php');?>
<body class="w3-black">
  <?php include('menu.php');?>
  <?php
    include('dbcon.php');

    $employeeId=$_SESSION['employeeId'];
    $sql=mysqli_query($con,"SELECT * FROM employeetb WHERE employeeId='$employeeId'");
    $res=mysqli_fetch_array($sql);
    //print_r($res);
    extract($_POST);
    if(isset($save)){  
      $regdate = $_POST["regdate"];
      $poi_name = $_POST["poi_name"];
      $nickname = $_POST["nickname"];
      $address = $_POST["address"];
      $occupation = $_POST["occupation"];
      $gender = $_POST["gender"];
      $bio = $_POST["bio"];
      $employeeId = $_POST["employeeId"];
    
      $pic = $_FILES['image']['name'];
      if ($pic==''){
        $pic='default.png';
      }

      else{
        $pic = $_FILES['image']['name'];
        $type = $_FILES['image']['type'];
        $size = $_FILES['image']['size'];
        $temp = $_FILES['image']['tmp_name'];
        $error = $_FILES['image']['error'];
    
        if ($error > 0){
          die('Error uploading file! Code $error.');
        }
        else{
          //conditions for the file
          if($size > 100000000000){
            die('Format is not allowed or file size is too big!');
          }
          else{
            move_uploaded_file($temp, '../image/'.$pic);
          }
        }
      }
      //unique thing here is the username
      $schedule = date("Y-m-d H:i:s");
      $activity="added new POI"; 

      $query=mysqli_query($con,"SELECT pass FROM employeetb WHERE employeeId='$employeeId' ")or die(mysqli_error($con));
      $row=mysqli_fetch_array($query);

      $pass = $row['pass'];
      if(password_verify($_POST["passwordold"], $pass)){
        mysqli_query($con,"INSERT INTO poitb (`regdate`,`poi_name`,`nickname`,`address`,`occupation`,`gender`,`photo`,`bio`,`employeeId`) VALUES ('$schedule','$poi_name','$nickname','$address','$occupation','$gender','$pic','$bio','$employeeId')") or die(mysqli_error($con));

        mysqli_query($con,"INSERT INTO historytb(employeeId,activity,schedule) VALUES('$employeeId','$activity','$schedule')")or die(mysqli_error($con));

        $err="<font color='white'>New POI Added Successfully</font>";

      } else{
        $err="<font color='white'>Password Incorrect</font>";
      }
    }
  ?>

  <!-- Page Content -->
  <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
    <center>
      <h2 class="w3-text-light-grey" style="margin-top:-23%">Add New Person Of Interest</h2>
      <hr style="width:200px;margin-bottom:0%" class="w3-opacity">
    </center>

    <div class="w3-section"></div>
    <br>
    <center>
      <form method="POST" enctype="multipart/form-data" >
        <div class="container-register">
          <br/>
          <center>
            <div style="padding-top:0%; font-size:18px"><?php echo @$err;?></div>
          </center>
          <hr>
          <input class="fill-in" name="regdate" id="regdate" hidden required>
          <input class="fill-in" placeholder="Full Name" name="poi_name"  required>
          <input class="fill-in" placeholder="Nickname" name="nickname" >
          <br />
          <input class="fill-in" placeholder="Address" name="address">
          <input class="fill-in" placeholder="Occupation" name="occupation">
          <br />
          <select name="gender" class="fill-in" required>
            <option value="">Select Gender</option>
            <?php 
              $q1=mysqli_query($con,"SELECT * FROM gendertb ");
              while($r1=mysqli_fetch_assoc($q1)){
              echo "<option value='".$r1['genderId']."'>".$r1['gender']."</option>";
              }
            ?>
          </select>
          <input type="file" class="fill-in" name="image"><br />
          <textarea class="fill-in bio" name="bio" placeholder="Enter brief info about the person"></textarea>
          <br/>
          <input class="fill-in" value="<?php echo $res['employeeId']; ?>" name="employeeId" hidden required readonly>
          <input class="fill-in" id="date" type="password" name="passwordold" placeholder="Enter employee password" required>
          <br />
          <button type="submit" name="save" class="registerbtn fill-in" style="background-color:maroon">Save</button>
          <button type="reset" value="Submit" style="background-color:#f44336" class="registerbtn fill-in">Clear</button>
          <hr>
        </div>
      </form>
    </center>
    <!-- End Form Section -->
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
