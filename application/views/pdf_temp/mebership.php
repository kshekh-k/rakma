<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Membership Register</title>
</head>

<body style="font-size:16px;">


	<div style="width:100%; font-family: arial">
		<table border="0" cellpadding="0" cellspacing="0" style="width:1200px; margin: auto;  table-layout: fixed;">
			<!--Logo/Header-->
			<tr>
				<td>
					<table border="0" cellpadding="0" cellspacing="0" width="400" style="width:400px; margin: auto;">
						<tr>
							<td style="width:40%"> <img src="https://rakma.org/uploads/ff630a7b7053b2aa479cab2712d68f8f.png" style="width:200px"></td>
							<td style="width:60%">
								<table border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td>
											<h2 style="font-size:70px; font-weight:bold; color:#016c38; letter-spacing:20px; text-align:left">RAKMA</h2>
										</td>
									</tr>
									<tr>
										<td style="text-align:left">
											<p style="font-size:1.5em; color:#000; ">Raj. Adhikari Karamchari Minority Association</p>
										</td>
									</tr>
									<tr>
										<td height="5px"></td>
									</tr>
									<tr>
										<td style="text-align:left">
											<p style="font-size:1.7em; color:#000;">राज. अधिकारी कर्मचारी माइनॉरिटी एसोसिएशन</p>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<!--Data-->


			<tr>
				<td height="40px"></td>
			</tr>

			<tr>
				<td>
					<table style="color:#222; width:100%;  table-layout: fixed;">
						<tr>
							<td valign="top">
								<p style="font-size:1.5em; color:#555555;">Reciept No.: <b style="color:#000000"><?php echo $user['user_membership_id']; ?></b></p>
								<div style="height:8px"></div>
								<p style="font-size:1.5em; color:#555555;">Amount: <b style="color:#000000">₹<?php echo $user['m_price']; ?></b></p>
							</td>
							<td align="right" valign="top">
								<p style="font-size:1.5em; color:#555555;">Date: </p>
								<div style="height:8px"></div>
								<p style="font-size:1.5em; color:#000000;"><b><?php echo  date("d-m-Y", strtotime($user['membership_join_date'])); ?></b></p>
							</td>
						</tr>
					</table>
				</td>
			</tr>


			<tr>
				<td height="20px"></td>
			</tr>
			<tr>
				<td>
					<table style="color:#222; width:100%; table-layout: fixed;">
						<tr>
							<th colspan="3" style="background:#ededed; padding:5px 0; text-align:center; text-transform:uppercase; font-size:1.75em">
								General Information
							</th>
						</tr>

						<tr>
							<td height="20px" colspan="3"></td>
						</tr>


						<tr>
							<td valign="top" width="33.3333334%">
								<p style="font-size:1.25em; color:#555555;">First Name:</p>
								<div style="height:8px"></div>
								<p style="font-size: 1.5em; text-align: left; line-height: 25px;"><?php echo $user['first_name']; ?></p>
							</td>
							<td valign="top" width="33.3333334%">
								<p style="font-size:1.25em; color:#555555;">Middle Name</p>
								<div style="height:8px"></div>
								<p style="font-size: 1.5em; text-align: left; line-height: 25px;"><?php echo $user['middle_name']; ?></p>
							</td>
							<td valign="top" width="33.3333334%">
								<p style="font-size:1.25em; color:#555555;">Last Name:</p>
								<div style="height:8px"></div>
								<p style="font-size: 1.5em; text-align: left; line-height: 25px;"><?php echo $user['last_name']; ?></p>
							</td>
						</tr>
						<tr>
							<td colspan="3" height="20px"></td>
						</tr>

						<tr>
							<td valign="top" width="33.3333334%">
								<p style="font-size:1.25em; color:#555555;">Father/Husband Name:</p>
								<div style="height:8px"></div>
								<p style="font-size: 1.5em; text-align: left; line-height: 25px;"><?php echo $user['father_husband_name']; ?></p>
							</td>
							<td valign="top" width="33.3333334%">
								<p style="font-size:1.25em; color:#555555;">Mobile No.</p>
								<div style="height:8px"></div>
								<p style="font-size: 1.5em; text-align: left; line-height: 25px;"><?php echo $user['phone']; ?></p>
							</td>
							<td valign="top" width="33.3333334%">
								<p style="font-size:1.25em; color:#555555;">Email:</p>
								<div style="height:8px"></div>
								<p style="font-size: 1.5em; text-align: left; line-height: 25px;"><?php echo $user['email']; ?></p>
							</td>
						</tr>
						<tr>
							<td colspan="3" height="20px"></td>
						</tr>

						<tr>
							<td valign="top" width="33.3333334%">
								<p style="font-size:1.25em; color:#555555;">Date of Birth:</p>
								<div style="height:8px"></div>
								<p style="font-size: 1.5em; text-align: left; line-height: 25px;">
									<?php 
										if($user['dob'] != '0000-00-00')
										{
											echo  date("d-m-Y", strtotime($user['dob']));
										}
									 ?>

								</p>
							</td>
							<td valign="top" width="33.3333334%">
								<p style="font-size:1.25em; color:#555555;">Marital Status:</p>
								<div style="height:8px"></div>
								<p style="font-size: 1.5em; text-align: left; line-height: 25px;"><?php echo $user['married_status']; ?></p>
							</td>
							<td valign="top" width="33.3333334%">
								<p style="font-size:1.25em; color:#555555;">Gender:</p>
								<div style="height:8px"></div>
								<p style="font-size: 1.5em; text-align: left; line-height: 25px;"><?php echo $user['gender']; ?></p>
							</td>
						</tr>
						<tr>
							<td colspan="3" height="20px"></td>
						</tr>

						<tr>
							<td colspan="3" valign="top">
								<p style="font-size:1.25em; color:#555555;">Home Address:</p>
								<div style="height:8px"></div>
								<p style="font-size: 1.5em; text-align: left; line-height: 25px;"><?php echo $user['address']; ?></p>
							</td>
						</tr>
						<tr>
							<td colspan="3" height="20px"></td>
						</tr>


						<tr>
							<td valign="top" width="33.3333334%">
								<p style="font-size:1.25em; color:#555555;">Tehsil/City:</p>
								<div style="height:8px"></div>
								<p style="font-size: 1.5em; text-align: left; line-height: 25px;"><?php echo $user['city']; ?></p>
							</td>
							<td valign="top" width="33.3333334%">
								<p style="font-size:1.25em; color:#555555;">District:</p>
								<div style="height:8px"></div>
								<p style="font-size: 1.5em; text-align: left; line-height: 25px;"><?php echo $user['district']; ?></p>
							</td>
							<td valign="top" width="33.3333334%">
								<p style="font-size:1.25em; color:#555555;">State:</p>
								<div style="height:8px"></div>
								<p style="font-size: 1.5em; text-align: left; line-height: 25px;"><?php echo $user['state']; ?></p>
							</td>
						</tr>
						<tr>
							<td colspan="3" height="40px"></td>
						</tr>
						<tr>
							<th colspan="3" style="background:#ededed; padding:5px 0; text-align:center; text-transform:uppercase; font-size:1.75em">
								Posting place
							</th>
						</tr>
						<tr>
							<td height="20px" colspan="3"></td>
						</tr>
						<tr>
							<td valign="top">
								<p style="font-size:1.25em; color:#555555;">Post Name:</p>
								<div style="height:8px"></div>
								<p style="font-size: 1.5em; text-align: left; line-height: 25px;"><?php echo $user['post_name']; ?></p>
							</td>
							<td valign="top">
								<p style="font-size:1.25em; color:#555555;">Service Category:</p>
								<div style="height:8px"></div>
								<p style="font-size: 1.5em; text-align: left; line-height: 25px;"><?php echo $user['service_name']; ?></p>
							</td>							
							<td valign="top">
								<p style="font-size:1.25em; color:#555555;">Name of Department</p>
								<div style="height:8px"></div>
								<p style="font-size: 1.5em; text-align: left; line-height: 25px;"><?php echo $user['department_name']; ?></p>
							</td>
						</tr>
						<tr>
							<td colspan="3" height="20px"></td>
						</tr>

						<tr>
							<td valign="top">
								<p style="font-size:1.25em; color:#555555;">Post Type:</p>
								<div style="height:8px"></div>
								<p style="font-size: 1.5em; text-align: left; line-height: 25px;"><?php echo $user['post_type']; ?></p>
							</td>
							<td valign="top">
								<p style="font-size:1.25em; color:#555555;">Service Status:</p>
								<div style="height:8px"></div>
								<p style="font-size: 1.5em; text-align: left; line-height: 25px;"><?php echo $user['service_status']; ?></p>
							</td>
							<td valign="top">

							</td>
						</tr>


						<tr>
							<td colspan="3" height="20px"></td>
						</tr>


						<tr>
							<td colspan="3" valign="top">
								<p style="font-size:1.25em; color:#555555;">Office Address:</p>
								<div style="height:8px"></div>
								<p style="font-size: 1.5em; text-align: left; line-height: 25px;"><?php echo $user['office_address']; ?></p>
							</td>
						</tr>

						<tr>
							<td colspan="3" height="20px"></td>
						</tr>


						<tr>
							<td valign="top">
								<p style="font-size:1.25em; color:#555555;">Tehsil/City:</p>
								<div style="height:8px"></div>
								<p style="font-size: 1.5em; text-align: left; line-height: 25px;"><?php echo $user['office_city']; ?></p>
							</td>
							<td valign="top">
								<p style="font-size:1.25em; color:#555555;">District:</p>
								<div style="height:8px"></div>
								<p style="font-size: 1.5em; text-align: left; line-height: 25px;"><?php echo $user['office_district']; ?></p>
							</td>
							<td valign="top">
								<p style="font-size:1.25em; color:#555555;">State:</p>
								<div style="height:8px"></div>
								<p style="font-size: 1.5em; text-align: left; line-height: 25px;"><?php echo $user['office_state']; ?></p>
							</td>
						</tr>
						<tr>
							<td colspan="3" height="20px"></td>
						</tr>

					</table>
				</td>
			</tr>



			<tr>
				<td height="20px"></td>
			</tr>
			<tr>
				<td>
					<table style="color:#222; width:100%;  table-layout: fixed;">
						<tr>
							<th style="background:#ededed; padding:5px 0; text-align:center; text-transform:uppercase; font-size:1.75em">
								Type of Membership
							</th>
						</tr>

						<tr>
							<td height="20px"></td>
						</tr>
						<tr>
							<td style="">
								<p style="font-size:1.5em; ">You have choose <b><?php if(isset($user['membership_name'])) { echo $user['membership_name']; } ?> Membership</b> with <b>₹<?php echo $user['m_price']; ?></b></p>
							</td>
						</tr>
						<tr>
							<td height="5px"></td>
						</tr>
						<tr>
						
							<td style="">
								
								<?php if($user['verify'] == '1')
								{
									echo '<p style="font-size:1.5em; ">Your appliaction has <b>Submitted Successfully</b> and <b>Approved</b></p>';
								}elseif($user['verify'] == '2')
								{
									$st = 'Reject';
									echo '<p style="font-size:1.5em; "><b>Membership rejected</b></p>';
								}else
								{
									
									echo '<p style="font-size:1.5em; ">Your appliaction has <b>Submitted Successfully</b> and <b>Sent to approval</b></p>';
								}

							 ?>
							</td>
						</tr>
						<tr>
							<td height="5px"></td>
						</tr>
						<tr>
							<td style="">
								<p style="font-size:2em; ">Thank you</p>
							</td>
						</tr>


					</table>
				</td>
			</tr>

		</table>
	</div>










</body>

</html>
