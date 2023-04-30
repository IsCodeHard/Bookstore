<?php include("./includes/header.php");?>
<main>
    <?php if(isset($_SESSION['bookstore'])):?>
    <h4 class="username">Connected as : <?= $_SESSION['bookstore']['username'];?></h4>
    <?php endif;?>
    <section id="articles">
        
    </section>
</main>
<?php include("./includes/footer.php");?>