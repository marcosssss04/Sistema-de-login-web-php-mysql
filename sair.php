<?php
session_start();
unset($_SESSION['id_usuario.php']);
header("location: index.php");

?>