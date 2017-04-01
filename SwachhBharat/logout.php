<?php

include ("config.php");
session_start();
$ssn=md5("SwachhBharatKey");
$query = "UPDATE `users` SET `ssnvar` = NULL WHERE ssnvar='".$_SESSION[$ssn]."'";
$result = mysqli_query($con,$query);
session_destroy();
session_unset();
mysqli_close($con);

echo '<script>window.location.href="index.php"</script>';

?>
