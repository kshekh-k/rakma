<main class="">
    <!-- Hero Section -->
    <section class="relative">
        <div class="absolute inset-0 md:static lg:h-[600px] md:h-[500px] xl:h-auto"><img
                src="<?php echo base_url('assets/site'); ?>/src/dist/img/header-bg.png" alt=""
                class="object-cover max-w-none max-h-full"></div>
        <div class="relative z-10 md:absolute inset-0 py-10 md:py-20">
            <div class="max-w-screen-xl px-4 xl:px-12 mx-auto flex flex-col">

                <!-- Big Size Logo -->
                <div class="py-3 xs:flex gap-3 mx-auto max-w-xs sm:max-w-none hidden">
                    <span class="w-16 sm:w-28 lg:w-32 xl:w-40">
                        <img src="<?php echo base_url('assets/site'); ?>/src/dist/img/icon-logo-RAKMA.png" alt="">
                    </span>
                    <h1 class="flex flex-col text-gray-600">
                        <span
                            class="text-3xl sm:text-5xl xl:text-7xl font-extrabold text-primary xl:tracking-[5.5rem] lg:tracking-[3.7rem] md:tracking-[2.5rem] tracking-[1.5rem]">RAKMA</span>

                        <span
                            class="text-[0.7rem] sm:text-base lg:text-xl xl:text-3xl tracking-tighter font-bold sm:py-2">Raj.
                            Adhikari Karamchari Minority
                            Association</span>
                        <span
                            class="text-[0.7rem] sm:text-base lg:text-lg xl:text-3xl lg:tracking-[0.14rem] sm:tracking-[0.1rem] font-bold">राज.
                            अधिकारी कर्मचारी माइनॉरिटी
                            एसोसिएशन</span>
                    </h1>
                </div>


                <!-- Authorised Posts -->
                <div
                    class="flex flex-wrap justify-center gap-y-7 gap-x-3 sm:gap-x-5 lg:gap-x-7 xl:gap-x-10 pt-5 md:pt-10 lg:pt-14 text-center max-w-screen-lg mx-auto xl:max-w-none xl:px-0 ">


                    <?php if($memberlist) {  ?>

                    <?php foreach ($memberlist as $key => $member) { ?>

                    <div class="relative shrink-0">
                        <div class="border border-gray-300 p-1 lg:p-2 bg-white h-44 w-44 md:w-56 md:h-56">
                            <?php if(!empty($member['profile'])) {?>
                            <img src="<?php echo base_url('uploads/'.$member['profile']); ?>"
                                alt="<?php echo $member['profile'] ?>" class="w-auto h-auto min-w-full aspect-square" />
                            <?php }else { echo default_member_image(); } ?>
                        </div>
                        <!-- Name & Post -->
                        <p class=" flex flex-col justify-center items-center uppercase pt-4">
                            <strong
                                class="text-blues font-bold text-xs lg:text-base text-center"><?php echo $member['first_name']; ?>
                                <?php echo $member['middle_name']; ?> <?php echo $member['last_name']; ?></strong>
                            <span
                                class="text-xs lg:text-sm font-semibold text-gray-500 text-center"><?php echo $member['post_name']; ?></span>
                        </p>
                    </div>

                    <?php  } }  ?>



                </div>




            </div>
        </div>
    </section>



    <?php if($today_birthdays){ ?>

    <section class="relative py-10 lg:py-20 border-b border-black/10">
        <div class="max-w-screen-xl px-4 xl:px-12 mx-auto flex flex-col gap-3">
            <p class="text-secondary font-semibold text-center text-xl">
                <?php echo date('l j M, Y');  // Outputs the current day, date, and short month ?>
            </p>
            <h2 class="text-2xl sm:text-4xl leading-snug uppercase  text-primary font-bold tracking-wider text-center">
                Happy Birthday honorable members
            </h2>
            <p class="text-gray-600 font-semibold text-center text-xl">
                <?php echo ('Wishing you joy, success, and a wonderful year ahead!');  // Outputs the current day, date, and short month ?>
            </p>
            <div class="flex flex-wrap gap-y-7 gap-x-3 sm:gap-x-5 pt-5 justify-center">
                <?php foreach ($today_birthdays as $key => $today_birthday) { ?>
                <!-- grid-cols-2 xs:grid-cols-3 md:grid-cols-6 -->
                <div class="relative w-44 shrink-0">
                    <div class="border border-gray-300 p-1 bg-white">
                        <?php if(!empty($today_birthday['profile'])) {?>
                        <img src="<?php echo base_url('uploads/'.$today_birthday['profile']); ?>"
                            alt="<?php echo $member['profile'] ?>" class="w-auto h-auto min-w-full aspect-square">
                        <?php }else { echo default_member_image(); } ?>
                    </div>
                    <!-- Name & Post -->
                    <p class="flex flex-col justify-center items-center uppercase pt-4 max-w-full break-all">
                        <strong
                            class="text-blues text-center font-bold text-xs lg:text-sm"><?php echo $today_birthday['first_name'] ?>
                            <?php echo $today_birthday['middle_name'] ?> <?php echo $today_birthday['last_name'] ?>
                        </strong>
                        <span
                            class="text-xs text-center font-semibold text-gray-500 capitalize block pt-1"><?php echo $today_birthday['post_name'] ?>,
                            <?php echo $today_birthday['office_district']; ?></span>
                    </p>
                </div>
                <?php } ?>


            </div>

        </div>
    </section>
    <?php } ?>

    <!-- Membership Section-->
    <section class="relative py-10 lg:py-20">
        <div class="max-w-screen-lg xl:max-w-screen-xl px-4 xl:px-12 mx-auto">
            <div class="grid grid-cols-12 gap-4 sm:gap-10">
                <div
                    class="col-span-12 md:col-span-8 lg:col-span-6 flex flex-col justify-center space-y-5 lg:pr-5 md:py-10 pt-5">
                    <h2 class="text-2xl sm:text-4xl uppercase text-primary font-bold tracking-wider">Membership</h2>
                    <p class="text-xl text-blues"><span class="font-medium">Let's go together and change the destiny of
                            society and the country.</span></p>
                    <p class="leading-loose">The RAKMA invite all the minority goverment employe to join the vision to
                        build our country and sociaty here you can seve your services make any type of contribution. We
                        are dadicated to build Ideal Sociat and Ideal Nation.
                        You ca Join us with three option.</p>
                    <p class="text-xl text-blues uppercase"><b>Join our membership</b></p>
                    <a href="<?php echo base_url('/register'); ?>"
                        class="rounded flex justify-center items-center font-medium text-white tracking-wider uppercase bg-primary hover:bg-secondary shadow-md py-4 w-56">Register
                        Now</a>
                </div>
                <div class="col-span-12 md:col-span-4 lg:col-span-6 flex items-center py-10">
                    <div class="abtSlider">
                        <div x-data="{swiper: null}" x-init="swiper = new Swiper($refs.container, {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 0,
  
      
    })" class="relative flex flex-row slider-container">
                            <div class="absolute inset-y-0 left-0 z-10 flex items-center">
                                <button @click="swiper.slidePrev()"
                                    class="bg-white -ml-2 lg:-ml-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-left w-6 h-6">
                                        <path fill-rule="evenodd"
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>

                            <div class="swiper-container" x-ref="container">
                                <div class="swiper-wrapper">
                                    <!-- Slides -->
                                    <?php if(get_data(array('status' => '1') , $table='slider' , $order_by = 'DESC')) { foreach (get_data(array('status' => '1') ,  $table='slider' , $order_by = 'DESC') as $key => $slider) {
                    
                   ?>

                                    <div class="swiper-slide p-1">
                                        <img class="w-full object-cover"
                                            src="<?php echo base_url('/uploads/'.$slider['image']) ?>" alt=""
                                            width="530">
                                    </div>
                                    <?php }  } ?>


                                </div>
                            </div>

                            <div class="absolute inset-y-0 right-0 z-10 flex items-center">
                                <button @click="swiper.slideNext()"
                                    class="bg-white -mr-2 lg:-mr-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-right w-6 h-6">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                    </div>
                    <img src="<?php echo base_url('assets/site'); ?>/src/dist/img/map-colarge.png" alt=""
                        class="w-full hidden">
                </div>

            </div>
        </div>
    </section>

    <!-- News & Events Section-->
    <section class="relative bg-gray-100">
        <div class="max-w-screen-lg xl:max-w-screen-xl px-4 xl:px-12 mx-auto">
            <div class="grid grid-cols-12 gap-5 lg:gap-10 py-5 md:py-10">

                <div class="col-span-12 md:col-span-6 flex flex-col justify-center md:space-y-5 lg:pr-5 md:py-10">
                    <h2 class="text-2xl sm:text-4xl uppercase text-primary font-bold tracking-wider">NEWS<span
                            class="block text-sm text-gray-600 font-medium tracking-tight normal-case">RAKMA’s latest
                            news</span></h2>

                    <!-- News List -->
                    <div class="divide-y divide-gray-300">

                        <?php if(!empty($news_list)){ foreach ($news_list as $key => $news) {  ?>



                        <div class="grid grid-cols-6 gap-3 py-5 relative">
                            <div
                                class="bg-white p-2 relative md:col-span-2 col-span-2 lg:col-span-1 xs:col-span-1 flex items-center">
                                <p class="text-center w-16 mx-auto relative"><span
                                        class="uppecase text-sm text-gray-400 block font-medium"><?php echo date("M", strtotime($news['create_at'])); ?></span><span
                                        class="text-xl text-gray-900 font-semibold"><?php echo date("d", strtotime($news['create_at'])); ?></span>
                                </p>
                                <hr
                                    class="border-b border-secondary w-8 absolute bottom-0 left-1/2 transform -translate-x-1/2">
                            </div>

                            <div class="md:col-span-4 col-span-4 lg:col-span-5 xs:col-span-5 space-y-1 pb-2">
                                <h3 class="text-gray-900 font-semibold"><?php echo $news['title']; ?></h3>
                                <p class="italic text-gray-400 text-sm">
                                    <?php echo date("d M,Y / h:ma", strtotime($news['create_at'])); ?></p>
                                <p class="text-sm font-semibold text-gray-400"><?php echo $news['location']; ?></p>
                            </div>
                            <a href="<?php echo base_url('/news/'.$news['id']) ?>" class="absolute inset-0"><span
                                    class="hidden">Link</span></a>
                        </div>

                        <?php }} ?>




                    </div>

                </div>




                <div class="col-span-12 md:col-span-6 flex flex-col justify-center md:space-y-5 lg:pl-5 md:py-10">
                    <h2 class="text-2xl sm:text-4xl uppercase text-primary font-bold tracking-wider">Events<span
                            class="block text-sm text-gray-600 font-medium tracking-tight normal-case">RAKMA’s latest
                            Events</span></h2>

                    <!-- Events List -->
                    <div class="divide-y divide-gray-300">


                        <?php if(!empty($event_list)){ foreach ($event_list as $key => $event) { ?>

                        <div class="grid grid-cols-6 gap-3 py-5">
                            <div
                                class="bg-white p-2 relative md:col-span-2 col-span-2 lg:col-span-1 xs:col-span-1 flex items-center">
                                <p class="text-center w-16 mx-auto relative"><span
                                        class="uppecase text-sm text-gray-400 block font-medium"><?php echo date("M", strtotime($event['create_at'])); ?></span><span
                                        class="text-xl text-gray-900 font-semibold"><?php echo date("d", strtotime($event['create_at'])); ?></span>
                                </p>
                                <hr
                                    class="border-b border-secondary w-8 absolute bottom-0 left-1/2 transform -translate-x-1/2">
                            </div>

                            <div class="md:col-span-4 col-span-4 lg:col-span-5 xs:col-span-5 space-y-1 pb-2">
                                <h3 class="text-gray-900 font-semibold"><?php echo $event['title']; ?></h3>
                                <p class="italic text-gray-400 text-sm">
                                    <?php echo date("d M,Y / h:ma", strtotime($event['create_at'])); ?></p>
                                <p class="text-sm font-semibold text-gray-400"><?php echo $event['location']; ?></p>
                            </div>
                            <a href="<?php echo base_url('/event/'.$event['id']) ?>" class="absolute inset-0"><span
                                    class="hidden">Link</span></a>
                        </div>

                        <?php }} ?>





                    </div>

                </div>
            </div>
        </div>
    </section>


    <?php if(!empty($gallery)) {  ?>



    <!-- Gallery Section-->
    <section class="relative ">
        <div class="max-w-screen-lg xl:max-w-screen-xl px-4 xl:px-12 mx-auto">
            <div class="py-10 md:py-20">
                <h2 class="text-2xl sm:text-4xl uppercase text-primary font-bold tracking-wider">
                    <?php echo $gallery['title']; ?></h2>

                <div class="galley_container__<?php echo $gallery['id']; ?>  lightgallery grid md:grid-cols-3 grid-cols-2 gap-3 md:gap-5 lg:gap-10 pt-5 md:pt-10"
                    id="lightgallery__<?php echo $gallery['id']; ?>" data-lg-size="1600-2400">
                    <?php if (isset($gallery_images) && !empty($gallery_images)) {

            foreach ($gallery_images as $key => $images) {
              
           ?>
                    <a class="gl-thumb rounded-md overflow-hidden relative"
                        href="<?php echo base_url('uploads/'.$images["image"]); ?>">
                        <img src="<?php echo base_url('uploads/'.$images["image"]); ?>" alt="">
                        <span
                            class="absolute inset-0 bg-primary bg-opacity-70 opacity-0 transform scale-95 flex items-center justify-center">
                            <span class="text-white"><svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                </svg></span>
                        </span>
                    </a>

                    <?php }} ?>

                </div>

                <div class="flex justify-center mt-10 gallery__<?php echo $gallery['id']; ?>">
                    <a href="javascript:void(0)"
                        onclick="loadmore('<?php echo $gallery['id']; ?>' , '3', '<?php echo count($gallery_images); ?>');"
                        class="rounded flex justify-center items-center font-medium text-white tracking-wider uppercase bg-primary hover:bg-secondary shadow-md py-4 px-10 ">View
                        All</a>
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


    <!-- Get to know Featured -->
    <section class="grid md:grid-cols-12 gap-0">
        <div class="col-span-4 overflow-hidden relative"><img
                src="<?php echo base_url('assets/site'); ?>/src/dist/img/get-to-know-2.png" alt="">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-end p-10">
                <div class="">
                    <p class="text-3xl lg:text-4xl xl:text-6xl font-bold text-white uppercase"><span
                            class="block font-light">Our</span>
                        Story</p>
                    <a href="<?php echo base_url('page/about') ?>"
                        class="text-white font-medium uppercase tracking-wider inline-flex mt-3 text-lg hover:text-secondary">About
                        us</a>
                </div>
            </div>
        </div>
        <div class="col-span-4 overflow-hidden relative"><img
                src="<?php echo base_url('assets/site'); ?>/src/dist/img/get-to-know.png" alt="">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-end p-10">
                <div class="">
                    <p class="text-3xl lg:text-4xl xl:text-6xl font-bold text-white uppercase"><span
                            class="block font-light">Our</span>
                        Vision</p>
                    <a href="<?php echo base_url('page/about') ?>#aim"
                        class="text-white font-medium uppercase tracking-wider inline-flex mt-3 text-lg hover:text-secondary">Know
                        More</a>
                </div>
            </div>
        </div>
        <div class="col-span-4 overflow-hidden relative"><img
                src="<?php echo base_url('assets/site'); ?>/src/dist/img/get-to-know-3.png" alt="">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-end p-10">
                <div class="">
                    <p class="text-3xl lg:text-4xl xl:text-6xl font-bold text-white uppercase"><span
                            class="block font-light">Social</span>
                        Activity</p>
                    <a href="<?php echo base_url('/welfare/welfarelist') ?>"
                        class="text-white font-medium uppercase tracking-wider inline-flex mt-3 text-lg hover:text-secondary">Know
                        More</a>
                </div>
            </div>
        </div>
    </section>




    <!-- Download Section -->
    <section class="bg-secondary">
        <div class="max-w-screen-lg xl:max-w-screen-xl px-4 xl:px-12 mx-auto">
            <div class="py-10 md:py-20">
                <h2 class="text-2xl sm:text-4xl uppercase text-white font-bold tracking-wider">Download<span
                        class="block text-xl font-medium  normal-case">Goverment’s vacancies & important form
                        forms</span></h2>


                <div
                    class="border-t border-b border-white border-opacity-40 py-6 space-y-5 mt-10 divide-y divide-white divide-opacity-40">

                    <?php if(!empty($download_list)){ foreach ($download_list as $key => $download) {   ?>

                    <div
                        class="grid grid-cols-12 p-3  gap-3 hover:bg-opacity-10 bg-opacity-0 bg-white transition ease-in-out 0.35s rounded">
                        <div class="lg:col-span-4 col-span-12 relative pl-16">
                            <!-- Logo -->
                            <div class="flex justify-start xl:justify-center w-14  absolute left-0 ">
                                <?php if ($download['image']) { ?>
                                <img src="<?php echo base_url('assets/site'); ?>/src/dist/img/download-1.png" class=""
                                    alt="">
                                <?php }  ?>
                            </div>
                            <!-- Name & Date -->
                            <div class="text-white ">
                                <p class="text-xl font-semibold truncate"><?php echo $download['title'];  ?></p>
                                <span
                                    class="text-sm font-normal"><?php echo date("d M, Y", strtotime($download['date'])); ?></span>
                            </div>
                        </div>
                        <!-- Description -->
                        <div class="text-white col-span-12 lg:col-span-8 xl:col-span-5 xl:pr-5">
                            <p class="lg:line-clamp-2 line-clamp-4 text-lg"><?php echo $download['description'];  ?></p>
                        </div>
                        <!-- Buttons -->
                        <div
                            class="text-white flex gap-3 items-center col-span-12 xl:col-span-3 justify-start lg:justify-end">

                            <?php if(!empty($download['url'])){ ?>

                            <a href="<?php echo $download['url'];  ?>"
                                class="bg-white rounded text-secondary py-3 px-4 uppercase font-medium whitespace-nowrap flex items-center border border-white hover:bg-primary hover:text-white">View
                                Site</a>

                            <?php } ?>

                            <?php if(!empty($download['file'])){ ?>

                            <a href="<?php echo base_url('uploads/'.$download["file"]);  ?>"
                                class="bg-blues rounded text-white py-3 px-4 uppercase font-medium whitespace-nowrap flex items-center border border-white hover:bg-primary hover:text-white">Download</a>

                            <?php } ?>
                        </div>
                    </div>

                    <?php }}  ?>



                </div>




                <div class="flex justify-center mt-10">
                    <a href="javascript:void(0)"
                        class="rounded flex justify-center items-center font-medium text-white tracking-wider uppercase bg-primary hover:bg-blues shadow-md py-4 px-10 border border-white">View
                        All</a>
                </div>


            </div>
        </div>
    </section>



</main>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<script type="text/javascript">
function gallery() {
    lightGallery(document.getElementById('lightgallery'), {
        plugins: [lgZoom, lgThumbnail],
        speed: 500,

    });
}

function loadmore(gallery_id, per_page, row) {



    $.ajax({
        type: "POST",
        url: '<?php echo base_url('/page/loadmore') ?>',
        data: {
            gallery_id: gallery_id,
            per_page: per_page,
            row: row
        },
        dataType: "json",
        success: function(data) {

            $(".galley_container__" + gallery_id).append(data.data);
            $(".gallery__" + gallery_id).html(data.btn);
            gallery();

        }
    });
}
</script>