
        <style type="text/css">
            .alert p 
            {
                margin: 0px;
            }
    </style>
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item <?php if($this->router->fetch_class() == 'dashboard') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/dashboard') ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>


                          <li class="sidebar-item <?php if($this->router->fetch_class() == 'user') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/user') ?>" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu"> Members</span></a></li>

                            <li class="sidebar-item <?php if($this->router->fetch_class() == 'Category') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/category') ?>" aria-expanded="false"><i class="mdi mdi-pin"></i><span class="hide-menu"> Category Manager</span></a></li>


                          <li class="sidebar-item <?php if($this->router->fetch_class() == 'Post') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/post') ?>" aria-expanded="false"><i class="mdi mdi-pin"></i><span class="hide-menu"> Post Manager</span></a></li>


                        <li class="sidebar-item <?php if($this->router->fetch_class() == 'gallery') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/gallery') ?>" aria-expanded="false"><i class="fas fa-images"></i><span class="hide-menu">Photo Gallery</span></a></li>

                        <li class="sidebar-item <?php if($this->router->fetch_class() == 'event') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/event') ?>" aria-expanded="false"><i class="mdi mdi-alarm"></i><span class="hide-menu"> Events Manager</span></a></li>

                        <li class="sidebar-item <?php if($this->router->fetch_class() == 'news') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/news') ?>" aria-expanded="false"><i class="mdi mdi-bell-ring"></i><span class="hide-menu"> News Manager</span></a></li>

                        <li class="sidebar-item <?php if($this->router->fetch_class() == 'download') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/download') ?>" aria-expanded="false"><i class="mdi mdi-download"></i><span class="hide-menu"> Downloads</span></a></li>


                        <li class="sidebar-item <?php if($this->router->fetch_class() == 'contactquery') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/contactquery') ?>" aria-expanded="false"><i class="fa fa-phone"></i><span class="hide-menu"> Contact query</span></a></li>

                        <li class="sidebar-item <?php if($this->router->fetch_class() == 'setting') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/setting') ?>" aria-expanded="false"><i class="fas fa-cogs"></i><span class="hide-menu"> Globel Settings</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class=" fas fa-lock"></i><span class="hide-menu"> Logout </span></a></li>

                        
                      <!--   <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="charts.html" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Charts</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="widgets.html" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Widgets</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="tables.html" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Tables</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="grid.html" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Full Width</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Forms </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="form-basic.html" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Form Basic </span></a></li>
                                <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Form Wizard </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages-buttons.html" aria-expanded="false"><i class="mdi mdi-relative-scale"></i><span class="hide-menu">Buttons</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Icons </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="icon-material.html" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Material Icons </span></a></li>
                                <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Font Awesome Icons </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages-elements.html" aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu">Elements</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-move-resize-variant"></i><span class="hide-menu">Addons </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="index2.html" class="sidebar-link"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> Dashboard-2 </span></a></li>
                                <li class="sidebar-item"><a href="pages-gallery.html" class="sidebar-link"><i class="mdi mdi-multiplication-box"></i><span class="hide-menu"> Gallery </span></a></li>
                                <li class="sidebar-item"><a href="pages-calendar.html" class="sidebar-link"><i class="mdi mdi-calendar-check"></i><span class="hide-menu"> Calendar </span></a></li>
                                <li class="sidebar-item"><a href="pages-invoice.html" class="sidebar-link"><i class="mdi mdi-bulletin-board"></i><span class="hide-menu"> Invoice </span></a></li>
                                <li class="sidebar-item"><a href="pages-chat.html" class="sidebar-link"><i class="mdi mdi-message-outline"></i><span class="hide-menu"> Chat Option </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-key"></i><span class="hide-menu">Authentication </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="authentication-login.html" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Login </span></a></li>
                                <li class="sidebar-item"><a href="authentication-register.html" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Register </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-alert"></i><span class="hide-menu">Errors </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="error-403.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 403 </span></a></li>
                                <li class="sidebar-item"><a href="error-404.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 404 </span></a></li>
                                <li class="sidebar-item"><a href="error-405.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 405 </span></a></li>
                                <li class="sidebar-item"><a href="error-500.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 500 </span></a></li>
                            </ul>
                        </li>`1 -->
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->