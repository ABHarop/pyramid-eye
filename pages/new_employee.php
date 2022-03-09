<?php include('header.php');?>
<body class="w3-black">
  <?php include('menu.php');?>
  <?php
  include('dbcon.php');
  $employeeId=$_SESSION['employeeId'];
  $sql=mysqli_query($con,"SELECT * FROM employeetb WHERE employeeId='$employeeId'");
  $res=mysqli_fetch_array($sql);

  extract($_POST);
  if(isset($save)){  
    $joinDate = $_POST["joinDate"];
    $employee_name = $_POST["employee_name"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $regemployeeId = $_POST["employeeId"];
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
    $userpassword = password_hash($password, PASSWORD_BCRYPT);
    $schedule = date("Y-m-d H:i:s");
    $activity="added new member of staff"; 

    $query=mysqli_query($con,"SELECT pass FROM employeetb WHERE employeeId='$employeeId' ")or die(mysqli_error($con));
    $row=mysqli_fetch_array($query);

    $pass = $row['pass'];
    if (password_verify($_POST["passwordold"], $pass)){
        $query2=mysqli_query($con,"SELECT username FROM employeetb WHERE username='$username' ")or die(mysqli_error($con));
        $count=mysqli_num_rows($query2);
        if ($count == 0){
          mysqli_query($con,"INSERT INTO employeetb (`joinDate`,`employee_name`,`phone`,`gender`,`username`,`pass`,`photo`,`regemployId`) VALUES ('$schedule','$employee_name','$phone','$gender','$username','$userpassword','$pic','$regemployeeId')") or die(mysqli_error($con));

          mysqli_query($con,"INSERT INTO historytb(employeeId,activity,schedule) VALUES('$employeeId','$activity','$schedule')")or die(mysqli_error($con));

          $err="<font color='white'>New Staff Added Successfully</font>";
        }else{
          $err="<font color='white'>Username in Use, try again</font>";
        }

    } else{
      $err="<font color='white'>Invalid Password, try again</font>";
    }
  }
  ?>


  <!-- Page Content -->
  <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
    <center>
      <h2 class="w3-text-light-grey" style="margin-top:-23%">New Staff</h2>
      <hr style="width:200px;margin-bottom:0%" class="w3-opacity">
    </center>
    
    <br>
    <center>
      <form method="POST" enctype="multipart/form-data" >
        <div class="container-register" style="background-color:black"><br/>
          <center>
            <div style="padding-top:0%; font-size:18px"><?php echo @$err;?></div>
          </center>
          <hr>
          <input class="fill-in" name="joinDate" id="joinDate" hidden required>
          <input class="fill-in" placeholder="Full Name" name="employee_name"  required>
          <input class="fill-in" placeholder="Phone Number" name="phone" required >
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
          <input type="file" class="fill-in" name="image">
          <br />
          <input class="fill-in" placeholder="Username" name="username" required>
          <input class="fill-in" placeholder="Password" name="password" required>
          <br/>
          <input class="fill-in" value="<?php echo $res['employeeId']; ?>" name="employeeId"  required readonly hidden>
          <input class="fill-in" id="date" type="password" name="passwordold" placeholder="Enter your password" required>

          <br />
          <button type="submit" name="save" class="registerbtn fill-in" style="background-color:maroon">Save</button>
          <button type="reset" value="Submit" style="background-color:#f44336" class="registerbtn fill-in">Clear</button>
          <hr>
        </div>
      </form>
    </center>
    <!-- End Contact Section -->
  </div>
  <?php include 'footer.php'; ?>
  <!-- END PAGE CONTENT -->
  <script>
    var field = document.querySelector('#joinDate');
    var date = new Date();
    //set date
    field.value = date.getFullYear().toString() + '-' + (date.getMonth() + 1).toString().padStart(2, 0) + '-' + date.getDate().toString().padStart(2, 0);
  </script>
</body>
</html>
