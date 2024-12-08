<?php
// Include database connection
include('connect.php');

// Query to fetch product data from the database
$sql = "SELECT * FROM product_tb";
$result = $conn->query($sql);

// Check if the form is submitted to add a product to the order
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Fetch product details from the database
    $product_query = "SELECT * FROM product_tb WHERE Product_id = '$product_id'";
    $product_result = $conn->query($product_query);
    $product = $product_result->fetch_assoc();

    // Insert the product into the order database
    $order_sql = "INSERT INTO cart_tb ( product_id, product_name, price, quantity)
                  VALUES ('$product_id', '{$product['Name']}', '{$product['Price']}', '$quantity')";
    if ($conn->query($order_sql) === true) {
        header("Location: Product.php");
        echo "<script>alert('Product added to cart successfully!');</script>";
    } else {
        echo "Error: " . $order_sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<title>Product</title>

<head>
    <link rel="stylesheet" href="Product.css" />
    <!-- Other head content here -->
</head>

<div class="box1">
    <nav class="menu-bar">
        <ul>
            <li><a href="home.php"><img class="logo" src="logo.png" alt="Logo" /></a></li>
            <li><a href="Product.php">Products</a></li>
            <li><a href="#">Order</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="/Review(apuya)/review.html">Reviews</a></li>
        </ul>
    </nav>
</div>

<!-- Header -->
<span class="btitle">
    <p class="title">In-store Menu</p>
</span>

<body>
    <div class="container">
        <!-- hot Expresso container -->
        <div>
            <h1>Hot Expresso</h1>
            <span class="hotExpresso">
                <section class="col">
                    <div class="row">
                        <?php
                        // Loop through each row and display product details
                        while ($row = $result->fetch_assoc()) {
                            if ($row['Category'] === 'Hot Expresso') {
                                echo '<section class="product">
                                        <img src="' . $row["img_src"] . '" alt="" width="200px" height="250px" />
                                        <p class="americano">' . $row['Name'] . '</p>
                                        <p>₱' . $row['Price'] . '</p>
                                        <div class="cart">
                                            <section class="description">
                                                <p>' . $row['Description'] . '</p>
                                            </section>
                                            <form method="POST" action="" class="button">
                                                <input type="hidden" name="product_id" value="' . $row['Product_id'] . '" />
                                                <input type="number" name="quantity" placeholder="Quantity" min="1" required />
                                                <button type="submit">ADDTOCART</button>
                                            </form>
                                        </div>
                                    </section>';
                            }
                        }
                        ?>
                    </div>
                </section>
            </span>
        </div>

        <!-- Freeze container -->
        <div>
            <h1>Freeze</h1>
            <span class="hotExpresso">
                <section class="col">
                    <div class="row">
                        <?php
                        // Reset result pointer and fetch Freeze category products
                        $result->data_seek(0);  // Move to the first row again

                        while ($row = $result->fetch_assoc()) {
                            if ($row['Category'] === 'Freeze') {
                                echo '<section class="product">
                                        <img src="' . $row["img_src"] . '" alt="" width="200px" height="250px" />
                                        <p class="americano">' . $row['Name'] . '</p>
                                        <p>₱' . $row['Price'] . '</p>
                                        <div class="cart">
                                            <section class="description">
                                                <p>' . $row['Description'] . '</p>
                                            </section>
                                            <form method="POST" action="" class="button">
                                                <input type="hidden" name="product_id" value="' . $row['Product_id'] . '" />
                                                <input type="number" name="quantity" placeholder="Quantity" min="1" required />
                                                <button type="submit">ADDTOCART</button>
                                            </form>
                                        </div>
                                    </section>';
                            }
                        }
                        ?>
                    </div>
                </section>
            </span>
        </div>

        <!-- Dessert container -->
        <div>
            <h1>Desserts</h1>
            <span class="hotExpresso">
                <section class="col">
                    <div class="row">
                        <?php
                        // Reset result pointer and fetch Dessert category products
                        $result->data_seek(0);  // Move to the first row again

                        while ($row = $result->fetch_assoc()) {
                            if ($row['Category'] === 'Dessert') {
                                echo '<section class="product">
                                        <img src="' . $row["img_src"] . '" alt="" width="200px" height="250px" />
                                        <p class="americano">' . $row['Name'] . '</p>
                                        <p>₱' . $row['Price'] . '</p>
                                        <div class="cart">
                                            <section class="description">
                                                <p>' . $row['Description'] . '</p>
                                            </section>
                                            <form method="POST" action="" class="button">
                                                <input type="hidden" name="product_id" value="' . $row['Product_id'] . '" />
                                                <input type="number" name="quantity" placeholder="Quantity" min="1" required />
                                                <button type="submit">ADDTOCART</button>
                                            </form>
                                        </div>
                                    </section>';
                            }
                        }
                        ?>
                    </div>
                </section>
            </span>
        </div>
    </div>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>