<!-- CARRITO -->
<div class="col-lg-3 ">
    <div class ="card border border-dark text-center">
        <h1 class="display-1 ">Cart</h1>
        <hr>
        <div class="card-body">
            <hr>
            <ul class="list-group">
                <?php  foreach ($cart->getProducts() as $product) { ?>
                    <div class="list-item">
                        <h1 class="display-5"> <?= $product['name'] ?> </h1>
                        <div>
                            <p> <?= $product['price'] . " $" ?> </p>
                        </div>
                        <div>
                            <img src=" <?= $product['image_root'] ?>" alt="">
                        </div>
                        <div >
                            <form action="cartManage.php" method="Post">
                                <input type="hidden" name="addToCart">
                                    <input name="name" type="hidden" value="<?= $product['name'] ?>">
                                    <input name="price" type="hidden" value=<?= $product['price'] ?>>
                                    <input name="category" type="hidden" value="<?= $product['category_id'] ?>">
                                    <input name="imageExt" type="hidden" value='<?= $product['image_ext'] ?>'>
                                    <input name="imageRoot" type="hidden" value='<?= $product['image_root'] ?>'>
                                    <input name="id" type="hidden" value='<?= $product['id']?>'>
                                    <input class="btn btn-secondary" type="submit" value="Add to Cart" >
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>