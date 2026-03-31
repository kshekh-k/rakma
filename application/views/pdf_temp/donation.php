<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Membership Register</title>
</head>
<body>
	
 <table border="0" cellpadding="0" cellspacing="0" width="100%">
	  <tr><td>
		  <table border="0" cellpadding="0" cellspacing="0" width="1000" style="font-family:'Roboto', Arial; width:1000px; margin: auto; border-collapse: collapse">
			  <tr> <td>
				  <!--Logo/Header-->
				 <table border="0" cellpadding="0" cellspacing="0" >
	  			<tr><td style="text-align:center"> <img src="https://rakma.org/uploads/ff630a7b7053b2aa479cab2712d68f8f.png" style="width:150px">
					<h2 style="font-size:70px; font-weight:bold; color:#016c38; letter-spacing:20px">RAKMA</h2></td></tr>					 
					 <tr><td style="text-align:center">
					<p style="font-size:20px; color:#000; ">Raj. Adhikari Karamchari Minority Association</p></td></tr>
					  <tr><td height="5px"></td></tr>
					 <tr><td style="text-align:center">
					<p style="font-size:22px; color:#000;">राज. अधिकारी कर्मचारी माइनॉरिटी
                           एसोसिएशन</p>
					</td></tr> 
					  <tr><td height="10px"></td></tr>
					   </table> 
				  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="width:100%"  >
					 
	  			<tr><td style="width:100%; text-align:center; font-size: 20px; line-height:25px;">4414, Opp. Darbar School,
					<br /> M.I. Road, Jaipur-302012</td></tr> 
					  <tr><td height="10px"></td></tr>
				  </table>   
			<!--End Logo/Header-->
				  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top:15px;">
	  			<tr><td style="background:#ededed; padding:5px 0; text-align:center; text-transform:uppercase"><h1>Donation</h1></td></tr> 
					  <tr><td height="15px"></td></tr>
		<tr><td><p style="font-size: 17px; text-align: left; line-height: 25px;">Name: <b><?php echo $donation['name']; ?></b></p></td></tr>  <tr><td height="10px"></td></tr>
		<tr><td><p style="font-size: 17px; text-align: left; line-height: 25px;">Mobile No.: <b><?php echo $donation['mobile']; ?></b></p></td></tr> <tr><td height="10px"></td></tr>
		<tr><td><p style="font-size: 17px; text-align: left; line-height: 25px;">Email: <b><?php echo $donation['email']; ?></b></p></td></tr> <tr><td height="10px"></td></tr>
		<tr><td><p style="font-size: 17px; text-align: left; line-height: 25px;">Date: <b><?php echo  date("d-m-Y", strtotime($donation['payment_date'])); ?></b></p></td></tr> <tr><td height="10px"></td></tr>
		<tr><td><p style="font-size: 17px; text-align: left; line-height: 25px;">Reciept No: <b><?php echo $donation['id']; ?></b></p></td></tr> <tr><td height="10px"></td></tr>
		<tr><td><p style="font-size: 17px; text-align: left; line-height: 25px; ">Amount:  <b>₹<?php echo $donation['price']; ?></b></p></td></tr> 
		<tr><td height="20px"></td></tr> 
					  </table>   
				  
	<table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top:15px;">
		<tr><td style="border-radius:5px; border:1px dashed #ddd; background:#efefef; padding:5px 10px;">
			<p style="font-size: 20px; text-align: left; line-height: 25px; font-weight:bold">Thank you:</p>
			<p style="font-size: 20px; text-align: left; line-height: 25px; ">Donation of <b>₹<?php echo $donation['price']; ?></b> received </p></td></tr> 
		
				  
				  
			
				  </table>   	  
				  
				  <td>
				  
		  </td></tr>
	  
	  </table>  </td></tr>
	  
	  </table>
    	
	
	 

</body>
</html>