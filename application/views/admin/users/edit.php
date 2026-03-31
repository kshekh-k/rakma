<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/site/datepicker/datepicker.css') ?>">
<script src="<?php echo base_url('/assets/site/datepicker/datepicker.js') ?>"></script>
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
                                    <li class="breadcrumb-item active" aria-current="page">Edit User</li>
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

                  

                <?php echo $this->session->flashdata('alert');?>


                <?php if (!empty($row)) { ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" action="<?php echo base_url('/admin/user/update/'.$row['id']); ?>" method="post" enctype='multipart/form-data'>
                                <div class="card-body">
                                     <div class="row">
                                        <div class="col-md-12">
                                             <h4 class="card-title float-left"><?php echo $section_heading; ?></h4>

                                     <a href="<?php echo base_url('/admin/user') ?>" class="btn btn-info btn-sm float-right mb-4">Back</a>
                                        </div>
                                    </div>

                                     <div class="col-12">
                                        <h4> REFERENCE INFORMATION</h4>
                                    </div>

                                      <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Reference Mobile</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Reference Mobile" name="ref_mobile" value="<?php echo $row['ref_mobile']; ?>">
                                        </div>
                                    </div>

                                


                                    <div class="col-12">
                                        <h4>GENERAL INFORMATION</h4>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">First Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="First Name" name="first_name" value="<?php echo $row['first_name']; ?>">
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Middle Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Middle Name" name="middle_name" value="<?php echo $row['middle_name']; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Last Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Last Name" name="last_name" value="<?php echo $row['last_name']; ?>">
                                        </div>
                                    </div>


                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Father/Husband Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Father/Husband Name" name="father_husband_name" value="<?php echo $row['father_husband_name']; ?>">
                                        </div>
                                    </div>


                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Mobile No</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Mobile" name="phone" value="<?php echo $row['phone']; ?>">
                                        </div>
                                    </div>



                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Email" name="email" value="<?php echo $row['email']; ?>">
                                        </div>
                                    </div>



                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Date of Birth</label>
                                        <div class="col-sm-9">
                                            <input type="date" autocomplete='off' name="dob"  class="form-control" id="fname" placeholder="dob" name="location" value="<?php echo  date("d-m-Y", strtotime($row['dob'])); ?>">
                                        </div>
                                    </div>


                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Merrage</label>
                                        <div class="col-sm-9">
                                            <input type="radio" placeholder="Location" name="married_status" value="Single" <?php if($row['married_status'] == 'Single') {echo 'checked'; } ?>> Single 

                                              <input type="radio" placeholder="Location" name="married_status" value="Married" <?php if($row['married_status'] == 'Married') {echo 'checked'; } ?>> Married 
                                        </div>
                                    </div>


                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Gender</label>
                                        <div class="col-sm-9">
                                            <input type="radio" placeholder="Location" name="gender" value="Male" <?php if($row['gender'] == 'Male') {echo 'checked'; } ?>> Male 
                                            <input type="radio" placeholder="Location" name="gender" value="Female" <?php if($row['gender'] == 'Female') {echo 'checked'; } ?>> Female 
                                        </div>
                                    </div>


                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Home Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Home Address" name="address" value="<?php echo $row['address']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tehsil/City</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Tehsil/City" name="city" value="<?php echo $row['city']; ?>">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">District</label>
                                        <div class="col-sm-9">
                                              <select class="district__name form-control "  name="district" id="district">
                                                <option value="">Select District</option>
                                                 <?php $districts=get_All_data(array( 'status'=>'1') , $table='district' , 'name ASC' ); if($districts) { foreach ($districts as $key => $district) { ?>
                                                        <option value="<?php echo $district['id']; ?>" <?php if($district['id']==$row['district']) { echo 'selected'; } ?>>
                                                            <?php echo ucfirst($district['name']); ?> 
                                                        </option> 
                                                        <?php } } ?>
                                              </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">State</label>
                                        <div class="col-sm-9">
                                            <select class="form-control"  name="state" >
                                                  <option value="1">Rajasthan</option>
                                            </select>
                                        </div>
                                    </div>


                                     <div class="col-12">
                                        <h4>POSTING PLACE</h4>
                                    </div>
                                  

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Post Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Post Name" name="post_name" value="<?php echo $row['post_name']; ?>">
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Name of Dipartment</label>
                                        <div class="col-sm-9">
                                           
                                              <select class="form-control"  name="name_of_diparment" id="name_of_diparment">
                                                          <?php 

                                                            $departments = get_All_data(array('status' => '1') , $table='department' , 'name ASC' );


                                                          if($departments) { foreach ($departments as $key => $department) {
                                                                
                                                               ?>

                                                               <option value="<?php echo $department['id']; ?>" <?php if($department['id'] == $row['name_of_diparment']){echo 'selected'; } ?> ><?php echo $department['name']; ?></option>
                                                              <?php }  } ?>


                                                    </select>
                                                                                    </div>
                                    </div>



                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Service Category</label>
                                        <div class="col-sm-9">
                                           
                                             <select class="form-control"  name="service_category">
                                                 <?php 

                                                    $services = get_All_data(array('status' => '1') , $table='service' , 'name ASC' );


                                                  if($services) { foreach ($services as $key => $service) {
                                                        
                                                       ?>

                                                       <option value="<?php echo $service['id']; ?>" <?php if($service['id'] == $row['service_category']){echo 'selected'; } ?>><?php echo $service['name']; ?></option>
                                                      <?php }  } ?>


                                            </select>
                                                                           
                                         </div>
                                    </div>



                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Post Type</label>
                                        <div class="col-sm-9">
                                           <input type="radio" placeholder="Location" name="post_type" value="Gazetted" <?php if($row['post_type'] == 'Gazetted') {echo 'checked'; } ?>> Gazetted 
                                            <input type="radio" placeholder="Location" name="post_type" value="Non-Gazetted" <?php if($row['post_type'] == 'Non-Gazetted') {echo 'checked'; } ?>> Non-Gazetted 
                                        </div>
                                    </div>


                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Service Status</label>
                                        <div class="col-sm-9">
                                            <input type="radio" placeholder="Location" name="service_status" value="In Service" <?php if($row['service_status'] == 'In Service') {echo 'checked'; } ?>> In Service 
                                            <input type="radio" placeholder="Location" name="service_status" value="Retired/Ex-Service" <?php if($row['service_status'] == 'Retired/Ex-Service') {echo 'checked'; } ?>> Retired/Ex-Service 
                                        </div>
                                    </div>


                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Office Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Office Address" name="office_address" value="<?php echo $row['office_address']; ?>">
                                        </div>
                                    </div>


                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tehsil/City</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Tehsil/City" name="office_city" value="<?php echo $row['office_city']; ?>">
                                        </div>
                                    </div>



                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">District</label>
                                        <div class="col-sm-9">
                                            <select class="district__name1 form-control district_list1"  name="office_district">
                                                <option value="">Select District</option>
                                                 <?php $districts=get_All_data(array( 'status'=>'1') , $table='district' , 'name ASC' ); if($districts) { foreach ($districts as $key => $district) { ?>
                                                        <option value="<?php echo $district['id']; ?>" <?php if($district['id']==$row['office_district']) { echo 'selected'; } ?>>
                                                            <?php echo ucfirst($district['name']); ?> 
                                                        </option> 
                                                        <?php } } ?>
                                            </select>
                                        </div>
                                    </div>


                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">State</label>
                                        <div class="col-sm-9">
                                             <select class="form-control"  name="office_state" id="office_state" >
                                                <option value="1">Rajasthan</option>
                                             </select>
                                        </div>
                                    </div>


                                 


                                    


                                  
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Profile Image</label>
                                        <div class="col-sm-9">
                                            <?php if(!empty($row['image'])){ ?>
                                                <img src="<?php echo base_url('uploads/'.$row['image']);?>" width="100">
                                            <?php } ?>
                                            <input type="file" class="form-control" name="image">
                                             <div class="text-danger"> <?php echo $this->session->flashdata('image_error');  ?></div>
                                        </div>
                                       
                                    </div>
                               
                              
                                </div>
                                <div class="border-top">
                                    <div class="card-body text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                       

                    </div>
                   
                </div>


            <?php }else{ ?>

                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center">Opps! Data Not Found</h3>
                    </div>
                </div>



            <?php }  ?>







             
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
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>

