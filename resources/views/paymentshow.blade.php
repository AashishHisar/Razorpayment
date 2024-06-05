<!-- resources/views/payment/process.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Payment</title>
    <!-- Include Razorpay Checkout script -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <script>
        var options = {
            "key": "rzp_test_zpQBKFYBZzqrDS",
            "amount": "{{ $order->amount }}",
            "currency": "INR",
            "name": "Aashish Test Company",
            "description": "Payment",
            "image": "https://example.com/your_logo.pnghttps://images.unsplash.com/photo-1575936123452-b67c3203c357?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            "order_id": '{{ $order->id }}',
            "handler": function (response){
                // Handle the response from Razorpay
                console.log(response);
            },
            "prefill": {
                "name": "Aashish Kumar",
                "email": "aashishvermaisonline@gmail.com",
                "contact": "9896595913"
            },
            "notes": {
                "address": "Fatehabad,Hisar"
            },
            "theme": {
                "color": "#F37254"
            }
        };
        var rzp = new Razorpay(options);
        rzp.on('payment.failed', function (response){
            // Handle payment failure
            console.log(response.error.code);
            console.log(response.error.description);
            console.log(response.error.source);
            console.log(response.error.step);
            console.log(response.error.reason);
            console.log(response.error.metadata.order_id);
            console.log(response.error.metadata.payment_id);
        });
        document.addEventListener('DOMContentLoaded', function () {
            rzp.open();
        });
    </script>
</body>
</html>
