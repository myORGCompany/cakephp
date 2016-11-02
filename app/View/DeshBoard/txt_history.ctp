<div class="container "> 
<div class="row well ">
	<h3 class="text-info"> Hi <?php echo $this->Session->read('User.name');?></h3>
	<p>Here your withdrawal requests</p>
</div>
	<div class="row well ">
	<h4 class="text-info">Withdrawal Request</h4>
		<table class="table-striped  table text-center ">
			<tr>
				<td><strong>Request Number</strong></td>
				<td><strong>Working-Zone</strong></td>
				<td><strong>Active-Zone</strong></td>
				<td><strong>Safe-Zone</strong></td>
				<td><strong>Pin Parchage</strong></td>
				<td><strong>Other</strong></td>
				<td><strong>Total</strong></td>
				<td><strong>Status</strong></td>
				<?php if (isset($Userdata) && !empty($Userdata)) {
					echo '<td><strong>User</strong></td>';
				} ?>
				
			</tr>
			<?php foreach ($txtRequest as $key => $value) { ?>
				<tr>
					<td><?php echo $value['WithdrawalRequests']['id'];?></td>
					<td><?php echo $value['WithdrawalRequests']['working'];?></td>
					<td><?php echo $value['WithdrawalRequests']['active'];?></td>
					<td><?php echo $value['WithdrawalRequests']['safe'];?></td>
					<td><?php echo $value['WithdrawalRequests']['pin']*PIN_PRICE;?></td>
					<td><?php echo $value['WithdrawalRequests']['other'];?></td>
					<td><?php echo $value['WithdrawalRequests']['total'];?></td>
					<?php if ($value['WithdrawalRequests']['is_paid'] ==1 ) { 
						echo '<td class="text-success">Completed</td>';
					} else if ($value['WithdrawalRequests']['is_paid'] ==0 ) {
						echo '<td class="text-info">Pending</td>';
					} else if ($value['WithdrawalRequests']['is_paid'] ==2 ) {
						echo '<td class="text-danger">Rejected</td>';
					} ?>
					<?php if (isset($Userdata) && !empty($Userdata)) {
					echo '<td>'.$Userdata[$value['WithdrawalRequests']['user_id']].'</td>';
				} ?>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>