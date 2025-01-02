<?php
// Connect to the database
$db = new mysqli('localhost', 'root', '', 'MeTv');

// Check the connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Check if a size is selected (you can use POST or GET)
if (isset($_POST['size'])) {
    $selectedSize = $_POST['size'];

    // Fetch product details based on the selected size
    $sql = "SELECT * FROM MeTv WHERE product_size = '$selectedSize'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // Display product details
        $row = $result->fetch_assoc();
        $product_name = $row['product_name'];
        $product_model = $row['product_model'];
        $product_price = $row['product_price'];
        $product_image = $row['product_image'];
    } else {
        // Handle the case when no product is found for the selected size
        $product_name = "TV Not Found";
        $product_model = "No TV matching the selected size is available.";
        $product_price = "";
        $product_image = "default_image.jpg";
    }
} else {
    // Handle the case when no size is selected
    $product_name = "Select a Size";
    $product_model = "Please select a TV size to see the product details.";
    $product_price = "N/A";
    $product_image = "default_image.jpg";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TV Product Description</title>
</head>
<body>
    <h1><?= $product_name ?></h1>
    <p><?= $product_model ?></p>
    <p>Price: $<?= $product_price ?></p>
    <img src="<?= $product_image ?>" alt="TV Product">

    <form method="post" action="">
        <label for="size">Select Size:</label>
        <select name="size" id="size">
            <option value="32">32 inches</option>
            <option value="42">42 inches</option>
            <!-- Add more size options as needed -->
        </select>
        <input type="submit" value="Show Details">
    </form>
</body>
</html>

<?php
// Close the database connection
$db->close();
?>
