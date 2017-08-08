# LaravelCart

# Set Up

Put file Cart in the App's root folder of your laravel project. `App/Cart.php`

#Product Structure

create your own product class and set fields.. 

`$id` and `$price` fields are required

``` 
    public class Product{
		public $id = null;
		public $price = null;
        
        // optional fields and methods can go here
	}
    $product = new Product();
```
`$id` is the unique identifier of the product

`$price` is the unit price of the product


# Add a product to cart

```
App\Cart::newInstance()->addToCart($product,$qty);
```
// $qty is the quantity of items to add to cart


# Update a product's quantity in cart 

```
App\Cart::newInstance()->updateCart($product,$qty);
```

// $qty is the quantity of items to update the product with


# Reduce a product's quantity in the cart

```
App\Cart::newInstance()->reduceCart($product,$qty);
```

// $qty is the quantity of items to reduce the product by


# Remove a product from cart

```
App\Cart::newInstance()->removeItem($product);
```




 
