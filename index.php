<?php include("./includes/header.php");?>
<?php 
    require("./config/config.php");

    $req = $conn->query("SELECT * FROM products WHERE status = 1");
    $req->execute();

    $products=$req->fetchAll(PDO::FETCH_ASSOC);
?>
<main>
    <?php if(isset($_SESSION['bookstore'])):?>
        <h4 class="username">Connected as : <?= $_SESSION['bookstore']['username'];?></h4>
    <?php endif;?>
    <hr>
    <?php if(!empty($products)):?>
        <section id="articles">
            <?php foreach ($products as $book):?>
                <div class="article">
                    <div class="article_image_box">
                        <img src="./img/<?= $book['image'];?>" alt="<?= $book['name'];?>">
                    </div>
                    <div class="article_content">
                        <div class="article_name"><h4><?= $book['name'];?></h4><span>($<?= $book['price'];?>/item)</span></div>
                        <p class="article_description"><?= strlen($book['description'])>80 ? substr($book['description'], 0, 80)."..." : $book['description'];?></p>
                        <a href="/shopping/single.php?product_id=<?= $book['id']; ?>" class="btn btn_more">more -></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    <?php else: ?>
        <p class="empty" style="color:#ccc; text-align:center">No books available now!</p>
    <?php endif; ?>
</main>
<?php include("./includes/footer.php");?>