<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Mahasamiti</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Mahasamiti</li>
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

                               




                                <div class="table-responsive">
                                    <table id="" class=" table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                               
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($row){  ?>
                                                   
                                              
                                            <tr>
                                                <td><?php echo $row['title']; ?></td>
                                                <td><?php echo $row['description']; ?></td>
                                               
                                                
                                                <td>

                                                    

                                                    <a href="<?php echo base_url('admin/committee/editmahasamiti/'.$row['id']) ?>" class="btn btn-success btn-sm mb-2" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            
                                                    
                                                    

                                             

                                                </td>
                                            </tr>

                                            <?php } ?>
                                           
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




                  <div class="row">
                    <div class="col-12">
                        
                        <div class="card">
                            <div class="card-body">


                                <h5 class="card-title float-left">Mahasamiti Members</h5>

                                <a href="<?php echo base_url('/admin/committee/addmember/'.$row['id']) ?>" class="btn btn-info btn-sm float-right mb-4"><i class="fa fa-plus"></i> Add Member</a>


                            <?php if($memberlist){  ?>

                                <div class="table-responsive">
                                    <table id="zero_configs" class=" table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                               
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="drag">
                                             <?php  $i=1; foreach ($memberlist as $key => $value) { ?>
                                                   
                                              
                                            <tr class="drag">
                                                <td><?php echo $value['first_name']; ?></td>
                                                <td><?php echo $value['post_name']; ?></td>
                                               
                                                
                                                <td>

                                                   

                                                    <a href="<?php echo base_url('admin/committee/editmember/'.$value['id']) ?>" class="btn btn-info btn-sm mb-2">Edit</a>
                                            
                                                    
                                                    <a href="<?php echo base_url('admin/committee/deletemahasamitimember/'.$value['id']) ?>" class="btn btn-danger btn-sm mb-2">Delete</a>

                                             

                                                </td>
                                            </tr>


                                             <?php $i++; } ?>

                                           
                                           
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
                                        <?php } ?>
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


