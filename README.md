# LaravelCart

# Set Up

Put Class MyCart in the App's root folder of your laravel project. `App\MyCart.php`

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
`id` is the unique identifier of the product
`$price` is the unit price of the product

# Add a product to cart

```
App\Cart::newInstance()->addToCart($product,$request->qty);
```

# Update a product's quantity in cart 
```
App\Cart::newInstance()->updateCart($product,$qty);
```

# Reduce a product's quantity in the cart

```
App\Cart::newInstance()->reduceCart($product,$qty);
```

# Remove a product from cart

```
App\Cart::newInstance()->removeItem($product);
```




 
