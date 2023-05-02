<?php
    $title="book does'nt exist!"; 
    require("../config/config.php");

    $product_id = strip_tags($_GET['product_id']) ?? "";

    if(!empty($product_id)){
        $retrieve = $conn->prepare("SELECT * FROM products WHERE id=:id AND status = 1");
        $retrieve->execute(['id'=>$product_id]);

        $book=$retrieve->fetch(PDO::FETCH_ASSOC);
        if(!$book){
            echo "<script>alert('no book found')</script>";
        }else{
            $title=$book['name'];
        }
    }else{
        header('location:'.APPURL);
    }
?>
<?php include("../includes/header.php");?>
<main id="main_single">
    <?php if($book):?>
        <section class="single">
            <img src="../img/<?= $book['image'];?>" alt="">
            <div class="single_content">
                <a href="<?= APPURL;?>" class="btn"><- Back</a>
                <h3 class="single_name"><?= $book['name'];?></h3>
                <p class="single_price">$<?= $book['price'];?></p>
                <p class="single_description"><?= $book['description'];?></p>
                <a href="" class="btn"><- ADD TO CART</a>
            </div>
        </section>
    <?php else:?>
        <p class="empty" style="color:#ccc; text-align:center">No book found!</p>
    <?php endif;?>
</main>
<?php include("../includes/footer.php");?>