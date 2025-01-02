// JavaScript code to handle payment mode selection and field visibility
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('checkout-form');
    const upiDetails = document.getElementById('upi-details');
    const cardDetails = document.getElementById('card-details');
    const upiRadio = document.getElementById('upi');
    const cardRadio = document.getElementById('cards');

    // form.addEventListener('submit', function (e) {
    //     e.preventDefault();
    //     // Handle form submission (e.g., validate and send data to the server)
    //     alert('Payment submitted successfully!');
    // });

    upiRadio.addEventListener('change', function () {
        if (this.checked) {
            upiDetails.style.display = 'block';
            cardDetails.style.display = 'none';
        }
    });

    cardRadio.addEventListener('change', function () {
        if (this.checked) {
            upiDetails.style.display = 'none';
            cardDetails.style.display = 'block';
        }
    });
});
