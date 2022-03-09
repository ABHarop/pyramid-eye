<?php include('header.php');?>
<body class="w3-black">
  <?php include('menu.php');?>
  <?php include('dbcon.php'); ?>
    <!-- Main Section -->
    <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
      <center>
        <h2 class="w3-text-light-grey" style="margin-top:-23%">Category Detail</h2>
      </center>

      <div class="container-register">
        <hr>
        <form method="POST" action="add_category">
          <?php
            $sql=mysqli_query($con,"SELECT * FROM cattb WHERE catId='".$_GET['catId']."'");
            $res=mysqli_fetch_array($sql);
          ?>
          <center>
            <input class="fill-in searchbox" type="search" style=" width:auto;color:black; font-weight:lighter; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:20px; border: 0px solid #ccc; background-color:blanchedalmond; font-style:italic;margin-bottom:1%;text-align:center" value="<?php echo $res['category']; ?>" readonly>
            <button class="fill-in registerbtn" type="button" style="background-color:#f44336" onClick="location.href='category'">Back</button>
          </center>
        </form>
        <br>
        <?php 
          $q=mysqli_query($con,"SELECT * FROM relationtb1 WHERE catId='".$_GET['catId']."' ");
          $rr=mysqli_num_rows($q);
          if(!$rr){
            echo "<h4 style='color:#00FFCC;text-align:center;'>No Results found !!!</h4>";
          }
          else{
        ?>
        <table class="w3-table-all" >
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>View</th>
          </tr>
          <?php
            $inc=1;
            while($row = mysqli_fetch_array($q)){
              $query2 = mysqli_query($con,"SELECT * FROM poitb WHERE poiId='".$row['poiId']."'");
              $res2 = mysqli_fetch_array($query2);
              echo "<Tr>";
              echo "<td>".$inc."</td>";
              echo "<td>".$res2['poi_name']."</td>";
          ?>
          <td><a href="edit_poi?page=edit_poi&poiId=<?php echo $row['poiId']; ?>" style='color:#001a66'><span class='glyphicon glyphicon-edit'>View</span></a></td>
          <?php 
              echo "</Tr>";
              $inc++;
            }
          ?>
        </table>

      <?php }?>
      <hr>
    </div>
    <!-- END PAGE CONTENT -->
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>
