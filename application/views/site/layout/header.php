<!DOCTYPE html>
<html lang="en" class="font-sans">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RAKMA</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?php echo base_url('uploads/') ?><?php echo get_settings('favicon'); ?>">
    <!-- TailwindCSS -->
    <link href="<?php echo base_url('assets/site'); ?>/src/dist/css/styles.css" rel="stylesheet">

    <!-- TailwindCSS -->
    <link href="<?php echo base_url('assets/site'); ?>/src/dist/css/custom.css" rel="stylesheet">

    <!-- Fonts Montserrat -->
    <!-- <link href="<?php echo base_url('assets/site'); ?>/node_modules/typeface-montserrat/index.css" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- Light gallery -->
    <!-- <link type="text/css" rel="stylesheet" href="./node_modules/lightgallery/css/lightgallery-bundle.min.css" /> -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lightgallery-bundle.min.css"
        integrity="sha512-nUqPe0+ak577sKSMThGcKJauRI7ENhKC2FQAOOmdyCYSrUh0GnwLsZNYqwilpMmplN+3nO3zso8CWUgu33BDag=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Light gallery -->
    <link type="text/css" rel="stylesheet" href="https://unpkg.com/swiper@6.8.4/swiper-bundle.min.css" />


    <!-- lightgallery  -->
    <!-- <script src="./node_modules/lightgallery/lightgallery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/lightgallery.min.js"
        integrity="sha512-jEJ0OA9fwz5wUn6rVfGhAXiiCSGrjYCwtQRUwI/wRGEuWRZxrnxoeDoNc+Pnhx8qwKVHs2BRQrVR9RE6T4UHBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- lightgallery plugins -->
    <!-- <script src="./node_modules/lightgallery/plugins/thumbnail/lg-thumbnail.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/thumbnail/lg-thumbnail.min.js"
        integrity="sha512-VBbe8aA3uiK90EUKJnZ4iEs0lKXRhzaAXL8CIHWYReUwULzxkOSxlNixn41OLdX0R1KNP23/s76YPyeRhE6P+Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="./node_modules/lightgallery/plugins/zoom/lg-zoom.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/zoom/lg-zoom.min.js"
        integrity="sha512-BLW2Jrofiqm6m7JhkQDIh2olT0EBI58+hIL/AXWvo8gOXKmsNlU6myJyEkTy6rOAAZjn0032FRk8sl9RgXPYIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       
</head>

<body>
    <div class="relative overflow-hidden  ">
        <!--/ Header start-->
        <header class="flex items-center flex-col relative z-20" x-data="{menu: false}">
            <!-- Header top -->
            <div class="border-b border-gray-200 py-2 w-full">
                <div class="max-w-screen-lg xl:max-w-screen-xl px-4 lg:px-0 xl:px-12 mx-auto flex">
                    <div class="text-blues font-bold ml-0 text-xs xs:text-base">रजि. नं. 103151/2018/ जय.</div>
                    <div class="font-medium ml-auto mr-0 flex items-center uppercase text-xs xs:text-sm "><a
                            href="javascript:void(0)" class="text-gray-500 hover:text-secondary ">हिंदी</a><span
                            class="text-gray-300 mx-2 inline-block">|</span><a
                            href="<?php echo base_url('/page/contact') ?>"
                            class="text-gray-500 hover:text-secondary">Contact us</a></div>
                </div>
            </div>
            <!-- Header Middle -->
            <div class="border-b border-gray-300 py-2 w-full relative">
                <div class="absolute left-0 top-0 w-10 xl:w-auto"><img
                        src="<?php echo base_url('assets/site'); ?>/src/dist/img/hgtl.png" alt=""></div>
                <div class="absolute top-0 right-0 w-10 xl:w-auto"><img
                        src="<?php echo base_url('assets/site'); ?>/src/dist/img/hgtr.png" alt=""></div>
                <div class="max-w-screen-lg xl:max-w-screen-xl px-4 xl:px-12 mx-auto flex flex-col md:flex-row">
                    <div class="text-blues font-bold mx-auto md:ml-0 xs:max-w-xs md:max-w-none  ">
                        <a href="<?php echo base_url(); ?>" class="pb-2 xs:py-3 flex gap-3 ">
                            <span class="w-14 xs:w-20">
                                <img src="<?php echo base_url('/uploads/') ?><?php echo get_settings('logo'); ?>" alt=""
                                    class="">
                            </span>
                            <span class="flex flex-col text-gray-600">
                                <span
                                    class="text-4xl font-extrabold text-primary lg:tracking-[2.5rem] md:tracking-[1.5rem] xs:tracking-[1.3rem]   leading-none">RAKMA</span>

                                <span
                                    class="text-[0.6rem] xs:text-[0.7rem] lg:text-sm tracking-tighter whitespace-nowrap">Raj.
                                    Adhikari Karamchari Minority Association</span>
                                <span
                                    class="text-[0.6rem] xs:text-[0.7rem] lg:text-sm xs:tracking-[0.07em] font-bold whitespace-nowrap">राज.
                                    अधिकारी कर्मचारी माइनॉरिटी
                                    एसोसिएशन</span>
                            </span>

                        </a>
                    </div>
                    <div class="mx-auto md:mr-0 flex items-center flex-wrap md:pl-5 lg:pl-0">
                        <div class="flex items-center justify-center md:justify-end w-full">
                            <a href="tel:<?php echo get_settings('site_phone'); ?>"
                                class="text-gray-500 hover:text-secondary hidden space-x-1"><svg
                                    viewBox="0 0 14.47 14.5" fill="currentColor" class="w-3.5">
                                    <path
                                        d="M1113.73,68.517a0.431,0.431,0,0,1-.05,0,0.559,0.559,0,0,1-.56-0.515,5.656,5.656,0,0,0-5.13-5.125,0.566,0.566,0,0,1,.1-1.128,6.839,6.839,0,0,1,6.16,6.151A0.571,0.571,0,0,1,1113.73,68.517Zm-5.5-2.145a2.281,2.281,0,0,1,1.39,1.431,0.566,0.566,0,0,1-.35.716,0.557,0.557,0,0,1-.18.029,0.568,0.568,0,0,1-.54-0.387,1.135,1.135,0,0,0-.7-0.721A0.567,0.567,0,0,1,1108.23,66.372Zm-0.11-2.348a4.55,4.55,0,0,1,3.85,3.85,0.562,0.562,0,0,1-.48.641,0.451,0.451,0,0,1-.08.006,0.564,0.564,0,0,1-.56-0.486,3.419,3.419,0,0,0-2.89-2.889A0.566,0.566,0,0,1,1108.12,64.024Zm-2.95,2.724a4.5,4.5,0,0,0-.76.374c-0.53.537-.86,1.411,1.11,3.387A4.281,4.281,0,0,0,1107.95,72a1.35,1.35,0,0,0,.96-0.44,4.83,4.83,0,0,0,.35-0.725,2.077,2.077,0,0,1,3.38-.7l0.98,0.952s0.01,0,.01.007a2.1,2.1,0,0,1,.61,1.4,2.074,2.074,0,0,1-.49,1.449c-0.15.18-.31,0.356-0.47,0.523a5.78,5.78,0,0,1-4.16,1.777c-5.81-.043-12.62-8.509-7.65-13.486,0.18-.18.37-0.353,0.56-0.514a2.12,2.12,0,0,1,2.86.121v0.007l0.96,1A2.076,2.076,0,0,1,1105.17,66.747Zm-0.12-2.577c-0.01,0-.01,0-0.01-0.007l-0.96-.995a0.973,0.973,0,0,0-1.32-.05,5.622,5.622,0,0,0-.48.44c-2.65,2.693-1.19,6.371,1.36,8.89,2.52,2.512,6.19,3.885,8.84,1.225a5.363,5.363,0,0,0,.4-0.448,0.972,0.972,0,0,0-.05-1.321l-0.98-.952c-0.01,0-.01,0-0.01-0.006a0.935,0.935,0,0,0-1.53.313,4.3,4.3,0,0,1-.58,1.086,2.476,2.476,0,0,1-1.78.789,5.1,5.1,0,0,1-3.23-1.826c-1.29-1.236-2.78-3.343-1.1-5a4.575,4.575,0,0,1,1.12-.608A0.941,0.941,0,0,0,1105.05,64.17Z"
                                        transform="translate(-1099.78 -61.75)" />
                                </svg>
                                <span><?php echo get_settings('site_phone'); ?></span>
                            </a>

                            <span class="text-gray-300 mx-2 hidden">|</span>

                            <a href="mailto:help@rakma.org"
                                class="text-gray-500 hover:text-secondary inline-flex space-x-1"><svg
                                    viewBox="0 0 17.62 13.875" fill="currentColor" class="w-4">
                                    <path
                                        d="M1252.69,76.43h-9.38a4.126,4.126,0,0,1-4.13-4.117V66.687a4.126,4.126,0,0,1,4.13-4.117h9.38a4.133,4.133,0,0,1,4.13,4.117v5.626A4.133,4.133,0,0,1,1252.69,76.43Zm2.75-9.743a2.748,2.748,0,0,0-2.75-2.744h-9.38a2.748,2.748,0,0,0-2.75,2.744v5.626a2.748,2.748,0,0,0,2.75,2.744h9.38a2.748,2.748,0,0,0,2.75-2.744V66.687Zm-4.92,4.028a4.152,4.152,0,0,1-5.01,0v0l-3.31-2.556a0.687,0.687,0,0,1-.12-0.963,0.7,0.7,0,0,1,.97-0.121l3.3,2.554a2.772,2.772,0,0,0,3.34,0l3.4-2.59a0.7,0.7,0,0,1,.97.129,0.687,0.687,0,0,1-.13.962Z"
                                        transform="translate(-1239.19 -62.563)" />
                                </svg>
                                <span><?php echo get_settings('site_email'); ?></span>

                            </a>
                        </div>

                        <div class="flex items-center gap-1 justify-end w-full max-w-lg mx-auto md:mr-0 pt-1">
                            <!-- Search Bar -->
                            <div class="relative w-full ">
                                <input type="text"
                                    class="border border-gray-300 rounded py-2 md:py-3 pl-4 focus:outline-none outline-none ring-0 focus:ring-0 focus:border-secondary focus:placeholder-secondary focus:text-secondary w-full pr-12"
                                    placeholder="Search">
                                <button
                                    class="absolute top-0 right-0 rounded-r w-12 items-center justify-center flex inset-y-0 bg-primary text-white cursor-pointer  focus:outline-none hover:bg-secondary"><svg
                                        class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg></button>
                            </div>


                            <!-- Social media -->
                            <div class="relative hidden lg:flex gap-1  ">
                                <!-- Instagram -->
                                <a href="<?php echo get_settings('insatgram'); ?>"
                                    class="flex items-center justify-center bg-secondary w-12 h-12 rounded text-white hover:bg-gray-600">
                                    <svg viewBox="0 0 128 128" fill="currentColor" class="w-7">
                                        <path
                                            d="M83,23a22,22,0,0,1,22,22V83a22,22,0,0,1-22,22H45A22,22,0,0,1,23,83V45A22,22,0,0,1,45,23H83m0-8H45A30.09,30.09,0,0,0,15,45V83a30.09,30.09,0,0,0,30,30H83a30.09,30.09,0,0,0,30-30V45A30.09,30.09,0,0,0,83,15Z" />
                                        <path class="cls-1"
                                            d="M90.14,32a5.73,5.73,0,1,0,5.73,5.73A5.73,5.73,0,0,0,90.14,32Z" />
                                        <path
                                            d="M64.27,46.47A17.68,17.68,0,1,1,46.6,64.14,17.7,17.7,0,0,1,64.27,46.47m0-8A25.68,25.68,0,1,0,90,64.14,25.68,25.68,0,0,0,64.27,38.47Z" />
                                    </svg>
                                </a>

                                <!-- Facebook -->
                                <a href="<?php echo get_settings('facebook'); ?>"
                                    class="flex items-center justify-center bg-blues w-12 h-12 rounded text-white hover:bg-gray-600">
                                    <svg viewBox="0 0 128 128" fill="currentColor" class="w-7">
                                        <path d="M76.5,117.3H50.4v-42H33.9V50.1h16.6V38.3c0-0.9,0-11.3,7.7-19.2c5.4-5.6,13.2-8.4,23.1-8.4
               c4.1,0.1,8.2,0.4,12.2,1l2.8,0.4v22.9H85.4c-2.9,0.1-6.2,0.5-7.2,0.9c-0.1,0.1-0.2,0.2-0.3,0.3c-1,0.8-1.4,1.3-1.4,1.9v11.9h19.1
               l-2.7,25.1H76.5V117.3z M56.9,110.8H70v-42h17l1.3-12.1H70V38.3c0-3.8,2.5-5.9,3.7-6.9c0.1-0.1,0.2-0.2,0.3-0.3l0.1-0.1
               c1.6-1.4,5.4-2.2,11.2-2.3l4.3,0V17.8c-2.8-0.3-5.7-0.5-8.5-0.6c-8,0-14.2,2.2-18.4,6.4c-5.9,6.1-5.8,14.4-5.8,14.5l0,0.1v18.4H40.4
               v12.1h16.6V110.8z" />
                                    </svg>

                                </a>

                                <!-- Twitter -->
                                <a href="<?php echo get_settings('twitter'); ?>"
                                    class="flex items-center justify-center bg-black w-12 h-12 rounded text-white hover:bg-gray-600">


                                    <svg x viewBox="0 0 32 32" fill="currentColor" class="w-7">
                                        <path
                                            d="M 4.0175781 4 L 13.091797 17.609375 L 4.3359375 28 L 6.9511719 28 L 14.246094 19.34375 L 20.017578 28 L 20.552734 28 L 28.015625 28 L 18.712891 14.042969 L 27.175781 4 L 24.560547 4 L 17.558594 12.310547 L 12.017578 4 L 4.0175781 4 z M 7.7558594 6 L 10.947266 6 L 24.279297 26 L 21.087891 26 L 7.7558594 6 z">
                                        </path>
                                    </svg>


                                </a>

                                <!-- Whatsapp -->
                                <a href="<?php echo get_settings('whatsapp'); ?>"
                                    class="flex items-center justify-center bg-primary w-12 h-12 rounded text-white hover:bg-gray-600">
                                    <svg viewBox="0 0 56.693 56.693" fill="currentColor" class="w-6">
                                        <path
                                            d="M46.3802,10.7138c-4.6512-4.6565-10.8365-7.222-17.4266-7.2247c-13.5785,0-24.63,11.0506-24.6353,24.6333   c-0.0019,4.342,1.1325,8.58,3.2884,12.3159l-3.495,12.7657l13.0595-3.4257c3.5982,1.9626,7.6495,2.9971,11.7726,2.9985h0.01   c0.0008,0-0.0006,0,0.0002,0c13.5771,0,24.6293-11.0517,24.635-24.6347C53.5914,21.5595,51.0313,15.3701,46.3802,10.7138z    M28.9537,48.6163h-0.0083c-3.674-0.0014-7.2777-0.9886-10.4215-2.8541l-0.7476-0.4437l-7.7497,2.0328l2.0686-7.5558   l-0.4869-0.7748c-2.0496-3.26-3.1321-7.028-3.1305-10.8969c0.0044-11.2894,9.19-20.474,20.4842-20.474   c5.469,0.0017,10.6101,2.1344,14.476,6.0047c3.8658,3.8703,5.9936,9.0148,5.9914,14.4859   C49.4248,39.4307,40.2395,48.6163,28.9537,48.6163z" />
                                        <path
                                            d="M40.1851,33.281c-0.6155-0.3081-3.6419-1.797-4.2061-2.0026c-0.5642-0.2054-0.9746-0.3081-1.3849,0.3081   c-0.4103,0.6161-1.59,2.0027-1.9491,2.4136c-0.359,0.4106-0.7182,0.4623-1.3336,0.1539c-0.6155-0.3081-2.5989-0.958-4.95-3.0551   c-1.83-1.6323-3.0653-3.6479-3.4245-4.2643c-0.359-0.6161-0.0382-0.9492,0.27-1.2562c0.2769-0.2759,0.6156-0.7189,0.9234-1.0784   c0.3077-0.3593,0.4103-0.6163,0.6155-1.0268c0.2052-0.4109,0.1027-0.7704-0.0513-1.0784   c-0.1539-0.3081-1.3849-3.3379-1.8978-4.5706c-0.4998-1.2001-1.0072-1.0375-1.3851-1.0566   c-0.3585-0.0179-0.7694-0.0216-1.1797-0.0216s-1.0773,0.1541-1.6414,0.7702c-0.5642,0.6163-2.1545,2.1056-2.1545,5.1351   c0,3.0299,2.2057,5.9569,2.5135,6.3676c0.3077,0.411,4.3405,6.6282,10.5153,9.2945c1.4686,0.6343,2.6152,1.013,3.5091,1.2966   c1.4746,0.4686,2.8165,0.4024,3.8771,0.2439c1.1827-0.1767,3.6419-1.489,4.1548-2.9267c0.513-1.438,0.513-2.6706,0.359-2.9272   C41.211,33.7433,40.8006,33.5892,40.1851,33.281z" />
                                    </svg>
                                </a>
                            </div>



                        </div>

                    </div>
                </div>
            </div>


            <!-- Marqee Events -->
            <div class="bg-gray-100 border-b border-gray-300 pt-2 sm:pt-4 w-full">
                <div class="max-w-screen-lg xl:max-w-screen-xl px-4 xl:px-12 mx-auto flex flex-col">
                    <marquee behavior="" direction="" class="font-semibold text-sm sm:text-base hidden">

                        <!--    <a href="<?php echo base_url('/register'); ?>" class="hover:text-secondary">राज अधिकारी कर्मचारी माइनॉरिटी एसोसएिशन RAKMA का सदस्‍यता अभियान शुरू</a><span class="text-gray-300 mx-2 inline-block">|</span>  -->
                        <!-- <a href="javascript:void(0);" class="hover:text-secondary">तकनीकि कारणों से अभी सदसयता अभियान को दो-तीन दिनों  (24-25 सितम्बर तक)  के लिए स्थगित कर दिया गया है।</a><span class="text-gray-300 mx-2 inline-block">|</span> -->



                        <?php if(get_data(array('status' => '1') , $table='news' , $order_by = 'DESC' , $limit = '3')) { foreach (get_data(array('status' => '1') ,  $table='news' , $order_by = 'DESC' , $limit = '3') as $key => $news) {
                    
                   ?>

                        <a href="<?php echo base_url('/news/'.$news['id']) ?>"
                            class="hover:text-secondary"><?php echo $news['title']; ?></a><span
                            class="text-gray-300 mx-2 inline-block">|</span>
                        <?php }  } ?>



                        <?php if(get_data(array('status' => '1') ,  $table='events' , $order_by = 'DESC' , $limit = '3')) { foreach (get_data(array('status' => '1') ,  $table='events' , $order_by = 'DESC' , $limit = '3') as $key => $event) {
                    
                   ?>

                        <a href="<?php echo base_url('/event/'.$event['id']) ?>"
                            class="hover:text-secondary"><?php echo $event['title']; ?></a><span
                            class="text-gray-300 mx-2 inline-block">|</span>
                        <?php }  } ?>

                    </marquee>

                    <nav class="bg-blues rounded flex mt-2 sm:mt-3 -mb-8 h-12 lg:h-16 w-full shadow-md relative"
                        x-data="{menu: false}">
                        <button class="md:hidden text-white px-4" @click="menu = !menu">
                            <svg :class="{'hidden':menu, '':!menu}" viewBox="0 0 14 10" fill="currentColor" class="w-4">
                                <path d="M1128,240h14v2h-14v-2Zm0,4h14v2h-14v-2Zm0,4h14v2h-14v-2Z"
                                    transform="translate(-1128 -240)" />
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5" viewBox="0 0 20 20" fill="currentColor"
                                :class="{'':menu, 'hidden':!menu}">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>

                        </button>
                        <ul class=" menu md:flex flex-col md:flex-row bg-blues rounded items-stretch gap-1 justify-between w-full uppercase md:px-2 lg:px-5 flex-1 text-sm md:text-[0.7rem] lg:text-sm xl:text-base absolute top-14 space-y-1 p-4 md:space-y-0 md:static md:top-auto md:py-0"
                            x-show="menu" @click.away="menu = false"
                            x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 "
                            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-500"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                            <li class="flex items-stretch "><a href="<?php echo base_url(); ?>"
                                    class="menu-item py-2 flex justify-center items-center font-semibold text-white hover:border-white border-b-2 border-transparent hover:bg-opacity-5 bg-opacity-0 bg-white">Home</a>
                            </li>
                            <li class="flex items-stretch"><a href="<?php echo base_url('/page/about') ?>"
                                    class="menu-item py-2 flex justify-center items-center font-semibold text-white hover:border-white border-b-2 border-transparent hover:bg-opacity-5 bg-opacity-0 bg-white">About
                                    Us</a></li>
                            <li class="flex items-stretch"><a href="<?php echo base_url('/page/executives'); ?>"
                                    class="menu-item py-2 flex justify-center items-center font-semibold text-white hover:border-white border-b-2 border-transparent hover:bg-opacity-5 bg-opacity-0 bg-white">Executive</a>
                            </li>
                            <li class="flex flex-wrap md:flex-nowrap items-stretch group relative">
                                <button
                                    class="menu-item py-2 w-full uppercase justify-start md:justify-center items-stretch font-semibold text-white hover:border-white border-b-2 border-transparent hover:bg-opacity-5 bg-opacity-0 bg-white flex">
                                    <span class="flex items-center">Welfare</span>
                                    <svg class="ml-1 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div
                                    class="hidden group-hover:block md:origin-top-right md:absolute md:left-0 md:w-60 md:rounded-b-md md:shadow-lg py-2 md:py-1 md:bg-white md:ring-1 md:ring-black md:ring-opacity-5 md:transition md:ease-out md:duration-100 md:top-full md:shadow-3xl md:transform md:opacity-100 w-full">
                                    <?php if(get_data(array('status' => '1') , $table='category' , $order_by = 'DESC')) { foreach (get_data(array('status' => '1') ,  $table='category' , $order_by = 'DESC') as $key => $cat) {
                    
                                ?>
                                    <a href="<?php echo base_url('/welfare/category/'.$cat['id']); ?>"
                                        class="text-white block md:px-4 py-2 md:text-sm md:text-gray-700 md:hover:bg-blues md:hover:text-white font-semibold"
                                        role="menuitem"><?php echo $cat['cat_name']; ?></a>
                                    <?php }  } ?>
                                </div>
                            </li>
                            <li class="flex items-stretch"><a href="<?php echo base_url('/news/newslist') ?>"
                                    class="menu-item py-2 flex justify-center items-center font-semibold text-white hover:border-white border-b-2 border-transparent hover:bg-opacity-5 bg-opacity-0 bg-white">News</a>
                            </li>
                            <li class="flex items-stretch"><a href="<?php echo base_url('/event/eventlist') ?>"
                                    class="menu-item py-2 flex justify-center items-center font-semibold text-white hover:border-white border-b-2 border-transparent hover:bg-opacity-5 bg-opacity-0 bg-white">Events</a>
                            </li>
                            <li class="flex items-stretch"><a href="<?php echo base_url('page/gallery') ?>"
                                    class="menu-item py-2 flex justify-center items-center font-semibold text-white hover:border-white border-b-2 border-transparent hover:bg-opacity-5 bg-opacity-0 bg-white">Gallery</a>
                            </li>

                            <li class="flex flex-wrap md:flex-nowrap items-stretch group relative">
                                <button
                                    class="menu-item py-2 w-full justify-start md:justify-center uppercase items-stretch font-semibold text-white hover:border-white border-b-2 border-transparent hover:bg-opacity-5 bg-opacity-0 bg-white flex">
                                    <span class="flex items-center">Membership</span>
                                    <svg class="ml-1 w-5 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div
                                    class="hidden group-hover:block md:origin-top-right md:absolute md:left-0 md:w-60 md:rounded-b-md md:shadow-lg py-2 md:py-1 md:bg-white md:ring-1 md:ring-black md:ring-opacity-5 md:transition md:ease-out md:duration-100 md:top-full md:shadow-3xl md:transform md:opacity-100 w-full">
                                    <a href="<?php echo base_url('/register'); ?>"
                                        class="text-white block md:px-4 py-2 md:text-sm md:text-gray-700 md:hover:bg-blues md:hover:text-white font-semibold"
                                        role="menuitem">Join Now</a>


                                    <a href="<?php echo base_url('/page/membershipupgrade'); ?>"
                                        class="text-white block md:px-4 py-2 md:text-sm md:text-gray-700 md:hover:bg-blues md:hover:text-white font-semibold"
                                        role="menuitem">Upgrade Membership</a>

                                    <!-- <a href="<?php  echo base_url('/page/mahasamitijoin'); ?>"
                                        class="text-white block md:px-4 py-2 md:text-sm md:text-gray-700 md:hover:bg-blues md:hover:text-white font-semibold"
                                        role="menuitem">Mahasamiti Form</a> -->

                                    <a href="<?php  echo base_url('/page/ourmember'); ?>"
                                        class="text-white block md:px-4 py-2 md:text-sm md:text-gray-700 md:hover:bg-blues md:hover:text-white font-semibold"
                                        role="menuitem">Members List</a>

                                    <a href="<?php  echo base_url('/page/permanentmember'); ?>"
                                        class="text-white block md:px-4 py-2 md:text-sm md:text-gray-700 md:hover:bg-blues md:hover:text-white font-semibold"
                                        role="menuitem">Permanent Members List</a>

                                    <a href="<?php  echo base_url('/page/pdflist'); ?>"
                                        class="text-white block md:px-4 py-2 md:text-sm md:text-gray-700 md:hover:bg-blues md:hover:text-white font-semibold"
                                        role="menuitem">Members PDF List</a>

                                    <!-- <a href="<?php  echo base_url('/page/mahasamitimember'); ?>"
                                        class="text-white block md:px-4 py-2 md:text-sm md:text-gray-700 md:hover:bg-blues md:hover:text-white font-semibold"
                                        role="menuitem">Mahasamiti Applicant List</a> -->





                                </div>
                            </li>


                            <li class="flex flex-wrap md:flex-nowrap items-stretch group relative">
                                <button
                                    class="menu-item w-full py-2 uppercase justify-start md:justify-center items-center font-semibold text-white hover:border-white border-b-2 border-transparent hover:bg-opacity-5 bg-opacity-0 bg-white flex gap-2 px-2"><svg
                                        viewBox="0 0 14 10" fill="currentColor" class="w-3.5 md:w-2.5 lg:w-3.5">
                                        <path d="M1128,240h14v2h-14v-2Zm0,4h14v2h-14v-2Zm0,4h14v2h-14v-2Z"
                                            transform="translate(-1128 -240)" />
                                    </svg><span class="md:hidden">More</span></button>

                                <div
                                    class=" hidden  group-hover:block md:origin-top-left md:absolute md:right-0 md:w-60 md:rounded-b-md md:shadow-lg py-2 md:py-1 md:bg-white md:ring-1 md:ring-black md:ring-opacity-5 md:transition md:ease-out md:duration-100 md:top-full md:shadow-3xl md:transform md:opacity-100 w-full">
                                    <a href="<?php echo base_url('/page/downloads'); ?>"
                                        class="text-white block md:px-4 py-2 md:text-sm md:text-gray-700 md:hover:bg-blues md:hover:text-white font-semibold"
                                        role="menuitem">Downloads</a>
                                    <a href="<?php echo base_url('/page//privacypolicy'); ?>"
                                        class="text-white block md:px-4 py-2 md:text-sm md:text-gray-700 md:hover:bg-blues md:hover:text-white font-semibold">Privacy
                                        Policy</a>
                                    <a href="<?php echo base_url('/page/termsconditions'); ?>"
                                        class="text-white block md:px-4 py-2 md:text-sm md:text-gray-700 md:hover:bg-blues md:hover:text-white font-semibold">Terms
                                        & Conditions</a>
                                    <a href="<?php echo base_url('/page/refundpolicy'); ?>"
                                        class="text-white block md:px-4 py-2 md:text-sm md:text-gray-700 md:hover:bg-blues md:hover:text-white font-semibold">Refund
                                        & Cancellation Policy</a>
                                    <a href="javascript:void(0)"
                                        class="text-white block md:px-4 py-2 md:text-sm md:text-gray-700 md:hover:bg-blues md:hover:text-white font-semibold"
                                        role="menuitem">Our Constitution</a>
                                </div>


                            </li>
                        </ul>
                        <div
                            class="rounded-r overflow-hidden w-48  md:w-40 lg:w-48 xl:w-64 relative wellfund ml-auto mr-0">
                            <a href="<?php echo base_url('/page/welfarefund'); ?>"
                                class="absolute z-10 uppercase inset-0 flex justify-center items-center font-bold text-white tracking-wider"><span
                                    class="pl-2 inline-flex text-sm md:text-[0.7rem] lg:text-sm xl:text-base">Welfare
                                    Fund</span></a>
                            <span
                                class="wellfund-bg transform -skew-x-12 bg-secondary relative ml-auto -mr-3 block border-l-4 border-white w-full h-12 lg:h-16"></span>
                        </div>

                    </nav>


                </div>
            </div>

        </header>
        <!--/ Header end-->