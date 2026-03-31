<?php if($rows){ $i=1; foreach ($rows as $key => $value) { ?>
<tr>
    <td><?php echo $i; ?></td>
    <td><?php if(!empty($value['image'])){ ?><img src="<?php  echo base_url('/uploads/'.$value["image"]) ?>" width="50px"> <?php }  ?></td>
    <td><?php echo $value['first_name']; ?> <?php echo $value['middle_name']; ?> <?php echo $value['last_name']; ?> </td>
    <td><?php echo $value['phone']; ?></td>
    <td>
        <?php echo $value['ref_mobile']; ?><br>
        <?php echo $value['ref_first_name']; ?>
        <?php echo $value['ref_middle_name']; ?>
        <?php echo $value['ref_last_name']; ?>
    </td>
    <td><?php echo $value['district']; ?></td>
    <td><?php echo $value['post_name']; ?></td>
    <td>
        <?php if($value['verify'] == '1'){ ?>
        <a href="<?php echo base_url('/admin/user/verify/'.$value['id']) ?>"><span class="badge badge-pill badge-success">Approved</span> </a>
        <?php }else { ?>
        <a href="<?php echo base_url('/admin/user/verify/'.$value['id']) ?>"><span class="badge badge-pill badge-danger">No Approved</span> </a>
        <?php }  ?>
    </td>
    <td class="">
        <div class="d-flex flex-wrap flex-xl-nowrap align-content-center">
        <a href="<?php echo base_url('admin/user/view/'.$value['id']) ?>" class="btn btn-info btn-sm mr-1 mb-2 mb-xl-0">View Details</a>
        <a href="<?php echo base_url('admin/user/edit/'.$value['id']) ?>" class="btn btn-info btn-sm mr-1 mb-2 mb-xl-0">Edit</a>
        <a href="<?php echo base_url('home/pdf_m/'.$value['id']) ?>" class="btn btn-info btn-sm mr-1 mb-2 mb-xl-0">PDF</a>
        <a href="<?php echo base_url('admin/user/delete/'.$value['id']) ?>" class="btn btn-danger btn-sm mb-2 mb-xl-0">Delete</a>
        </div>
    </td>

</tr>
<?php $i++;}} ?>