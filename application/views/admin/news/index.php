<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">News</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">News</li>
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
                    <div class="col-12">
                        
                        <div class="card">
                            <div class="card-body">


                                <h5 class="card-title float-left"><?php echo $section_heading; ?></h5>

                                <a href="<?php echo base_url('/admin/news/add') ?>" class="btn btn-info btn-sm float-right mb-4"><i class="fa fa-plus"></i> Add</a>




                                <div class="table-responsive">
                                    <table id="zero_config" class="zero_config table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                               
                                                <th>S.NO</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Uploaded Date</th>
                                                <th>Location</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($rows){
                                               $i=1; foreach ($rows as $key => $value) { ?>
                                                   
                                              
                                            <tr>
                                               
                                                <td>
                                                   <?php echo $i; ?>
                                                </td>
                                                <td>
                                                       <?php if(!empty($value['image'])){ ?>


                                                        <img src="<?php  echo base_url('/uploads/'.$value["image"]) ?>" width="50px">


                                                    <?php }  ?>

                                                </td>
                                                <td><?php echo $value['title']; ?></td>
                                                <td> <?php echo  date("d-m-Y", strtotime($value['create_at'])); ?></td>
                                                 <td><?php echo $value['location']; ?></td>
                                               
                                              
                                                <td>

                                                    <?php if($value['status'] == '1'){ ?>

                                                        <a href="<?php echo base_url('/admin/news/status/'.$value['id']) ?>"><span class="badge badge-pill badge-success">Active</span> </a>
                                                        

                                                    <?php }else { ?>

                                                        <a href="<?php echo base_url('/admin/news/status/'.$value['id']) ?>"><span class="badge badge-pill badge-danger">Inactive</span> </a>


                                                    <?php }  ?>

                                                </td>
                                                
                                                <td>

                                                    <a href="<?php echo base_url('admin/news/view/'.$value['id']) ?>" class="btn btn-primary btn-sm mb-2">View Details</a>

                                                    <a href="<?php echo base_url('admin/news/edit/'.$value['id']) ?>" class="btn btn-success btn-sm mb-2" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            
                                                    
                                                    <a href="<?php echo base_url('admin/news/delete/'.$value['id']) ?>" class="btn btn-danger btn-sm mb-2" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>


                                                </td>
                                            </tr>

                                            <?php $i++;}} ?>
                                           
                                        </tbody>
                                        <tfoot>
                                             <tr>
                                               
                                                <th>S.NO</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Uploaded Date</th>
                                                <th>Location</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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


