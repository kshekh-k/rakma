 <main class="">
     <!-- Hero Section -->
     <section class="relative">
         <div class="h-56 md:h-60 bg-gray-300"><img
                 src="<?php echo base_url('assets/site') ?>/src/dist/img/header-bg.png" alt=""
                 class="opacity-80 object-cover max-w-none h-full w-full"></div>
         <div class="z-10 absolute inset-0 py-10 md:py-20 flex items-center">
             <div class="max-w-screen-xl w-full px-4 xl:px-12 mx-auto flex flex-col items-center text-center">
                 <h1 class="text-2xl sm:text-4xl xl:text-5xl uppercase text-secondary font-bold tracking-wide">
                     Membership</h1>
                 <p class="text-primary font-medium pt-2 capitalize"><span class="uppercase">RAKMA</span> (Raj. Adhikari
                     Karmachari Minority Association)</p>
                 <!-- Breadcrumb -->
                 <p class="flex gap-2 pt-2 font-medium text-gray-500"><a href="javascript:void(0)"
                         class="hover:text-secondary">Home</a>/<span class="text-blues">Membership upgrade</span></p>
             </div>
         </div>
     </section>
     <section class="relative py-5 xl:py-16">
         <div class="max-w-screen-xl px-4 xl:px-12 mx-auto flex flex-col items-center text-center">
             <div class="xl:shadow-4 w-full xl:p-5 ring-1 ring-gray-300 xl:ring-0">
                 <div class="bg-gray-50 p-3 xs:p-8 lg:px-10">
                     <!-- Posting Place Fields-->
                     <h3 class="text-blues text-xl xs:text-2xl font-semibold uppercase">Upgrade Membership</h3>

                     <form id="checknumber__form" action="<?php echo base_url('/page/checkmembershipalredy'); ?>"
                         method="POST">
                         <div class="grid sm:grid-cols-2 gap-5 pt-3 xs:pt-7 max-w-xl mx-auto">
                             <div class="relative text-left">
                                 <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">Registered Mobile
                                     No.<em class="text-secondary">*</em></label>
                                 <input type="text" name="mobile" placeholder="Enter Registered Mobile No."
                                     class="ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-primary focus:placeholder-primary focus:text-primary w-full focus:ring-0">
                             </div>
                             <div class="relative   text-left flex items-end justify-start">
                                 <button type="submit" id="checknumber__btn"
                                     class="rounded flex justify-center items-center font-medium text-white tracking-wider uppercase bg-blues hover:bg-secondary shadow py-3 w-56">Check
                                     Mobile No.</button>
                             </div>
                         </div>
                     </form>
                     <div id="alert_message"></div>
                     <div id="upgraded__result"></div>
                     <div id="payment_alert_message"></div>

                 </div>
                 <!-- Posting Place Fields-->
                 <!-- 
                 When want to close membership upgradation show this message
                 <div class="bg-gray-50 p-3 xs:p-8 lg:px-10">

                     <h3 class="text-blues text-xl xs:text-2xl font-semibold uppercase">The membership Upgradation has
                         been closed.</h3>
                     <h3 class="text-blues text-xl xs:text-2xl font-semibold uppercase pt-2">सदस्यता उन्नयन बंद हो चुका
                         है।</h3>
                 </div> -->
             </div>
         </div>

     </section>

 </main>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
 <script type="text/javascript">
$("#checknumber__form").submit(function() {
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: $('#checknumber__form').attr('action'),
        data: $('#checknumber__form').serialize(),
        dataType: "json",
        success: function(data) {
            $('#alert_message').html(data.data);
            $('#upgraded__result').empty();
            $('#payment_alert_message').empty();
        }
    });
});
$('body').on('click', '#confirm_check', function() {
    var checkconfirm = $('#confirm_check').prop('checked');
    if (checkconfirm == true) {
        var id = $('#user__id').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('/page/upgrademembership') ?>',
            data: {
                userid: id
            },
            dataType: "json",
            success: function(data) {
                $('#upgraded__result').html(data.data);
            }
        });
    } else {
        $('#upgraded__result').empty();
    }
});
$('body').on('click', '#payment_btn', function() {
    event.preventDefault();
    if ($('input[name="membership"]:checked').prop('checked') == true) {

        var membershipid = $('input[name="membership"]:checked').data('id');


        payment();
        // lifeTimeMembership(membershipid);


    } else {
        alert('Please Choose the membership');
    }
});

function lifeTimeMembership(Membership = "") {

    var userid = $('#user__id').val();
    $.ajax({
        type: "POST",
        url: '<?php echo base_url('/page/lifeTimeMembership') ?>',
        data: {
            userid: userid,
            membership_id: Membership,

        },
        dataType: "json",
        success: function(data) {
            if (data.success == true) {
                alert(data.msg);
                location.reload();
            } else {
                payment();
            }


        }
    });
}



function payment() {
    var price = $('input[name="membership"]:checked').val();
    var userid = $('#user__id').val();
    var mobile = $('#mobile').val();
    var name = $('#username').val();
    var id = $('input[name="membership"]:checked').data('id');
    var options = {
        "key": "<?php echo get_settings('key'); ?>",
        "amount": price * 100,
        "currency": "INR",
        "name": "RAKMA",
        "description": "Raj. Adhikari Karamchari Minority Association",
        "image": "<?php echo base_url('/uploads/') ?><?php echo get_settings('logo'); ?>",
        "handler": function(response) {
            var payment_id = response.razorpay_payment_id;
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('/page/updatemembership') ?>',
                data: {
                    price: price,
                    userid: userid,
                    id: id,
                    payment_id: payment_id
                },
                dataType: "json",
                success: function(data) {
                    $('#upgraded__result').empty();
                    $('#payment_alert_message').html(data.data);
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
    var rzp1 = new Razorpay(options);
    rzp1.on('payment.failed', function(response) {
        $('#payment_alert_message').html(
            '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert"> You have failed the payment please try again </div>'
        );
    });
    rzp1.open();
}
 </script>