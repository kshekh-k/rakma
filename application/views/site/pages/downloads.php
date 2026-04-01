<main class="">
    <section class="relative">
        <div class="h-56 md:h-60 bg-gray-300">
            <img src="<?php echo base_url('/assets/site/') ?>/src/dist/img/header-bg.png" alt=""
                class="opacity-80 object-cover max-w-none h-full w-full">
        </div>
        <div class="z-10 absolute inset-0 py-10 md:py-20 flex items-center">
            <div class="max-w-screen-xl w-full px-4 xl:px-12 mx-auto flex flex-col items-center text-center">
                <h1 class="text-2xl sm:text-4xl xl:text-5xl uppercase text-secondary font-bold tracking-wide pb-2">
                    Downloads
                </h1>
                <p class="text-primary font-medium pt-2 capitalize">
                    Government’s vacancies & important forms
                </p>
                <p class="flex gap-2 pt-2 font-medium text-gray-500">
                    <a href="<?php echo base_url(); ?>" class="hover:text-secondary">Home</a>
                    /
                    <span class="text-blues">Downloads</span>
                </p>
            </div>
        </div>
    </section>

    <section class="relative">
        <div class="max-w-screen-lg xl:max-w-screen-xl px-4 xl:px-12 mx-auto">
            <div class="pb-10 md:pb-20">              

                <div class="border-b border-black border-opacity-20 py-6 divide-y divide-black divide-opacity-20">
                    <?php if(!empty($download_list)){ foreach ($download_list as $key => $download) { ?>
                    <div class="grid grid-cols-12 p-3 py-4 gap-3 hover:bg-opacity-10 bg-opacity-0 bg-black transition ease-in-out rounded">
                        <div class="lg:col-span-4 col-span-12 relative pl-16">
                            <div class="flex justify-start xl:justify-center w-14 absolute left-0">
                                <?php if (!empty($download['image'])) { ?>
                                <img src="<?php echo base_url('uploads/'.$download['image']); ?>"
                                    class="w-full h-full object-contain" alt="download image">
                                <?php } else { ?>
                                <img src="<?php echo base_url('assets/site/src/dist/img/icon-logo-RAKMA.png'); ?>"
                                    class="w-full h-full object-contain" alt="default image">
                                <?php } ?>
                            </div>

                            <div class="text-gray-900">
                                <p class="text-xl font-semibold truncate"><?php echo $download['title']; ?></p>
                                <span class="text-sm font-normal"><?php echo date("d M, Y", strtotime($download['date'])); ?></span>
                            </div>
                        </div>

                        <div class="text-gray-900 col-span-12 lg:col-span-8 xl:col-span-5 xl:pr-5">
                            <p class="lg:line-clamp-2 line-clamp-4 text-lg"><?php echo $download['description']; ?></p>
                        </div>

                        <div class="text-gray-900 flex gap-3 items-center col-span-12 xl:col-span-3 justify-start lg:justify-end">
                            <?php if(!empty($download['url'])){ ?>
                            <a href="<?php echo $download['url']; ?>" target="_blank" rel="noopener"
                                class="bg-black rounded text-secondary py-3 px-4 uppercase font-medium whitespace-nowrap flex items-center border border-black hover:bg-primary hover:text-black">
                                View Site
                            </a>
                            <?php } ?>

                            <?php if(!empty($download['file'])){ ?>
                            <a href="<?php echo base_url('uploads/'.$download["file"]); ?>"
                                class="bg-blues rounded text-white py-3 px-4 uppercase font-medium whitespace-nowrap flex items-center border border-white hover:bg-primary hover:text-white">
                                Download
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php }} else { ?>
                    <div class="py-10 text-black text-lg font-medium text-center">
                        No downloads available right now.
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</main>
