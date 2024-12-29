<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple E-commerce Landing Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f8f8f8;
        }
        .container {
            width: 90%;
            margin: 0 auto;
        }

        /* Header */
        header {
            background: #333;
            color: #fff;
            padding: 20px 0;
        }
        header h1 {
            text-align: center;
            font-size: 24px;
        }

        /* Banner Section */
        .banner {
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('https://via.placeholder.com/1200x400') no-repeat center center/cover;
            height: 400px;
            color: #fff;
            text-align: center;
        }
        .banner h2 {
            font-size: 36px;
            background: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 5px;
        }

        /* Categories Section */
        .categories {
            margin: 40px 0;
            text-align: center;
        }
        .categories h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        .category-list {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .category-item {
            width: 30%;
            margin-bottom: 20px;
        }
        .category-item img {
            width: 100%;
            border-radius: 10px;
        }
        .category-item h3 {
            margin-top: 10px;
            font-size: 20px;
        }

        /* Products Section */
        .products {
            margin: 40px 0;
        }
        .products h2 {
            font-size: 28px;
            text-align: center;
            margin-bottom: 20px;
        }
        .product-list {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .product-item {
            width: 22%;
            margin-bottom: 20px;
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .product-item img {
            width: 100%;
            border-radius: 10px;
        }
        .product-item h3 {
            font-size: 18px;
            margin: 10px 0;
        }
        .product-item p {
            font-size: 16px;
            color: #333;
        }
        .product-item .price {
            font-weight: bold;
            color: #e67e22;
            margin: 10px 0;
        }

        /* Footer */
        footer {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 15px;
            margin-top: 20px;
        }

        .header-nav{
            display: flex;
            justify-content: space-between;
            padding: 20px 30px;
        }
        
    </style>
</head>
<body>

    <!-- Header -->
    <header class="header-nav">
        <h1>My E-commerce</h1>
        <div>
            
        </div>
    </header>


    <!-- Konten lain di halaman utama -->
    <main class="text-center m-auto p-5">
        <h2>Welcome to Our E-commerce Site</h2>
        <p>Discover our products and enjoy shopping!</p>
    </main>

    <!-- Banner Section -->
    <section class="banner p-5">
        <h2>Shop the Latest Trends</h2>
    </section>

    <!-- Categories Section -->
    <section class="categories container m-auto py-5">
        <h2>Shop by Category</h2>
        <div class="category-list">
            <div class="category-item">
                <img src="https://via.placeholder.com/400x300" alt="Category 1">
                <h3>Electronics</h3>
            </div>
            <div class="category-item">
                <img src="https://via.placeholder.com/400x300" alt="Category 2">
                <h3>Fashion</h3>
            </div>
            <div class="category-item">
                <img src="https://via.placeholder.com/400x300" alt="Category 3">
                <h3>Home & Kitchen</h3>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products container m-auto py-5">
        <h2>Featured Products</h2>
        <div class="product-list">
            <div class="product-item">
                <img src="https://via.placeholder.com/200x200" alt="Product 1">
                <h3>Smartphone</h3>
                <p>High quality smartphone with great features.</p>
                <p class="price">$299</p>
            </div>
            <div class="product-item">
                <img src="https://via.placeholder.com/200x200" alt="Product 2">
                <h3>Wrist Watch</h3>
                <p>Elegant watch for your fashion style.</p>
                <p class="price">$99</p>
            </div>
            <div class="product-item">
                <img src="https://via.placeholder.com/200x200" alt="Product 3">
                <h3>Headphones</h3>
                <p>Experience music like never before.</p>
                <p class="price">$49</p>
            </div>
            <div class="product-item">
                <img src="https://via.placeholder.com/200x200" alt="Product 4">
                <h3>Backpack</h3>
                <p>Durable and spacious backpack for all your needs.</p>
                <p class="price">$59</p>
            </div>
        </div>

    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 My E-commerce. All rights reserved.</p>
    </footer>

    <script src="https://kit.fontawesome.com/7cc4824a27.js" crossorigin="anonymous"></script>

</body>
</html>
