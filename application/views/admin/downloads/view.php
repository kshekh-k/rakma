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
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/news') ?>">Download</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Download</li>
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
                                

                                <div class="row">
                                        <div class="col-md-12">
                                             <h4 class="card-title float-left"><?php echo $section_heading; ?></h4>

                                     <a href="<?php echo base_url('/admin/download') ?>" class="btn btn-info btn-sm float-right mb-4">Back</a>
                                        </div>
                                    </div>
                                   


                                <div class="row">
                                    <div class="col-md-12">
                                       <table class="table table-sm">
                                        <tr>
                                            <td width="20%">Title</td>
                                            <td style=" color: #192bff;font-size: 17px;font-weight: 800;"><?php echo $row['title']; ?></td>
                                        </tr>

                                         <tr>
                                            <td>Type</td>

                                            <td>


                                                    <?php if($row['type'] == 'PDF'){ ?>

                                                        <span class="badge badge-pill badge-info">PDF</span>

                                                    <?php } else { ?>
                                                        <span class="badge badge-pill badge-warning">URL</span>
                                                    <?php } ?>
                                                </td>
                                        </tr>


                                         <tr>
                                            <td>PDF / URL</td>

                                            <td>
                                                    <?php if($row['type'] == 'PDF'){ ?>

                                                       <a href="<?php  echo base_url('/uploads/'.$row["file"]) ?>">PDF </a> 

                                                    <?php } else { ?>
                                                        <a href="<?php  echo base_url('/uploads/'.$row["url"]) ?>"><?php echo $row['url']; ?> </a> 
                                                    <?php } ?>
                                                </td>
                                        </tr>

                                        <tr>
                                            <td>Date</td>
                                            <td><?php echo  date("d-m-Y", strtotime($row['date'])); ?></td>
                                        </tr>



                                         <tr>
                                            <td>Description</td>
                                            <td><?php echo $row['description']; ?></td>
                                        </tr>

                                        <tr>
                                            <td>Image</td>
                                            <td>
                                                    <?php if(!empty($row['image'])){ ?>


                                                        <img src="<?php  echo base_url('/uploads/'.$row["image"]) ?>" width="100px">


                                                    <?php }  ?>
                                            </td>
                                        </tr>

                                         <tr>
                                            <td>Status</td>
                                            <td>
                                                

                                                  <?php if($row['status'] == '1'){ ?>

                                                      <span class="badge badge-pill badge-success">Active</span>
                                                        

                                                    <?php }else { ?>

                                                     <span class="badge badge-pill badge-danger">Inactive</span>


                                                    <?php }  ?>


                                            </td>
                                        </tr>
                                       </table>
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


