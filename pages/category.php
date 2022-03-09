<?php include('header.php');?>
<body class="w3-black">
  <?php include('menu.php');?>
  <?php 
    include('dbcon.php');

    $employeeId=$_SESSION['employeeId'];
    //print_r($res);
    extract($_POST);
    if(isset($save)){ 
      $schedule = date("Y-m-d H:i:s");
      $activity="added new category";
      $category = $_POST['category'];
      $query2=mysqli_query($con,"SELECT * FROM cattb WHERE category='$category' ")or die(mysqli_error($con));
      $count=mysqli_num_rows($query2);
      if($count>0){
          $err="<font color='white'>Category Already Exists</font>";
      }
      else{
        mysqli_query($con,"INSERT INTO cattb (`category`) VALUES ('$category')") or die(mysqli_error($con));
        mysqli_query($con,"INSERT INTO historytb (employeeId,activity,schedule) VALUES('$employeeId','$activity','$schedule')")or die(mysqli_error($con));
        $err="<font color='white'>New Category Added</font>";
      }
    }
  ?>

  <!-- Main Section -->
  <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
    <center>
      <h2 class="w3-text-light-grey" style="margin-top:-23%">All Categories</h2>
    </center>
    <div class="container-register">
      <hr>
      <form method="POST">
        <center>
          <input class="fill-in searchbox" style="margin-bottom:1%" type="search" id="search" onkeyup="mySearch()" placeholder="Search Category...">
          <input class="fill-in searchbox" name="category" style="margin-bottom:1%" placeholder="Add New Category..." required>
          <button class="fill-in registerbtn" name="save" style="background-color:maroon" type="submit">Add Category</button>
          <div style="padding-top:0%; font-size:18px"><?php echo @$err;?>
        </center>
      </form>
      <br>
    <?php 
      $q=mysqli_query($con,"SELECT * FROM cattb ORDER BY category ASC ");
      $rr=mysqli_num_rows($q);
      if(!$rr){
        echo "<h2 style='color:red; padding-left:230px'>No Category Found !!!</h2>";
      }
      else{
        ?>

        <table class="w3-table-all" id="category" >
          <tr>
            <th style="padding-left:8px">Category</th>
            <th>Suspects #</th>
            <th>View</th>
            <th>Edit</th>
          </tr>
          <?php
            while($row = mysqli_fetch_array($q)){
              $query1 = mysqli_query($con,"SELECT COUNT(poiId) AS poiNo FROM relationtb1 WHERE catId='".$row['catId']."' ");
              $res1 = mysqli_fetch_array($query1);
              echo "<Tr>";
              echo "<td>".$row['category']."</td>";
              echo "<td>".$res1['poiNo']."</td>";
              ?>
              <td><a href="view_category?page=view_category&catId=<?php echo $row['catId']; ?>" style='color:#001a66'><span class='glyphicon glyphicon-edit'>View</span></a></td>
              <td><a href="edit_category?page=edit_category&catId=<?php echo $row['catId']; ?>" style='color:green'><span class='glyphicon glyphicon-edit'>Edit</span></a></td>
              <?php 
              echo "</Tr>";
            }
          ?>
        </table>

        <?php
      }?>
      <hr>
    </div>
  </div>
  <!-- END PAGE CONTENT -->
  <?php include 'footer.php'; ?>
  <script>
    var field = document.querySelector('#adddate');
    var date = new Date();
    //set date
    field.value = date.getFullYear().toString() + '-' + (date.getMonth() + 1).toString().padStart(2, 0) + '-' + date.getDate().toString().padStart(2, 0);

    //function for searching poi
    function mySearch() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("search");
      filter = input.value.toUpperCase();
      table = document.getElementById("category");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>
</body>
</html>
