
<?php
    session_start();
    if(empty($_SESSION['manId'])):
    header('Location: /secret/admin/');
    endif;
    session_destroy();
    Header('Location: /secret/admin/');
?>
