 <main class="">
         <!-- Hero Section -->
         <section class="relative">
            <div class="h-56 md:h-60 bg-gray-300"><img src="<?php echo base_url('assets/site/') ?>/src/dist/img/header-bg.png" alt="" class="opacity-80 object-cover max-w-none h-full w-full"></div>
            <div class="z-10 absolute inset-0 py-10 md:py-20 flex items-center">
               <div class="max-w-screen-xl w-full px-4 xl:px-12 mx-auto flex flex-col items-center text-center">
                <h1 class="text-2xl sm:text-4xl xl:text-5xl uppercase text-secondary font-bold tracking-wide">Executives</h1>
                <p class="text-primary font-medium pt-2 capitalize"><span class="uppercase">RAKMA</span> (Raj. Adhikari Karmachari Minority Association)</p>
                <!-- Breadcrumb -->
                <p class="flex gap-2 pt-2 font-medium text-gray-500"><a href="javascript:void(0)" class="hover:text-secondary">Home</a>/<span class="text-blues">Executives</span></p>
               </div>
            </div>
         </section>


         <section class="relative pb-5 xl:pb-16"> 
             <!-- Tabs -->
             <div class="border-b border-gray-300" id="committee__tab">
                 <div class="max-w-screen-xl xl:px-12 mx-auto">
                     <div class="xl:border-l border-r border-gray-300 grid md:grid-cols-4 grid-cols-2 gap-0 divide-x divide-y md:divide-y-0 divide-gray-300 font-semibold text-gray-400 uppercase">
                     <button class="truncate cursor-pointer outline-none focus:outline-none ring-0 focus:ring-none flex items-center justify-center font-semibold uppercase text-secondary text-xs lg:text-base py-5 border-l border-t border-gray-300 md:border-0 maha__committee" data-id="1" id="maha__committee" >Mahasamiti</button>


                     <!-- State DropDown Current Disabled but in future it can enabled -->
                     <select class="truncate cursor-pointer outline-none focus:outline-none ring-0 focus:ring-0  items-center justify-center font-semibold text-gray-500 uppercase p-5 w-full border-0 text-center hidden text-xs lg:text-base maha__committee" data-id="7" id="maha__committee" >
                         <option selected>State Executive</option>
                         <option>Rajasthan</option>
                          </select>

                     <button class="truncate cursor-pointer outline-none focus:outline-none ring-0 focus:ring-none flex items-center justify-center font-semibold uppercase text-xs lg:text-base maha__committee" data-id="7" >State Executive</button>

                    
                    
                    
                     <select class="truncate cursor-pointer outline-none focus:outline-none ring-0 focus:ring-0 flex items-center font-semibold  uppercase p-5 w-full border-0 text-xs lg:text-base select_change text-left" >
                            <option selected>District Executive</option>
                           <?php if ($distric_committee_list) { foreach ($distric_committee_list as $key => $value) {  ?>
                            
                            <option value="<?php echo $value['id'] ?>"><?php echo $value['district_name'] ?></option>
                         <?php }} ?>
                        </select>


                        <select class="truncate cursor-pointer outline-none focus:outline-none ring-0 focus:ring-0 flex items-center justify-center font-semibold  uppercase p-5 w-full border-0 text-left text-xs lg:text-base select_change" id="other_committee">
                            <option value="">Select committee</option>
                           <?php if ($other_committee_list) { foreach ($other_committee_list as $key => $value) {  ?>
                            
                            <option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
                         <?php }} ?>
                          
                        </select>
                      
                    </div>
                    </div>
             </div>


            <div class="max-w-screen-xl px-4 xl:px-12 mx-auto flex flex-col items-center text-center" id="memebers_list">

                  <?php echo  $members;  ?>

            </div>
         </section>

                <?php   $this->load->view('site/section/hero_2'); ?>



      </main>


      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>



      <script type="text/javascript">

         $(".select_change").change(function(e){
            var id = $(this).val();

            if (id)
            {
                $("#committee__tab button , select").removeClass("text-secondary");
                 $(this).addClass("text-secondary ");
                members(id);
            }else
            {
               alert('Please select the committee');
               return false;
            }

        
         });


             $(".maha__committee").click(function(){
            var id = $(this).data('id');

          

            if(id)
            {
                 $('#other_committee').prop('selectedIndex',0);
                 $("#committee__tab button , select").removeClass("text-secondary");
                 $(this).addClass("text-secondary");
                members(id);
            }else
            {
               alert('Opps somthing wrong!');
            }

        
         });



            function members(id='') {

            
                   
                   $.ajax({
                           type: "POST",
                           url: '<?php echo base_url('/page/ajax_members') ?>',
                           data: {id:id}, 
                          dataType: "json",
                           success: function(data)
                           {

                              if (data.status == true)
                              {
                                     $('#memebers_list').html(data.data);
                                      pdf(data.data);
                              }else
                              {
                                 alert(data.data);
                              }
                            
                           }
                         });
            }

            function pdf(html='')
            {
                var doc = new jsPDF();
                doc.html(html, 10, 10);
                doc.save('a4.pdf');
            }


      </script>
