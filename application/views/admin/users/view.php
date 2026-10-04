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
											
                                         
     

                                              <h3 class="card-title pt-4">Membership Details</h3>

                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label><b>Current Plan:</b> <?php echo !empty($row['membership_name']) ? $row['membership_name'] : "N/A"; ?></label><br>
                                                    <label><b>Price:</b> &#x20B9;<?php echo !empty($row['m_price']) ? $row['m_price'] : "0"; ?></label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label><b>Type:</b> 
                                                        <?php 
                                                            if (!empty($row['m_type'])) {
                                                                if ($row['m_type'] == "Lifetime") {
                                                                    echo "<span class=\"badge badge-pill badge-primary\">Lifetime</span>";
                                                                } elseif ($row['m_type'] == "Renew" || $row['m_type'] == "Renewed") {
                                                                    echo "<span class=\"badge badge-pill badge-warning\">Renewed</span>";
                                                                } elseif ($row['m_type'] == "Join") {
                                                                    echo "<span class=\"badge badge-pill badge-success\">New Joining</span>";
                                                                } else {
                                                                    echo "<span class=\"badge badge-pill badge-info\">".$row['m_type']."</span>";
                                                                }
                                                            } else {
                                                                echo "N/A";
                                                            }
                                                        ?>
                                                    </label><br>
                                                    <label><b>Membership Status:</b> 
                                                        <?php 
                                                            if (!empty($row['m_type']) && $row['m_type'] == "Lifetime") {
                                                                echo "<span class=\"badge badge-pill badge-success\">Active</span>";
                                                            } else {
                                                                $exp = !empty($row['membership_expiry_date']) ? $row['membership_expiry_date'] : (!empty($row['membership_date']) ? date("Y-m-d H:i:s", strtotime("+2 years", strtotime($row['membership_date']))) : null);
                                                                if ($exp && strtotime($exp) < time()) {
                                                                    echo "<span class=\"badge badge-pill badge-danger\">Expired</span>";
                                                                } else {
                                                                    echo "<span class=\"badge badge-pill badge-success\">Active</span>";
                                                                }
                                                            }
                                                        ?>
                                                    </label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label><b>Start Date:</b> 
                                                        <?php 
                                                            $sDate = (!empty($row['membership_date']) && $row['membership_date'] != "0000-00-00 00:00:00") ? $row['membership_date'] : $row['create_at'];
                                                            echo date("d-M-Y", strtotime($sDate));
                                                        ?>
                                                    </label><br>
                                                    <label><b>Expiry Date:</b> 
                                                        <?php 
                                                            if (!empty($row['m_type']) && $row['m_type'] == "Lifetime") {
                                                                echo "<span class=\"badge badge-pill badge-primary\">Lifetime (Never Expires)</span>";
                                                            } else {
                                                                $exp = !empty($row['membership_expiry_date']) ? $row['membership_expiry_date'] : date("Y-m-d H:i:s", strtotime("+2 years", strtotime($sDate)));
                                                                if (strtotime($exp) < time()) {
                                                                    echo "<span class=\"badge badge-pill badge-danger\">" . date("d-M-Y", strtotime($exp)) . " (Expired)</span>";
                                                                } else {
                                                                    echo "<span class=\"badge badge-pill badge-info\">" . date("d-M-Y", strtotime($exp)) . "</span>";
                                                                }
                                                            }
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>

                                            <h5 class="card-title pt-2">Membership History</h5>
                                            <table class="table table-striped table-bordered">
                                            	<thead>
                                            	<tr>
                                            		<th>Membership</th>
                                            		<th>Type</th>
                                            		<th>Price</th>
                                            		<th>Status</th>
                                            		<th>Start Date</th>
                                            		<th>Expiry Date</th>
                                            	</tr>
                                            	</thead>
                                            	<tbody>
                                            	<?php if($membership){ foreach ($membership as $key => $value) { ?>
                                            		<tr>
                                            			<td><?php echo $value['name']; ?></td>
                                            			<td><?php echo $value['type']; ?></td>
                                            			<td>&#x20B9;<?php echo $value['price']; ?></td>
                                            			<td><?php echo $value['membership_status']; ?></td>
                                            			<td><?php echo !empty($value['membership_date']) ? date("d-M-Y", strtotime($value['membership_date'])) : "-"; ?></td>
                                            			<td>
                                            				<?php 
                                            					if ($value['type'] == "Lifetime") {
                                            						echo "<span class=\"badge badge-pill badge-primary\">Lifetime</span>";
                                            					} else {
                                            						$itemExpiry = !empty($value['membership_expiry_date']) ? $value['membership_expiry_date'] : (!empty($value['membership_date']) ? date("Y-m-d H:i:s", strtotime("+2 years", strtotime($value['membership_date']))) : null);
                                            						if ($itemExpiry) {
                                            							echo (strtotime($itemExpiry) < time()) ? "<span class=\"badge badge-pill badge-danger\">" . date("d-M-Y", strtotime($itemExpiry)) . "</span>" : "<span class=\"badge badge-pill badge-info\">" . date("d-M-Y", strtotime($itemExpiry)) . "</span>";
                                            						} else {
                                            							echo "-";
                                            						}
                                            					}
                                            				?>
                                            			</td>
                                            		</tr>
                                            	<?php }} ?>
                                            	</tbody>
                                            </table>


                                            <?php if($row['upload_recipt'] != '')	{ ?>
                                            	<h3 class="card-title pt-4">Uploaded Receipt</h3>
                                            	<img src="<?php echo base_url('uploads/'.$row['upload_recipt']) ?>">
                                            	<?php } ?>






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


