<!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by RAKMA.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->

    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('assets/admin/') ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url('assets/admin/') ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url('assets/admin/') ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/admin/') ?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url('assets/admin/') ?>assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('assets/admin/') ?>dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url('assets/admin/') ?>dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url('assets/admin/') ?>dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="<?php echo base_url('assets/admin/') ?>dist/js/pages/dashboards/dashboard1.js"></script> -->

      <script src="<?php echo base_url('assets/admin/') ?>assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url('assets/admin/') ?>assets/libs/select2/dist/js/select2.min.js"></script>

    <!-- Charts js Files -->
    <script src="<?php echo base_url('assets/admin/') ?>assets/libs/flot/excanvas.js"></script>
    <script src="<?php echo base_url('assets/admin/') ?>assets/libs/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url('assets/admin/') ?>assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url('assets/admin/') ?>assets/libs/flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url('assets/admin/') ?>assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url('assets/admin/') ?>assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="<?php echo base_url('assets/admin/') ?>assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url('assets/admin/') ?>dist/js/pages/chart/chart-page-init.js"></script>



   <script src="<?php echo base_url('assets/admin/') ?>assets/extra-libs/DataTables/datatables.min.js"></script>
   <script type="text/javascript">
       
            $('body').on('click', '.print__data', function () {
            event.preventDefault();
            
                    var id = $(this).data('id');
                 $.ajax({
                           type: "POST",
                           url: '<?php echo base_url('/admin/committee/print') ?>',
                           data:{id:id}, 
                          dataType: "json",
                           success: function(data)
                           {
                            if (data.status == true) 
                            {
                                 var originalContents = document.body.innerHTML;
                                 var printContents = data.data;
                                  document.body.innerHTML = printContents;
                                  window.print();
                                   document.body.innerHTML = originalContents;
                               
                            }
                           }
                         });
            
        });
   </script>
    <script>

          $(".select2").select2();
        /****************************************
         *       Basic Table                   *
         ****************************************/
       /* $('#zero_config').DataTable();*/

        $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#zero_config thead th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#zero_config').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.header() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
 
} );
    </script>



<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

 <script>
     CKEDITOR.replace( 'editor' );
</script>
 
<div class="modal fade" id="edit_confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document ">
        <div class="modal-content">
			<div class="modal-header ">
				<h4 class="text-center">Are you sure? </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
			</div>
            <div class="modal-body ">               
				<p>You want to <b>Edit</b> this member's details</p>
				</div>
			 <div class="modal-footer ">
               <a type="button" href="" id="edit_confirm_btn" data-id="Yes" class="btn btn-success">Yes</a> <button  type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" class="btn btn-danger">No</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#edit_confirm').modal('hide');
    function edit_confirm(url="") {
        $('#edit_confirm').modal('show');
           $("#edit_confirm_btn").attr("href", url);
         }
</script>


<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document ">
		
		  <div class="modal-content">
			<div class="modal-header ">
				<h4 class="text-center">Are you sure? </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
			</div>
            <div class="modal-body ">               
				<p>You want to <b>Delete</b> this Member</p>
				</div>
			 <div class="modal-footer ">
               <a href="" type="button" id="delete_confirm_btn" data-id="Yes" class="btn btn-success">Yes</a> <button  type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" class="btn btn-danger">No</button>
            </div>
        </div>
		 
    </div>
</div>
<script type="text/javascript">
    $('#delete_confirm').modal('hide');
    function delete_confirm(url="") {
        $('#delete_confirm').modal('show');
           $("#delete_confirm_btn").attr("href", url)
         }
</script>



<div class="modal fade" id="member_st__confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document ">
		
		 <div class="modal-content">
			<div class="modal-header ">
				<h4 class="text-center">Are you sure? </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
			</div>
            <div class="modal-body ">               
				<p>You want to <b>change status</b> of this Member</p>
				<input type="hidden" id="member__model_st">
               <input type="hidden" id="member__model_id">
				</div>
			 <div class="modal-footer ">
             <button type="button" id="member__st_confirm_btn" data-id="Yes" class="btn btn-success">Yes</button> <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" class="btn btn-danger">No</button>
            </div>
        </div>
		
		 
    </div>
</div>


<div class="modal fade" id="lifetimemember_st__confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document ">
        
         <div class="modal-content">
            <div class="modal-header ">
                <h4 class="text-center">Are you sure? </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body ">               
                <p>You want to <b>change status</b> of this Member</p>
                <input type="hidden" id="lifemember__model_st">
               <input type="hidden" id="lifemember__model_id">
                </div>
             <div class="modal-footer ">
                <div class="spinner-border text-dark loaderspinner" role="status" style="display: none;">
                  <span class="sr-only">Loading...</span>
                </div>
             <button type="button" id="lifetimemember__st_confirm_btn" data-id="Yes" class="btn btn-success">Yes</button> <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" class="btn btn-danger">No</button>
            </div>
        </div>
        
         
    </div>
</div>
<script type="text/javascript">
    $('#member_st__confirm').modal('hide');
    function member_st__confirm(st="" , id="") {
        $('#member_st__confirm').modal('show');
        $('#member__model_st').val(st);
          $('#member__model_id').val(id);
         }
</script>

<script type="text/javascript">
$('#member_st__confirm').on('click', '#member__st_confirm_btn', function () {
     var st = $('#member__model_st').val();
     var id = $('#member__model_id').val();
    
      $.ajax({
            url:"<?php echo base_url('/admin/user/memberstatus'); ?>",
            type:'post',
            data:{st:st,id:id},
            dataType: "json",
            success:function(result){
                   
                  $('#member_st__confirm').modal('hide');
                   location.reload();
                 //location.reload();

            }
        })
});
</script>


<script type="text/javascript">
    $('#lifetimemember_st__confirm').modal('hide');
    function memberlifetime_st__confirm(st="" , id="") {
        $('#lifetimemember_st__confirm').modal('show');
        $('#lifemember__model_st').val(st);
          $('#lifemember__model_id').val(id);
         }
</script>

<script type="text/javascript">
$('#lifetimemember_st__confirm').on('click', '#lifetimemember__st_confirm_btn', function () {
     var st = $('#lifemember__model_st').val();
     var id = $('#lifemember__model_id').val();
    
     $('#lifetimemember__st_confirm_btn').text('Processing');

      $.ajax({
            url:"<?php echo base_url('/admin/user/lifetimememberstatus'); ?>",
            type:'post',
            data:{st:st,id:id},
            dataType: "json",
            success:function(result){
               
                $('#lifetimemember__st_confirm_btn').text('Yes');
                   alert(result.msg);
                 $('#lifetimemember_st__confirm').modal('hide');
                 location.reload();

            }
        })
});
</script>



</body>

</html>