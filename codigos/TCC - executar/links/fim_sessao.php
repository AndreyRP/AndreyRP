<?php
session_start();
session_destroy();
header("Location: pag_loja.php");
?>