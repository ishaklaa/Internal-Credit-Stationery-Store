<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Products with Cart Sidebar</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }

        .container {
            display: flex;
        }

        /* PRODUCTS */
        .products-section {
            flex: 3;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .product-card {
            background: #fff;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .product-card img {
            width: 100%;
            height: 140px;
            object-fit: cover;
            border-radius: 6px;
        }

        .product-card h3 {
            margin: 10px 0 5px;
            font-size: 18px;
        }

        .price {
            color: #27ae60;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .add-btn {
            background: #3498db;
            color: #fff;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-btn:hover {
            background: #2980b9;
        }

        /* CART SIDEBAR */
        .cart {
            flex: 1;
            background: #fff;
            border-left: 1px solid #ddd;
            padding: 20px;
            min-height: 100vh;
        }

        .cart h2 {
            margin-bottom: 15px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 8px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        .cart-total {
            margin-top: 20px;
            font-weight: bold;
        }

        .checkout-btn {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            background: #2ecc71;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        .checkout-btn:hover {
            background: #27ae60;
        }

        .qty-input {
            width: 35px;
            height: 19px;
            padding: 5px 8px;
            font-size: 14px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 6px;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        /* focus */
        .qty-input:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }

        /* remove ugly arrows (optional) */
        .qty-input::-webkit-outer-spin-button,
        .qty-input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .qty-input {
            -moz-appearance: textfield;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .item-title {
            font-size: 14px;
        }

        .item-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .item-price {
            font-size: 14px;
            font-weight: 600;
        }

        .remove-btn {
            width: 22px;
            height: 22px;
            border: none;
            background: #e74c3c;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border-radius: 50%;
            cursor: pointer;
            line-height: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .remove-btn:hover {
            background: #c0392b;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- PRODUCTS -->
        <div class="products-section">
            <h1>Products</h1>

            <div class="products">
                @foreach ($products as $product)
                    <div class="product-card">
                        <img src="https://via.placeholder.com/300x200" alt="Product">
                        <h3>{{ $product->title }}</h3>
                        <div class="price">${{ $product->prix }}</div>
                        <form action="{{ route('add.cart', $product) }}" method="post">
                            @csrf
                            <!-- quantity -->
                            <div class="quantity">
                                <label>Qty</label>
                                <input class="qty-input" type="number" name="quantity" value="1" min="1">
                            </div>

                            <button class="add-btn" type="submit">Add to Cart</button>
                        </form>

                    </div>
                @endforeach
            </div>
        </div>
        @if (session()->has('basket'))
            <!-- CART SIDEBAR -->
            <div class="cart">
                <h2>Your Cart</h2>
                @php $total=0 @endphp
                @foreach (session('basket') as $key => $item)
                    @php $total += $item['quantity'] * $item['prix'] @endphp
                    <!-- Static UI items -->
                    <div class="cart-item">
                        <span>{{ $item['title'] }}</span>
                        <span>${{ $item['quantity'] * $item['prix'] }}</span>
                        <button class="remove-btn" type="button" title="Remove">
                            <a href="{{ route('cart.remove', $key) }}"> &times;</a>
                        </button>
                    </div>
                @endforeach




                <div class="cart-total">
                    Total: ${{ $total }}
                </div>
                <form action="{{ route('add.Command') }}" method="post">
                    @csrf
                    <button class="checkout-btn" type="submit">Checkout</button>
                </form>

        @endif

    </div>

</body>

</html>
