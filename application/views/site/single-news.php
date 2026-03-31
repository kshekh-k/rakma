
      
      <main class="">
         <!-- Hero Section -->
         <section class="relative">
            <div class="h-56 md:h-60 bg-gray-300"><img src="<?php echo base_url('/assets/site') ?>/src/dist/img/header-bg.png" alt="" class="opacity-80 object-cover max-w-none h-full w-full"></div>
            <div class="z-10 absolute inset-0 py-10 md:py-20 flex items-center">
               <div class="max-w-screen-xl w-full px-4 xl:px-12 mx-auto flex flex-col items-center text-center">
                <h1 class="text-2xl sm:text-4xl xl:text-5xl uppercase text-secondary font-bold tracking-wide">News</h1>
                <p class="text-primary font-medium pt-2 capitalize"><span class="uppercase">RAKMA</span> (Raj. Adhikari Karmachari Minority Association)</p>
                <!-- Breadcrumb -->
                <p class="flex gap-2 pt-2 font-medium text-gray-500"><a href="<?php echo base_url(); ?>" class="hover:text-secondary">Home</a>/<span class="text-blues">Welfare</span></p>
               </div>
            </div>
         </section>

         <?php if($post){ ?>
         <section class="relative py-5 xl:py-16"> 
           
            <div class="max-w-screen-xl px-4 xl:px-12 mx-auto flex flex-col items-center text-center">
<div class="grid md:grid-cols-12 gap-3 sm:gap-5 lg:gap-10 w-full">
    <!-- Welfare Post Details-->
   <div class="lg:col-span-8 md:col-span-7">
       
    <h3 class="text-2xl text-gray-900 font-medium text-left"><?php echo $post['title']; ?></h3>
    <!-- date -->
    <p class="text-sm text-primary font-medium flex justify-start gap-5 pt-2"><span class="flex gap-1"><svg class="w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
     </svg> <span><?php echo date("d M Y", strtotime($post['create_at'])); ?></span></span> <span class="flex gap-1"><svg class="w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
     </svg><span><?php echo $post['location']; ?></span></span></p>
<div class="pt-5">
    <div class="overflow-hidden flex items-center justify-center bg-white mb-2">        
        <img src="<?php echo base_url('uploads/'.$post['image']) ?>" alt="" class="object-cover">    
</div>

<div class="text-gray-600 font-medium leading-loose text-justify" id="content">

      <?php echo $post['description']; ?>


</div> 



</div>


   </div>


   <!-- Recent Welfare Posts -->
   <div class="lg:col-span-4 md:col-span-5 md:border-l border-gray-200 pl-5 lg:pl-10">

            <?php if ($latest_post) { ?>
               
           
    

            <div class="bg-gray-100 p-8">
             <h3 class="text-xl text-gray-900 font-medium text-left">Recent News</h3>
             <div class="pt-5 divide-y divide-gray-200 flex flex-col font-medium">

               <?php  foreach ($latest_post as $key => $postdata) { ?>
                 <a href="<?php echo base_url('/news/'.$postdata['id']) ?>" class="text-left line-clamp-2 text-gray-600 py-2 hover:text-secondary relative pl-5"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-0" viewBox="0 0 20 20" fill="currentColor">
           <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
         </svg> <?php echo $postdata['title']; ?></a>
                <?php }  ?>
                
             </div>
            </div>
             <?php  } ?>

   </div>




</div>

 

 
            </div>
         </section>


<?php if(!empty($gallery)) {  ?>
 


<!-- Gallery Section-->
<section class="relative ">
   <div class="max-w-screen-lg xl:max-w-screen-xl px-4 xl:px-12 mx-auto">
   <div class="py-10 md:py-20">
      <h2 class="text-2xl sm:text-4xl uppercase text-primary font-bold tracking-wider"><?php echo $gallery['title']; ?></h2>

<div class="galley_container__<?php echo $gallery['id']; ?>  lightgallery grid md:grid-cols-3 grid-cols-2 gap-3 md:gap-5 lg:gap-10 pt-5 md:pt-10" id="lightgallery__<?php echo $gallery['id']; ?>" data-lg-size="1600-2400">
         <?php if (isset($gallery_images) && !empty($gallery_images)) {

            foreach ($gallery_images as $key => $images) {
              
           ?>
   <a class="gl-thumb rounded-md overflow-hidden relative" href="<?php echo base_url('uploads/'.$images["image"]); ?>">
      <img src="<?php echo base_url('uploads/'.$images["image"]); ?>" alt="">
      <span class="absolute inset-0 bg-primary bg-opacity-70 opacity-0 transform scale-95 flex items-center justify-center">
         <span class="text-white"><svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
          </svg></span>
      </span>
   </a>

   <?php }} ?>

</div>

<div class="flex justify-center mt-10 gallery__<?php echo $gallery['id']; ?>">
   <a href="javascript:void(0)" onclick="loadmore('<?php echo $gallery['id']; ?>' , '3', '<?php echo count($gallery_images); ?>');" class="rounded flex justify-center items-center font-medium text-white tracking-wider uppercase bg-primary hover:bg-secondary shadow-md py-4 px-10 ">View All</a>
</div>


      </div>
      </div>
         </section>

          <script type="text/javascript">
                  lightGallery(document.getElementById('lightgallery__<?php echo $gallery['id']; ?>'), {
                      plugins: [lgZoom, lgThumbnail],
                      speed: 500,
          
      });
  </script>

      <?php }  ?>



<?php }else{ echo $not_found; ?>

<?php }  ?>


            <?php   $this->load->view('site/section/hero_1'); ?>



      </main>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<script type="text/javascript">



         function gallery() {
            lightGallery(document.getElementById('lightgallery'), {
          plugins: [lgZoom, lgThumbnail],
          speed: 500,
          
      });
         }
       
         function loadmore(gallery_id , per_page , row) {

        
            
                   $.ajax({
                           type: "POST",
                           url: '<?php echo base_url('/page/loadmore') ?>',
                           data: {gallery_id:gallery_id,per_page:per_page,row:row}, 
                          dataType: "json",
                           success: function(data)
                           {

                                  $(".galley_container__"+gallery_id).append(data.data);
                                  $(".gallery__"+gallery_id).html(data.btn);
                                  gallery();
                     
                           }
                  });
      }
    



</script>