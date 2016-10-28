<div class="container "> 
<div class="row well ">
	<h3 class="text-info"> Hi <?php echo $this->Session->read('User.name');?></h3>
	<div class="clearfix"></div>
	<div class="row">
		<h4 class="pull-left margin-left-10">Hare your pin history</h4>
		<a href="#" class="btn btn-default pull-right">Generate New Pin From Wallet</a>
		<a href="#" class="btn btn-default pull-right">Parchage New Pin From Store</a>
	</div>
</div>
	<div class="row well ">
	<h4 class="text-info">Your Pin</h4>
		<table class="table-striped  table text-center ">
			<tr>
				<td><strong>pin Number</strong></td>
				<td><strong>Pin</strong></td>
				<td><strong>Value</strong></td>
				<td><strong>created on</strong></td>
				<td><strong>created by</strong></td>
				<td><strong>Status</strong></td>
			</tr>
			<?php foreach ($availbalePin as $key => $value) { ?>
				<tr>
					<td><?php echo $value['PinWallet']['id'];?></td>
					<td><?php echo $value['PinWallet']['cypher_code'];?></td>
					<td><?php echo PIN_PRICE;?></td>
					<td><?php echo $value['PinWallet']['created'];?></td>
					<?php if ( $value['PinWallet']['created_by'] == 'user') {
						echo '<td>'.$this->Session->read('User.name').'</td>';
					} else { ?>
						<td><?php echo $value['PinWallet']['created_by'];?></td>
					<?php } 
					 if ($value['PinWallet']['status'] ==1 ) { 
						echo '<td class="text-success">Active</td>';
					} else if ($value['PinWallet']['status'] ==0 ) {
						echo '<td class="text-danger">Rejected</td>';
					} else if ($value['PinWallet']['status'] ==2 ) {
						echo '<td class="text-info">Used</td>';
					} ?>
				</tr>
			<?php } ?>
		</table>
		</div>
</div>