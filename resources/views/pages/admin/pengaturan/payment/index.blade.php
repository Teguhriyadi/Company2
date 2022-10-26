<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-5Egc5qExRc__evUx"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
</head>

<body>
    <button id="pay-button">Pay!</button>

    <form id="submit" action="" method="POST">
        @csrf
        <input type="hidden" name="json" id="json_callback">
    </form>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snap_token }}', {
                onSuccess: function(result)
                {
                    console.log(result);
                    send_response_callback(result);
                },
                onPending: function(result)
                {
                    console.log(result);
                    send_response_callback(result);
                },
                onError: function(result)
                {
                    console.log(result);
                    send_response_callback(result);
                },
                onClose: function()
                {
                    alert('you closed the popup without finishing the payment');
                    send_response_callback(result);
                }
            })
        });

        function send_response_callback(result) {
            document.getElementById("json_callback").value = JSON.stringify(result);
            $("#submit").submit();
        }

    </script>
</body>
</html>
