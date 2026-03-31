<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Member Manager</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Member Manager</li>
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

                    <div id="ajax__alert"></div>
                    <?php echo  $this->session->flashdata('alert');?>
                                            
                                        


                <div class="row">
                    <div class="col-12">
                        
                        <div class="card">
                            <div class="card-body">


                                <div class="row">
                                    <div class="col-sm-12">
                                         <button class="btn btn-info btn-sm  mb-4" id="export__btn"><i class="fa fa-plus" aria-hidden="true"></i> Export Excel</button>
                                    </div>
                                   
                                </div>

                                <form action="<?php echo base_url('/admin/user/export'); ?>" method="post" id="export__form">
                                <div class="row mb-4" id="export__filter__row">
                                    <div class="col-sm-2 mb-2">
                                            <select class="form-control" name="district">.
                                                    <option value="">Select home district</option>
                                                    <?php if ($districts) { foreach ($districts as $key => $district) { ?>
                                                             <option value="<?php echo  $district['id']; ?>"><?php echo  $district['name']; ?></option>
                                                    <?php } } ?>
                                            </select>
                                    </div>

                                     <div class="col-sm-2  mb-2">
                                            <select class="form-control" name="post_district">.
                                                    <option value="">Select post district</option>
                                                    <?php if ($districts) { foreach ($districts as $key => $district) { ?>
                                                             <option value="<?php echo  $district['id']; ?>"><?php echo  $district['name']; ?></option>
                                                    <?php } } ?>
                                            </select>
                                    </div>

                                    <div class="col-sm-2  mb-2">

                                        <select class="form-control" name="post_type">
                                            <option value="">Post Type</option>
                                            <option value="Gazetted">Gazetted</option>
                                            <option value="Non-Gazetted">Non-Gazetted</option>
                                        </select>
                                            
                                    </div>
                                    <div class="col-sm-2  mb-2">
                                          <select class="form-control" name="service">
                                            <option value="">Service Status</option>
                                            <option value="In Service">In Service</option>
                                            <option value="Retired/Ex-Service">Retired/Ex-Service</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2  mb-2">
                                          <select class="form-control" name="verify">
                                            <option value="">Status</option>
                                            <option value="0">Pending</option>
                                            <option value="1">Approved</option>
                                            <option value="2">Reject</option>
                                        </select>
                                    </div>

                                     <div class="col-sm-2  mb-2">
                                          <select class="form-control" name="membership_type">
                                            <option value="">Membership type</option>
                                            <option value="200">Active (RS 200) </option>
                                            <option value="50">General  (Rs 50)</option>
                                        </select>
                                    </div>

                                   

                                     <div class="col-sm-2  mb-2">
                                          <button class="btn btn-info btn-sm" type="submit">Export</button>
                                    </div>

                                </div>
                                </form>


                                <h5 class="card-title float-left"><?php echo $section_heading; ?></h5>

                             

                                <div class="table-responsive scroll-thick">
                                    <table id="zero_config" class="zero_config table table-striped table-bordered">
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
                                                 $cur_page  = ($this->pagination->cur_page > 0) ? $this->pagination->cur_page  : 1;
                                                $serial_number = $cur_page * $this->pagination->per_page - 10;
                                                echo $this->pagination->cur_page;
                                                echo $serial_number;
                                               $i=1; foreach ($rows as $key => $value) { 
                                                   $serial_number++;
                                                /*echo '<pre>'; print_r($value);*/  ?>
                                                   
                                              
                                            <tr>
                                               
                                                <td>
                                                   <?php echo $serial_number; ?>
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

                                                 

                                                      <?php if($value['m_type'] == 'Join'){ ?>

                                                       <span class="badge badge-pill badge-success">New Joining</span>
                                                   <?php }?>

                                                     <?php if($value['m_type'] == 'Upgraded'){ ?>

                                                      <span class="badge badge-pill badge-info">Upgraded</span>
                                                   <?php } ?>

                                                      <?php if($value['m_type'] == 'Lifetime'){ ?>

                                                      <span class="badge badge-pill badge-info">Lifetime</span>
                                                   <?php }?>

                                                       


                                           

                                                </td>

                                               <!--  <td>
                                                    <?php echo ($value['txn_amount'] != '') ? '&#x20B9;'.$value['txn_amount'] : ""; ?>
                                                        
                                                    </td> -->

                                                 <!--  <td> 
                                                    <?php if($value['payment_status'] == 'Complete') { ?>
                                                         <span class="badge badge-pill badge-success">Completed</span>
                                                 <?php  }elseif($value['payment_status'] == 'authorized'){ ?>
                                                     <a href="<?php echo base_url('admin/transaction/paymentst/'.$value['id']); ?>"><span class="badge badge-pill badge-primary"><?php echo $value['payment_status']; ?> </span></a>
                                                   <?php  }elseif($value['payment_status'] == 'Refunded'){  ?>
                                                     <span class="badge badge-pill badge-danger"><?php echo $value['payment_status']; ?> </span>
                                                   <?php }  ?>
                                                   

                                                     </td> -->

                                             
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
                                                        <button type="button" class="btn btn-sm 
                                                        <?php echo  ($value['verify'] == '2') ? 'btn-danger dropdown-toggle' : $class; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo  $st; ?></button>
                                                        <div class="dropdown-menu">

                                                           <?php if($value['m_type'] == 'Lifetime'){ ?>

                                                     
                                                          <a  href="javascript:void(0);" class="dropdown-item" data-st="0" onclick="memberlifetime_st__confirm('0' , <?php echo $value['id']; ?>);" data-id="<?php echo $value['id']; ?>" href="">Pending</a>
                              
                                                          <a  href="javascript:void(0);" class="dropdown-item"data-st="1"   onclick="memberlifetime_st__confirm('1' , <?php echo $value['id']; ?>);" data-id="<?php echo $value['id']; ?>" href="#">Approve</a>
                              
                                                           <a  href="javascript:void(0);" class="dropdown-item" data-st="2" onclick="memberlifetime_st__confirm('2' , <?php echo $value['id']; ?>);"  data-id="<?php echo $value['id']; ?>" href="#">Reject</a>


                                                   <?php }else {?>


                                                          <a  href="javascript:void(0);" class="dropdown-item" data-st="0" onclick="member_st__confirm('0' , <?php echo $value['id']; ?>);" data-id="<?php echo $value['id']; ?>" href="">Pending</a>
                                                            
                                                          <a  href="javascript:void(0);" class="dropdown-item"data-st="1"   onclick="member_st__confirm('1' , <?php echo $value['id']; ?>);" data-id="<?php echo $value['id']; ?>" href="#">Approve</a>
                                                            
                                                           <a  href="javascript:void(0);" class="dropdown-item" data-st="2" onclick="member_st__confirm('2' , <?php echo $value['id']; ?>);"  data-id="<?php echo $value['id']; ?>" href="#">Reject</a>
                                                         <?php } ?>
                                                      </div>
                                                    </div>

                                                </td>

                                              

                                                     
                                                
                                                <td class="">
                                                    <div class="d-flex flex-wrap flex-xl-nowrap align-content-center">

                                                   <?php if($value['m_type'] == 'Lifetime'){ ?>
                                                            <button data-id="<?php echo $value['id']; ?>" class="btn btn-primary btn-sm mr-1 mb-2 mb-xl-0 uplaodrecipt">Upload Receipt</button>
                                                   <?php } ?>

 
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
                                               <!--  <th>Transfer Amount</th>
                                                <th>Payment Status</th> -->
                                                <th>Status</th>                                               
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                  <?php echo $this->pagination->create_links(); ?>
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
<!-- The Modal -->
<div class="modal" id="uplaodRecipt">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Upload Receipt</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <div class="form-group row">
          <input type="hidden" id="user_id_upload">
          <label for="fileInput" class="col-sm-3 text-right control-label col-form-label">Upload Receipt</label>
          <div class="col-sm-9">
            <input type="file" class="form-control" id="fileInput">
          </div>
        </div>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="uploadButton">Upload</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){

      $("#export__filter__row").hide();
      
      $("#export__btn").click(function(){
        $("#export__filter__row").show();
      });

      districts();

    function districts()
    {
        $.ajax({
               url: 'https://cdn-api.co-vin.in/api/v2/admin/location/districts/29',
               dataType: "json",
               success: function(data)
               {
                    var html = '<option value="">Select District</option>';
              
                    for (var i = 0; i < data.districts.length; i++) {
                        html +='<option value="'+data.districts[i].district_name+'">'+data.districts[i].district_name+'</option>';
                        }
                        $('.district__name').html(html);
                 }
                 
             });
    }



    });



$(".uplaodrecipt").click(function(){
  var user_id = $(this).data('id');
  //alert(user_id);
    $('#uplaodRecipt').modal('show');

    setTimeout(function(){
    $('#user_id_upload').val(user_id);
  }, 1000);
});


 $(document).ready(function () {
    // Event listener for the upload button
    $("#uploadButton").click(function () {
      // Get the file input element and the user ID
      var fileInput = $("#fileInput")[0];
      var userId = $("#user_id_upload").val();

      // Create a FormData object and append the file and user ID
      var formData = new FormData();
      formData.append("file", fileInput.files[0]);
      formData.append("user_id", userId);

      // Send the AJAX request to handle the file upload
      $.ajax({
        url: "<?php echo base_url('admin/user/uploadrecipt') ?>", // Replace with your server-side script
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
          // Handle the success response
          alert(response.message);
           $('#uplaodRecipt').modal('hide');
          // You can perform additional actions here if needed
        },
        error: function (error) {
          // Handle the error
          console.error("Error uploading file:", error);
        }
      });
    });
  });



</script>

