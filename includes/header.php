<?php
    session_start();
    define("APPURL", "http://localhost:3000")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title><?= $title ?? "Bookstore";?></title>
</head>
<body>
    <header>
        <p class="logo">BookStore</p>
        <ul class="nav">
            <li><a href="/index.php">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Cart</a></li>
            <li><a href="">Categories</a></li>
            <!-- Si l'utilisateur n'est pas connecté -->
            <?php if(!isset($_SESSION['bookstore']['user_id'])):?>
            <div class="login_box">
                <a href="/auth/login.php">Login</a>
                <a href="/auth/register.php" class="register">Register</a>
            </div>
            <?php else:?>
            <!-- Si l'utilisateur est connecté -->
            <li>
                <a href="">Profil</a>
                <ul class="sub_nav">
                    <li><a href="">Wishlist</a></li>
                    <li><a href="">Buying</a></li>
                    <li><a href="/auth/logout.php">Log out</a></li>
                </ul>
            </li>
            <?php endif;?>
        </ul>
    </header>

