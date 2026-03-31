<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">User</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/news') ?>">User</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View User</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->



           

            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->


                    <?php $this->session->flashdata('alert');?>
                                            
                                        


                <div class="row">
                    <div class="col-md-4">

                       
                        
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                        <div class="col-md-12">
                                             <h4 class="card-title">Profile Details</h4>
                                             <?php if($row['image']) { ?>
                                             <div>
                                                 <img src="<?php  echo base_url('/uploads/'.$row["image"]) ?>" width="100%">
                                             </div>
                                         <?php }else{ ?>
                                                 <div>
                                                 <img src="<?php echo base_url('assets/admin/assets/images/users/1.jpg') ?>" width="100%">
                                             </div>
                                        <?php }  ?>

                                            

                                    
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>



                    <div class="col-md-8">
                        
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                        <div class="col-md-12">
                                             <h3 class="card-title float-left">Personal Details</h3>

                                     <a href="<?php echo base_url('/admin/user') ?>" class="btn btn-info btn-sm float-right mb-4">Back</a>
                                        </div>



                                        <div class="col-md-12">
											
											<div class="row">
											<div class="col-6 col-lg-4">
												<p><b class="d-block">Name:</b><?php echo $row['first_name']; ?> <?php echo $row['middle_name']; ?> <?php echo $row['last_name']; ?></p>
											</div>
												
											<div class="col-6 col-lg-4">
												<p><b class="d-block">Ref. Number:</b><?php echo $row['ref_mobile']; ?></p>
											</div>	
												
											<div class="col-6 col-lg-4">
												<p><b class="d-block">Father/Husband Name:</b><?php echo $row['father_husband_name']; ?></p>
											</div>
												
											<div class="col-6 col-lg-4">
												<p><b class="d-block">Mobile No.:</b><?php echo $row['phone']; ?></p>
											</div>
												
											<div class="col-6 col-lg-4">
												<p><b class="d-block">Date of Birth:</b><?php echo  date("d-m-Y", strtotime($row['dob'])); ?></p>
											</div>
												
												
											<div class="col-6 col-lg-4">
												<p><b class="d-block">Marital Status:</b><?php echo $row['married_status']; ?></p>
											</div>
												
																								
											<div class="col-6 col-lg-4">
												<p><b class="d-block">Gender:</b><?php echo $row['gender']; ?></p>
											</div>
																								
											<div class="col-12 col-sm-6 col-lg-4">
												<p><b class="d-block">Home Address:</b><?php echo $row['address']; ?></p>
											</div>
												
																								
											<div class="col-6 col-lg-4">
												<p><b class="d-block">Tehsil/City:</b><?php echo $row['city']; ?></p>
											</div>
																								
											<div class="col-6 col-lg-4">
												<p><b class="d-block">District:</b><?php echo $row['district']; ?></p>
											</div>
												
																								
											<div class="col-6 col-lg-4">
												<p><b class="d-block">State:</b><?php echo $row['state']; ?></p>
											</div>
											 
												
												
												
											</div>
 
   
 


                                               <h3 class="card-title pt-4">Posting Place</h3>

											<div class="row pt-2">
												
												
											<div class="col-6 col-lg-4">
												<p><b class="d-block">Post Name:</b><?php echo $row['post_name']; ?></p>
											</div>	
												
											<div class="col-6 col-lg-4">
												<p><b class="d-block">Name of Department:</b><?php echo $row['department_name']; ?></p>
											</div>	
												
											<div class="col-6 col-lg-4">
												<p><b class="d-block">Service Category:</b><?php echo $row['service_name']; ?></p>
											</div>
												
											<div class="col-6 col-lg-4">
												<p><b class="d-block">Post Type:</b><?php echo $row['post_type']; ?></p>
											</div>
												
											<div class="col-6 col-lg-4">
												<p><b class="d-block">Service Status:</b><?php echo $row['service_status']; ?></p>
											</div>
												
												
											<div class="col-12 col-lg-4">
												<p><b class="d-block">Office Address:</b><?php echo $row['office_address']; ?></p>
											</div>
												
											<div class="col-6 col-lg-4">
												<p><b class="d-block">Tehsil/City:</b><?php echo $row['office_city']; ?></p>
											</div>
												
											<div class="col-6 col-lg-4">
												<p><b class="d-block">District:</b><?php echo $row['office_district']; ?></p>
											</div>
												
												
												
											<div class="col-6 col-lg-4">
												<p><b class="d-block">State:</b><?php echo $row['office_state']; ?></p>
											</div>
												
												
											<div class="col-6 col-lg-4">
												<p><b class="d-block">State:</b><?php echo $row['office_state']; ?></p>
											</div>
												
											
											</div>
											
                                         
     

                                              <h3 class="card-title pt-4">Type of Membership</h3>

                                            <label><b>Membership :</b> <?php echo $row['membership_name']; ?></label>
                                            <br>

                                             <label><b>Price:</b> &#x20B9;<?php echo $row['m_price']; ?></label>
                                            <br>


                                            <table class="table table-striped table-bordered">
                                            	<tr>
                                            		<th>Membership</th>
                                            		<th>Price</th>
                                            		<th>Status</th>
                                            		<th>Date</th>
                                            	</tr>
                                            	<?php if($membership){ foreach ($membership as $key => $value) { ?>
                                            		<tr>
                                            			<td><?php echo $value['name']; ?></td>
                                            			<td><?php echo $value['price']; ?></td>
                                            			<td><?php echo $value['membership_status']; ?></td>
                                            			<td><?php echo  date("d-m-Y", strtotime($value['membership_date'])); ?></td>
                                            		</tr>
                                            	<?php }} ?>
                                            </table>






                                        </div>



                                    </div>

                            </div>
                        </div>
                    </div>


                   
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->


            </div>


