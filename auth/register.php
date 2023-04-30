<?php $title="register"; include("../includes/header.php");?>
<main id="main_form">
    <form action="" method="post">
        <h3>Register</h3>
        <div class="group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Register</button>
    </form>
</main>
<?php include("../includes/footer.php");?>