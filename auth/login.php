<?php $title="login"; include("../includes/header.php");?>
<?php 
    require("../config/config.php");

    if(isset($_POST['submit'])){
        $email=mb_strtolower(strip_tags(trim($_POST['email']))) ?? "";
        $password=strip_tags($_POST['password']) ?? "";

        if(empty($email) OR empty($password)){
            echo "<script>alert('one or more inputs are empty!')</script>";
        }
        else{
            $retrieve = $conn->prepare("SELECT * FROM users WHERE email=:email");
            $retrieve->execute([':email'=>$email]);

            $user=$retrieve->fetch(PDO::FETCH_ASSOC);

            if($user && password_verify($password, $user['password'])){
                $_SESSION['bookstore']['username']=$user['username'];
                $_SESSION['bookstore']['user_id']=$user['id'];
                header("location:".APPURL);
            }else{
                echo "<script>alert('password or email is wrong!')</script>";
            }
        }
    }
?>
<main id="main_form">
    <form action="" method="post">
        <h3>Login</h3>
        <div class="group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= $_POST['email'] ?? '';?>">
        </div>
        <div class="group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit" name="submit">Login</button>
    </form>
</main>
<?php include("../includes/footer.php");?>