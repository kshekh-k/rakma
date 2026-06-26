 
 <div class="table-overflow">
<table class="testclass">
   <tr>
      <th style="width: 10%;">S.NO</th>
      <th style="width: 40%;">Name</th>
      <th style="width: 25%;">Post District</th>
      <th style="width: 25%;">Post Name</th>
      <th style="width: 25%;">Service Category</th>
   </tr>
   <tbody class="capitalize">
   <?php  if ($rows) { foreach ($rows as $key => $value) {?>
   <tr>
      <td><?php echo $count; ?></td>
      <td><?php echo format_member_full_name($value['first_name'], $value['middle_name'], $value['last_name']); ?></td>
      <td><?php echo $value['office_district']; ?></td>
      <td><?php echo $value['post_name']; ?></td>
      <td><?php echo $value['service_category']; ?></td>
   </tr>
   <?php  $count++; } }else{ ?>
   	<tr>
   		<td colspan="5">Data not found</td>
   	</tr>
   <?php } ?>
   </tbody>
</table>
   </div>
<ul class="relative z-0 inline-flex -space-x-px pagination" aria-label="Pagination" id="pagination">
   <?php  echo  $this->pagination->create_links() ?>
</ul>

<div>Total members <?php echo $total_rows; ?></div>