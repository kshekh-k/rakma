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

                                <form  method="post" id="member__filter__form">
                                <div class="row mb-4">
                                    <div class="col-sm-12 col-md-4 mb-2">
                                            <select class="form-control" name="district" id="district">
                                                    <option value="">Select home district</option>
                                                    <?php if ($districts) { foreach ($districts as $key => $district) { ?>
                                                             <option value="<?php echo  $district['id']; ?>"><?php echo  $district['name']; ?></option>
                                                    <?php } } ?>
                                            </select>
                                    </div>

                                     <div class="col-sm-12 col-md-4 mb-2">
                                            <select class="form-control" name="district" id="post_district">
                                                    <option value="">Select post district</option>
                                                    <?php if ($districts) { foreach ($districts as $key => $district) { ?>
                                                             <option value="<?php echo  $district['id']; ?>"><?php echo  $district['name']; ?></option>
                                                    <?php } } ?>
                                            </select>
                                    </div>

                                    <div class="col-sm-12 col-md-4 mb-2">
                                           <input type="text" class="form-control" id="post_name" placeholder="Post name">
                                    </div>

                                      <div class="col-sm-12 col-md-4 mb-2">
                                           <input type="text" class="form-control" id="ref_number" placeholder="Ref. number">
                                    </div>


                                    <div class="col-sm-12 col-md-4 mb-2">

                                        <select class="form-control" name="post_type" id="post_type">
                                            <option value="">Post type</option>
                                            <option value="Gazetted">Gazetted</option>
                                            <option value="Non-Gazetted">Non-Gazetted</option>
                                        </select>
                                            
                                    </div>
                                    <div class="col-sm-12 col-md-4 mb-2">
                                          <select class="form-control" name="service" id="service">
                                            <option value="">Service status</option>
                                            <option value="In Service">In Service</option>
                                            <option value="Retired/Ex-Service">Retired/Ex-Service</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-4 mb-2">
                                          <select class="form-control" name="verify" id="verify">
                                            <option value="">Status</option>
                                            <option value="0">Pending</option>
                                            <option value="1">Approved</option>
                                            <option value="2">Reject</option>
                                        </select>
                                    </div>

                                   

                                     <div class="col-sm-12 col-md-4 mb-2">
                                          <button class="btn btn-info" type="submit">Search</button>
                                    </div>

                                </div>
                                </form>


                                <h5 class="card-title float-left"><?php echo $section_heading; ?></h5>

                             

                                <div class="table-responsive scroll-thick" id="rakma__memebers">
                                   
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
$('body').on('submit', '#member__filter__form', function (event) {
        event.preventDefault();
        load_data(page);
    });

$('body').on('click', '#pagination li a', function (event) {
        event.preventDefault();
        var page = $(this).data('ci-pagination-page');
        load_data(page);
    });

$('body').on('click', '#member__filter__reset', function (event) {
        event.preventDefault();
       $('#m_post_distric').prop('selectedIndex',0);
        $('#m_name').val('');
        $('#m_post_name').val('');
        load_data(page="0");
    });


 load_data(page='0');
 function load_data(page='0')
 {
        var district = $('#district').val();
        var post_type = $('#post_type').val();
        var service = $('#service').val();
        var verify = $('#verify').val();
        var post_district = $('#post_district').val();
        var post_name = $('#post_name').val();
        var ref_number = $('#ref_number').val();

    $.ajax({
       type: "POST",
        url: '<?php echo base_url('/admin/user/ajax_member_list'); ?>',
        data:
        {
           page:page,
           district:district,
           post_type:post_type,
           service:service,
           verify:verify,
           post_district:post_district,
           post_name:post_name,
           ref_number:ref_number
        },
        dataType: "json",
        success: function(data) {
            if (data.status == true){
                $('#rakma__memebers').html(data.data);
            }
        }
    });
 }
});

 
</script>