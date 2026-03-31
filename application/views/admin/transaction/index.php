<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Transaction</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Transaction</li>
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

                                        <div class="col-12">
                                              <h4 class="card-title">Transaction</h4>
                                        </div>

                                         <!-- Column -->
                                        <div class="col-md-6 col-lg-3 col-xlg-3">
                                            <div class="card card-hover">
                                                <div class="box bg-primary text-center">
                                                    <h1 class="font-light text-white">&#x20B9;<?php 

                                                        if(!empty($txn_info['total_txn']))
                                                        {
                                                             echo $txn_info['total_txn'];
                                                        }else
                                                        {
                                                            echo '0';
                                                        }

                                                        ?>

                                                    </h1>
                                                    <h6 class="text-white">Total Txn Amount</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Column -->


                                           <!-- Column -->
                                        <div class="col-md-6 col-lg-3 col-xlg-3">
                                            <div class="card card-hover">
                                                <div class="box bg-success text-center">
                                                    <h1 class="font-light text-white">&#x20B9;<?php 

                                                        if(!empty($txn_info['total_pending_txn']))
                                                        {
                                                             echo $txn_info['total_pending_txn'];
                                                        }else
                                                        {
                                                            echo '0';
                                                        }

                                                        ?>

                                                </h1>
                                                    <h6 class="text-white">Total Pending Amount</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Column -->



                       <!-- Column -->
                                        <div class="col-md-6 col-lg-3 col-xlg-3">
                                            <div class="card card-hover">
                                                <div class="box bg-secondary text-center">
                                                    <h1 class="font-light text-white">&#x20B9;<?php 

                                                        if(!empty($txn_info['total_complete_txn']))
                                                        {
                                                             echo $txn_info['total_complete_txn'];
                                                        }else
                                                        {
                                                            echo '0';
                                                        }

                                                        ?>
                                                </h1>
                                                    <h6 class="text-white">Total Complete Amount</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Column -->



                       <!-- Column -->
                                        <div class="col-md-6 col-lg-3 col-xlg-3">
                                            <div class="card card-hover">
                                                <div class="box bg-info text-center">
                                                    <h1 class="font-light text-white">&#x20B9; <?php 

                                                        if(!empty($txn_info['total_refund_txn']))
                                                        {
                                                             echo $txn_info['total_refund_txn'];
                                                        }else
                                                        {
                                                            echo '0';
                                                        }

                                                        ?>
                                                    </h1>
                                                    <h6 class="text-white">Total Refunded Amount</h6>
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
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Payment ID</th>
                                                <th>Transaction Type</th>
                                                <th>Amount</th>
                                                <th>Payment Status</th>
                                                <th>Date</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($rows){
                                               $i=1; foreach ($rows as $key => $value) { ?>
                                                   
                                              
                                            <tr>
                                               
                                                <td>
                                                   <?php echo $i; ?>
                                                </td>                                          
                                                <td><?php echo $value['name']; ?></td>                                        
                                                <td><?php echo $value['phone']; ?>  </td>
                                                <td><?php echo $value['payment_id']; ?>  </td>
                                               <td>

                                                    <?php if($value['type'] == 'Membership_Join'){ ?>

                                                       <span class="badge badge-pill badge-success">New Joining</span>
                                                        

                                                    <?php }else { ?>

                                                      <span class="badge badge-pill badge-info"> Upgraded</span> 


                                                    <?php }  ?>

                                                </td>

                                                 <td>&#x20B9;<?php echo $value['price']; ?>  </td>

                                                  <td> 
                                                    <?php if($value['payment_status'] == 'Complete') { ?>
                                                         <span class="badge badge-pill badge-success">Completed</span>
                                                 <?php  }elseif($value['payment_status'] == 'authorized'){ ?>
                                                   <a href="<?php echo base_url('admin/transaction/paymentst/'.$value['id']); ?>"><span class="badge badge-pill badge-primary"><?php echo $value['payment_status']; ?> </span></a>
                                                   <?php  }elseif($value['payment_status'] == 'Refunded'){  ?>
                                                     <span class="badge badge-pill badge-danger"><?php echo $value['payment_status']; ?> </span>
                                                   <?php }  ?>
                                               </td>

                                                    <td> <?php echo  date("d-M-Y h:i:s a", strtotime($value['payment_date'])); ?></td>
                                                
                                              
                                            </tr>

                                            <?php $i++;}} ?>
                                           
                                        </tbody>
                                        <tfoot>
                                             <tr>
                                               
                                                 <th>S.NO</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Payment ID</th>
                                                <th>Transaction Type</th>
                                                <th>Amount</th>
                                                <th>Payment Status</th>
                                                <th>Date</th>
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


