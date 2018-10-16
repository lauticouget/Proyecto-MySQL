<!-- Productos -->
<div class="col-lg-9">
    <div class ="card border border-dark text-center">
        <h1 class="display-1 ">Productos</h1>
            <ul class="row">
            <?php foreach($products as $product) {?> 
                <li class="col-lg-4 list-item">
                    <div class="card">
                        <h4> <?= $product['name'] ?> </h4>
                        <div class="card-body">
                            <span class=""> <?= $product['price']. " $" ?> </span>
                            <img style ="width :5em"class="card-img-top" src="<?= $product['image_root'] ?>" >
                        </div>

                    </div> 
                    <div>
                            <form action="cartManage.php" method="Post">
                            <input type="hidden" name="addToCart">
                                <input name="name" type="hidden" value="<?= $product['name'] ?>">
                                <input name="price" type="hidden" value=<?= $product['price'] ?>>
                                <input name="category" type="hidden" value="<?= $product['category_id'] ?>">
                                <input name="imageExt" type="hidden" value='<?= $product['image_ext'] ?>'>
                                <input name="imageRoot" type="hidden" value='<?= $product['image_root'] ?>'>
                                <input name="id" type="hidden" value='<?= $product['id']?>'>
                                <input class="btn btn-primary" type="submit" value="Add to Cart" >
                            </form>
                    </div>
                </li>
                <?php } ?>
            </ul>
    </div>                
</div>