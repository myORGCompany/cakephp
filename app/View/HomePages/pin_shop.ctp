<div class="container "> 
<div class="row well ">
	<h3 class="text-info"> OUR FRANCHISE</h3>
	<p>Our Franchises come in many shapes and sizes, from nationally household names to locally grown niche businesses. Choosing the right business opportunity to invest in is an important decision that can be overwhelming, perhaps even daunting.</p>
</div>
	<div class="row well ">
	<h4 class="text-info">Available Franchises</h4>
		<table class="table-striped  table text-center ">
			<tr>
				<td><strong>Name</strong></td>
				<td><strong>City</strong></td>
				<td><strong>Mobile</strong></td>
				<td><strong>Bank</strong></td>
				<td><strong>Account. No.</strong></td>
				<td><strong>Ifsc Code</strong></td>
				<td><strong>Account Name</strong></td>
			</tr>
			<?php foreach ($pinShop as $key => $value) { ?>
				<tr>
					<td><?php echo $value['PinShop']['name'];?></td>
					<td><?php echo $value['PinShop']['city'];?></td>
					<td><?php echo $value['PinShop']['mobile'];?></td>
					<td><?php echo $value['PinShop']['bank_name'];?></td>
					<td><?php echo $value['PinShop']['account_number'];?></td>
					<td><?php echo $value['PinShop']['ifsc'];?></td>
					<td><?php echo $value['PinShop']['account_name'];?></td>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>