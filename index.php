
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
        @media only screen and (max-width: 600px) {#main {margin-left: 0;} }
    </style>
    <body class="w3-black" style="background-image: url('css/test.jpg');background-repeat: no-repeat;background-position: center;">
        <?php include('database/dbcon.php'); ?>
        <!-- Page Content -->
        <div class="w3-padding-medium w3-black" style="background: transparent;" id="main">
            <!-- Header/Home -->
            <header class="w3-container w3-center w3-black" style="background: transparent;"  id="home" >
                <h1 class="w3-jumbo" style="margin-bottom:2%;"><span class="w3-hide-small">Pyramid</span> Eye</h1>
            </header>
        </div>

        <!-- Search Section -->

    <div class="w3-padding-18 w3-content w3-text-grey" id="contact">
        <h2 class="w3-text-light-grey " style="margin-top:6%">Search</h2>
        <p>Enter in search key word:</p>
        <hr>
        <center>
            <form method="POST" action="search_result">
                <input class="fill-in searchbox" placeholder="Type Category" style="margin-bottom:1%" name="searchCategory" required />
                <button class="fill-in registerbtn" name="sub" style="background-color:maroon;margin-bottom:1%" type="submit">Search</button>
            </form>
            <hr>
            <a href="account" style="text-decoration:none;color:aliceblue">Sign In</a>
        </center>
    </div>

    <!-- END PAGE CONTENT -->
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <?php include('footer.php');?>
    </body>
</html>
