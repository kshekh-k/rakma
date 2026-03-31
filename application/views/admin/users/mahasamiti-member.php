<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Mahasamiti Member</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Mahasamiti Member</li>
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
                                              <h4 class="card-title">Mahasamiti Members</h4>
                                        </div>

                                    </div>


                                <h5 class="card-title float-left"><?php echo $section_heading; ?></h5>
                                 <div class="table-responsive">
                                    <table id="zero_config" class="zero_config table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                               
                                                <th>S.NO</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                              
                                                <th>Amount</th>
                                                <th>join Date</th>
                                                <th>Member Status</th>
                                                  <th>Payment Id</th>
                                                <th>Payment Status</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($rows){
                                               $i=1; foreach ($rows as $key => $value) { ?>
                                                   
                                              
                                            <tr>
                                               
                                                <td>
                                                   <?php echo $i; ?>
                                                </td>                                          
                                                <td><?php echo $value['first_name']; ?> <?php echo $value['middle_name']; ?> <?php echo $value['last_name']; ?> </td>                                        
                                                <td><?php echo $value['phone']; ?>  </td>

                                                  <td>&#x20B9;<?php echo $value['amount']; ?>  </td>

                                                 

                                                    <td> <?php echo  date("d-M-Y", strtotime($value['created_at'])); ?></td>
                                                    <td>

                                                    <?php if($value['status'] == '1'){ ?>

                                                        <a href="<?php echo base_url('/admin/user/mahasamitiMembersstatus/'.$value['id']) ?>"><span class="badge badge-pill badge-success">Approved</span> </a>
                                                        

                                                    <?php }else { ?>

                                                        <a href="<?php echo base_url('/admin/user/mahasamitiMembersstatus/'.$value['id']) ?>"><span class="badge badge-pill badge-danger">Pending</span> </a>


                                                    <?php }  ?>

                                                </td>
                                                


                                                <td><?php echo $value['payment_id']; ?>  </td>
                                                <td><?php echo $value['payment_status']; ?>  </td>
                                                
                                              

                                               
                                              
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


