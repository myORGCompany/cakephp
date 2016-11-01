<body>
	<div class="container">
		<div class="row well">
		<h3 class="text-success">Hi <?php echo $this->Session->read('User.name');?></h3> <span class="text-info">Here is your Total Income</span>
		<button  data-toggle="modal" data-target="#elementUser" class="btn btn-default external-link pull-right">Generate New Pin From Wallet</button>
		<div class="clearfix"></div><br />
			<div class="row">
			<form id="widrowForm" method="POST" action="<?php echo ABSOLUTE_URL;?>/desh_board/widrowMoney"  data-toggle="validator" novalidate="novalidate">
				<table class="table table-striped ">
					<tr class="text-center">
						<td><strong>Sr. no.</strong></td>
						<td><strong>Zone</strong></td>
						<td><strong>Available Amount</strong></td>
						<td><strong>Widrow Amount</strong></td>		
					</tr>
				<?php foreach ($walletData as $key => $value) { ?>
					<tr class="text-center">
						<td><strong>#</strong></td>
						<td><strong><?php echo $value['zone'];?>-Zone</strong></td>
						<td><input type="text" class="form-control hidden" readonly value="<?php echo $value['income'];?>" id="td<?php echo $value['zone'];?>"><span><strong><?php echo $value['income'];?></strong></span></td>
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
<div id="elementUser"  class="modal fade" role="dialog">
      <div class="modal-content modal-dialog">
          <div class="modal-header">
              <button id="close" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="heading">Please fill the number of pin required</h4>
          </div>
          <div class="modal-body well margin-bottom-0">
                <form action="<?php echo ABSOLUTE_URL;?>/Pin" method="Post" class=" tags"  id="pinBuy">
                  <div class="row">
                    <table class="table table-bordered c-table">
                    <tr class="form-group control-group ">
                        <td class="">
                          Available Income
                        </td>
                        <?php foreach ($availbaleIncome as $key => $value) { ?>
                        <td class="">
                          <?php echo $value['zone'];?>-Zone (<strong><?php echo $value['income'];?></strong>  )
                        </td>
                        <input type="text" class="form-control hidden" value="<?php echo $value['income'];?>" id="<?php echo $value['zone'];?>-money">
                        <?php } ?>
                        </tr>
                        <tr class="form-group control-group ">
                        <td class="">
                          Select From
                        </td>
                        <?php foreach ($availbaleIncome as $key => $value) { ?>
                        	<td class="controls card-text">
	                          	<input type="text" onchange="return validateForm1(this.id);" class="form-control" id="<?php echo $value['zone'];?>1" name="<?php echo $value['zone'];?>1">
	                        </td>
                        <?php } ?>
                      </tr>
                      <tr class="form-group control-group ">
                        <td class="">
                          Quantity
                        </td>
                        <td class="controls card-text">
                          <input type="text" class="form-control required" class="form-control required" id="quantity" name="quantity">
                        </td>
                        <td>Total</td>
                        <td class="controls card-text">
                          <input type="text" readonly class="form-control" id="tot1" name="tot1">
                        </td>
                      </tr>
                    </table>
                  </div>
                <button class="btn btn-primary" onclick="return checkValues1();" type="submit">Submit</button>
                <span class="pull-right"><strong>*NOTE: 1 Pin Cost is = <?php echo PIN_PRICE;?></strong></span>
              </form>
           </div>
      </div>
  </div>
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
	function validateForm1(id){
		var val1 = $("#"+id + '-money').attr('value');
		var val2 = $("#"+id).val();
		var total = 0;
		if(parseInt(val2) > parseInt(val1)){
			alert("This amount not suficiant in your "+id+ "-Zone wallet");
			$("#"+id).val(null);
			$("#tot1").val(null);
			$('#pinBuy')[0].reset();
			total = 0;
			return false;
		} else {
			if ($("#Active1").val()) {
				total = parseInt(total) +parseInt($("#Active1").val());
			}
			if ($("#Safe1").val()) {
				total = parseInt(total) +parseInt($("#Safe1").val());
			}
			if ($("#Working1").val()) {
				total = parseInt(total) +parseInt($("#Working1").val());
			}
			$("#tot1").val(total);
		}
	}
  function checkValues1(){
		var val = $("#tot1").val();
		var pin = $("#quantity").val();
		var pinValue = pin*<?php echo PIN_PRICE;?>;
		if(!pin || pin==='0'){
			alert("Please enter pin quantity");
			return false;
		}
		if(!val){
			alert("Please chose amount from your wallets");
			return false;
		} else if(val < pinValue) {
			alert(pin + " Pin cost is Rs."+pinValue+" please pic sufficient ammount");
			$('#pinBuy')[0].reset();
			return false;
		} else if(pinValue < val) {
			alert(pin + " Pin cost is Rs."+pinValue+" please pic only "+pinValue+" rs. as total");
			$('#pinBuy')[0].reset();
			return false;
		}
	}
</script>