<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body class="w3-black" style="margin-top:15%">
  <?php include('../database/dbcon.php');?>

  <!-- Page Content -->
  <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
    <center>
      <h2 class="w3-text-light-grey" style="margin-top:-23%">All Staff</h2>
      <hr style="width:200px;margin-bottom:3%" class="w3-opacity">
    </center>  
    <div class="container-register">
      <!-- Call Navigation buttons -->
      <?php include('button.php');?>
      <hr>
      <form method="POST">
        <center>
          <input class="fill-in searchbox" type="search" id="search" onkeyup="mySearch()" placeholder="Search Staff...">
        </center>
      </form>
      <br>
    <?php 
      $q=mysqli_query($con,"SELECT * FROM employeetb ORDER BY employee_name ASC ");
      $rr=mysqli_num_rows($q);
      if(!$rr){
        echo "<h2 style='color:red; padding-left:230px'>No Staff Found !!!</h2>";
      }
      else
      {
        ?>
        <table class="w3-table-all" id="poitb" >
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Status</th>
            <th>Detail</th>
          </tr>

          <?php
            $inc = 1;
            while($row = mysqli_fetch_array($q)){
            echo "<Tr>";
            echo "<td>".$inc."</td>";
            echo "<td>".$row['employee_name']."</td>";
            echo "<td>".$row['gender']."</td>";
            echo "<td>".$row['status']."</td>";
          ?>
          <td><a href="manage?page=manage&employeeId=<?php echo $row['employeeId']; ?>" style='color:#001a66'><span class='glyphicon glyphicon-edit'>View</span></a></td>
          <?php 
            echo "</Tr>";
            $inc++;
            }
          ?>    
        </table>
        <?php 
      }?>
    <hr>
    <!-- END PAGE CONTENT -->
  </div></div>
  <?php include('footer.php'); ?>
  <script>
    var field = document.querySelector('#regdate');
    var date = new Date();
    //set date
    field.value = date.getFullYear().toString() + '-' + (date.getMonth() + 1).toString().padStart(2, 0) + '-' + date.getDate().toString().padStart(2, 0);

    //function for searching Person Of Interest (POI)
    function mySearch() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("search");
      filter = input.value.toUpperCase();
      table = document.getElementById("poitb");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
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
