<html>
<body onload="document.forms['payhereForm'].submit();">
    <form method="POST" action="https://sandbox.payhere.lk/pay/checkout" name="payhereForm">
        <input type="hidden" name="merchant_id" value="{{ $merchant_id }}">
        <input type="hidden" name="return_url" value="{{ $return_url }}">
        <input type="hidden" name="cancel_url" value="{{ $cancel_url }}">
        <input type="hidden" name="notify_url" value="{{ $notify_url }}">
        <input type="hidden" name="order_id" value="{{ $order_id }}">
        <input type="hidden" name="items" value="{{ $items }}">
        <input type="hidden" name="currency" value="{{ $currency }}">
        <input type="hidden" name="amount" value="{{ $amount }}">
        <input type="hidden" name="first_name" value="{{ $customer['first_name'] }}">
        <input type="hidden" name="last_name" value="{{ $customer['last_name'] }}">
        <input type="hidden" name="email" value="{{ $customer['email'] }}">
        <input type="hidden" name="phone" value="{{ $customer['phone'] }}">
        <input type="hidden" name="address" value="{{ $customer['address'] }}">
        <input type="hidden" name="city" value="{{ $customer['city'] }}">
        <input type="hidden" name="country" value="{{ $customer['country'] }}">
        <input type="hidden" name="hash" value="{{ $hash }}">
    </form>
</body>
</html>
