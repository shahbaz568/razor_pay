<?php

// require_once 'configBD.php';
require_once 'razorpay-php/Razorpay.php';
use Razorpay\Api\Api;


$api_key = 'rzp_test_9rShfUvOQRJUNr';
$api_secret = 'Hj6fZiR5BOSrfUn813cG45q3';

$api = new Api($api_key, $api_secret);

$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$money = $_POST['money'];



$order = $api->order->create(array(
  'receipt' => '123',
  'amount' => $money,
  'payment_capture' => 1,
  'currency' => 'INR',
  )
);
?>

<meta name="viewport" content="width=device-width">

<form action="success.php" method="POST">

  
      <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="<?php echo $api_key; ?>"
        data-amount="<?php echo $order->amount; ?>"
        data-buttontext="Pay with Razorpay"
        data-name="shahbaz payment"
        data-description="Test Txn with RazorPay"
        data-image="https://your-awesome-site.com/your_logo.jpg"
        data-prefill.name="<?php echo $name; ?>"
        data-prefill.email="<?php echo $email; ?>"
        data-prefill.contact = "<?php echo $number; ?>"
        data-theme.color="#F37254"
    ></script>
    <input type="hidden" value="Hidden Element" name="hidden">
    <input type="hidden" value="<?php echo $name; ?>" name="name">
    <input type="hidden" value="<?php echo $email; ?>" name="email">
    <input type="hidden" value="<?php echo $number; ?>" name="number">
    <input type="hidden" value="<?php echo ($money/100); ?>" name="money">










<!-- 	<script
		src = "https://checkout.razorpay.com/v1/checkout.js"
		data-key = "<?php echo $api_key; ?>"
		data-amount = "<?php echo $order->amount; ?>"
		data-currency = "INR"
		data-order_id = "<?php echo $order->id; ?>"
		data-buttontext = "pay with razorpay"
		data-name = "Myinboxhub"
		data-description = "For donation"
		data-image = "<?php echo 'https://myinboxhub.co.in/data/logo/logo.png';?>"
		data-prefill.name = "<?php echo $name; ?>"
		data-prefill.email = "<?php echo $email; ?>"
		data-prefill.contact = "<?php echo $number; ?>"
		data-theme.color = "#f0a43c"


	></script>
	<input type="hidden" name="hidden" custom="Hidden Element"> -->
</form>