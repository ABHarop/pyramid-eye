<!DOCTYPE html>
<html>
<title><?php include('../pages/title.php'); ?></title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 70%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  padding-top: 80px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 10% auto 10% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 30%; /* Could be more or less, depending on screen size */
  Box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.774);
  background: transparent;
}

/* small screen */
@media screen and (max-width: 600px) {
        .modal-content {
          background-color: #fefefe;
          margin: 15% auto 10% auto; 
          border: 1px solid #888;
          width: 80%;
          Box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.774);
          background: transparent; 
        }
    }

/* smaller screen */
@media screen and (max-width: 600px) {
        .modal-content {
          background-color: #fefefe;
          margin: 15% auto 10% auto; 
          border: 1px solid #888;
          width: 90%; 
          Box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.774);
          background: transparent;
        }
    }
    

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body style="background-image: url('../image/adminlog.jpg');background-repeat: no-repeat;background-position: center;">

<form class="modal-content animate" method="post" action="login">
    <div class="imgcontainer">
      <img src="../image/logo.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <input type="text" placeholder="Enter Username" name="username" required>
      <br>

      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit">Login</button>
      <button type="button" class="registerbtn fill-in" style="background-color:#f44336;width:100%" onClick="location.href='../account'"  >Exit</button>
    </div>

  </form>
  <?php include('../footer.php');?>
</body>

</html>
