<?php
	$isincart = false;
	if($loguser) {
		$isincart = order::hasThisInCart($product->idproduct, $loguser->iduser);
        // var_dump($isincart);
	}
?>

<div class="product">
<a href="view-product.php?name=<?= $product->name ?>"><img id="productImage" src="img/products/<?= $product->image; ?>" alt="<?= $product->name ?>" class="feature"></a>

<h3><a href="view-product.php?name=<?= $product->name ?>"><?= $product->name ?></a></h3>

<p><?= $product->description; ?></p>


<?php if($product->quantity > 0): ?>
<h5>Availability: <span class="instock">In Stock</span></h5>
<?php else: ?>
<h5>Availability: <span class="outofstock">Out of Stock</span></h5>
<?php endif; ?>

<p>
        <?php if(!$isincart): ?>
       		<a href="addtocart.php?name=<?= $product->name ?>" class="cart-btn">
        	<span class="price">$<?= $product->price; ?></span>
         	<img src="img/white-cart.gif" alt="Add to Cart">ADD TO CART</a>
        <?php else: ?>
        	<a href="#" id="incart" class="cart-btn">
        	<span class="price">$<?= $product->price; ?></span>
         	<img src="img/white-cart.gif" alt="Already In Cart">ALREADY IN CART</a>
    	<?php endif; ?>
</p>
</div>
