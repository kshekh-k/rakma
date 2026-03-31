 <main class="">
         <!-- Hero Section -->
         <section class="relative">
            <div class="h-56 md:h-60 bg-gray-300"><img src="<?php echo base_url('/assets/site/'); ?>/src/dist/img/header-bg.png" alt="" class="opacity-80 object-cover max-w-none h-full w-full"></div>
            <div class="z-10 absolute inset-0 py-10 md:py-20 flex items-center">
               <div class="max-w-screen-xl w-full px-4 xl:px-12 mx-auto flex flex-col items-center text-center">
                <h1 class="text-2xl sm:text-4xl xl:text-5xl uppercase text-secondary font-bold tracking-wide">Welfare Fund</h1>
                <p class="text-primary font-medium pt-2 capitalize"><span class="uppercase">RAKMA</span> (Raj. Adhikari Karmachari Minority Association)</p>
                <!-- Breadcrumb -->
                <p class="flex gap-2 pt-2 font-medium text-gray-500"><a href="<?php echo base_url(); ?>" class="hover:text-secondary">Home</a>/<span class="text-blues">Welfare Fund</span></p>
               </div>
            </div>
         </section>


         <section class="relative py-5 xl:py-16"> 
           
            <div class="max-w-screen-xl px-4 xl:px-12 mx-auto flex flex-col items-center text-center">
 <div class="grid md:grid-cols-2 gap-10 w-full xl:shadow-4 xl:p-5 ring-1 ring-gray-300 xl:ring-0"> 

             <div class="relative overflow-hidden bg-gray-50 p-3 xs:p-8 lg:p-10">
               <h2 class="text-2xl lg:text-4xl text-primary font-bold uppercase text-left pb-3">Mubarak</h2>

               <div class="alert_message"></div>



               <p class="text-justify pb-5">How much do you want to donate?</p>
<form id="donation__form">
               <div class="grid grid-cols-2 sm:grid-cols-12 gap-4 ">

                  <div class="relative sm:col-span-4 md:col-span-6 lg:col-span-4 text-left">
                     <label class="relative block donate-amount">
                        <input type="radio" name="price"  value="20"    class=" radioprice absolute top-2 right-2 form-radio h-4 w-4 shadow-inner border border-gray-300 text-secondary focus:ring-secondary">
                        <span class="bg-white flex w-full items-center h-12 xs:h-16 justify-center text-center border border-gray-300 rounded p-2 md:p-3 font-semibold text-xl text-gray-600 "><span>₹20</span></span>
                    </label>

                  </div>

                  <div class="relative sm:col-span-4 md:col-span-6 lg:col-span-4 text-left">
                     <label class="relative block donate-amount">
                        <input type="radio" name="price"   value="50"   class=" radioprice absolute top-2 right-2 form-radio h-4 w-4 shadow-inner border border-gray-300 text-secondary focus:ring-secondary">
                        <span class="bg-white flex w-full items-center h-12 xs:h-16 justify-center text-center border border-gray-300 rounded p-2 md:p-3 font-semibold text-xl text-gray-600 "><span>₹50</span></span>
                    </label>

                  </div>

                  <div class="relative sm:col-span-4 md:col-span-6 lg:col-span-4 text-left">
                     <label class="relative block donate-amount">
                        <input type="radio" name="price"   value="100"   class=" radioprice absolute top-2 right-2 form-radio h-4 w-4 shadow-inner border border-gray-300 text-secondary focus:ring-secondary" checked>
                        <span class="bg-white flex w-full items-center h-12 xs:h-16 justify-center text-center border border-gray-300 rounded p-2 md:p-3 font-semibold text-xl text-gray-600 "><span>₹100</span></span>
                    </label>

                  </div>

                  <div class="relative sm:col-span-4 md:col-span-6 lg:col-span-4 text-left">
                     <label class="relative block donate-amount">
                        <input type="radio" name="price"  value="200"    class=" radioprice absolute top-2 right-2 form-radio h-4 w-4 shadow-inner border border-gray-300 text-secondary focus:ring-secondary">
                        <span class="bg-white flex w-full items-center h-12 xs:h-16 justify-center text-center border border-gray-300 rounded p-2 md:p-3 font-semibold text-xl text-gray-600 "><span>₹200</span></span>
                    </label>

                  </div>

                  <div class="relative sm:col-span-4 md:col-span-6 lg:col-span-4 text-left">
                     <label class="relative block donate-amount">
                        <input type="radio" name="price"   value="300"   class=" radioprice absolute top-2 right-2 form-radio h-4 w-4 shadow-inner border border-gray-300 text-secondary focus:ring-secondary">
                        <span class="bg-white flex w-full items-center h-12 xs:h-16 justify-center text-center border border-gray-300 rounded p-2 md:p-3 font-semibold text-xl text-gray-600 "><span>₹300</span></span>
                    </label>

                  </div>

                  <div class="relative sm:col-span-4 md:col-span-6 lg:col-span-4 text-left">
                     <label class="relative block donate-amount">
                        <input type="radio" name="price"  autocomplete="off" value="500"   class=" radioprice absolute top-2 right-2 form-radio h-4 w-4 shadow-inner border border-gray-300 text-secondary focus:ring-secondary">
                        <span class="bg-white flex w-full items-center h-12 xs:h-16 justify-center text-center border border-gray-300 rounded p-2 md:p-3 font-semibold text-xl text-gray-600 "><span>₹500</span></span>
                    </label>

                  </div>

                  <div class="relative col-span-2 sm:col-span-6 md:col-span-12 md:col-start-0 lg:col-start-4 lg:col-span-6 text-left pb-4">
                     <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">Other Amount</label>
                     <input type="text" placeholder="Enter Your Amount" name="custom_price"  class="cutstom_price ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-secondary focus:placeholder-secondary focus:text-secondary w-full focus:ring-0">
                 </div>

                  <div class="relative col-span-2 sm:col-span-6 md:col-span-12 lg:col-span-6 text-left">
                     <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">Name<em class="text-secondary">*</em></label>
                     <input type="text" placeholder="Enter Name"  class="donar__name ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-secondary focus:placeholder-secondary focus:text-secondary w-full focus:ring-0">
                 </div>
               
                  <div class="relative col-span-2 sm:col-span-6 md:col-span-12 lg:col-span-6 text-left">
                     <label for="" class="text-gray-600 font-semibold pb-1 px-2 block">Mobile No.<em class="text-secondary">*</em></label>
                     <input type="tel" placeholder="Enter Mobile"  class=" donar__mobile ring-0 border border-gray-300 rounded p-2 md:p-3 focus:outline-none outline-none focus:border-secondary focus:placeholder-secondary focus:text-secondary w-full focus:ring-0">
                 </div> 

                 

                 <div class=" col-span-2 sm:col-span-4">
                  <button type="button" class="rounded flex justify-center items-center font-medium text-white tracking-wider uppercase bg-primary hover:bg-secondary shadow-md py-4 w-36" id="site__donate__btn">Donate</button>
                  </div>



               </div>

                 <div class="alert_message"></div>
</form>               
             </div>
               <!-- Donation Description -->
               <div class="text-left space-y-3 px-3 pb-3 xs:px-8 md:pl-0 md:py-8 xl:pr-0 xl:pt-3">
                  <h3 class="text-lg text-gray-600 font-bold ">Charity For Education</h3>
                  <p class="text-justify">There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use or randomised words which don't look even slightly believable. If you are going to useor randomised.</p>
                  <p class="text-justify">There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                  <h3 class="text-lg text-gray-600 font-bold ">Charity For Education</h3>
                  <p class="text-justify">There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use or randomised words which don't look even slightly believable. If you are going to useor randomised.</p>
                  <p class="text-justify">There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
               </div>

        </div>      
            </div>
         </section>

 
             <?php   $this->load->view('site/section/hero_2'); ?>


      </main>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript">

        $( ".cutstom_price" ).focus(function() {

                $('.radioprice').prop('checked', false);

          });



         $( ".radioprice").click(function() {
            
            $('.cutstom_price').val('');
            
          });


        $("#site__donate__btn").click(function(){
            event.preventDefault();


            if(required())
            {
               payment();
            }

           

        });

function required()
    {

        var error = '';


        var checkedprice = $('input[name=price]:checked', '#donation__form').val();

        var cutstom_price = $('.cutstom_price').val();

        if(cutstom_price != '' || checkedprice == 'undefined')
        {
             if (!$.isNumeric(cutstom_price))
           {
          
               error += 'Please enter donation amount in number format \n';
           }

        }
        




        var donar__name = $('.donar__name').val();

        if (donar__name == '')
        {
       
            error += 'Please Insert Name \n';
        }else
        {
          if ($.isNumeric(donar__name))
           {
          
               error += 'Please dont put name in number format \n';
           }
        }


        var donar__mobile = $('.donar__mobile').val();

           if(donar__mobile == '')
                 {
                  
                        error += 'Please enter mobile number \n';
                }else 
                {
                        if (!$.isNumeric(donar__mobile))
                       {

                           
                           error += 'Please enter mobile number in number format \n';
                
                       }else 
                       {
                            if(donar__mobile.length != 10)
                            {
                                error += 'Please enter 10 digit mobile number \n';
                            }
                       }
        }







       

         if (error == '') 
         {
            return true;
         }else
         {
             alert(error);
         }



    }

    function payment()
    {
       
            var radioprice = $("input:radio.radioprice:checked").val();
            var cutstom_price = $(".cutstom_price").val();
            var name = $(".donar__name").val();
            var mobile = $(".donar__mobile").val();
           

            if (cutstom_price)
            {
               var price = cutstom_price;
            }else
            {
               var  price = radioprice;
            }
           

        var options = {
            "key": "<?php echo get_settings('key'); ?>", // Enter the Key ID generated from the Dashboard
            "amount": price*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "RAKMA",
            "description": "Raj. Adhikari Karamchari Minority Association",
            "image": "<?php echo base_url('/uploads/') ?><?php echo get_settings('logo'); ?>",
            "id": "31", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "handler": function (response){

               var  payment_id = response.razorpay_payment_id;

                $.ajax({
                           type: "POST",
                           url: '<?php echo base_url('/page/insertdonation') ?>',
                           data: {name:name,payment_id:payment_id,mobile:mobile,price:price}, 
                          dataType: "json",
                           success: function(data)
                           {


                              $(".cutstom_price").val('');
                              $(".donar__name").val('');
                              $(".donar__mobile").val('');
                             
                               $('.alert_message').html(data.msg);
                           }
                         });
               
            }
            ,
             "prefill": {
                "name": name,
                "email":'<?php echo get_settings('rzp_email'); ?>',
                "contact": mobile
             },
            "theme": {
                "color": "#016c38"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.on('payment.failed', function (response){
               
            var payment_id = response.error.metadata.payment_id
            $('.alert_message').html('<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert"> You have failed the payment please try again </div>');
        });
        rzp1.open();
       
    }






   function test()
   {
   	const myHeaders = new Headers();
myHeaders.append("Authorization", "App bcab434cc1b30c69a641049dac6eb2a9-63fd2287-ca0e-48a6-b3fb-abfbde4b6dd8");
myHeaders.append("Content-Type", "application/json");
myHeaders.append("Accept", "application/json");

const raw = JSON.stringify({
    "messages": [
        {
            "from": "447860099299",
            "to": "919511530589",
            "messageId": "11dcbd82-8222-41e0-929e-0c89d896d2f5",
            "content": {
                "templateName": "message_test",
                "templateData": {
                    "body": {
                        "placeholders": ["ravi"]
                    }
                },
                "language": "en"
            }
        }
    ]
});

const requestOptions = {
    method: "POST",
    headers: myHeaders,
    body: raw,
    redirect: "follow"
};

fetch("https://vvr91m.api.infobip.com/whatsapp/1/message/template", requestOptions)
    .then((response) => response.text())
    .then((result) => console.log(result))
    .catch((error) => console.error(error));
   }

   test();

</script>