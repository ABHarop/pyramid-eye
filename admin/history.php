<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body class="w3-black" style="margin-top:15%">
  <?php include('../database/dbcon.php');?>
  <!-- Page Content -->
  <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
    <center><h2 class="w3-text-light-grey" style="margin-top:-23%">History Log</h2>
      <hr style="width:200px;margin-bottom:3%" class="w3-opacity">
    </center>  
    <div class="container-register">
      <!-- Call Navigation buttons -->
      <?php include('button.php');?>
      <hr>
      <br>
      <?php 
        $q=mysqli_query($con,"SELECT * FROM historytb ORDER BY schedule DESC ");
        $rr=mysqli_num_rows($q);
        if(!$rr){
          echo "<h4 style='color:#00FFCC;text-align:center;'>No History Data !!!</h4>";
        }
        else{
          ?>
          <table class="w3-table-all" id="poitb" >
            <tr>
              <th style="padding-left:8px">Date/Time</th>
              <th>Activity</th>
              <th>Staff</th>
            </tr>

            <?php
              while($row = mysqli_fetch_array($q)){
                $query1=mysqli_query($con,"SELECT * FROM employeetb WHERE employeeId='".$row['employeeId']."'");
                $result1=mysqli_fetch_assoc($query1);
                echo "<Tr>";
                echo "<td>".$row['schedule']."</td>";
                echo "<td>".$row['activity']."</td>";
                echo "<td>".$result1['employee_name']."</td>";
                ?>
                <?php 
                echo "</Tr>";
              }
            ?>
          </table>
          <?php
        }?>
        <hr>
      </div>
      <!-- END PAGE CONTENT -->
    </div>
  <center>
  <?php include('footer.php'); ?>
</body>
</html>
