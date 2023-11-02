<?php	

require('../config/autoload.php');

unset ($_SESSION['h_email']);
unset ($_SESSION['usertype']);

echo"<script> location.replace('healthlogin.php'); </script>";


?>