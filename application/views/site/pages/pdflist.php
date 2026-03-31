<main class="">
<!-- Hero Section -->
<section class="relative">
   <div class="h-56 md:h-60 bg-gray-300"><img src="<?php echo base_url('assets/site') ?>/src/dist/img/header-bg.png" alt="" class="opacity-80 object-cover max-w-none h-full w-full"></div>
   <div class="z-10 absolute inset-0 py-10 md:py-20 flex items-center">
      <div class="max-w-screen-xl w-full px-4 xl:px-12 mx-auto flex flex-col items-center text-center">
       <h1 class="text-2xl sm:text-4xl xl:text-5xl uppercase text-secondary font-bold tracking-wide"><?php echo $title; ?></h1>
       <p class="text-primary font-medium pt-2 capitalize"><span class="uppercase hidden">RAKMA</span> (Raj. Adhikari Karmachari Minority Association)</p>
       <!-- Breadcrumb -->
       <p class="flex gap-2 pt-2 font-medium text-gray-500"><a href="<?php echo base_url(); ?>" class="hover:text-secondary">Home</a>/<span class="text-blues"><?php echo $title; ?></span></p>
      </div>
   </div>
</section>

   <section class="relative policies">
      <div class="max-w-screen-lg xl:max-w-screen-xl px-4 xl:px-12 mx-auto">
            <div class="py-5 members-list-pdf">
               <?php if($rows) { foreach ($rows as $key => $row) {  ?>
                  <div class="dist-list">
                  <h2 class="text-xl uppercase text-gray-500"><b><?php echo $row['cat']; ?></b></h2>
           <ul class="link-list font-semibold">
                  <?php 
                   $lists =  get_All_data(['district'=> $row['district']], $table='list');
                  
                  if($lists) {  foreach ($lists as $key => $list) {  ?>
                    <li> <a href="<?php echo base_url('uploads/'.$list['image']) ?>" target="_blank" class="text-blues hover:text-secondary font-semibold py-2 inline-flex leading-none"><?php echo $list['title'] ?> </a></li>
                
                  <?php  } } ?>
                  </ul>
                  </div>

               <?php } } ?>

            </div>
      </div>
   </section>
</main>