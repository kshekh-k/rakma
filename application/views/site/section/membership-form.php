<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/site/datepicker/datepicker.css') ?>">
 
<script src="<?php echo base_url('/assets/site/datepicker/datepicker.js') ?>"></script>
 

<form id="register__form" action="<?php echo base_url('/register/save'); ?>" method="post" enctype='multipart/form-data'>
    <!-- General Information -->
    <div class="bg-gray-50 p-3 xs:p-8 lg:py-20 lg:px-10">
 


        <!-- Photo -->
        <p for="" class="text-gray-600 font-medium pt-3">Profile Picture</p>
        <div class="ring-1 ring-gray-300 border-4 border-white w-32 h-32 overflow-hidden mx-auto photo">
            <img id="previewImg" src="<?php echo base_url('/assets/site/') ?>/src/dist/img/placeholder-photo.png" alt="" class="" style="height: 100%;">
        </div>
      <div class="upload-file">
        <input type="file" name="image" onchange="previewFile(this);" accept="image/png, image/gif, image/jpeg" placeholder="Enter First Name" class="ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-primary focus:placeholder-primary focus:text-primary w-full h-full focus:ring-0" height="100%">
        </div>

        <p class="text-sm text-center italic leading-loose">Please use square photo(Ratio 1:1) <span class="block not-italic">कृपया वर्गाकार फोटो का उपयोग करे (अनुपात 1:1)</span></p>
        
        <div class="pt-7">
            <!-- General Information Fields-->
            <h3 class="text-blues text-xl xs:text-2xl font-semibold uppercase">General Information</h3>
            <div class="grid sm:grid-cols-8 lg:grid-cols-12 gap-5 lg:gap-10 pt-3 xs:pt-7">
                <div class="relative sm:col-span-4 text-left">
                    <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">First Name<em class="text-secondary">*</em>
                    </label>
                    <input type="text" name="first_name" id="first_name" placeholder="Enter First Name" class="ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-primary focus:placeholder-primary focus:text-primary w-full focus:ring-0">
                </div>
                <div class="relative sm:col-span-4 text-left">
                    <label for="" name="middle_name" class="text-gray-600 font-semibold pb-1 px-2 block">Middle Name</label>
                    <input type="text" placeholder="Enter Middle Name" name="middle_name" class="ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-primary focus:placeholder-primary focus:text-primary w-full focus:ring-0">
                </div>
                <div class="relative sm:col-span-4 text-left">
                    <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">Last Name</label>
                    <input type="text" name="last_name" placeholder="Enter Last Name" class="ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-primary focus:placeholder-primary focus:text-primary w-full focus:ring-0">
                </div>
                <div class="relative sm:col-span-4 text-left">
                    <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">Father/Husband Name<em class="text-secondary">*</em>
                    </label>
                    <input type="text" name="father_husband_name" id="father_husband_name" placeholder="Enter Father/Husband Name" class="ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-primary focus:placeholder-primary focus:text-primary w-full focus:ring-0">
                </div>
                <div class="relative sm:col-span-4 text-left">
                    <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">Mobile No.<em class="text-secondary">*</em>
                    </label>
                    <input type="tel" name="mobile" id="mobile" placeholder="Enter Mobile No." class="ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-primary focus:placeholder-primary focus:text-primary w-full focus:ring-0">
                </div>
                <div class="relative sm:col-span-4 text-left">
                    <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">Email</em>
                    </label>
                    <input type="text" name="email" id="email" placeholder="Enter Email" value="rakmaraj@gmail.com" class="ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-primary focus:placeholder-primary focus:text-primary w-full focus:ring-0">
                </div>
                <div class="relative sm:col-span-4 text-left">
                    <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">Date of Birth<em class="text-secondary hidden">*</em>
                    </label>
<div class="rounded bg-white relative">
                    <input type="text" autocomplete='off' data-toggle="datepicker" name="dob" id="dob" placeholder="Enter Date of Birth" class="date-picker ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-primary focus:placeholder-primary focus:text-primary w-full focus:ring-0 relative" style="z-index:999; background-color:rgba(0,0,0,0);"> <span class="absolute bottom-4 right-3">
        <svg viewBox="0 0 24 24" class="w-5 text-gray-400" fill="currentColor"><path d="M19,2H18V1a1,1,0,0,0-2,0V2H8V1A1,1,0,0,0,6,1V2H5A5.006,5.006,0,0,0,0,7V19a5.006,5.006,0,0,0,5,5H19a5.006,5.006,0,0,0,5-5V7A5.006,5.006,0,0,0,19,2ZM2,7A3,3,0,0,1,5,4H19a3,3,0,0,1,3,3V8H2ZM19,22H5a3,3,0,0,1-3-3V10H22v9A3,3,0,0,1,19,22Z"/><circle cx="12" cy="15" r="1.5"/><circle cx="7" cy="15" r="1.5"/><circle cx="17" cy="15" r="1.5"/></svg>

    </span>
                </div>
                </div>
                <div class="relative sm:col-span-4 text-left">
                    <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">Marital Status</label>
                    <div class="flex justify-start items-center space-x-10 pt-3">
                        <label class="flex items-center space-x-2 font-medium text-base text-gray-600">
                            <input type="radio" name="married_status" value="Single" class=" married_status form-radio h-6 w-6 shadow-inner border border-gray-300 text-blues focus:ring-blues"> <span class="whitespace-nowrap text-sm">Single</span>
                        </label>
                        <label class="flex items-center space-x-2 font-medium text-base text-gray-600">
                            <input type="radio" name="married_status" value="Married" class="married_status form-radio h-6 w-6 shadow-inner border border-gray-300 text-blues focus:ring-blues" checked> <span class="whitespace-nowrap text-sm">Merried</span>
                        </label>
                    </div>
                </div>
                <div class="relative sm:col-span-4 text-left">
                    <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">Gender</label>
                    <div class="flex justify-start items-center space-x-10 pt-3">
                        <label class="flex items-center space-x-2 font-medium text-base text-gray-600">
                            <input type="radio" name="gender" value="Male" checked class="gender form-radio h-6 w-6 shadow-inner border border-gray-300 text-blues focus:ring-blues"> <span class="whitespace-nowrap text-sm">Male</span>
                        </label>
                        <label class="flex items-center space-x-2 font-medium text-base text-gray-600">
                            <input type="radio" name="gender" value="Female" class="gender form-radio h-6 w-6 shadow-inner border border-gray-300 text-blues focus:ring-blues"> <span class="whitespace-nowrap text-sm">Female</span>
                        </label>
                    </div>
                </div>
                <div class="relative sm:col-span-8 lg:col-span-12 text-left">
                    <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">Home Address</label>
                    <input type="text" name="address" placeholder="Enter Home Address" class="ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-primary focus:placeholder-primary focus:text-primary w-full focus:ring-0">
                </div>
                <div class="relative sm:col-span-4 text-left">
                    <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">Tehsil/City</label>
                    <input type="text" name="city" placeholder="Enter Tehsil/City" class="ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-primary focus:placeholder-primary focus:text-primary w-full focus:ring-0">
                </div>
                <div class="relative sm:col-span-4 text-left">
                    <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">District<em class="text-secondary">*</em>
                    </label>
                  
                     <select class="ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-primary focus:placeholder-primary focus:text-primary w-full focus:ring-0" name="district">
                    <?php $districts=get_All_data(array( 'status'=>'1') , $table='district' , 'name ASC' ); if($districts) { foreach ($districts as $key => $district) { ?>
                    <option value="<?php echo $district['id']; ?>">
                        <?php echo ucfirst($district['name']); ?> 
                    </option> 
                    <?php } } ?>
                </select>
                </div>
                <div class="relative sm:col-span-4 text-left">
                    <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">State</label>
                    <select class="ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-primary focus:placeholder-primary focus:text-primary w-full focus:ring-0 bg-gray-200"  name="state">
                        <option value="1">Rajasthan</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!-- Post Information -->
    <div class="bg-gray-100 p-3 xs:p-8 lg:p-10 lg:pt-16 pt-5">
        <!-- Posting Place Fields-->
        <h3 class="text-blues text-xl xs:text-2xl font-semibold uppercase">Posting Place</h3>
        <div class="grid sm:grid-cols-8 lg:grid-cols-12 gap-5 lg:gap-10 pt-3 xs:pt-7">
            <div class="relative sm:col-span-4 text-left">
                <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">Post Name<em class="text-secondary">*</em>
                </label>
                <input type="text" name="post_name" id="post_name" placeholder="Enter Post Name" class="ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-primary focus:placeholder-primary focus:text-primary w-full focus:ring-0">
            </div>
                  <div class="relative sm:col-span-4 text-left">
                <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">Service Category</label>
                <select class="ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-primary focus:placeholder-primary focus:text-primary w-full focus:ring-0" name="service_category">
                    <?php $services=get_All_data(array( 'status'=>'1') , $table='service' , 'name ASC' ); if($services) { foreach ($services as $key => $service) { ?>
                    <option value="<?php echo $service['id']; ?>">
                        <?php echo ucfirst($service[ 'name']); ?> 
                    </option> 
                    <?php } } ?>
                </select>
            </div>
            <div class="relative sm:col-span-4 text-left">
                <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">Name of Department<em class="text-secondary">*</em>
                </label>
                <select class="ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-primary focus:placeholder-primary focus:text-primary w-full focus:ring-0" name="name_of_diparment" id="name_of_diparment">
                    <?php $department=get_All_data(array( 'status'=>'1') , $table='department' , 'name ASC' ); if($department) { foreach ($department as $key => $department) { ?>
                    <option value="<?php echo $department['id']; ?>">
                        <?php echo ucfirst($department[ 'name']); ?>
                    </option>
                    <?php } } ?>
                </select>
            </div>
      
            <div class="relative sm:col-span-4 text-left">
                <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">Post Type</label>
                <div class="flex flex-wrap justify-start items-center sm:space-x-10 space-x-10 space-x-3 pt-3">
                    <label class="flex items-center space-x-2 font-medium text-base text-gray-600">
                        <input type="radio" name="post_type" value="Gazetted" checked class="form-radio h-6 w-6 shadow-inner border border-gray-300 text-blues focus:ring-blues"> <span class="whitespace-nowrap text-sm">Gazetted</span>
                    </label>
                    <label class="flex items-center space-x-2 font-medium text-base text-gray-600">
                        <input type="radio" name="post_type" value="Non-Gazetted" class="form-radio h-6 w-6 shadow-inner border border-gray-300 text-blues focus:ring-blues"> <span class="whitespace-nowrap text-sm">Non-Gazetted</span>
                    </label>
                </div>
            </div>
            <div class="relative sm:col-span-8 text-left">
                <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">Service Status</label>
                <div class="flex flex-wrap justify-start items-center sm:space-x-10 space-x-10 space-y-5 xs:space-y-0 pt-3">
                    <label class="flex items-center space-x-2 font-medium text-base text-gray-600">
                        <input type="radio" name="service_status" value="In Service" checked class="form-radio h-6 w-6 shadow-inner border border-gray-300 text-blues focus:ring-blues"> <span class="whitespace-nowrap text-sm">In Service</span>
                    </label>
                    <label class="flex items-center space-x-2 font-medium text-base text-gray-600 w-full xs:w-auto">
                        <input type="radio" name="service_status" value="Retired/Ex-Service" class="form-radio h-6 w-6 shadow-inner border border-gray-300 text-blues focus:ring-blues"> <span class="whitespace-nowrap text-sm">Retired/Ex-Service</span>
                    </label>
                </div>
            </div>
            <div class="relative sm:col-span-8 lg:col-span-12 text-left">
                <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">Office Address</label>
                <input type="text" name="office_address" placeholder="Enter Office Address" class="ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-primary focus:placeholder-primary focus:text-primary w-full focus:ring-0">
            </div>
            <div class="relative sm:col-span-4 text-left">
                <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">Tehsil/City</label>
                <input type="text" name="office_city" placeholder="Enter Tehsil/City" class="ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-primary focus:placeholder-primary focus:text-primary w-full focus:ring-0">
            </div>
            <div class="relative sm:col-span-4 text-left">
                <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">District<em class="text-secondary">*</em>
                </label>
          

                 <select class="ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-primary focus:placeholder-primary focus:text-primary w-full focus:ring-0" name="office_district">
                    <?php $office_districts=get_All_data(array( 'status'=>'1') , $table='district' , 'name ASC' ); if($office_districts) { foreach ($office_districts as $key => $office_district) { ?>
                    <option value="<?php echo $office_district['id']; ?>">
                        <?php echo ucfirst($office_district['name']); ?> 
                    </option> 
                    <?php } } ?>
                </select>
            </div>
            <div class="relative sm:col-span-4 text-left">
                <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">State</label>
                <select class="ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-primary focus:placeholder-primary focus:text-primary w-full focus:ring-0 bg-gray-200" name="office_state">
                    <option value="1">Rajasthan</option>
                </select>
                <input type="hidden" value="" id="state_id_hidden">
            </div>
        </div>
        <div class="py-8 lg:py-20 max-w-4xl mx-auto">
            <!-- Durarion -->
            <div>
                <h2 class="text-xl sm:text-3xl text-gray-600 font-semibold ">Type of Membership </h2>
                <div class="flex flex-col xs:flex-row justify-between items-start xs:items-center gap-3 xs:pt-10 py-5 xs:pb-0">
                    <?php $i=1; foreach ($membership_list as $key=>$value) { ?>
                    <label class="flex items-center gap-2 text-left font-medium text-base text-gray-600 relative xs:pb-8">
                        <input type="radio" name="membership_plan" data-id="<?php echo $value['id'] ?>"  data-price="<?php echo $value['price'] ?>"  data-desc="<?php echo $value['description'] ?>" value="<?php echo $value['id'] ?>" class="membership_plan form-radio h-6 w-6 shadow-inner border border-gray-300 text-blues focus:ring-blues" <?php if($i=='1' ){echo 'checked';} ?>> <span class="font-medium "><?php echo $value['name'] ?>  <b class="text-secondary">₹<?php echo $value['price'] ?>/-</b></span>
                        <span class="arrow__icon__<?php echo $value['id'] ?>  arrow__icon w-8 h-8 bg-white xs:block transform rotate-45 translate-y-1/2 bottom-0 left-10 translate-x-1/2 absolute"></span>
                    </label>
                    <?php $i++; } ?>
                </div>
                <div class="rounded-md p-5 xs:p-10 bg-white text-left shadow-6">
                    <p class="font-medium leading-relaxed text-gray-600" id="membership_plan__desc"></p>
                    <p class="text-secondary font-semibold pt-2" id="membership_plan__text"></p>
                </div>
            </div>
            <div class="rounded-md p-5 xs:p-10 bg-white text-left shadow-6 mt-10">
                <label class="flex items-center space-x-4 font-medium text-base text-gray-600  pb-5">
                    <input type="checkbox" name="oath_promise" id="oath_promise" value="Yes" class="form-checkbox h-6 w-6 shadow-inner border border-gray-300 text-blues focus:ring-blues"> <span class="whitespace-nowrap text-2xl text-secondary font-semibold">Oath/Promise</span>
                </label>
                <div class="text-gray-600">
                    <ol class="list-decimal pl-2 pt-2 font-medium leading-relaxed">
                        <?php echo get_settings( 'oath'); ?>
                    </ol>
                </div>
            </div>
            <div class="pt-10 flex justify-center">
                <?php $date_now = date("Y-m-d"); // this format is string comparable

           /* if ($date_now > '2025-5-20') { ?>
                <button type="button" onclick=" alert('Membership is closed on 23-9-2024 after 12 PM');" class="rounded flex justify-center items-center font-medium text-white tracking-wider uppercase bg-primary hover:bg-secondary shadow-md py-4 w-56">Submit</button>
         <?php }else { ?>
             <button type="submit" id="rzp-button1" class="rounded flex justify-center items-center font-medium text-white tracking-wider uppercase bg-primary hover:bg-secondary shadow-md py-4 w-56">Submit</button>
         <?php } */ ?>


         <button type="submit" id="rzp-button1" class="rounded flex justify-center items-center font-medium text-white tracking-wider uppercase bg-primary hover:bg-secondary shadow-md py-4 w-56">Submit</button>
               


            </div>
        </div>
    </div>
</form>




<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type = "text/javascript" >
var checkedMembership = $('input[name=membership_plan]:checked', '#register__form').data('id');
var desc = $('input[name=membership_plan]:checked', '#register__form').data('desc');
var membership_price_active = $('input[name=membership_plan]:checked', '#register__form').data('price');
$('.arrow__icon').hide();
$('.arrow__icon__' + checkedMembership).show();
$('#membership_plan__text').text('Rs. ' + membership_price_active + '/- Membership fees');
$('#membership_plan__desc').text(desc);
$('body').on('change', '.membership_plan ', function() {
    var id = $(this).data('id');
    var checkedMembership = $('input[name=membership_plan]:checked', '#register__form').data('id');
    var desc = $('input[name=membership_plan]:checked', '#register__form').data('desc');
    var membership_price_active = $('input[name=membership_plan]:checked', '#register__form').data('price');
    $('.arrow__icon').hide();
    $('.arrow__icon__' + id).show();
    $('#membership_plan__text').text('Rs. ' + membership_price_active + '/- Membership fees');
    $('#membership_plan__desc').text(desc);
});
// Showing calender
$('[data-toggle="datepicker"]').datepicker();
// Get All State

</script> 
<script type = "text/javascript" > $("#register__form").submit(function() {
    event.preventDefault();
    var checkFields = required();
    if(checkFields) {
        var ref_name = $('#ref_name_hidden').val();
        var ref_mobile = $('#ref_mobile_hidden').val();
        var membership_id = $('input[name="membership_plan"]:checked').data('id');
        var formData = new FormData(this);
        formData.append('ref_name', ref_name);
        formData.append('ref_mobile', ref_mobile);
        formData.append('membership_id', membership_id);

        $.ajax({
            type: "POST",
            url: $('#register__form').attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data) {
                if(data.status == true) {
                    // if(data.islifetime == true)
                    // {
                    //     alert(data.msg);
                    //     location.reload();
                    // }else
                    // {
                    //     var userdata = data.data;
                    //      var price = data.price;
                    //     payment(userdata , price);
                 
                    // }

                     var userdata = data.data;
                         var price = data.price;
                        payment(userdata , price);
                  
                } else {
                    alert(data.msg);
                }
            }
        });
    }
});


function payment(userdata , price) {
    var amount = price * 100;
    var membership_price = $('input[name=membership_plan]:checked', '#register__form').val();
    var ref_name = $('#ref_name_hidden').val();
    var ref_mobile = $('#ref_mobile_hidden').val();
    var name = $('#first_name').val();
    var mobile = $('#mobile').val();
    var email = $('#email').val();
    var membership_id = $('input[name="membership_plan"]:checked').data('id');

    var options = {
        "key": "<?php echo get_settings('key'); ?>", // Enter the Key ID generated from the Dashboard
        // "key": "rzp_test_jXPlngy52RU2Ty", 
        // "amount": 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "amount": amount,
        "currency": "INR",
        "name": "RAKMA",
        "description": "Raj. Adhikari Karamchari Minority Association",
        "image": "<?php echo base_url('/uploads/') ?><?php echo get_settings('logo'); ?>",
        "id": "31", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
        "handler": function(response) {
            var payment_id = response.razorpay_payment_id;
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('/register/updatesucesspaymentstatus') ?>',
                data: {
                    userdata: userdata,
                    payment_id: payment_id,
                    membership_id: membership_id,
                    membership_price: membership_price,
                    ref_name: ref_name,
                    ref_mobile: ref_mobile,
                    mobile: mobile
                },
                dataType: "json",
                success: function(data) {
                    $('#register__form').remove();
                    $('#payment_alert').html(data.msg);
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
        var payment_id = response.error.metadata.payment_id;
    });
    rzp1.open();
}

function required() {
    var error = '';
    var first_name = $('#first_name').val();
    if(first_name == '') {
        error += 'Please Insert First Name \n';
    }
    var father_husband_name = $('#father_husband_name').val();
    if(father_husband_name == '') {
        error += 'Please Insert Father/Husband Name \n';
    }
    var mobile = $('#mobile').val();
    if(mobile == '') {
        error += 'Please enter mobile number \n';
    } else {
        if(!$.isNumeric(mobile)) {
            error += 'Please enter mobile number in number format \n';
        } else {
            if(mobile.length != 10) {
                error += 'Please enter 10 digit mobile number \n';
            }
        }
    }
   
   /* var dob = $('#dob').val();
    if(dob == '') {
        error += 'Please Choose Date of Birth \n';
    }*/
    var married_status = $('.married_status ').val();
    if(married_status == '') {
        error += 'Please Select Married Status \n';
    }
    var gender = $('.gender ').val();
    if(gender == '') {
        error += 'Please Select Gender \n';
    }
    var district = $('#district').val();
    if(district == '') {
        error += 'Please Select District \n';
    }
    var state = $('#state').val();
    if(state == '') {
        error += 'Please  Select State \n';
    }
    var post_name = $('#post_name').val();
    if(post_name == '') {
        error += 'Please Insert Post Name \n';
    }
    var name_of_diparment = $('#name_of_diparment').val();
    if(name_of_diparment == '') {
        error += 'Please Select Name of Diparment \n';
    }
    var membership_plan = $('.membership_plan').val();
    if(membership_plan == '') {
        error += 'Please Select Membership Plan \n';
    }
    if($("#oath_promise").prop('checked') == false) {
        error += 'Please Select Oath Promise \n';
    }
    if(error == '') {
        return true;
    } else {
        alert(error);
    }
} 


function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
                $('#previewImg').css('height', "100vh !important");
            }
            reader.readAsDataURL(file);
        }
    }



</script>

