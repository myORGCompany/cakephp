<div class="container "> 
<div class="row well ">
	<h3 class="text-info"> Hi <?php echo $this->Session->read('User.name');?></h3>
	<?php if($this->action != 'viewAndEditPin') { ?>
	<div class="row">
		<h4 class="pull-left" style="margin-left:15px;">Hare your pin history</h4>
		<button  data-toggle="modal" data-target="#elementUser" class="btn btn-default external-link pull-right">Generate New Pin From Wallet</button>
		<button  data-toggle="modal" data-target="#elementShop" class="btn btn-default external-link pull-right">Parchage New Pin From Store</button>
	</div>
	<?php } ?>
</div>
	<div class="row well ">
	<form action="<?php echo ABSOLUTE_URL;?>/desh_board/pinTransfer" method="post">
	<h4 class="text-info pull-left">Your Pin</h4>
	<button type="submit" class="btn pull-right margin-right-20" onclick="return checkboxcheck();">Submit</button>
	<input type="text" id="emailTransfer" class="pull-right margin-right-20" name="emailTransfer" placeholder="Email" >
	<span class="pull-right margin-right-20" ><strong>Transfer To</strong></span>
	<div class="clearfix margin-bottom-20 "></div>

		<table class="table-striped  table text-center ">
			<tr>
			<td><strong>Select</strong></td>
				<td><strong>pin Number</strong></td>
				<td><strong>Pin</strong></td>
				<td><strong>Value</strong></td>
				<td><strong>created on</strong></td>
				<?php if (isset($Userdata) && !empty($Userdata)) {
					echo '<td><strong>Created by</strong></td>';
				} ?>
				<td><strong>Used in</strong></td>
				<td><strong>Status</strong></td>
			</tr>
			<?php foreach ($availbalePin as $key => $value) { 
					if ($value['PinWallet']['status'] ==1 ) { 
						$status = '<td class="text-success">Active</td>';
						$select = 1;
					} else if ($value['PinWallet']['status'] ==0 ) {
						$status = '<td class="text-danger">Rejected</td>';
						$select =0;
					} else if ($value['PinWallet']['status'] ==2 ) {
						$status = '<td class="text-info">Used</td>';
						$select = 0;
					} else if ($value['PinWallet']['status'] ==3 ) {
						$status = '<td class="text-warning">Payment painding</td>';
						$select = 0;
					} ?>
				<tr>
				<td> <?php if ($select ==1 ) {  ?>
						<input type="checkbox" class="checkbox" name="<?php echo $value['PinWallet']['id'];?>" value="<?php echo $value['PinWallet']['id'];?>"></td>
					<?php } else {?>
						<input type="checkbox"  disabled class="checkbox" name="<?php echo $value['PinWallet']['id'];?>" value="<?php echo $value['PinWallet']['id'];?>"></td>
					<?php } ?>
					<td><?php echo $value['PinWallet']['id'];?></td>
					<td><?php echo $value['PinWallet']['cypher_code'];?></td>
					<td><?php echo PIN_PRICE;?></td>
					<td><?php echo $value['PinWallet']['created'];?></td>
					<?php if (isset($Userdata) && !empty($Userdata)) {
						echo '<td>'.$Userdata[$value['PinWallet']['user_id']].'</td>';
					} ?>
					<?php if (empty($value['PinWallet']['used_on'])) {
						echo '<td class="text-success">Not Used</td>';
					} else {
						echo "<td class='text-info'>".$value['PinWallet']['used_on']."</td>";
					} 
					echo $status; ?>	
				</tr>
			<?php } ?>
		</table>
		</form>
		</div>
</div>
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
	                          	<input type="text" onchange="return validateForm(this.id);" class="form-control" id="<?php echo $value['zone'];?>" name="<?php echo $value['zone'];?>">
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
                          <input type="text" readonly class="form-control" id="tot" name="tot">
                        </td>
                      </tr>
                    </table>
                  </div>
                <button class="btn btn-primary" onclick="return checkValues();" type="submit">Submit</button>
                <span class="pull-right"><strong>*NOTE: 1 Pin Cost is = <?php echo PIN_PRICE;?></strong></span>
              </form>
           </div>
      </div>
</div>
  <div id="elementShop"  class="modal fade" role="dialog">
      <div class="modal-content modal-dialog">
          <div class="modal-header">
              <button id="close" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="heading">Please fill the details</h4>

          </div>
          <div class="modal-body well margin-bottom-0">
           <p>Select any franchise, copy account number and paste in Pin Franchise</p>
                <form action="<?php echo ABSOLUTE_URL;?>/desh_board/pinRequestFromShop" method="Post" id="pinRequest">
                  <div class="row">
                    <table class="table table-bordered c-table">
                      <tr class="form-group control-group ">
                        <td class="">
                          Pin Franchise
                        </td>
                        <td class="controls card-text">
                          <input type="text" class="form-control" placeholder="Please enter Account number of franchise" id="shop" name="shop">
                          <input type="text" class="form-control hidden" placeholder="Please enter Account number of franchise" id="shopId" name="shopId">
                        </td>
                      </tr>
                      <tr class="form-group control-group ">
                        <td class="">
                          Pin Quantity
                        </td>
                        <td class="controls card-text">
                          <input type="text" onchange="populateValue();" class="form-control" id="shopPinQuantity" name="shopPinQuantity">
                        </td>
                      </tr>
                      <tr class="form-group control-group ">
                        <td class="">
                          Total
                        </td>
                        <td class="controls card-text">
                          <input type="text" readonly class="form-control" id="total" name="total">
                        </td>
                      </tr>
                    </table>
                  </div>
                <button class="btn btn-primary" onclick="return checkValuesForShop();" type="submit">Submit</button>
              </form>
         <div class="row">
          <table class="table-responsive table text-center ">
			<tr>
				<td><strong>Select</strong></td>
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
					<td><input type="radio" class=" radio-inline"  name="paid" shoper="<?php echo $value['PinShop']['name'];?>" id="<?php echo $value['PinShop']['id'];?>"></td>
					<td><input type="checkbox" name=""></td>
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
      </div>
  </div>
  <script type="text/javascript">
$(document).on('change', 'input:radio', function (event) {
    var redio = $( "input:checked" ).attr("id");
    var name = $( "input:checked" ).attr("shoper");
    $("#shop").val(name) ;
    $( "#shopId" ).val(redio);
});
function checkboxcheck(){
	if (!$(".checkbox").is(":checked")) {
        alert("Please select atleast one pin to transfer");
        return false;
    }
}
function populateValue(){
	var qunt = $("#shopPinQuantity").val() ;
	var amt = qunt*<?php echo PIN_PRICE;?>;
	if(qunt){
		$("#total").val(amt);
	}
}
  function validateForm(id){
		var val1 = $("#"+id + '-money').attr('value');
		var val2 = $("#"+id).val();
		var total = 0;
		if(parseInt(val2) > parseInt(val1)){
			alert("This amount not suficiant in your "+id+ "-Zone wallet");
			$("#"+id).val(null);
			$("#tot").val(null);
			$('#pinBuy')[0].reset();
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
	function checkValuesForShop(){
		var val = $("#total").val();
		var pin = $("#shopPinQuantity").val();
		var pinValue = pin*<?php echo PIN_PRICE;?>;
		var shopIds = $( "#shopId" ).val();
		if(!pin || pin==='0'){
			alert("Please enter pin quantity");
			return false;
		}
		if(!shopIds || shopIds==='0'){
			alert("Please Select One Franchise");
			return false;
		}
		if(!val){
			alert("Something went wrong");
			return false;
			$('#pinRequest')[0].reset();
		} else if(val < pinValue) {
			alert("Something went wrong");
			$('#pinRequest')[0].reset();
			return false;
		} else if(pinValue < val) {
			alert("Something went wrong");
			$('#pinRequest')[0].reset();
			return false;
		}
	}
  </script>