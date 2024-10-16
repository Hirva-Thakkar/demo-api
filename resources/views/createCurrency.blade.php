<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Form</title>
    <!-- Add Bootstrap CSS for styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Currency Form (Default Currency Is Dollar)</h2>
        <form id="currencyForm" onsubmit="event.preventDefault(); submitForm();"> <!-- Prevent form submission -->
            <div class="form-group">
                <label for="currency">Select Currency:</label>
                <select name="currency" id="currency" class="form-control">
                    @foreach ($currency as $key => $value)
                        <option value="{{ $key }}">{{ $key . ' (' . $value . ')' }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="price">Enter Price In Dollar:</label>
                <input type="number" name="price" id="price" class="form-control" placeholder="Enter price"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button> <!-- Use type="submit" -->
        </form>

        <br>
        <br>
        <strong>Exchange rate:</strong>
        <div id="msg" class="alert-message mt-3">
        </div>
        <br>

        <strong class="mt-3">Exchange price:</strong>
        <div id="rates" class="rate-card mt-3">
        </div>

        <style>
            /* Custom styling for message and rates display */
            .alert-message {
                padding: 1rem;
                border-radius: 0.5rem;
                /* Light green for success messages */
                color: #155724;
                /* Dark green for text */
                border: 1px solid #007bff;
                /* Border color */
            }

            .rate-card {
                border: 1px solid #007bff;
                /* Blue border */
                border-radius: 0.5rem;
                padding: 1rem;
                background-color: #f8f9fa;
                /* Light gray background */
                color: #343a40;
                /* Dark text color */
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                /* Subtle shadow for depth */
            }
        </style>

    </div>

    <!-- Add jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function submitForm() {
            // Get the values from the form fields
            var currency = $('#currency').val();
            var price = $('#price').val();

            // Prepare the data to send
            var data = {
                _token: '{{ csrf_token() }}', // CSRF token for Laravel
                currency: currency,
                price: price
            };

            $.ajax({
                type: 'POST',
                url: '/currencypost', // Change to your actual route
                data: data, // Send the data object
                success: function(response) {
                    console.log(response);
                    $("#msg").html(response.exchange_rate);
                    $("#rates").html(response.rates); // Display the success message
                },
                error: function(xhr) {
                    // Handle error response
                    console.error(xhr.responseText);
                    $("#msg").html("An error occurred while processing your request.");
                }
            });
        }
    </script>
</body>

</html>
