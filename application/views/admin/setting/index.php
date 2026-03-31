<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Global Settings</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                               <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Global Settings</li>
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
                <div class="row">

                      <div class="col-md-6 mb-3">
                        <div class="card" style="height: 100%;">
                            <form class="form-horizontal" action="<?php echo base_url('/admin/setting/update'); ?>" method="post" enctype='multipart/form-data'>
                                <div class="card-body">
                                     <div class="row">
                                        <div class="col-md-12">
                                             <h4 class="card-title float-left"> Site Details</h4>

                                  
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Site Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Site Title" name="site_title" value="<?php if(array_key_exists('site_title', $rows)) { echo $rows['site_title']; }?>">
                                        </div>
                                    </div>


                                     <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Favicon</label>
                                        <div class="col-sm-9">
                                           <?php if(array_key_exists('favicon', $rows) && !empty($rows['favicon']) ) {  ?>

                                           <img src="<?php echo base_url('/uploads/'.$rows['favicon']) ?>" style="max-width: 80px;">
                                           
                                           <?php } ?>
                                            <input type="file" class="form-control" name="favicon">
                                             <div class="text-danger"> <?php echo $this->session->flashdata('favicon_error');  ?></div>
                                        </div>
                                    </div>


                                     <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Logo</label>
                                        <div class="col-sm-9">
                                             <?php if(array_key_exists('logo', $rows) && !empty($rows['logo']) ) {  ?>

                                           <img src="<?php echo base_url('/uploads/'.$rows['logo']) ?>" style="max-width: 150px;">
                                           
                                           <?php } ?>
                                            <input type="file" class="form-control" name="logo">
                                             <div class="text-danger"> <?php echo $this->session->flashdata('logo_error');  ?></div>
                                        </div>
                                    </div>


                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Mobile</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Mobile" name="site_phone" value="<?php if(array_key_exists('site_phone', $rows)) { echo $rows['site_phone']; }?>">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Email" name="site_email" value="<?php if(array_key_exists('site_email', $rows)) { echo $rows['site_email']; }?>">
                                        </div>
                                    </div>



                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Oath</label>
                                        <div class="col-sm-9">

                                            <textarea  class="form-control" rows="18" placeholder="oath" name="oath"><?php if(array_key_exists('oath', $rows)) { echo $rows['oath']; }?></textarea>
                                           
                                        </div>
                                    </div>
                                  

                                       
                                   
                               
                              
                                </div>
                                <div class="border-top">
                                    <div class="card-body text-center">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                       

                    </div>




                    <div class="col-md-6 mb-3">
                        <div class="card" style="height: 100%;">
                            <form class="form-horizontal" action="<?php echo base_url('/admin/setting/update'); ?>"  method="post" enctype='multipart/form-data'>
                                <div class="card-body">
                                     <div class="row">
                                        <div class="col-md-12">
                                             <h4 class="card-title float-left"> Social Settings </h4>

                                  
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Whatsapp</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Whatsapp" name="whatsapp" value="<?php if(array_key_exists('whatsapp', $rows)) { echo $rows['whatsapp']; }?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Facebook</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Facebook" name="facebook" value="<?php if(array_key_exists('facebook', $rows)) { echo $rows['facebook']; }?>">
                                        </div>
                                    </div>


                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Twiiter</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Twiiter" name="twitter" value="<?php if(array_key_exists('twitter', $rows)) { echo $rows['twitter']; }?>">
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Instagram</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Instagram" name="insatgram" value="<?php if(array_key_exists('insatgram', $rows)) { echo $rows['insatgram']; }?>">
                                        </div>
                                    </div>

                                    

                               
                              
                                </div>
                                <div class="border-top">
                                    <div class="card-body text-center">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>



                             <form class="form-horizontal" action="<?php echo base_url('/admin/setting/update'); ?>"  method="post" enctype='multipart/form-data'>
                                <div class="card-body">
                                     <div class="row">
                                        <div class="col-md-12">
                                             <h4 class="card-title float-left"> Payment Gatway Setting </h4>

                                  
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Key</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Key" name="key" value="<?php if(array_key_exists('key', $rows)) { echo $rows['key']; }?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Secret Key</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Secret Key" name="secret_key" value="<?php if(array_key_exists('secret_key', $rows)) { echo $rows['secret_key']; }?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Rzp Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Email" name="rzp_email" value="<?php if(array_key_exists('rzp_email', $rows)) { echo $rows['rzp_email']; }?>">
                                        </div>
                                    </div>

                                  
                               
                              
                                </div>
                                <div class="border-top">
                                    <div class="card-body text-center">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>





                        </div>
                       

                    </div>


                       <div class="col-md-6 mb-3">
                        <div class="card" style="height: 100%;">
                                  <form class="form-horizontal" action="<?php echo base_url('/admin/setting/update'); ?>"  method="post" enctype='multipart/form-data'>
                                <div class="card-body">
                                     <div class="row">
                                        <div class="col-md-12">
                                             <h4 class="card-title float-left">Home page settings </h4>

                                  
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Home Gallery</label>
                                        <div class="col-sm-9">
                                           <select class="form-control" name="gallery_id">
                                            <option value="0">Select gallery</option>
                                            <?php $gallery = get_All_data(array('status'=>'1') , 'gallery');

                                                if ($gallery) {
                                                    foreach ($gallery as $key => $value) { ?>
                                                    <option value="<?php echo $value['id'] ?>" <?php if($rows['gallery_id'] ==  $value['id']) {echo 'selected';} ?>><?php echo $value['title'] ?></option>

                                                <?php }}  ?>
                                           </select>
                                        </div>
                                    </div>

                                    

                               
                              
                                </div>
                                <div class="border-top">
                                    <div class="card-body text-center">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>

                            <form class="form-horizontal" action="<?php echo base_url('/admin/setting/update'); ?>"  method="post" enctype='multipart/form-data'>
                                <div class="card-body">
                                     <div class="row">
                                        <div class="col-md-12">
                                             <h4 class="card-title float-left"> Contact us page settings </h4>

                                  
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Email" name="contact_us_email" value="<?php if(array_key_exists('contact_us_email', $rows)) { echo $rows['contact_us_email']; }?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Phone" name="contact_us_phone" value="<?php if(array_key_exists('contact_us_phone', $rows)) { echo $rows['contact_us_phone']; }?>">
                                        </div>
                                    </div>


                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Contact Address" name="contact_us_address" value="<?php if(array_key_exists('contact_us_address', $rows)) { echo $rows['contact_us_address']; }?>">
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Map</label>
                                        <div class="col-sm-9">
                                           <textarea name="map" rows="13" class="form-control" placeholder="Map"><?php if(array_key_exists('map', $rows)) { echo $rows['map']; }?></textarea>
                                        </div>
                                    </div>

                                    

                               
                              
                                </div>
                                <div class="border-top">
                                    <div class="card-body text-center">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
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
            <!-- ============================================================== -->
            <!-- ============================================================== -->
          
        </div>