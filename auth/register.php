<?php $title="register"; include("../includes/header.php");?>
<?php 
    require("../config/config.php");

    if(isset($_POST['submit'])){
        $username=mb_strtolower(strip_tags(trim($_POST['username']))) ?? "";
        $email=mb_strtolower(strip_tags(trim($_POST['email']))) ?? "";
        $password=strip_tags($_POST['password']) ?? "";

        if(empty($username) OR empty($email) OR empty($password)){
            echo "<script>alert('one or more inputs are empty!')</script>";
        }else{
            $insert=$conn->prepare("SELECT * FROM users WHERE email=:email");
            $insert->execute([
                ':email' => $email
            ]);
            $result = $insert->fetch(PDO::FETCH_ASSOC);

            if(!$result){
                $insert=$conn->prepare("INSERT INTO users(username, email, password) VALUES(:username, :email, :password)");

                $insert->execute([
                    ':username' => $username,
                    ':email' => $email,
                    ':password' => password_hash($password, PASSWORD_ARGON2ID)
                ]);
                
                header("location: login.php");
            }else{
                echo "<script>alert('email already exist!')</script>";
            }
        }
    }
?>

<main id="main_form">
    <form action="" method="post">
        <h3>Register</h3>
        <div class="group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?= $_POST['username'] ?? '';?>">
        </div>
        <div class="group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= $_POST['email'] ?? '';?>">
        </div>
        <div class="group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit" name="submit">Register</button>
    </form>
</main>
<?php include("../includes/footer.php");?>