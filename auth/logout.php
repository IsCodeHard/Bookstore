<?php
    session_start();
    unset($_SESSION['bookstore']);
    header("location: ../index.php");
?>