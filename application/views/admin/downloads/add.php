<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Download</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                               <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/download') ?>">Download</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Download</li>
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
                    <div class="col-md-12">


                        <div class="card">
                            <form class="form-horizontal" action="<?php echo base_url('/admin/download/save'); ?>" method="post" enctype='multipart/form-data'>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-12">
                                             <h4 class="card-title float-left"><?php echo $section_heading; ?></h4>

                                     <a href="<?php echo base_url('/admin/download') ?>" class="btn btn-info btn-sm float-right mb-4">Back</a>
                                        </div>
                                    </div>
                                   

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Title" name="title" value="">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="fname" placeholder="Title" name="date" value="">
                                        </div>
                                    </div>




                                       <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea name="description" class="form-control" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Upload Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="image">
                                             <div class="text-danger"> <?php echo $this->session->flashdata('image_error');  ?></div>
                                        </div>
                                    </div>


                                  


                                    <div class="form-group row URL__section">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Add URL</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="URL" name="url" value="">
                                        </div>
                                    </div>


                                    <div class="form-group row PDF__section">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Upload PDF</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="file">
                                             <div class="text-danger"> <?php echo $this->session->flashdata('file_error');  ?></div>
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

