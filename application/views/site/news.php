 <main class="">
         <!-- Hero Section -->
         <section class="relative">
            <div class="h-56 md:h-60 bg-gray-300"><img src="<?php echo base_url('assets/site') ?>/src/dist/img/header-bg.png" alt="" class="opacity-80 object-cover max-w-none h-full w-full"></div>
            <div class="z-10 absolute inset-0 py-10 md:py-20 flex items-center">
               <div class="max-w-screen-xl w-full px-4 xl:px-12 mx-auto flex flex-col items-center text-center">
                <h1 class="text-2xl sm:text-4xl xl:text-5xl uppercase text-secondary font-bold tracking-wide">News</h1>
                <p class="text-primary font-medium pt-2 capitalize"><span class="uppercase">RAKMA</span> (Raj. Adhikari Karmachari Minority Association)</p>
                <!-- Breadcrumb -->
                <p class="flex gap-2 pt-2 font-medium text-gray-500"><a href="<?php echo base_url(); ?>" class="hover:text-secondary">Home</a>/<span class="text-blues">News</span></p>
               </div>
            </div>
         </section>


         <section class="relative py-5 xl:py-16"> 
           
            <div class="max-w-screen-xl px-4 xl:px-12 mx-auto flex flex-col items-center text-center">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap5 lg:gap-10 w-full">

               <?php if ($news_list) { $i=1; foreach ($news_list as $key => $news) { //print_r($news); ?>
                 
              
    
                  <div class="bg-gray-100 p-4 sm:p-7 flex flex-col relative">
                     <div class="overflow-hidden h-72 flex items-center justify-center bg-white flex-1">
                     <img src="<?php echo base_url('uploads/'.$news['image']) ?>" alt="" class="object-cover">
                     </div>
                     <div class="pt-5">
                     <h3 class="text-2xl text-gray-900 font-medium text-left truncate"><?php  echo $news['title']; ?></h3>
                     <!-- date -->
                     <p class="text-sm text-primary font-medium flex justify-start gap-5 pt-2"><span class="flex gap-1"><svg class="w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                     </svg> <span><?php echo date("d M Y", strtotime($news['create_at'])); ?></span></span> <span class="flex gap-1"><svg class="w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                     </svg><span><?php echo $news['location']; ?></span></span></p>

                     <!-- Description -->
                     <div class="text-gray-600 text-left line-clamp-4 font-medium leading-loose my-3"> <?php echo mb_strimwidth(strip_tags($news['description']), 0, 160, "..."); ?></div>    
                     <p class="flex"><a href="javascript:void(0)" class="rounded relative z-20 flex justify-center items-center font-medium text-white tracking-wider uppercase bg-primary hover:bg-secondary shadow-md py-2 px-5 text-sm ">READ MORE</a> </p>

                     </div>
                  <!-- Post Detail Link -->
                  <a href="<?php echo base_url('news/'.$news['id']) ?>" class="absolute inset-0 opacity-0"><span class="hidden">Hidden Link</span></a>

                  </div>

               <?php $i++; }} ?>

         </div>


  <?php if($this->pagination->create_links()) { ?>
<div class="bg-white flex items-center justify-between  w-full pt-10">
   <div class="flex-1 flex justify-between sm:hidden">
     <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500">
       Previous
     </a>
     <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500">
       Next
     </a>
   </div>
   <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
     <div>
       <p class="text-sm text-gray-700">
         Showing
         <span class="font-medium"><?php echo $rowstart; ?></span>
         to
         <span class="font-medium"><?php echo $rowend; ?></span>
         of
         <span class="font-medium"><?php echo $total_rows; ?></span>
         results
       </p>
     </div>
     <div>
       <nav class="relative z-0 inline-flex -space-x-px" aria-label="Pagination">

              <?php  echo  $this->pagination->create_links() ?>
                

       </nav>
     </div>
   </div>
 </div>
     <?php } ?>


 
            </div>
         </section>
        <?php   $this->load->view('site/section/hero_1'); ?>



      </main>