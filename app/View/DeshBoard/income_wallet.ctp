<body>
	<div class="container">
		<div class="row well">
		<h3 class="text-success">Hi <?php echo $this->Session->read('User.name');?></h3> <span class="text-info">Hare is your Total Income</span>
		<div class="clearfix"></div><br />
			<div class="row">
			<form id="widrowForm" method="POST" action="<?php echo ABSOLUTE_URL;?>/desh_board/widrowMoney"  data-toggle="validator" novalidate="novalidate">
				<table class="table table-striped ">
					<tr class="text-center">
						<td><strong>#</strong></td>
						<td><strong>Zone</strong></td>
						<td><strong>Available Amount</strong></td>
						<td><strong>Widrow Amount</strong></td>		
					</tr>
				<?php foreach ($walletData as $key => $value) { ?>
					<tr class="text-center">
						<td><strong>#</strong></td>
						<td><strong><?php echo $value['zone'];?></strong></td>
						<td><input type="text" class="form-control" readonly value="<?php echo $value['income'];?>" id="td<?php echo $key;?>" name="<?php echo $key;?>"></strong></td>
						<td><input type="text" onchange="return validateForm(this.id);" class="form-control" id="<?php echo $key;?>" name="<?php echo $key;?>"></td>
					</tr>
				<?php } ?>
				<tr class="text-center">
						<td><strong>Total Amount</strong></td>
						<td><strong></strong></td>
						<td><strong></strong></td>
						<td><input type="text" id="tot" class="form-control" readonly id="<?php echo $key;?>" name="<?php echo $key;?>"></td>
					</tr>
				</table>
				<div class="text-center">
					<button type="submit" onclick="return checkValues();"  class="btn btn-default btn-primary">Submit</button>
				</div>
			</form>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function () {
		total = 0;
	});
	function validateForm(id){
		var val1 = $("#td"+id).attr('value');
		var val2 = $("#"+id).val();
		if(val2 > val1){
			alert("This amount not suficiant in your wallet");
			$("#"+id).val(null);
			return false;
		} else {
			total = parseInt(total) + parseInt(val2);
			$("#tot").val(total);
		}
	}
	function checkValues(){
		var val = $("#tot").val();
		if(!val){
			alert("Please enter widrowal amount");
			return false;
		}
	}
</script>