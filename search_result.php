<!DOCTYPE html>
<html>
  <title><?php include('pages/title.php'); ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/w3.css">
  <link rel="stylesheet" href="css/style.css">
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
  <body class="w3-black bottom-text" style="background-image: url('css/employee.jpg');background-repeat: no-repeat;background-position: center;">

    <!-- Page Content -->
    <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
      <center>
        <h2 class="w3-text-light-grey" style="margin-top:0%">Search Result</h2>
      </center>
      <br/>

      <div class="container-register">
        <button class="fill-in registerbtn" style="background-color:#f44336;margin-bottom:-5%;width:auto" type="submit" onClick="location.href='index'">Back</button>
        <hr>

        <?php 
          include('database/dbcon.php');
          $search=$_POST['searchCategory'];
          $q=mysqli_query($con,"SELECT * FROM poitb INNER JOIN relationtb1 ON poitb.poiId = relationtb1.poiId INNER JOIN cattb ON cattb.catId = relationtb1.catId WHERE category IN ('$search') ORDER BY poi_name ASC ");

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
      <?php }?>
      <hr>
    </div>
    <!-- END PAGE CONTENT -->
    </div>
    <?php include('pages/footer.php'); ?>
  <body>
</html>