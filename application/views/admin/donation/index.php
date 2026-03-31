<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Donation</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Donation</li>
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


                                 <div class="row">

                    <div class="col-12">
                          <h4 class="card-title">Donations</h4>
                    </div>

                     <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-primary text-center">
                                <h1 class="font-light text-white">&#x20B9;<?php echo $donation_info['total_donation']; ?></h1>
                                <h6 class="text-white">Total Donation</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->


                       <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white">&#x20B9;<?php echo $donation_info['max_donation']; ?></h1>
                                <h6 class="text-white">Maximum Donation</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->



   <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-secondary text-center">
                                <h1 class="font-light text-white">&#x20B9;<?php echo $donation_info['this_month']; ?></h1>
                                <h6 class="text-white">Current Month</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->



   <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white">&#x20B9;<?php echo $donation_info['this_year']; ?></h1>
                                <h6 class="text-white">Current Year</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->



                </div>


                                <h5 class="card-title float-left"><?php echo $section_heading; ?></h5>

                            



                                <div class="table-responsive">
                                    <table id="zero_config" class="zero_config table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                               
                                                <th>S.NO</th>
                                                <th>Payment ID</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                              
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Payment Status</th>
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
                                          
                                                <td><?php echo $value['payment_id']; ?></td>
                                                <td><?php echo $value['name']; ?></td>
                                                <td><?php echo $value['mobile']; ?></td>
                                                
                                                <td>&#x20B9;<?php echo $value['price']; ?></td>
                                                <td><?php echo  date("d-M-Y h:i:s a", strtotime($value['payment_date'])); ?></td>
                                                 <td> 
                                                    <?php if($value['payment_status'] == 'Complete') { ?>
                                                         <span class="badge badge-pill badge-success">Completed</span>
                                                 <?php  }elseif($value['payment_status'] == 'authorized'){ ?>
                                                     <a href="<?php echo base_url('admin/donation/paymentst/'.$value['id']); ?>"><span class="badge badge-pill badge-primary"><?php echo $value['payment_status']; ?> </span></a>
                                                   <?php  }?>
                                               </td>


                                                <td>
                                                      <a href="<?php echo base_url('page/pdf_d/'.$value['id']) ?>" class="btn btn-info btn-sm mr-1 mb-2 mb-xl-0">Reciept</a>     
                                                </td>
                                       
                                                 
                                               
                                              
                                           
                                              
                                            </tr>

                                            <?php $i++;}} ?>
                                           
                                        </tbody>
                                        <tfoot>
                                             <tr>
                                               
                                                 
                                                <th>S.NO</th>
                                                <th>Payment ID</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                              
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Payment Status</th>
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


