
        <style type="text/css">
            .alert p 
            {
                margin: 0px;
            }
    </style>
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar d-flex" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar w-100" >
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="">
                        <li class="sidebar-item <?php if($this->router->fetch_class() == 'dashboard') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/dashboard') ?>" aria-expanded="false"><i class="fas fa-tachometer-alt"></i> <span class="hide-menu">Dashboard</span></a></li>

 						<li class="sidebar-item <?php if($this->router->fetch_class() == 'user' && $this->router->fetch_method() == 'index') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/user') ?>" aria-expanded="false"><i class="fas fa-user-tie"></i> <span class="hide-menu">Members</span></a></li>

                        <li class="sidebar-item <?php if($this->router->fetch_class() == 'user' && $this->router->fetch_method() == 'lifetimememberships') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/user/lifetimememberships') ?>" aria-expanded="false"><i class="fas fa-user-tie"></i> <span class="hide-menu">Lifetime Members</span></a></li>


                         <li class="sidebar-item <?php if($this->router->fetch_class() == 'user' && $this->router->fetch_method() == 'mahasamitiMembers') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/user/mahasamitiMembers') ?>" aria-expanded="false"><i class="fas fa-user-tie"></i> <span class="hide-menu">Mahasamiti Members</span></a></li>

                       <!--  <li class="sidebar-item <?php if($this->router->fetch_class() == 'user') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/user/indexone') ?>" aria-expanded="false"><i class="fas fa-user-tie"></i> <span class="hide-menu">Members List Test</span></a></li>
 -->

                        <li class="sidebar-item <?php if($this->router->fetch_class() == 'membership') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/membership') ?>" aria-expanded="false"><i class="fa fa-picture-o" aria-hidden="true"></i><span class="hide-menu"> Membership Plans</span></a></li>

						<li class="sidebar-item <?php if($this->router->fetch_class() == 'memberpost') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/memberpost') ?>" aria-expanded="false"><i class="fas fa-map-pin"></i> <span class="hide-menu">Committee Post</span></a></li>
						
						<li class="sidebar-item <?php if($this->router->fetch_class() == 'committee' && $this->router->fetch_method() == 'index') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/committee') ?>" aria-expanded="false"><i class="fas fa-users"></i><span class="hide-menu">Mahasamiti</span></a></li>
						<li class="sidebar-item <?php if($this->router->fetch_class() == 'committee' && $this->router->fetch_method() == 'statecommittee' || $this->router->fetch_method() == 'statecommitteememberlist') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/committee/statecommittee') ?>" aria-expanded="false"><i class="fas fa-users"></i><span class="hide-menu">State Executive</span></a></li>
						<li class="sidebar-item <?php if($this->router->fetch_class() == 'committee' && $this->router->fetch_method() == 'districtcommitte' || $this->router->fetch_method() == 'districtcommitteememberlist') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/committee/districtcommitte') ?>" aria-expanded="false"><i class="fas fa-users"></i><span class="hide-menu">District Executive</span></a></li>
						<li class="sidebar-item <?php if($this->router->fetch_class() == 'committee' && $this->router->fetch_method() == 'othercommitte' || $this->router->fetch_method() == 'othercommitteememberlist') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/committee/othercommitte') ?>" aria-expanded="false"><i class="fas fa-users"></i><span class="hide-menu">Other Executive</span></a></li>
									
						<li class="sidebar-item <?php if($this->router->fetch_class() == 'Category') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/category') ?>" aria-expanded="false"><i class="fas fa-map-pin"></i><span class="hide-menu">Welfare Category Manager</span></a></li>


                          <li class="sidebar-item <?php if($this->router->fetch_class() == 'Post') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/post') ?>" aria-expanded="false"><i class="fas fa-map-pin"></i><span class="hide-menu">Welfare  Post Manager</span></a></li>

                        <li class="sidebar-item <?php if($this->router->fetch_class() == 'event') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/event') ?>" aria-expanded="false"><i class="mdi mdi-alarm"></i><span class="hide-menu"> Events Manager</span></a></li>

                        <li class="sidebar-item <?php if($this->router->fetch_class() == 'news') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/news') ?>" aria-expanded="false"><i class="far fa-newspaper"></i><span class="hide-menu"> News Manager</span></a></li>

                        <li class="sidebar-item <?php if($this->router->fetch_class() == 'gallery') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/gallery') ?>" aria-expanded="false"><i class="fas fa-images"></i><span class="hide-menu">Photo Gallery</span></a></li>

						<li class="sidebar-item <?php if($this->router->fetch_class() == 'slider') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/slider') ?>" aria-expanded="false"><i class="fa fa-picture-o" aria-hidden="true"></i><span class="hide-menu"> Slider</span></a></li>
						
						

						<li class="sidebar-item <?php if($this->router->fetch_class() == 'department') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/department') ?>" aria-expanded="false"><i class="fas fa-university"></i><span class="hide-menu"> Department Manager</span></a></li>


                        <li class="sidebar-item <?php if($this->router->fetch_class() == 'service') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/service') ?>" aria-expanded="false"><i class="fas fa-tasks"></i><span class="hide-menu"> Service Manager</span></a></li>
						
                        <li class="sidebar-item <?php if($this->router->fetch_class() == 'district') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/district') ?>" aria-expanded="false"><i class="fas fa-tasks"></i><span class="hide-menu"> District Manager</span></a></li>


						<li class="sidebar-item <?php if($this->router->fetch_class() == 'download') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/download') ?>" aria-expanded="false"><i class="mdi mdi-download"></i> <span class="hide-menu">Exam Form Manager</span></a></li>
						
                          <li class="sidebar-item <?php if($this->router->fetch_class() == 'transaction') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/transaction') ?>" aria-expanded="false"><i class="fas fa-rupee-sign"></i><span class="hide-menu"> Transaction Manager</span></a></li>

                          <li class="sidebar-item <?php if($this->router->fetch_class() == 'lists') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/lists') ?>" aria-expanded="false"><i class="far fa-newspaper"></i><span class="hide-menu"> List Manager</span></a></li>

                        <li class="sidebar-item <?php if($this->router->fetch_class() == 'donation') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/donation') ?>" aria-expanded="false"><i class="fas fa-donate"></i><span class="hide-menu"> Donation Manager</span></a></li>
						
 						<li class="sidebar-item <?php if($this->router->fetch_class() == 'contactquery') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/contactquery') ?>" aria-expanded="false"><i class="fa fa-phone"></i><span class="hide-menu"> Contact query</span></a></li>


                        

                        <li class="sidebar-item <?php if($this->router->fetch_class() == 'setting') {echo 'selected';} ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('/admin/setting') ?>" aria-expanded="false"><i class="fas fa-cog"></i><span class="hide-menu"> Globel Settings</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class="fas fa-sign-out-alt"></i><span class="hide-menu"> Logout </span></a></li>

                         
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->