<?php include('header.php');?>
<body class="w3-black">
  <?php include('menu.php');?>
  <?php include('dbcon.php');?>

  <!-- Page Content -->
  <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
    <center>
      <h2 class="w3-text-light-grey" style="margin-top:-23%">Search Result</h2>
    </center>
    <div class="container-register">
      <hr>
      <?php 
        $search=$_POST['searchCategory'];
        $q=mysqli_query($con,"SELECT * FROM poitb INNER JOIN relationtb1 ON poitb.poiId = relationtb1.poiId INNER JOIN cattb ON cattb.catId = relationtb1.catId WHERE category IN ('$search') OR poi_name IN ('$search') OR nickname IN ('$search') ORDER BY poi_name ASC ");

        $rr=mysqli_num_rows($q);
        if(!$rr){
          echo "<h4 style='color:#00FFCC;text-align:center;'>No Results found !!!</h4>";
        }
        else{
          ?>
          <h4 style="color:white; text-align:center" >Results Found</h2>
          <table class="w3-table-all">
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Gender</th>
              <th>Detail</th>
            </tr>
            <?php
              $i=1;
              while($row = mysqli_fetch_array($q)){
                echo "<Tr>";
                echo "<td>".$i."</td>";
                echo "<td>".$row['poi_name']."</td>";
                echo "<td>".$row['gender']."</td>";
              ?>
              <td><a href="view_poi?page=view_poi&poiId=<?php echo $row['poiId']; ?>" style='color:#001a66'><span class='glyphicon glyphicon-edit'>View</span></a></td>

              <?php 
                echo "</Tr>";
                $i++;
            }?>
          </table>
          <?php 
        }?>
        <hr>
        <center>
          <button type="button" class="registerbtn fill-in" style="background-color:#f44336;margin-top:0%" onClick="location.href='home'"  >Back</button>
        </center>
      </div>
      <!-- END PAGE CONTENT -->
    </div>
    <?php include('footer.php');?>
  <div>
</body>
</html>