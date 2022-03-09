
<?php include('header.php');?>
<body class="w3-black">
  <?php include('menu.php');?>
  <?php include('dbcon.php');?>

  <!-- Page Content -->
  <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
    <center>
      <h2 class="w3-text-light-grey" style="margin-top:-23%">All Persons of Interest</h2>
    </center>

    <div class="container-register">
      <hr>
      <form method="POST">
        <center>
          <input class="fill-in searchbox" type="search" id="search" onkeyup="mySearch()" placeholder="Search POI...">
        </center>
      </form>
      <br>
      <?php 
        $q=mysqli_query($con,"SELECT * FROM poitb ORDER BY poi_name ASC ");
        $rr=mysqli_num_rows($q);
        if(!$rr){
          echo "<h4 style='color:#00FFCC;text-align:center;'>No Results found !!!</h4>";
        }
        else{
        ?>

        <table class="w3-table-all" id="poitb" >
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Detail</th>
          </tr>

          <?php
            $inc=1;
            while($row = mysqli_fetch_array($q)){
            echo "<Tr>";
            echo "<td>".$inc."</td>";
            echo "<td>".$row['poi_name']."</td>";
            echo "<td>".$row['gender']."</td>";
            echo "<td>".$row['address']."</td>";
            ?>

            <td><a href="edit_poi?page=edit_poi&poiId=<?php echo $row['poiId']; ?>" style='color:#001a66'><span class='glyphicon glyphicon-edit'>View</span></a></td>

            <?php 
              echo "</Tr>";
              $inc++;

          } ?>
      
        </table>

        <?php 
      }?>
      <hr>
    </div>

    <!-- END PAGE CONTENT -->
  </div>
  <?php include 'footer.php'; ?>
  <script>
    var field = document.querySelector('#regdate');
    var date = new Date();
    //set date
    field.value = date.getFullYear().toString() + '-' + (date.getMonth() + 1).toString().padStart(2, 0) + '-' + date.getDate().toString().padStart(2, 0);

    //function for searching poi
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
