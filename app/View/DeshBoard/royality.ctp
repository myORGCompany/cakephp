<body>
	<div class="container">
		<div class="row well">
		<h3 class="text-success">Hi <?php echo $this->Session->read('User.name');?></h3> <span class="text-info">Hare is your <?php echo $zone; ?> Royality Status</span>
		<div class="clearfix"></div><br />
			
			<?php if (!empty($this->Session->read('User.royality')) && $this->Session->read('User.royality') ==1) { ?>
					<h3 class="text-success">Congratulations! You have qualified for Royality <h3 class="text-danger"> <?php echo $value; ?> </h3></h3>
			<?php  } else { ?>
					<h3 class="text-danger"> You have not qualified for Royality till now</h3>
				<?php } ?>
		</div>
	</div>
</body>