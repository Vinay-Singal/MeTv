<?php
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #007BFF;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        header h1 {
            font-size: 36px;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="radio"],
        
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .payment-mode {
            display: flex;
            align-items: center;
            
        }

        #upi-details,
        #card-details {
            display: none;
        }

        button[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Checkout</h1>
    </header>

    <main>
        <section class="checkout-section">
            <h2>Payment Information</h2>
            <form action="purchase.php" method="POST" id="checkout-form">
                <div class="form-group">
                    <label for="first-name">First Name:</label>
                    <input type="text" id="first-name" name="full_name" required>
                </div>
                
                <div class="form-group" style="display: none;">
                    <label for="email">Username:</label>
                    <input type="text" id="email" name="email_address" required>
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone_no" minlength="10" maxlength="10"  pattern="[0-9]+" required>
                </div>
                
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" required></textarea>
                </div>
                
                <!-- /.form-group -->

                <div class="form-group">
                    <label>Payment Mode:</label>
                    <div class="payment-mode">
                        <label for="upi">UPI</label>
                        <input type="radio" id="upi" name="pay_mode" value="upi" required>
                        <label for="cards">Credit/Debit Cards</label>
                        <input type="radio" id="cards" name="pay_mode" value="cards">
                    </div>
                </div>
                
                <div class="form-group" id="upi-details">
                    <label for="upi-id">UPI ID:</label>
                    <input type="text" id="upi-id" name="upi_id" required>
                </div>
                
                <div class="form-group" id="card-details">
                    <label for="card-number">Card Number:</label>
                    <input type="tel" minlength="16" maxlength="16" id="card-number" name="card_number" pattern="[0-9]+" required>
                    <label for="card-holder">Card Holder Name:</label>
                    <input type="text" id="card-holder" name="card_holder" required>
                    <label for="exp-date">Expiration Date:</label>
                    <input type="tel" id="exp-date" name="expiration_date" placeholder="MM/YY" pattern="[0-9]{2}/[0-9]{2}" required>
                    <label for="cvv">CVV:</label>
                    <input type="tel" id="cvv" name="cvv" pattern="[0-9]+" required>
                </div>
                
                <button type="submit" class="checkout-button" name="purchase">Submit Payment</button>
            </form>
        </section>
    </main>

    <script>
        // JavaScript code to handle payment mode selection and field visibility
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('checkout-form');
            const upiDetails = document.getElementById('upi-details');
            const cardDetails = document.getElementById('card-details');
            const upiRadio = document.getElementById('upi');
            const cardRadio = document.getElementById('cards');
            const emailInput = document.getElementById('email');

            // Automatically populate email with the username of the logged-in user
            const username = "<?php echo $_SESSION['username']; ?>";
            emailInput.value = username;

            upiRadio.addEventListener('change', function () {
                if (this.checked) {
                    upiDetails.style.display = 'block';
                    cardDetails.style.display = 'none';
                    document.getElementById('upi-id').required = true;
                    document.getElementById('card-number').removeAttribute('required');
                    document.getElementById('card-holder').removeAttribute('required');
                    document.getElementById('exp-date').removeAttribute('required');
                    document.getElementById('cvv').removeAttribute('required');
                }
            });

            cardRadio.addEventListener('change', function () {
                if (this.checked) {
                    cardDetails.style.display = 'block';
                    upiDetails.style.display = 'none';
                    document.getElementById('card-number').required = true;
                    document.getElementById('card-holder').required = true;
                    document.getElementById('exp-date').required = true;
                    document.getElementById('cvv').required = true;
                    document.getElementById('upi-id').removeAttribute('required');
                }
            });
        });
    </script>
</body>
</html>

