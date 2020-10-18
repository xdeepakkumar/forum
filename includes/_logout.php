<?php
 echo"Please wait while logging out..";   
 session_start();
 session_destroy();
 header("Location:/forum/index.php");
 ?>