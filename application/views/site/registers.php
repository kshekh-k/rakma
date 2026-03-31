    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<main class="">
   <!-- Hero Section -->
   <section class="relative">
      <div class="h-56 md:h-60 bg-gray-300"><img src="<?php echo base_url('/assets/site/') ?>/src/dist/img/header-bg.png" alt="" class="opacity-80 object-cover max-w-none h-full w-full"></div>
      <div class="z-10 absolute inset-0 py-10 md:py-20 flex items-center">
         <div class="max-w-screen-xl w-full px-4 xl:px-12 mx-auto flex flex-col items-center text-center">
            <h1 class="text-2xl sm:text-4xl xl:text-5xl uppercase text-secondary font-bold tracking-wide">Membership</h1>
            <p class="text-primary font-medium pt-2 capitalize"><span class="uppercase">RAKMA</span> (Raj. Adhikari Karmachari Minority Association)</p>
            <!-- Breadcrumb -->
            <p class="flex gap-2 pt-2 font-medium text-gray-500"><a href="javascript:void(0)" class="hover:text-secondary">Home</a>/<span class="text-blues">Membership</span></p>
         </div>
      </div>
   </section>
   <section class="relative py-5 xl:py-16">
      <div class="max-w-screen-xl px-4 xl:px-12 mx-auto flex flex-col items-center text-center">
         <div class="xl:shadow-4 w-full xl:p-5 ring-1 ring-gray-300 xl:ring-0">
            <div class="bg-gray-100 p-3 xs:p-8  lg:px-10">
               <h3 class="text-blues text-xl xs:text-2xl font-semibold uppercase">Reference by</h3>
               <form action="<?php echo base_url('/registers/checkref') ?>" method="post" id="refr__form">
                  <div class="grid sm:grid-cols-2 gap-5 pt-3 xs:pt-7 max-w-xl mx-auto">
                     <div class="relative text-left">
                        <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">Mobile No.<em class="text-secondary">*</em></label>
                        <input type="text"  placeholder="Enter Ref. Mobile No." id="ref_mobile" name="ref_mobile" class="check__number_format ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-primary focus:placeholder-primary focus:text-primary w-full focus:ring-0">
                     </div>
                     <div class="relative text-left flex items-end justify-start">
                        <button type="submit" class="rounded flex justify-center items-center font-medium text-white tracking-wider uppercase bg-blues hover:bg-secondary shadow py-3 w-56">Check Reference</button>
                     </div>
                  </div>
               </form>
               <!-- Existing Member -->
               <p class="py-3 border-t border-gray-200 mt-3 text-gray-600 font-medium  text-sm sm:text-base">Are you existing member and want upgrade your membership. <a href="<?php echo base_url('/page/membershipupgrade') ?>" class="text-blue-600 hover:text-secondary undeline block xs:inline-block">Upgrade Now</a></p>
               <div id="ref_alert"></div>
            </div>
            <input type="hidden" name="ref_name_hidden" id="ref_name_hidden">
            <input type="hidden" name="ref_mobile_hidden" id="ref_mobile_hidden">
            <div id="menbership__from">
            </div>
            <div id="payment_alert"></div>
         </div>
      </div>
   </section>
</main>


<script type="text/javascript">
$("#refr__form").submit(function() {
    event.preventDefault();
    var ref_mobile = $('#ref_mobile').val();
    $('#menbership__from').empty();
    $('#ref_alert').empty();
    $('#ref_mobile_hidden').val('');
    var number = $('.check__number_format').val();
    error = '';
    if(number == '') {
        error += 'Please enter mobile number';
    } else {
        if(!$.isNumeric(number)) {
            error += 'Please enter mobile number in number format';
        } else {
            if(number.length != 10) {
                error += 'Please enter 10 digit mobile number';
            }
        }
    }
    if(error == '') {
        $.ajax({
            type: "POST",
            url: $('#refr__form').attr('action'),
            data: $('#refr__form').serialize(),
            dataType: "json",
            success: function(data) {
                if(data.status == true) {
                    $('#menbership__from').html(data.data);
                    $('#ref_alert').html(data.msg);
                    $('#ref_mobile_hidden').val(ref_mobile);
                } else {
                    $('#ref_alert').html(data.msg);
                }
            }
        });
    } else {
        alert(error);
    }
});
</script>
