<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for snap popup:
// https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview

namespace Midtrans;

use mysqli;

require_once dirname(__FILE__) . '/../../Midtrans.php';
// Set Your server key
// can find in Merchant Portal -> Settings -> Access keys
Config::$serverKey = 'SB-Mid-server-orfRtXqNjQsy9HM99j2T8U9m';
Config::$clientKey = 'SB-Mid-client-Y0vZ9SZyjkhPvQep';

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

// Uncomment for production environment
// Config::$isProduction = true;
Config::$isSanitized = Config::$is3ds = true;

// Required
    include "../../../DBconnection.php";
    $order_id = $_GET['order_id'];

// Query untuk menampilkan data
$query = "SELECT * FROM tbl_order_details WHERE order_id='".$order_id."'";
$sql = mysqli_query($conn,$query);
$data = mysqli_fetch_array($sql);

$product_name = $data['product_name'];
$product_price = $data['product_price'];
$product_quantity = $data['product_quantity'];
$date = $data['date'];




$transaction_details = array(
    'order_id' => $order_id,
    'gross_amount' => $product_price,
);
// Optional
$item_details = array(
    array(
        'id' => 'id',
        'price' => $product_price,
        'quantity' => $product_quantity,
        'name'=> 'Order By Supress'
    ),
);
// Optional

// Fill transaction details
$transaction = array(
    'transaction_details' => $transaction_details,
    'item_details' => $item_details,
);

$snap_token = '';
try {
    $snap_token = Snap::getSnapToken($transaction);
}
catch (\Exception $e) {
    echo $e->getMessage();
}
// echo "snapToken = ".$snap_token;

function printExampleWarningMessage() {
    if (strpos(Config::$serverKey, 'your ') != false ) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'SB-Mid-server-orfRtXqNjQsy9HM99j2T8U9m\';');
        die();
    } 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="shortcut icon" href="assets/logo.png" type="image/x-icon">
    <!-- Internal CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            text-align: center;
        }

        #pay-button {
            margin-top: 20px;
        }

        .payment-message {
            font-size: 18px;
            font-weight: bold;
            color: green;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <button id="pay-button" class="btn btn-primary">Pay!</button>
    <!-- TODO: Remove ".sandbox" from script src URL for the production environment. Also, input your client key in "data-client-key" -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey; ?>"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function(){
            // SnapToken acquired from the previous step
            snap.pay('<?php echo $snap_token ?>');
        };
    </script>
    <div class="payment-message">Selesaikan Pembayaran Sekarang</div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
