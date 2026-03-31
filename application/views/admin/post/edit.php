<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Post</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                               <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/post') ?>">Post</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
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
                            <form class="form-horizontal" action="<?php echo base_url('/admin/post/update/'.$row['id']); ?>" method="post" enctype='multipart/form-data'>
                                <div class="card-body">
                                     <div class="row">
                                        <div class="col-md-12">
                                             <h4 class="card-title float-left"><?php echo $section_heading; ?></h4>

                                     <a href="<?php echo base_url('/admin/post') ?>" class="btn btn-info btn-sm float-right mb-4">Back</a>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Title" name="title" value="<?php echo $row['title']; ?>">
                                        </div>
                                    </div>

                                        <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Category</label>
                                        <div class="col-sm-9">
                                           <select class="form-control" name="cat_id">
                                            <option value="">Select Category</option>
                                            <?php if($cat_list)  { foreach ($cat_list as $key => $value) { ?>

                                                <option value="<?php echo $value['id']; ?>" <?php if($row['cat_id'] == $value['id']) {echo 'selected';} ?>><?php echo $value['cat_name']; ?></option>

                                                
                                            <?php } }  ?>
                                           </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Location</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Location" name="location" value="<?php echo $row['location']; ?>">
                                        </div>
                                    </div>

                                  
                                       <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea name="description" class="form-control" id="editor" placeholder="Description"><?php echo $row['description']; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Gallery</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="gallery">

                                                <option value="0">Select gallery</option>

                                                <?php if($gallery_list){ foreach ($gallery_list as $key => $gallery) { ?>
                                                   
                                                

                                                    <option value="<?php echo  $gallery['id'] ?>"  <?php if($gallery['id'] == $row['gallery_id']) {echo 'selected';}?>  >#<?php echo  $gallery['id'] ?> --- <?php echo  $gallery['title'] ?></option>

                                                <?php }  } ?>

                                            </select>
                                        </div>
                                    </div>

                                  
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Upload Image</label>
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