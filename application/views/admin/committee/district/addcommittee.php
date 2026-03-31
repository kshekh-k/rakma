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
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/committee/othercommittee') ?>">District committee</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add District committee</li>
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
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" action="<?php echo base_url('/admin/committee/savedistrictcommittee/'); ?>" method="post" enctype='multipart/form-data'>
                                <div class="card-body">
                                     <div class="row">
                                        <div class="col-md-12">
                                             <h4 class="card-title float-left"><?php echo $section_heading; ?></h4>

                                       <a href="<?php echo base_url('/admin/committee/districtcommitte') ?>" class="btn btn-info btn-sm float-right mb-4"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Title" name="title" value="">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Description" name="description" value="">
                                        </div>
                                    </div>
                                    
                                    
                                    
                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select District</label>
                                        <div class="col-sm-9">
                                           <select class="form-control" name="district">
                                                <option value="">Select District</option>
                                                  <?php $districts=get_All_data(array( 'status'=>'1') , $table='district' , 'name ASC' ); if($districts) { foreach ($districts as $key => $district) { ?>
                                                        <option value="<?php echo $district['name']; ?>">
                                                            <?php echo ucfirst($district['name']); ?> 
                                                        </option> 
                                                        <?php } } ?>
                                               
                                           </select>
                                        </div>
                                    </div>
                                  
                                   
                              
                                </div>
                                <div class="border-top">
                                    <div class="card-body text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
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
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

    districts();

    function districts()
    {

      

                 
        
                  $.ajax({
                         
                           url: 'https://cdn-api.co-vin.in/api/v2/admin/location/districts/29',
                           dataType: "json",
                           success: function(data)
                           {

                            console.log(data);
                                var html = '';
                          
                                for (var i = 0; i < data.districts.length; i++) {

                                     if (data.districts[i].district_name == 'Ajmer')
                                    {
                                   
                                         html +='<option value="'+data.districts[i].district_name+'"  selected>'+data.districts[i].district_name+'</option>';

                                    }else
                                    {

                                        html +='<option value="'+data.districts[i].district_name+'">'+data.districts[i].district_name+'</option>';
                                   
                                     }
                                 

                                
                                    }

                                   

                                    $('.district__name').html(html);
                             }
                             
                         });


    }

</script>