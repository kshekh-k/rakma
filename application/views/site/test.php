<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<button class="test">PAy 1</button>

<script type="text/javascript">

	$(document).ready(function() {
    $('body').on('click', '.test', function () {
           payment()
    });
  
});
function payment() {
	var options = {
        "key": "<?php echo get_settings('key'); ?>", // Enter the Key ID generated from the Dashboard
        // "key": "rzp_test_jXPlngy52RU2Ty", 
        // "amount": 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "amount": 100,
        "currency": "INR",
        "name": "RAKMA",
        "description": "Raj. Adhikari Karamchari Minority Association",
        "image": "<?php echo base_url('/uploads/') ?><?php echo get_settings('logo'); ?>",
        "id": "31", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
        "handler": function(response) {
            var payment_id = response.razorpay_payment_id;
            console.log(response);
          	test(payment_id);
        },
        "prefill": {
            "name": 'Ravi Kumawat',
            "email": '<?php echo get_settings('rzp_email'); ?>',
            "contact": '9887896832'
        },
        "theme": {
            "color": "#016c38"
        }
    };
    var rzp1 = new Razorpay(options);
    rzp1.on('payment.failed', function(response) {
        var payment_id = response.error.metadata.payment_id;
    });
    rzp1.open();
}



function test(payment_id)
{
	  $.ajax({
                type: "POST",
                url: '<?php echo base_url('/home/cp') ?>',
                data: {
                	payment_id: payment_id,
                   
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                }
            });
}
</script>