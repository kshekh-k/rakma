<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">District committee</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">District committee</li>
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


                                <?php if ($row) { ?>
                                        <h1 class="text-center"><?php echo $row['title']; ?></h1>
                               <?php } ?>


                                


                                <h5 class="card-title float-left"><?php echo $section_heading; ?></h5>
                                 <?php if ($row) { ?>
                                 <a href="<?php echo base_url('/admin/committee/adddistrictcommitteemember/'.$row['id']) ?>" class="btn btn-success btn-sm float-right mb-4"><i class="fa fa-plus"></i>  Add member</a>  <a href="<?php echo base_url('/admin/committee/export/'.$row['id']) ?>" class="mr-2 btn btn-primary btn-sm float-right mb-4"><i class="mdi mdi-download"></i> Downlaod CSV</a>
                                     <button data-id="<?php echo $row['id']; ?>" class="print__data mr-2 btn btn-secondary btn-sm float-right mb-4"><i class="fa fa-print" aria-hidden="true"></i> Print</button>



                                 <a href="<?php echo base_url('/admin/committee/districtcommitte') ?>" class="btn btn-info btn-sm float-right mb-4 mr-2"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a> 
                                 <?php } ?>



                                <?php if($memberlist){  ?>

                                <div class="table-responsive">
                                    <table id="zero_configs" class=" table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                               <th>S.NO</th>
                                                <th>Member Name</th>
                                                <th>Post Name</th>
                                                <th>Mobile</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php  $i=1; foreach ($memberlist as $key => $value) { ?>
                                                   
                                              
                                            <tr>
                                                <td> 
												<?php echo $value['first_name']; ?> <?php echo $value['middle_name']; ?> <?php echo $value['last_name']; ?>
												</td>
                                                <td><?php echo $value['post_name']; ?></td>
                                                <td><?php echo $value['phone']; ?></td>                                              
                                                
                                                <td>

                                                   

                                                    <a href="<?php echo base_url('admin/committee/edit/'.$value['id']) ?>" class="btn btn-info btn-sm mb-2"  title="Edit" ><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            
                                                    
                                                    <a href="<?php echo base_url('admin/committee/delete/'.$value['id']) ?>" class="btn btn-danger btn-sm mb-2"  title="Delete" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                                             

                                                </td>
                                            </tr>


                                             <?php $i++; } ?>

                                           
                                           
                                        </tbody>
                                        <tfoot>
                                             <tr>
                                               <th>S.NO</th>
                                                <th>Member Name</th>
                                                <th>Post Name</th>
                                                <th>Mobile</th>
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


