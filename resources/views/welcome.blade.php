<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... Your head content ... -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1>Payment Form</h1>
                <form action="{{ route('payment.process') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="amount">Amount:</label>
                        <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter amount">
                    </div>
                    <button type="submit" class="btn btn-primary">Pay Now</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
