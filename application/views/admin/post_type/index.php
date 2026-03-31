<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">MemberMemberpost</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">MemberMemberpost</li>
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


                                <h5 class="card-title float-left"><?php echo $section_heading; ?></h5>

                                <a href="<?php echo base_url('/admin/memberpost/add') ?>" class="btn btn-info btn-sm float-right mb-4"><i class="fa fa-plus"></i> Add</a>




                                <div class="table-responsive">
                                    <table id="zero_config" class="zero_config table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                               
                                                <th>S.NO</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody  id="drag__row">
                                            <?php if($rows){
                                               $i=1; foreach ($rows as $key => $value) { ?>
                                                   
                                              
                                            <tr data-id="<?php echo $value['id']; ?>" class="row__id" >
                                               
                                                <td>
                                                   <?php echo $i; ?>
                                                </td>
                                             
                                                <td><?php echo $value['name']; ?></td>
                                               
                                            
                                               
                                              
                                                <td>

                                                    <?php if($value['status'] == '1'){ ?>

                                                        <a href="<?php echo base_url('/admin/memberpost/status/'.$value['id']) ?>"><span class="badge badge-pill badge-success">Active</span> </a>
                                                        

                                                    <?php }else { ?>

                                                        <a href="<?php echo base_url('/admin/memberpost/status/'.$value['id']) ?>"><span class="badge badge-pill badge-danger">Inactive</span> </a>


                                                    <?php }  ?>

                                                </td>
                                                
                                                <td>

                                                 

                                                    <a href="<?php echo base_url('admin/memberpost/edit/'.$value['id']) ?>" class="btn btn-success btn-sm mb-2" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            
                                                    
                                                    <a href="<?php echo base_url('admin/memberpost/delete/'.$value['id']) ?>" class="btn btn-danger btn-sm mb-2" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                                             

                                                </td>
                                            </tr>

                                            <?php $i++;}} ?>
                                           
                                        </tbody>
                                        <tfoot>
                                             <tr>
                                               
                                                <th>S.NO</th>
                                                <th>Title</th>
                                                <th>Status</th>
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


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <script type="text/javascript">
    $( "#drag__row" ).sortable({
        delay: 150,
        stop: function() {
             var selectedData = new Array();
            $('.row__id').each(function() {

                selectedData.push($(this).data("id"));

            });
              console.log(selectedData);
            updateOrder(selectedData);
        }
    });


    function updateOrder(data='') {
        $.ajax({
            url:"<?php echo base_url('/admin/memberpost/ajax_sort'); ?>",
            type:'post',
            data:{position:data},
            success:function(){
               
            }
        })
    }

</script>