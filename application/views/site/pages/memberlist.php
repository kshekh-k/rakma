<section class="relative">
   <div class="max-w-screen-lg xl:max-w-screen-xl px-4 xl:px-12 mx-auto">
<form id="member__filter__form">
<div class="form-list flex">
    <div class="form-field field-name"><input type="text" name="name" id="m_name" placeholder="Name" class="border border-gray-300 rounded py-3 px-4 focus:outline-none outline-none ring-0 focus:ring-0 focus:border-secondary focus:placeholder-secondary focus:text-secondary w-full "></div>
    <div class="form-field field-post"><input type="text" name="post_type" id="m_post_name" placeholder="Post name" class="border border-gray-300 rounded py-3 px-4 focus:outline-none outline-none ring-0 focus:ring-0 focus:border-secondary focus:placeholder-secondary focus:text-secondary w-full"></div>
    <div class="form-field field-district"><select class="form-control border border-gray-300 rounded  py-3 px-4 focus:outline-none outline-none ring-0 focus:ring-0 focus:border-secondary w-full " name="district" id="m_post_distric">
    <option value="">Select District</option>
                                                  <?php $districts=get_All_data(array( 'status'=>'1') , $table='district' , 'name ASC' ); if($districts) { foreach ($districts as $key => $district) { ?>
                                                        <option value="<?php echo $district['id']; ?>">
                                                            <?php echo ucfirst($district['name']); ?> 
                                                        </option> 
                                                        <?php } } ?>
                                               
</select></div>
<div class="btns flex gap-1">
   <div class="form-field field-search">  <button  id="member__filter" type="submit" class="rounded flex justify-center items-center font-medium text-white tracking-wider uppercase bg-primary hover:bg-secondary py-3 px-6">Search</button></div>   
   
   <div class="form-field field-reset"> <button type="button" id="member__filter__reset" class="rounded flex justify-center items-center font-medium text-white tracking-wider uppercase bg-gray-300 hover:bg-secondary py-3 px-6">Reset</button></div>
</div>
</div>

</form>
 

      
      <div id="rakma__memebers"></div>
   </div>
</section>

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
 function load_data(page='')
 {
        var name = $('#m_name').val();
        var post_name = $('#m_post_name').val();
        var post_distric = $('#m_post_distric').val();

 	$.ajax({
       type: "POST",
        url: '<?php echo base_url('/page/ajax_member_list'); ?>',
        data:
        {
           page:page,
           name:name,
           post_name:post_name,
           post_distric:post_distric
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
