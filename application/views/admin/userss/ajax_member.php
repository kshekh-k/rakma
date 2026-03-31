 <table class=" table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                               
                                                <th>S.N.</th>
                                                <th>Name</th>
                                                <th>Photo</th>
                                                
                                                <th>Phone</th>
												<th>Post Name</th>
                                                <th>Post District</th>
												<th>Home District</th>												
                                                <th>Ref. Details</th>
                                                <th>Membership</th>
                                                <th>Type of Amount</th>
                                                <th>Transfer Amount</th>
                                                <th>Payment Status</th>
                                                <th>Status</th>                                               
                                                <th>Action</th>
                                              
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($rows){
                                               $i=1; foreach ($rows as $key => $value) { /*echo '<pre>'; print_r($value);*/ ?>
                                                   
                                              
                                            <tr>
                                               
                                                <td>
                                                   <?php echo $i; ?>
                                                </td>
                                                 <td><?php echo $value['first_name']; ?> <?php echo $value['middle_name']; ?> <?php echo $value['last_name']; ?> </td>
                                                <td>
                                                     <?php if(!empty($value['image'])){ ?>


                                                        <img src="<?php  echo base_url('/uploads/'.$value["image"]) ?>" width="50px">


                                                    <?php }  ?>
                                                </td>
                                            
                                               
                                                <td><?php echo $value['phone']; ?></td>
												<td><?php echo $value['post_name']; ?></td>
                                                <td><?php echo $value['office_district']; ?></td>
												<td><?php echo $value['district']; ?></td>								
												  
 												<td>

                                                    <?php echo $value['ref_mobile']; ?><br>
                                                    <?php echo $value['ref_first_name']; ?>
                                                    <?php echo $value['ref_middle_name']; ?>
                                                    <?php echo $value['ref_last_name']; ?>
                                            </td>

                                            <td>
                                                <?php echo $value['membership_name']; ?>
                                                &#x20B9;<?php echo $value['m_price']; ?>
                                            </td>

                                               <td>

                                                    <?php if($value['type'] == 'Membership_Join'){ ?>

                                                       <span class="badge badge-pill badge-success">New Joining</span>
                                                        

                                                    <?php }else { ?>

                                                      <span class="badge badge-pill badge-info">Upgraded</span> 


                                                    <?php }  ?>

                                                </td>

                                                <td>&#x20B9;<?php echo $value['txn_amount']; ?></td>

                                                  <td> 
                                                    <?php if($value['payment_status'] == 'Complete') { ?>
                                                         <span class="badge badge-pill badge-success">Completed</span>
                                                 <?php  }elseif($value['payment_status'] == 'authorized'){ ?>
                                                     <a href="<?php echo base_url('admin/transaction/paymentst/'.$value['id']); ?>"><span class="badge badge-pill badge-primary"><?php echo $value['payment_status']; ?> </span></a>
                                                   <?php  }elseif($value['payment_status'] == 'Refunded'){  ?>
                                                     <span class="badge badge-pill badge-danger"><?php echo $value['payment_status']; ?> </span>
                                                   <?php }  ?>
                                                   

                                                     </td>

                                             
                                                <td>

                                                    <?php 

                                                        if($value['verify'] == '1'){
                                                            $class = 'btn-success dropdown-toggle';
                                                            $st = 'Approved';
                                                           
                                                        }elseif ($value['verify'] == '2') {
                                                            $class = 'btn-danger disabled rounded';
                                                            $st = 'Rejected';
                                                        }else
                                                        {
                                                            $class = 'btn-info dropdown-toggle';
                                                            $st = 'Pending';
                                                        }
                                                    ?>

                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-sm <?php echo  $class; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo  $st; ?></button>
                                                        <div class="dropdown-menu">
                                                          <a  href="javascript:void(0);" class="dropdown-item" data-st="0" onclick="member_st__confirm('0' , <?php echo $value['id']; ?>);" data-id="<?php echo $value['id']; ?>" href="">Pending</a>
															
                                                          <a  href="javascript:void(0);" class="dropdown-item"data-st="1"   onclick="member_st__confirm('1' , <?php echo $value['id']; ?>);" data-id="<?php echo $value['id']; ?>" href="#">Approve</a>
															
                                                           <a  href="javascript:void(0);" class="dropdown-item" data-st="2" onclick="member_st__confirm('2' , <?php echo $value['id']; ?>);"  data-id="<?php echo $value['id']; ?>" href="#">Reject</a>
                                                      </div>
                                                    </div>

                                                </td>

                                              

                                                     
                                                
                                                <td class="">
                                                    <div class="d-flex flex-wrap flex-xl-nowrap align-content-center">
                                                  <a href="<?php echo base_url('admin/user/view/'.$value['id']) ?>" class="btn btn-primary btn-sm mr-1 mb-2 mb-xl-0">View Details</a>

                                                    
                                                    <a href="<?php echo base_url('home/pdf_m/'.$value['id']) ?>"  class="btn btn-info btn-sm mr-1 mb-2 mb-xl-0">Reciept</a>                                           
                                                    <a href="javascript:void(0);" class="btn btn-success btn-sm mr-1 mb-2 mb-xl-0" title="Edit"   onclick="edit_confirm('<?php echo base_url('admin/user/edit/'.$value['id']) ?>');"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                    <a href="javascript:void(0);"  onclick="delete_confirm('<?php echo base_url('admin/user/delete/'.$value['id']) ?>');"  class="btn btn-danger btn-sm mb-2 mb-xl-0" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                                             </div>

                                                </td>
                                            
                                            </tr>

                                            <?php $i++;}} ?>
                                           
                                        </tbody>
                                        <tfoot>
                                             <tr>
                                                <th>S.N.</th>
                                               
                                                <th>Name</th>
                                                 <th>Photo</th>
                                                <th>Phone</th>
												<th>Post Name</th>
                                                <th>Post District</th>
												<th>Home District</th>												
                                                <th>Ref. Details</th>
                                                <th>Membership</th>
                                                <th>Type of Amount</th>
                                                <th>Transfer Amount</th>
                                                <th>Payment Status</th>
                                                <th>Status</th>                                               
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>