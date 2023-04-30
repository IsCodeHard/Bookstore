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
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Cart</a></li>
            <li><a href="">Categories</a></li>
            <!-- Si l'utilisateur est connecté -->
            <li><a href="">Profil</a></li>
            <!-- Si l'utilisateur n'est pas connecté -->
            <div class="login_box">
                <a href="">Login</a>
                <a href="" class="register">Register</a>
            </div>
        </ul>
    </header>
