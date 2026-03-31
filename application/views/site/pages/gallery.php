  <main class="">
         <!-- Hero Section -->
         <section class="relative">
            <div class="h-56 md:h-60 bg-gray-300"><img src="<?php echo base_url('/assets/site/') ?>/src/dist/img/header-bg.png" alt="" class="opacity-80 object-cover max-w-none h-full w-full"></div>
            <div class="z-10 absolute inset-0 py-10 md:py-20 flex items-center">
               <div class="max-w-screen-xl w-full px-4 xl:px-12 mx-auto flex flex-col items-center text-center">
                <h1 class="text-2xl sm:text-4xl xl:text-5xl uppercase text-secondary font-bold tracking-wide pb-2">Photo Gallery</h1>
                <p class="text-primary font-medium pt-2 capitalize"><span class="uppercase">RAKMA</span> (Raj. Adhikari Karmachari Minority Association)</p>
                <!-- Breadcrumb -->
                <p class="flex gap-2 pt-2 font-medium text-gray-500"><a href="<?php echo base_url(); ?>" class="hover:text-secondary">Home</a>/<span class="text-blues">Gallery</span></p>
               </div>
            </div>
         </section>

<?php if(!empty($gallery_list)) { foreach ($gallery_list as $key => $gallery) {  ?>


         <section class="relative py-5 xl:py-16"> 
           
            <div class="max-w-screen-xl px-4 xl:px-12 mx-auto flex flex-col items-center text-center">

                 <h2 class="text-2xl sm:text-4xl uppercase text-primary font-bold tracking-wider pb-4"><?php echo $gallery['title']; ?></h2>
 
                
                        <!-- Gallery Section-->
                         
                           
                         <div class="galley_container__<?php echo $gallery['id']; ?> grid md:grid-cols-3 grid-cols-2 gap-3 md:gap-5 lg:gap-10  " id="lightgallery__<?php echo $gallery['id']; ?>" data-lg-size="1600-2400">

                           <?php if (!empty($gallery['images'])) { foreach ($gallery['images'] as $key => $item) { ?>
                         
                            <a class="gl-thumb rounded-md overflow-hidden relative" href="<?php echo base_url('uploads/'.$item["image"]); ?>">
                               <img src="<?php echo base_url('uploads/'.$item["image"]); ?>" alt="">
                               <span class="absolute inset-0 bg-primary bg-opacity-70 opacity-0 transform scale-95 flex items-center justify-center">
                                  <span class="text-white"><svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                   </svg></span>
                               </span>
                            </a>
                           <?php } ?>

                         </div>
                         <div class="flex justify-center mt-10 gallery__<?php echo $gallery['id']; ?>">
                           <a href="javascript:void(0)" onclick="loadmore('<?php echo $gallery['id']; ?>' , '3', '<?php echo count($gallery['images']); ?>');" class="rounded flex justify-center items-center font-medium text-white tracking-wider uppercase bg-primary hover:bg-secondary shadow-md py-4 px-10 ">View All</a>
                         </div>
                        <?php }else { ?>

                           <h4>Images Not Found</h4>

                        <?php } ?>
 
      
      
 

            </div>
         </section>

              <script type="text/javascript">
                              lightGallery(document.getElementById('lightgallery__<?php echo $gallery["id"]; ?>'), {
                                  plugins: [lgZoom, lgThumbnail],
                                  speed: 500,
                      
                  });
              </script>
<?php }} ?>




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




       <?php   $this->load->view('site/section/hero_1'); ?>



      </main>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<script type="text/javascript">



         function gallery(gallery_id = '') {
            lightGallery(document.getElementById('lightgallery__'+gallery_id), {
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
                                  gallery(gallery_id);
                     
                           }
                  });
      }
    



</script>