<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Committee</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                               <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/news') ?>">Committee</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Committee Member</li>
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


                <?php if (!empty($row)) { ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" action="<?php echo base_url('/admin/committee/savedistrictcommitteemember/'.$row['id']); ?>" method="post" enctype='multipart/form-data'>
                                <input type="hidden" name="c_id" value="<?php echo $row['id']; ?>">
                                <div class="card-body">
                                     <div class="row">
                                        <div class="col-md-12">
                                             <h4 class="card-title float-left"><?php echo $section_heading; ?></h4>

                                     <a href="<?php echo base_url('/admin/committee/districtcommitteememberlist/'.$row['id']) ?>" class="btn btn-info btn-sm float-right mb-4"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a>
                                        </div>
                                    </div>



                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Memeber</label>
                                        <div class="col-sm-9">
                                           <select class="select2 form-control select2" name="member">
                                                <option value="">Select memeber</option>
                                                <?php  if($members) {

                                                        foreach ($members as $key => $member) { ?>

                                                            <option value="<?php echo $member['id'] ?>"><?php echo $member['first_name'] ?> <?php echo $member['middle_name'] ?>  <?php echo $member['last_name'] ?> &nbsp;&nbsp;&nbsp;    <?php echo $member['father_husband_name'] ?> &nbsp;&nbsp;&nbsp;<?php echo $member['phone'] ?> </option>
                                                           
                                                       <?php  } } ?>
                                           </select>
                                        </div>
                                    </div>

                                   
                                             <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Post Name</label>
                                        <div class="col-sm-9">
                                           

                                         <select multiple="multiple" class="select2 form-control custom-select" style="width: 100%; height:36px;" name="post_id[]">
                                                 <option value="">Select post name</option>

                                                  <?php 
                                                  $postid = get_All_data(array('user_id'=> $row['user_id'] , 'c_id'=>$row['c_id']) ,'committee_member');
                                                  $postid_data = array();
                                                  if ($postid) {
                                                    foreach ($postid as $key => $value) {
                                                        $postid_data[] = $value['post_id'];   
                                                    }
                                                }
                                                $getposttype = get_All_data(array('status'=>'1') ,'post_type' , 'sort ASC' );
                                                if($getposttype) {
                                                    foreach ($getposttype as $key => $posttype) { ?>
                                                 <option value="<?php echo $posttype['id'] ?>" <?php if(in_array($posttype['id'], $postid_data)){echo 'selected'; } ?> > <?php echo $posttype['name'] ?></option>
                                                  <?php  } } ?>

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


            <?php }else{ ?>

                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center">Opps! Page Not Found</h3>
                    </div>
                </div>



            <?php }  ?>







             
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


