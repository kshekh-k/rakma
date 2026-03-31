<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Mahasamiti  committee</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Mahasamiti  committee</li>
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


                                <h5 class="card-title float-left"><?php echo $section_heading; ?></h5>

                               




                                <div class="table-responsive">
                                    <table id="" class=" table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                               
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($row){  ?>
                                                   
                                              
                                            <tr>
                                                <td><?php echo $row['title']; ?></td>
                                                <td><?php echo $row['description']; ?></td>
                                               
                                                
                                                <td>

                                                    

                                                    <a href="<?php echo base_url('admin/committee/editmahasamiti/'.$row['id']) ?>" class="btn btn-success btn-sm mb-2" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            
                                                    
                                                    

                                             

                                                </td>
                                            </tr>

                                            <?php } ?>
                                           
                                        </tbody>
                                        <tfoot>
                                             <tr>
                                               
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                   
                </div>




                  <div class="row">
                    <div class="col-12">
                        
                        <div class="card">
                            <div class="card-body">


                                <h5 class="card-title float-left">Committee Members</h5>

                                <a href="<?php echo base_url('/admin/committee/addmember/'.$row['id']) ?>" class="btn btn-success btn-sm float-right mb-4"><i class="fa fa-plus"></i> Add Member</a>
                                <a href="<?php echo base_url('/admin/committee/export/'.$row['id']) ?>" class="mr-2 btn btn-primary btn-sm float-right mb-4"><i class="mdi mdi-download"></i>  Downlaod CSV</a>

                                <button data-id="<?php echo $row['id']; ?>" class="print__data mr-2 btn btn-secondary btn-sm float-right mb-4"><i class="fa fa-print"></i> Print</button>


                            <?php if($memberlist){  ?>

                                <div class="table-responsive">
                                    <table id="zero_configs" class=" table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                               <th>S.NO</th>
                                                <th>Member Name</th>
                                                <th>Post Name</th>
                                                <th>Mobile</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody  id="drag__row">
                                             <?php  $i=1; foreach ($memberlist as $key => $value) { ?>
                                                   
                                              
                                            <tr data-id="<?php echo $value['id']; ?>" class="test">
												<td>
                                                   <?php echo $i; ?>
                                                </td>
                                                <td> 												
												<?php echo $value['first_name']; ?> <?php echo $value['middle_name']; ?> <?php echo $value['last_name']; ?>
												</td>                                                
                                                <td><?php echo $value['post_name']; ?></td>
                                               <td><?php echo $value['phone']; ?></td>
                                                
                                                <td>

                                                   

                                                    <a href="<?php echo base_url('admin/committee/editmember/'.$value['id']) ?>" class="btn btn-success btn-sm mb-2" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            
                                                    
                                                    <a href="<?php echo base_url('admin/committee/deletemahasamitimember/'.$value['id']) ?>" title="Delete" class="btn btn-danger btn-sm mb-2"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                                             

                                                </td>
                                            </tr>


                                             <?php $i++; } ?>

                                           
                                           
                                        </tbody>
                                        <tfoot>
                                             <tr>
                                               <th>S.NO</th>
                                                <th>Member Name</th>
                                                <th>Post Name</th>
                                                <th>Mobile</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                        <?php } ?>
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

  <script src="https://raw.githubusercontent.com/DoersGuild/jQuery.print/master/dist/jQuery.print.min.js"></script>
<script type="text/javascript">
    $( "#drag__row" ).sortable({
        delay: 150,
        stop: function() {
             var selectedData = new Array();
            $('.test').each(function() {

                selectedData.push($(this).data("id"));

            });
              console.log(selectedData);
            updateOrder(selectedData);


        }
    });


    function updateOrder(data='') {

       
       
        $.ajax({
            url:"<?php echo base_url('/admin/committee/ajax_sort'); ?>",
            type:'post',
            data:{position:data},
            success:function(){
               
            }
        })
    }




     

</script>
