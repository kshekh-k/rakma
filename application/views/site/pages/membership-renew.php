<main class="">
    <!-- Hero Section -->
    <section class="relative">
        <div class="h-56 md:h-60 bg-gray-300">
            <img src="<?php echo base_url('assets/site') ?>/src/dist/img/header-bg.png" alt="RAKMA" class="opacity-80 object-cover max-w-none h-full w-full">
        </div>
        <div class="z-10 absolute inset-0 py-10 md:py-20 flex items-center">
            <div class="max-w-screen-xl w-full px-4 xl:px-12 mx-auto flex flex-col items-center text-center">
                <h1 class="text-2xl sm:text-4xl xl:text-5xl uppercase text-secondary font-bold tracking-wide">
                    Membership Renewal
                </h1>
                <p class="text-primary font-medium pt-2 capitalize">
                    <span class="uppercase">RAKMA</span> (Raj. Adhikari Karmachari Minority Association)
                </p>
                <!-- Breadcrumb -->
                <p class="flex gap-2 pt-2 font-medium text-gray-500">
                    <a href="<?php echo base_url(); ?>" class="hover:text-secondary">Home</a>/<span class="text-blues">Membership Renew</span>
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="relative py-5 xl:py-16">
        <div class="max-w-screen-xl px-4 xl:px-12 mx-auto flex flex-col items-center text-center">
            <div class="xl:shadow-4 w-full xl:p-5 ring-1 ring-gray-300 xl:ring-0">
                <div class="bg-gray-50 p-3 xs:p-8 lg:px-10">
                    <h3 class="text-blues text-xl xs:text-2xl font-semibold uppercase">Renew Membership</h3>
                    <p class="text-gray-500 text-sm mt-1 max-w-md mx-auto">
                        Enter your registered mobile number or membership ID to check your membership status and renew if expired.
                    </p>

                    <form id="checknumber__form" action="<?php echo base_url('/page/checkmembershiprenew'); ?>" method="POST" class="pt-4 xs:pt-7">
                    <div class=" max-w-xl mx-auto">     
                    <label for="mobile_input" class="text-gray-600 font-semibold pb-2 px-2 block text-left">
                                    Registered Mobile No. / Member ID <em class="text-secondary">*</em>
                                </label>
                    <div class="grid sm:grid-cols-2 gap-5 ">
                            <div class="relative text-left">
                               
                                <input type="text" id="mobile_input" name="mobile" placeholder="Enter Registered Mobile No. or Member ID" required
                                    class="ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-primary focus:placeholder-primary focus:text-primary w-full focus:ring-0">
                            </div>
                            <div class="relative text-left flex items-end justify-start">
                                <button type="submit" id="checknumber__btn"
                                    class="rounded flex justify-center items-center font-medium text-white tracking-wider uppercase bg-blues hover:bg-secondary shadow py-3 w-56 transition duration-150">
                                    Check Status
                                </button>
                            </div>
                        </div>
                    </form>

                    <div id="alert_message"></div>
                    <div id="renew__result"></div>
                    <div id="payment_alert_message"></div>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript">
$("#checknumber__form").submit(function(e) {
    e.preventDefault();
    $('#alert_message').html('<div class="p-4 text-center text-gray-500 font-medium my-2"><i class="fa fa-spinner fa-spin mr-2"></i> Checking membership details...</div>');
    $('#renew__result').empty();
    $('#payment_alert_message').empty();

    $.ajax({
        type: "POST",
        url: $('#checknumber__form').attr('action'),
        data: $('#checknumber__form').serialize(),
        dataType: "json",
        success: function(data) {
            $('#alert_message').html(data.data);
            $('#renew__result').empty();
            $('#payment_alert_message').empty();
        },
        error: function(xhr, status, error) {
            console.error("Check membership error:", error);
            $('#alert_message').html('<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert">An error occurred while fetching details. Please check connection and try again.</div>');
        }
    });
});

$('body').on('click', '#confirm_renew_check', function() {
    var checkconfirm = $('#confirm_renew_check').prop('checked');
    if (checkconfirm === true) {
        var id = $('#user__id').val();
        $('#renew__result').html('<div class="p-4 text-center text-gray-500 font-medium my-2"><i class="fa fa-spinner fa-spin mr-2"></i> Loading current membership option...</div>');
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('/page/renewmembership'); ?>',
            data: {
                userid: id
            },
            dataType: "json",
            success: function(data) {
                $('#renew__result').html(data.data);
            },
            error: function(xhr, status, error) {
                console.error("Load plan error:", error);
                $('#renew__result').html('<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert">Could not load renewal plan. Please try again.</div>');
            }
        });
    } else {
        $('#renew__result').empty();
    }
});

$('body').on('click', '#renew_payment_btn', function(e) {
    e.preventDefault();
    renewPayment();
});

function renewPayment() {
    var price = $('#renew_membership_radio').val();
    var id = $('#renew_membership_radio').data('id');
    var userid = $('#user__id').val();
    var mobile = $('#mobile').val();
    var name = $('#username').val();

    if (!price || !id) {
        alert('Membership plan details are missing. Please refresh and try again.');
        return;
    }

    var options = {
        "key": "<?php echo get_settings('key'); ?>",
        "amount": price * 100,
        "currency": "INR",
        "name": "RAKMA",
        "description": "Membership Renewal - Raj. Adhikari Karmachari Minority Association",
        "image": "<?php echo base_url('/uploads/') ?><?php echo get_settings('logo'); ?>",
        "handler": function(response) {
            var payment_id = response.razorpay_payment_id;
            $('#payment_alert_message').html('<div class="p-4 text-center text-blue-600 font-semibold my-2"><i class="fa fa-spinner fa-spin mr-2"></i> Processing renewal... Please do not close or refresh this page.</div>');
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('/page/updaterenewmembership'); ?>',
                data: {
                    price: price,
                    userid: userid,
                    id: id,
                    payment_id: payment_id
                },
                dataType: "json",
                success: function(data) {
                    $('#renew__result').empty();
                    $('#payment_alert_message').html(data.data);
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error", status, error);
                    $('#payment_alert_message').html(
                        '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert">' +
                        'Payment was successful (Payment ID: ' + payment_id + ') but updating membership in system failed. Please contact admin with this Payment ID.' +
                        '</div>'
                    );
                },
                complete: function() {
                    console.log("Membership renewal request completed.");
                }
            });
        },
        "prefill": {
            "name": name,
            "email": '<?php echo get_settings('rzp_email'); ?>',
            "contact": mobile
        },
        "theme": {
            "color": "#016c38"
        }
    };

    var rzp = new Razorpay(options);
    rzp.on('payment.failed', function(response) {
        $('#payment_alert_message').html(
            '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert">Payment failed or cancelled. Please try again.</div>'
        );
    });
    rzp.open();
}
</script>
