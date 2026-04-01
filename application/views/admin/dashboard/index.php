        
        <?php
function formatNumber($num) {
    if ($num >= 1000000000) {
        return number_format($num / 1000000000, 2) . 'B';
    } elseif ($num >= 1000000) {
        return number_format($num / 1000000, 2) . 'M';
    } elseif ($num >= 1000) {
        return number_format($num / 1000, 2) . 'K';
    } else {
        return $num;
    }
}
?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('/admin/dashboard') ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="card">
                <div class="card-body">
                <div class="row">

                    <div class="col-12">
                          <h4 class="card-title">Total Counts</h4>
                    </div>

                     <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                    <a href="<?php echo base_url('admin/user'); ?>">
                        <div class="card card-hover">
                            <div class="box bg-primary text-center">
                                <h3 class="font-light text-white"><?php echo countdata('users' , array('role'=>'User')); ?></h3>
                                <h6 class="text-white">Total Members</h6>
                            </div>
                        </div>
                    </a>
                    </div>
                    <!-- Column -->


                       <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <a href="<?php echo base_url('admin/post'); ?>">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h3 class="font-light text-white"><?php echo countdata('post'); ?></h3>
                                <h6 class="text-white">Total Social Works</h6>
                            </div>
                        </div>
                    </a>
                    </div>
                    <!-- Column -->



   <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <a href="<?php echo base_url('admin/transaction'); ?>">
                        <div class="card card-hover">
                            <div class="box bg-secondary text-center">
                                <h3 class="font-light text-white" title="&#x20B9;<?php 

                                                        if(!empty($txn_info['total_txn']))
                                                        {
                                                             echo $txn_info['total_txn'];
                                                        }else
                                                        {
                                                            echo '0';
                                                        }

                                                        ?>">
                                &#x20B9;<?php 
echo formatNumber(!empty($txn_info['total_txn']) ? $txn_info['total_txn'] : 0);
?>
                                                        
                                                       
                                                    </h3>
                                                       
                                <h6 class="text-white">Total Txn</h6>
                            </div>
                        </div>
                    </a>
                    </div>
                    <!-- Column -->



   <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <a href="<?php echo base_url('admin/donation'); ?>">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h3 class="font-light text-white" title="&#x20B9;<?php 

                                                        if(!empty($donation_info['total_donation']))
                                                        {
                                                             echo $donation_info['total_donation'];
                                                        }else
                                                        {
                                                            echo '0';
                                                        }

                                                        ?>"> 

                                  

                                &#x20B9;<?php 
echo formatNumber(!empty($donation_info['total_donation']) ? $donation_info['total_donation'] : 0);
?>

                            </h3>
                                <h6 class="text-white">Total Donation</h6>
                            </div>
                        </div>
                        </a>
                    </div>
                    <!-- Column -->



   <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                          <a href="<?php echo base_url('admin/download'); ?>">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h3 class="font-light text-white"><?php echo countdata('downloads'); ?></h3>
                                <h6 class="text-white">Total Downloads</h6>
                            </div>
                        </div>
                    </a>
                    </div>
                    <!-- Column -->



   <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                          <a href="<?php echo base_url('admin/contactquery'); ?>">
                        <div class="card card-hover">
                            <div class="box bg-dark text-center">
                                <h3 class="font-light text-white"><?php echo countdata('contactquery'); ?></h3>
                                <h6 class="text-white">Total Contact Query</h6>
                            </div>
                        </div>
                    </a>
                    </div>
                    <!-- Column -->


                </div>
            </div>



                <!-- ============================================================== -->
         
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->





               
                        <div class="row">
                            <div class="col-md-6">
								 <div class="card">
                     			<div class="card-header d-flex align-items-center">
                                <h4 class="card-title">Latest 10 Registered Members</h4>
									<a href="<?php echo base_url('/admin/user') ?>" class="btn btn-primary btn-sm mr-0 ml-auto">View</a>
								</div>
								<div class="card-body">
                                <table class="table table-striped table-bordered" role="grid">
                                    <thead>
                                        <tr>
                                            <th>Name</th>                                           
                                            <th>Phone</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($user_data) { foreach ($user_data as $key => $user) { ?>
                                            <tr>
                                                <td><?php echo $user['first_name']; ?> <?php echo $user['middle_name']; ?> <?php echo $user['last_name']; ?> </td>
                                             
                                                <td><?php echo $user['phone']; ?></td>
												
												
												<td>
													
													<?php if($user['verify'] == '1'){ ?>
                                                    <span class="badge badge-pill badge-success">Approved</span> 
                                                        <?php }
																									   elseif($user['verify'] == '2'){ ?>
                                                    <span class="badge badge-pill badge-danger">Rejected</span> 
                                                        <?php }	else { ?>
                                                        <span class="badge badge-pill badge-info">Pending</span> 
                                                         <?php }  ?>
                                                        </td>
                                                
													 
<!--
													
													 <td>
													
													<?php // if($user['verify'] == '1'){ ?>
                                                    <span class="badge badge-pill badge-success">Approved</span> 
                                                        <?php // }else { ?>
                                                        <span class="badge badge-pill badge-danger">Unapproved</span> 
                                                         <?php // }  ?>
                                                        </td>
-->
                                        </tr>
                                    <?php }} ?>
                                    </tbody>
                                </table>
                            
							</div>
							</div>
							</div>
                            <div class="col-md-6">
								 <div class="card">
									 
									 <div class="card-header d-flex align-items-center">
                                <h4 class="card-title">Latest 10 Donation  </h4>
									<a href="<?php echo base_url('/admin/donation') ?>" class="btn btn-primary btn-sm mr-0 ml-auto">View</a>
								</div>
									 
                    <div class="card-body">
								

                                 

                                  <table class="table table-striped table-bordered" role="grid">
                                    <thead>
                                        <tr>
                                               
                                                <th>Name</th>
                                                <th>Mobile</th>                                               
                                                <th>Amount</th>
                                                <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php if ($donations) { foreach ($donations as $key => $donation) { ?>
                                        <tr>
                                             
                                                <td><?php echo $donation['name']; ?></td>
                                                <td><?php echo $donation['mobile']; ?></td>
                                               
                                                <td>&#x20B9;<?php echo $donation['price']; ?></td>
                                                <td>  <?php echo  date("d-M-Y", strtotime($donation['create_at'])); ?> </td>
                                        </tr>
                                        <?php }} ?>
                                    </tbody>
                                </table>

                            
							</div>
							</div>
							</div>

                        </div>
                













            
    
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
