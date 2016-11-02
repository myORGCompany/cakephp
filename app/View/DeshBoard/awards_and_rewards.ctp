<body>
	<div class="container">
		<div class="row well">
		<h3 class="text-success">Hi <?php echo $this->Session->read('User.name');?></h3> <span class="text-info">Hare is your <?php echo $zone; ?> Rewards</span>
		<div class="clearfix"></div><br />
			<?php 
			$AWARDS_PRICE = Configure::read('AWARDSPRICE');
			foreach ($Awards as $key => $value) {

				if ($value['level'] >= 3 && $value['type'] == 1) {
					 $price[] = $AWARDS_PRICE[$value['level']];
				} else if ($value['level'] >= 5 && $value['type'] == 2) {
					 $price[] = $AWARDS_PRICE[$value['level']];
				} else if ($value['level'] >= 7 && $value['type'] == 3) {
					 $price[] = $AWARDS_PRICE[$value['level']];
				} else if ($value['level'] >= 8 && $value['type'] == 4) {
					 $price[] = $AWARDS_PRICE[$value['level']];
				} else if ($value['level'] >= 9 && $value['type'] == 5) {
					 $price[] = $AWARDS_PRICE[$value['level']];
				}
			}
			foreach ($price as $key => $value) { 
				if (!empty($value)) { ?>
					<h3 class="text-success">Congratulations! You have qualified for <h3 class="text-danger"> <?php echo $value; ?> </h3></h3>
			<?php } } ?>
		</div>
	</div>
</body>