<?php
session_start(); // Inicia a sessão

include('conn.php');
session_destroy();


header("Location: index.php");

$conn->close();
?>
