<?php

if (isset($_SESSION['auth']) || $_SESSION['auth'] === false) {
  header('Location: login.php');
}else{
	header('Location: adduser.php');
}
?>