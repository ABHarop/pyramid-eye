<?php
  // We need to use sessions, so you should always start sessions using the below code.
  Session_start();
  // If the user is not logged in redirect to the login page…
  If (!isset($_SESSION['loggedin'])) {
    Header('Location: /');
    exit;
  }
?>