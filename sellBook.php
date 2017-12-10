<?php 

require_once 'db/db_init.php' ; 
include 'includes/head.php'; 
include 'includes/navigation.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<link rel="stylesheet" href="css/sellBook.css">
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">SELL A BOOK</h1>
            <div class="account-wall">

                <form class="form-sellBook" action=sellBookSubmit.php method="POST" enctype="multipart/form-data">
                    <input type="text" name="bk_name" class="form-control" placeholder="Full Name" required autofocus>

                    <input type="text" name="description" class="form-control" placeholder="Enter the Description" required>

                    <input type="text" name="quantity" class="form-control" placeholder="Enter the Quantity" required>

                    <input type="text" name="price" class="form-control" placeholder="Enter the Price">

                    <input type="text" name="country" class="form-control" placeholder="Country  Name" required autofocus>
                    
                    <input type="text" name="language" class="form-control" placeholder="Language" required autofocus>

                    <div class="form-group">
                        <label for="sel1">Category</label>
                        <select name="category" class="form-control" id="category">
                            <?php
                            $sql = "select * from category";
                            $catquery=mysqli_query($conn,$sql);
                            ?> 
                            <?php while($S=mysqli_fetch_assoc($catquery)):?>
                           
                            <option><?php echo $S['category_name'] ;?></option>
                            
                            <?php endwhile; ?>

                        </select>
                    </div> 

                    <br>

                    <div class="form-group">
                        <label for="sel1">Author</label>
                        <select name="author" class="form-control" id="author">
                            <?php
                            $sql = "select * from authors";
                            $catquery=mysqli_query($conn,$sql);
                            ?> <?php while($S=mysqli_fetch_assoc($catquery)):?>
                            <option><?php echo $S['author_name'] ;?></option>
                            <?php endwhile; ?>
                        </select>
                    </div> 

                    <br>

                    <label class="btn-bs-file btn btn-primary" id="bkUpBt">
                        Browse
                        <input type="file" name="bookCover" />
                        
                    </label>
                     <img src="" class="img-thumbnail" style="width:200;height:200;">
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="signup" value="submit">
                        SELL BOOK</button>

                </form>
            </div>
        </div>


    </div>


</div>
<?php include 'includes/footer.php'; ?>
<?php include 'includes/scrollbarHome.php'; ?>

</body>
</html>


