<?php 

session_start();

?>
<?php 
require_once 'db/db_init.php' ; 
include 'includes/head.php'; 
include 'includes/navigation.php';

?>

<div id="headerWrapper">
    <div id="back-flower"></div>
    <div id="logotext"></div>
    <div id="fore-flower"></div>
</div>


<!--Show Products-->
<div class="container-fluid">

    <div class="col-md-2"></div>

    <div class="col-md-8">
        <div class="row">
            <h2 class="text-center">Featured Books</h2>

            <?php
            $sql = "select * from books n, featured_books f where n.id=f.book_id";
            $catquery=mysqli_query($conn,$sql);
            ?> <?php while($S=mysqli_fetch_assoc($catquery)):?>
            <div class="col-md-3">
                <h4><?php echo $S["bk_name"]; ?></h4>
                <img src="<?php echo $S["img_path"]; ?>" alt="<?php echo $S["bk_name"]; ?>" class="img-thumb " height="200" width="200"/>
                <p class="price">Our Price: $<?php echo $S["price"]; ?></p>

                <?php $book_id=$S["book_id"]; ?>

                <button type="button" class="btn btn-info btn-xs " onClick="document.location.href='productPreview.php?bk_id=<?php echo "$book_id;" ?>'" >Details</button>

                <button type="button"  class="btn btn-info btn-xs" onClick="document.location.href='addToCart.php?bk_id=<?php echo $book_id; ?>'">
                    <span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart
                </button>
            </div>
            <?php endwhile; ?>

        </div>
    </div>

    <div class="col-md-2"></div>

</div>
<?php include 'includes/footer.php'; ?>
<?php include 'includes/scrollbarHome.php'; ?>

</body>
</html>


