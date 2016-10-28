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
						<td><input type="text" class="form-control hidden" readonly value="<?php echo $value['income'];?>" id="td<?php echo $key;?>"><span><strong><?php echo $value['income'];?></strong></span></td>
						<td><input type="text" onchange="return validateForm(this.id);" class="form-control" id="<?php echo $value['zone'];?>" name="<?php echo $value['zone'];?>"></td>
					</tr>
				<?php } ?>
				<div class="clearfix"></div><br />
				<tr class="text-center">
						<td><strong>Total Amount</strong></td>
						<td><strong></strong></td>
						<td><strong></strong></td>
						<td><input type="text" id="tot" class="form-control" readonly id="<?php echo $key;?>" name="Gtotal"></td>
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
	
	function validateForm(id){
		var val1 = $("#td"+id).attr('value');
		var val2 = $("#"+id).val();
		var total =0;
		if(parseInt(val2) > parseInt(val1)){
			alert("This amount not suficiant in your wallet");
			$("#"+id).val(null);
			$("#tot").val(null);
			$('#widrowForm')[0].reset();
			total = 0;

			return false;
		} else {
			if ($("#Active").val()) {
				total = parseInt(total) +parseInt($("#Active").val());
			}
			if ($("#Safe").val()) {
				total = parseInt(total) +parseInt($("#Safe").val());
			}
			if ($("#Working").val()) {
				total = parseInt(total) +parseInt($("#Working").val());
			}
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