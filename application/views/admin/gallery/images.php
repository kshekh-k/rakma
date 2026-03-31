<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Gallery</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/gallery') ?>">Gallery</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Gallery Images</li>
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



           
            <?php if($row) { ?>

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
                            <form class="form-horizontal" action="<?php echo base_url('/admin/gallery/uploadimage/'.$row['id']); ?>" method="post" enctype='multipart/form-data'>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                             <h4 class="card-title float-left">Add Images</h4>

                                     <a href="<?php echo base_url('/admin/gallery') ?>" class="btn btn-info btn-sm float-right mb-4">Back</a>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Uplaod Images</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control"  name="images[]" multiple>
                                        </div>
                                    </div>

                                 
                                     
                                  
                                  
                               
                              
                                </div>
                                <div class="border-top">
                                    <div class="card-body text-center">
                                        <button type="submit" class="btn btn-primary">Upload Images</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                       

                    </div>
                   
                </div>
                                            
                                        


                <div class="row">
                    <div class="col-12">
                        
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                        <div class="col-md-12">
                                             <h4 class="card-title float-left">Gallery Images Images</h4>

                                    
                                        </div>
                                    </div>



                                <div class="row">
                                    <?php if ($rows) { foreach ($rows as $key => $value) { ?>
                                    <div class="col-md-2 mb-2">

                                        <img src="<?php echo base_url('/uploads/'.$value["image"]) ?>" width="100%" style="max-width: 100%; display: block;">

                                        <a href="<?php echo base_url('/admin/gallery/removeimage/'.$row['id'].'/'.$value['id']) ?>" class="btn btn-sm btn-info d-block" style="display: block; width: 100%;">Delete</a>


                                      
                                    </div>

                                <?php }}else{ ?>

                                       <div class="col-md-12">

                                        <h1 class="text-center">Opps Images Not Found</h1>
                                      
                                    </div>

                                <?php }  ?>


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


            <?php }  ?>


            </div>


