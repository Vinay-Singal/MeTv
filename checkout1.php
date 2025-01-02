<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="checkout.css">
    <title>Checkout Page</title>
    <style>
        /* Add your CSS styles here */
        /* ... */
        .required {
            color: red;
        }
    </style>
</head>
<body>
    <header>
        <h1>Checkout</h1>
    </header>

  
        <section class="checkout-section">
            <h2>Payment Details</h2>
            <form id="checkout-form" action="" method="POST">
                <div class="form-group">
                    <label for="first-name">First Name<sup class="required">*</sup>:</label>
                    <input type="text" id="first-name" name="first_name" placeholder="John" required>
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name:</label>
                    <input type="text" id="last-name" name="last_name" placeholder="Doe">
                </div>
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" placeholder="john@example.com">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number<sup class="required">*</sup>:</label>
                    <input type="tel" id="phone" name="phone" placeholder="123-456-7890" required>
                </div>
                <div class="form-group">
                    <label for="address">Address<sup class="required">*</sup>:</label>
                    <input type="text" id="address" name="address" placeholder="123 Main St" required>
                </div>
                <div class="form-group">
                    <label for="landmarks">Landmarks:</label>
                    <input type="text" id="landmarks" name="landmarks" placeholder="Near the park">
                </div>
                <div class="form-group">
                    <label for="city">City<sup class="required">*</sup>:</label>
                    <input type="text" id="city" name="city" placeholder="New York" required>
                </div>
                <div class="form-group">
                    <label for="district">District<sup class="required">*</sup>:</label>
                    <input type="text" id="district" name="district" placeholder="Manhattan" required>
                </div>
                <div class="form-group">
                    <label for="pin-code">PIN Code<sup class="required">*</sup>:</label>
                    <input type="text" id="pin-code" name="pin_code" placeholder="10001" required>
                </div>
                <div class="form-group">
                    <label for="payment-mode">Payment Mode:</label>
                    <input type="radio" id="upi" name="payment_mode" value="upi" required>
                        <label for="upi">UPI</label><br>
                        <input type="radio" id="cards" name="payment_mode" value="cards">
                        <label for="cards">Credit/Debit Cards</label>
                </div>
                <div class="form-group" id="upi-id-group">
                    <label for="upi-id">UPI ID:</label>
                    <input type="text" id="upi-id" name="upi_id" placeholder="yourname@bank">
                </div>
                <div class="form-group" id="card-details-group">
                    <label for="card-number">Card Number:</label>
                    <input type="text" id="card-number" name="card_number" placeholder="Card Number">
                    <label for="card-holder">Card Holder Name:</label>
                    <input type="text" id="card-holder" name="card_holder" placeholder="John Doe">
                    <label for="exp-date">Expiration Date:</label>
                    <input type="text" id="exp-date" name="expiration_date" placeholder="MM/YY">
                    <label for="cvv">CVV:</label>
                    <input type="text" id="cvv" name="cvv" placeholder="123">
                </div>
                <button type="submit" class="checkout-button">Submit Payment</button>
            </form>
        </section>
  

    <footer>
        <!-- Footer content (e.g., contact information) -->
    </footer>

    <script src="checkout.js"></script>
</body>
</html>
