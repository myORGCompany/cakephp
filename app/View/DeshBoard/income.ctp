<body>
	<div class="container">
		<div class="row well">
		<h3 class="text-success">Hi <?php echo $this->Session->read('User.name');?></h3> <span class="text-info">Hare is your <?php echo $zone; ?> Income</span>
		<div class="clearfix"></div><br />
			<table class="table table-striped ">
				<tr class="text-center">
					<td><strong>#</strong></td>
					<td><strong>Participent</strong></td>
					<td><strong>Mobile</strong></td>
					<td><strong>Level</strong></td>
					<td><strong>Income</strong></td>
				</tr>
			<?php foreach ($GLOBALS['Wallet'] as $key => $value) { ?>
				<tr class="text-center">
					<td><?php echo $key; ?></td>
					<td><?php echo $value['email']; ?></td>
					<td><?php echo $value['mobile']; ?></td>
					<td><?php echo $value['level']; ?></td>
					<td><?php echo $value['income']; ?></td>
				</tr>
			<?php } ?>
				<tr class="text-center">
					<td><strong>Total Income</strong></td>
					<td></td>
					<td></td>
					<td></td>
					<td><strong><?php echo array_sum($workingZone); ?></strong></td>
				</tr>
			</table>
		</div>
	</div>
</body>