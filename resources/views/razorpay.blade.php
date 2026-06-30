<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
var options = {
    key: "{{ env('RAZORPAY_KEY') }}",
    amount: "{{ $razorpayOrder['amount'] }}",
    currency: "INR",
    name: "Bivamart",
    description: "Order Payment",
    order_id: "{{ $razorpayOrder['id'] }}",

    callback_url: "{{ route('razorpay.success', ['order_id' => $orderData->order_id]) }}"

};

var rzp = new Razorpay(options);

window.onload = function () {
    rzp.open();
};
</script>