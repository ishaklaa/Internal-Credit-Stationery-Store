<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Store</title>
    <!-- Modern Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --bg-body: #f8fafc;
            --bg-card: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --danger: #ef4444;
            --success: #10b981;
            --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        }

        * {
            box-sizing: border-box;
            transition: all 0.2s ease-in-out;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
        }

        /* LAYOUT */
        .app-container {
            display: grid;
            grid-template-columns: 1fr 350px;
            min-height: 100vh;
            max-width: 1400px;
            margin: 0 auto;
        }

        @media (max-width: 900px) {
            .app-container {
                grid-template-columns: 1fr;
            }

            .cart-sidebar {
                position: static;
                height: auto;
                border-left: none;
                border-top: 1px solid #e2e8f0;
            }
        }

        /* PRODUCTS SECTION */
        .products-section {
            padding: 40px;
        }

        .header {
            margin-bottom: 32px;
        }

        .header h1 {
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: -0.025em;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 24px;
        }

        /* PRODUCT CARD */
        .product-card {
            background: var(--bg-card);
            border-radius: 16px;
            padding: 16px;
            box-shadow: var(--shadow);
            border: 1px solid #f1f5f9;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1);
        }

        .product-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 12px;
            background-color: #f1f5f9;
            margin-bottom: 16px;
        }

        .product-card h3 {
            margin: 0 0 8px 0;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .price-tag {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 16px;
            display: block;
        }

        .add-btn {
            width: 100%;
            background: var(--primary);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .add-btn:hover {
            background: var(--primary-hover);
        }

        /* CART SIDEBAR */
        .cart-sidebar {
            background: #ffffff;
            border-left: 1px solid #e2e8f0;
            padding: 32px 24px;
            position: sticky;
            top: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .cart-sidebar h2 {
            font-size: 1.5rem;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .cart-items-list {
            flex-grow: 1;
            overflow-y: auto;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .item-info b {
            display: block;
            font-size: 0.95rem;
        }

        .item-info span {
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        .remove-btn {
            background: #fee2e2;
            color: var(--danger);
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .remove-btn:hover {
            background: var(--danger);
            color: white;
        }

        /* FOOTER CART */
        .cart-footer {
            margin-top: 24px;
            padding-top: 24px;
            border-top: 2px solid #f1f5f9;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .checkout-btn {
            width: 100%;
            background: var(--success);
            color: white;
            border: none;
            padding: 16px;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(16, 185, 129, 0.2);
        }

        .checkout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(16, 185, 129, 0.3);
        }

        /* Alerts */
        .alert {
            padding: 15px;
            background: #fee2e2;
            color: var(--danger);
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid var(--danger);
        }
    </style>
</head>

<body>

    <div class="app-container">

        <!-- MAIN PRODUCTS SECTION -->
        <main class="products-section">
            <header class="header">
                <h1>Featured Products</h1>
                @if ($errors->any())
                    <div class="alert">
                        @foreach ($errors->all() as $error)
                            <p style="margin:0">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </header>

            <div class="products-grid">
                @foreach ($products as $product)
                    <article class="product-card">
                        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&q=80&w=400"
                            alt="Product" class="product-image">
                        <h3>{{ $product->title }}</h3>
                        <span class="price-tag">${{ number_format($product->prix, 2) }}</span>

                        <form action="{{ route('add.cart', $product) }}" method="post">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <button class="add-btn" type="submit">
                                <span>Add to Cart</span>
                            </button>
                        </form>
                    </article>
                @endforeach
            </div>
        </main>

        <!-- CART SIDEBAR -->
        <aside class="cart-sidebar">
            <h2>🛒 Your Cart</h2>

            <div class="cart-items-list">
                @if (session()->has('basket') && count(session('basket')) > 0)
                    @php $total = 0 @endphp
                    @foreach (session('basket') as $key => $item)
                        @php $total += $item['quantity'] * $item['prix'] @endphp
                        <div class="cart-item">
                            <div class="item-info">
                                <b>{{ $item['title'] }}</b>
                                <span>{{ $item['quantity'] }} x ${{ $item['prix'] }}</span>
                            </div>
                            <a href="{{ route('cart.remove', $key) }}" class="remove-btn" title="Remove item">
                                &times;
                            </a>
                        </div>
                    @endforeach
                @else
                    <p style="color: var(--text-muted); text-align: center; margin-top: 40px;">Your cart is empty</p>
                @endif
            </div>

            @if (session()->has('basket') && count(session('basket')) > 0)
                <div class="cart-footer">
                    <div class="total-row">
                        <span>Total</span>
                        <span>${{ number_format($total, 2) }}</span>
                    </div>
                    <form action="{{ route('add.Command') }}" method="post">
                        @csrf
                        <button class="checkout-btn" type="submit">Complete Checkout</button>
                    </form>
                </div>
            @endif
        </aside>

    </div>

</body>

</html>
