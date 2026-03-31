<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Other committee</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Other committee</li>
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
                    <div class="col-12">
                        
                        <div class="card">
                            <div class="card-body">


                                <h5 class="card-title float-left"><?php echo $section_heading; ?></h5>

                                 <a href="<?php echo base_url('/admin/committee/addcommittee/') ?>" class="btn btn-success btn-sm float-right mb-4"><i class="fa fa-plus"></i> Add Committee</a> 




                                <div class="table-responsive">
                                    <table id="zero_config" class="zero_config  table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                               
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($rows){  foreach ($rows as $key => $value) { ?>
                                              
                                          
                                                   
                                              
                                            <tr>
                                                <td><?php echo $value['title']; ?></td>
                                                <td><?php echo $value['description']; ?></td>
                                               
                                                
                                                <td>

                                                     <a href="<?php echo base_url('admin/committee/othercommitteememberlist/'.$value['id']) ?>" class="btn btn-info btn-sm mb-2">Memebers</a>
                                            

                                                    <a href="<?php echo base_url('admin/committee/editcommittee/'.$value['id']) ?>" class="btn btn-success btn-sm mb-2" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                                     <a href="<?php echo base_url('admin/committee/deletecommitte/'.$value['id']) ?>" class="btn btn-danger btn-sm mb-2" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            
                                                    
                                                    

                                             

                                                </td>
                                            </tr>

                                            <?php }  } ?>
                                           
                                        </tbody>
                                        <tfoot>
                                             <tr>
                                               
                                                <th>Title</th>
                                                <th>Description</th>
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


