<div class="py-8 lg:py-20 max-w-4xl mx-auto">
<!-- Durarion -->
 
<h2 class="text-xl sm:text-3xl text-gray-600 font-semibold ">Upgrade To</h2>

<div class="flex flex-col xs:flex-row justify-center space-x-5 items-start xs:items-center gap-3 xs:pt-10 py-5 xs:pb-0" id="upgrade_membership_plan">

   <?php $i=1;  foreach ($membership_list as $key => $value) { 


      if ($i=='1') {
         $id = $value['id'];
         $price = $value['name'];
         $description = $value['description'];
      }


      ?>
   

   
   <label class="flex items-center gap-2 text-left font-medium text-base text-gray-600 relative xs:pb-8">      
      <input type="radio" name="membership" data-id="<?php echo $value['id'] ?>" data-desc="<?php echo $value['description'] ?>" value="<?php echo $value['price'] ?>" class="membership__radio form-radio h-6 w-6 shadow-inner border border-gray-300 text-blues focus:ring-blues" <?php if($i=='1'){echo 'checked';} ?>>
       <span class="font-medium "><?php echo $value['name'] ?>  <b class="text-secondary">₹<?php echo $value['price'] ?>/-</b></span>
       <span class="arrow__icon__<?php echo $value['id'] ?>  arrow__icon w-8 h-8 bg-white xs:block hidden transform rotate-45 translate-y-1/2 bottom-0 left-10 translate-x-1/2 absolute"></span>
   </label>

<?php $i++; } ?>


</div>

<div class="rounded-md p-5 xs:p-10 bg-white text-left shadow-6">
   <p class="italic font-medium leading-relaxed text-gray-600" id="membership_plan__desc"></p>
   <p class="text-secondary font-semibold pt-2" id="membership_plan__text"></p>
</div>
 
 

<div class="pt-10 flex justify-center">

  <?php $date_now = date("Y-m-d"); // this format is string comparable

            if ($date_now < '2023-12-20') { ?>
  

                <button type="button" onclick=" alert('Membership upgrade is closed on 20-12-2021 after 12 PM');" class="rounded flex justify-center items-center font-medium text-white tracking-wider uppercase bg-primary hover:bg-secondary shadow-md py-4 w-56">Submit</button>

         <?php }else { ?>
             <button type="button" id="payment_btn" class="rounded flex justify-center items-center font-medium text-white tracking-wider uppercase bg-primary hover:bg-secondary shadow-md py-4 w-56">Submit</button>
         <?php }  ?>


</div>
</div>

<script type="text/javascript">

$( document ).ready(function() {

     var checkedMembership ='<?php echo $id; ?>';
     var desc ='<?php echo $description; ?>';
     var membership_price_active ='<?php echo $price; ?>';
      $('.arrow__icon').hide();
      $('.arrow__icon__'+checkedMembership).show();
        $('#membership_plan__text').text('Rs. '+membership_price_active+'/- Membership fees');
        $('#membership_plan__desc').text(desc);
        $('#upgrade_membership_plan').on('change', '.membership__radio', function () {
         var id =   $(this).data('id');
         var checkedMembership = $('input[name=membership]:checked', '#upgrade_membership_plan').data('id');
         var desc = $('input[name=membership]:checked', '#upgrade_membership_plan').data('desc');
         var membership_price_active = $('input[name=membership]:checked', '#upgrade_membership_plan').val();
         $('.arrow__icon').hide();
         $('.arrow__icon__'+id).show();
         $('#membership_plan__text').text('Rs. '+membership_price_active+'/- Membership fees');
         $('#membership_plan__desc').text(desc);

        });
 });
</script>