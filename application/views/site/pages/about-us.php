  <main class="">
         <!-- Hero Section -->
         <section class="relative">
            <div class="h-56 md:h-60 bg-gray-300"><img src="<?php echo base_url('assets/site') ?>/src/dist/img/header-bg.png" alt="" class="opacity-80 object-cover max-w-none h-full w-full"></div>
            <div class="z-10 absolute inset-0 py-10 md:py-20 flex items-center">
               <div class="max-w-screen-xl w-full px-4 xl:px-12 mx-auto flex flex-col items-center text-center">
                <h1 class="text-2xl sm:text-4xl xl:text-5xl uppercase text-secondary font-bold tracking-wide">About RAKMA</h1>
                <p class="text-primary font-medium pt-2 capitalize"><span class="uppercase hidden">RAKMA</span> (Raj. Adhikari Karmachari Minority Association)</p>
                <!-- Breadcrumb -->
                <p class="flex gap-2 pt-2 font-medium text-gray-500"><a href="<?php echo base_url(); ?>" class="hover:text-secondary">Home</a>/<span class="text-blues">About RAKMA</span></p>
               </div>
            </div>
         </section>
	  <section class="relative py-5 xl:py-16"> 
            <div class="max-w-screen-xl px-4 xl:px-12 mx-auto flex flex-col items-center text-center">
             <div class="grid lg:grid-cols-12 gap-10 w-full">
                <div class="lg:col-span-8 text-gray-600 text-justify lg:text-left">
                   <h2 class="text-lg font-semibold pb-1 text-gray-900">Raj Adhikari Karmchari Minority Association (RAKMA)</h2>
                   <p class="font-medium">Association of Minority Employees</p>
                   <p class="font-medium">Socitey Ragistration Act 1958 Reg.No. 103151/2018/Jai.</p>
                   <p class="uppercase pt-2 font-medium">Juridiction of association entire rajasthan state</p>
                   <div class="pt-10 space-y-3 leading-relaxed prose-lg">
                      <h3 class="text-3xl uppercase text-gray-900 font-medium">RAKMA</h3>
                      <p>Raj Adhikari Karmchari Mainority Association (RAKMA) is an organization of serving  and retired Minority Employees in Rajasthan state.</p>
                      <p>A  Minority employee/ Officer becomes member of the association as soon as he joins  State government, center government, Corporation, Boards, Public Sector, Local Bodies, Universities, Nantionalise Bank service. 
                     </p><p>
                        The Objectives of the association are to work for the benefit, welfare and development of the Minority employees and socitey for their  educational,helth,social,cultural and professional development.
                        </p>
                        <p>The number of govt. employees representing Minority Community is also decreasing gradually.The objective of Raj Adhikari Karmchari Mainority Association(RAKMA) is Obviously to provide platform for the minority community and its employees to protect its rights,constitutional provisions and ensure practical implementation of various GO's issued from welfare of minority employees in the state. RAKMA is the voice of Rajasthan State Minority Employees.</p>
					   
					   <h3 id="aim" class="text-3xl uppercase text-gray-900 font-medium pt-5">Aim and Object</h3>				   
<ol class="list-decimal pl-5 pt-2">
					  <li>To Cultivate the economic, moral and cultural status of minority officers
and employees.</li>
	  <li>To develop the attitude of fraternal unity and mutual cooperation among
the minority officers and employees.</li>
	  <li>To inculcate a sense of self-confidence, humanity, self-respect and self-
reliance among minority officers and employees.</li>
	  <li>To obtain the rights related to living, salary, pension work and service
matter of minority officers and employees.</li>
	  <li>To enhance the competency and efficiency of minority officers and
employees.</li>
	  <li>To help in establishing healthy, clean and cordial relations among
minority officers and employees.</li>
	  <li>To make efforts to make minority society economically, socially,
educationally, healthly prosperous.</li>
					   </ol>
                   </div>
                </div>
                <div class="lg:col-span-4">
                  <div class="bg-gray-100">
                     <div class="bg-primary p-5">
                     <h2 class="text-2xl uppercase text-white font-bold tracking-wider text-left ">News & Events<span
                           class="block text-sm text-white font-medium tracking-tight normal-case">RAKMA’s latest
                           News & Events</span></h2>
</div>
					 
                   <div class="divide-y divide-gray-300 px-5 grid sm:grid-cols-2 lg:grid-cols-1 sm:gap-x-5 lg:gap-x-0">
						 	<!-- News List -->
                        <?php if(!empty($news_list)){ foreach ($news_list as $key => $news) { ?>
                         <div class="grid grid-cols-6 gap-3 py-5 relative">
                           <div class="bg-white p-2 relative col-span-2 flex items-center">
                              <p class="text-center w-16 mx-auto relative"><span
                                    class="uppecase text-sm text-gray-400 block font-medium"><?php echo date("M", strtotime($news['create_at'])); ?></span><span
                                    class="text-xl text-gray-900 font-semibold"><?php echo date("d", strtotime($news['create_at'])); ?></span></p>
                              <hr class="border-b border-secondary w-8 absolute bottom-0 left-1/2 transform -translate-x-1/2">
                           </div>

                           <div class="col-span-4 space-y-1 pb-2 text-left justify-start">
                              <h3 class="text-gray-900 font-semibold"><?php echo $news['title']; ?></h3>
                              <p class="italic text-gray-400 text-sm"><?php echo date("d M,Y / h:ma", strtotime($news['create_at'])); ?></p>
                              <p class="text-sm font-semibold text-gray-400"><?php echo $news['location']; ?></p>
                           </div>
                           <a href="<?php echo base_url('/news/'.$news['id']) ?>" class="absolute inset-0"><span class="hidden">Link</span></a>
                        </div>

                         <?php }} ?>
 
                  <!-- Events List -->

                         <?php if(!empty($event_list)){ foreach ($event_list as $key => $event) { ?>

                           <div class="grid grid-cols-6 gap-3 py-5 relative">
                              <div class="bg-white p-2 relative col-span-2 flex items-center ">
                                 <p class="text-center w-16 mx-auto relative"><span
                                       class="uppecase text-sm text-gray-400 block font-medium"><?php echo date("M", strtotime($news['create_at'])); ?></span><span
                                       class="text-xl text-gray-900 font-semibold"><?php echo date("d", strtotime($news['create_at'])); ?></span></p>
                                 <hr class="border-b border-secondary w-8 absolute bottom-0 left-1/2 transform -translate-x-1/2">
                              </div>
   
                              <div class="col-span-4 space-y-1 pb-2 text-left justify-start">
                                 <h3 class="text-gray-900 font-semibold"><?php echo $news['title']; ?></h3>
                                 <p class="italic text-gray-400 text-sm"><?php echo date("d M,Y / h:ma", strtotime($news['create_at'])); ?></p>
                                 <p class="text-sm font-semibold text-gray-400"><?php echo $news['location']; ?></p>
                              </div>
                              <a href="<?php echo base_url('/event/'.$event['id']) ?>" class="absolute inset-0"><span class="hidden">Link</span></a>
                           </div>
   
                            <?php }} ?>
                        

                      
                     </div>

                  </div>
                </div>
            </div>
            </div>
         </section>
      </main>