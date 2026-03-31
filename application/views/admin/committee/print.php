
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 <div class="" style="text-align:center; padding:20px 0;">  
 <h3><?php echo $committe['title'] ?></h3>
<p><?php echo $committe['description'] ?></p>
</div> 	
	
	
	<table class="table table-bordered table-striped">	 
		<tr>
			<th style="font-size:1.15em; font-weight:bold;">Member Name</th>
			<th style="font-size:1.15em; font-weight:bold;">Post</th>
			<th style="font-size:1.15em; font-weight:bold;">Mobile</th>
		</tr>

		<?php if($memberlist) { foreach ($memberlist as $key => $value) { ?>
		<tr>
			<td style="font-size:1.15em"><?php echo  $value['first_name'];  ?> <?php echo  $value['middle_name'];  ?> <?php echo  $value['last_name'];  ?></td>
			<td style="font-size:1.15em"><?php echo  $value['post_name'];  ?></td>
			<td style="font-size:1.15em"><?php echo  $value['phone'];  ?></td>
		</tr><?php } } ?>
	</table>

</div>

</body>
</html>







