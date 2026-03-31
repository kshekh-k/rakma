<?php if($committee) {  ?>


<!-- Executives Headings -->
<div class="py-10 xl:py-20 flex flex-col items-center justify-center gap-2 lg:gap-4">
    <h2 class="text-xl sm:text-2xl lg:text-4xl text-primary font-bold uppercase"><?php echo $committee['title']; ?></h2>
    <p class="font-semibold text-lg text-gray-400"><?php echo $committee['description']; ?></p>
</div>



<?php if($memberlist) {  ?>


<div class="flex flex-col gap-3 sm:gap-5 lg:gap-7 xl:gap-10 w-full">
<div class="grid grid-cols-2 xs:grid-cols-3 sm:grid-cols-12 gap-4 sm:gap-5 lg:gap-7 xl:gap-10 w-full text-center max-w-screen-lg mx-auto xl:max-w-none xl:px-0">

   
      <?php foreach ($memberlist as $key => $member) { ?>
      
     <div class="relative sm:col-span-3">
        <div class="border border-gray-300 p-1 lg:p-2 bg-white">
         <?php if(!empty($member['profile'])) {?>

               <img src="<?php echo base_url('uploads/'.$member['profile']); ?>" alt="" class="w-full">
          
        <?php }else { echo default_member_image(); } ?>

        </div>
       
        <p class="flex flex-col justify-center items-center uppercase pt-4">
           <strong class="text-blues font-bold text-xs lg:text-base xl:text-lg"><?php echo $member['first_name']; ?> <?php echo $member['middle_name']; ?>  <?php echo $member['last_name']; ?> </strong>
           <span class="text-xs lg:text-sm font-semibold text-gray-500"><?php echo $member['post_name']; ?></span>
        </p>
     </div>
     <?php  } ?>


    


</div>


</div>


<?php }  }  ?>