 <?php if($this->action != 'AddFranchise') { 
  $action = ABSOLUTE_URL.'/editFranchise'; } else {$action = ABSOLUTE_URL.'/addFranchise';}?>

 <script type="text/javascript" src="<?php echo ABSOLUTE_URL;?>/js/jquery.validate.js"></script>
<body>
	<div class="container  margin-top-30">
		<div class="row  padding-md-0 well">
		<div class="clearfix"></div> 
		<div class="col-md-4 col-md-offset-5 margin-bottom-20"><h3 class="text-info" ><strong>Add New Franchise</strong></h3></div>
		<div class="clearfix"></div> 
			<div class="table-responsive border-2">
				<div class="">
					<form class="form-horizontal" method="post" action="<?php echo $action; ?>" id="addForm">
          <?php if($this->action != 'AddFranchise') { ?>
            <input type="text" class="form-control hidden required" title="Please Enter the name of your firm" name="id" value="<?php echo $data['PinShop']['id'];?>"> <?php } ?>
						<div class="form-group control-group controls">
							<label for="input1" class="col-sm-2 control-label margin-right-100">Name</label>
							<div class="col-sm-7">
								<input type="text" class="form-control required" title="Please Enter the name of your firm" name="name" id="input1" value="<?php echo $data['PinShop']['name'];?>">
							</div>
						</div>
						
					
						<div class="form-group control-group controls">
							<label for="input4" class="col-sm-2 control-label margin-right-100">City</label>
							<div class="col-sm-7">
								<select class="form-control required" title="Please select your city" <?php echo $data['PinShop']['city'];?> name="city" id="input4">
                 <?php if (!empty($data['PinShop']['city'])) { ?>
                        <option value="<?php echo $data['PinShop']['city'];?>"><?php echo $data['PinShop']['city'];?></option>
                  <?php } else {?>
								<option value="">Select a City</option>
                <?php }  foreach ($city  as $key => $value) { ?>
										<option id="<?php echo $value;?>"><?php echo $value;?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group control-group controls">
							<label for="input6" class="col-sm-2 control-label margin-right-100">Phone Number</label>
							<div class="col-sm-7">
              <?php if($this->action == 'AddFranchise') { ?>
								<input type="text" class="form-control required"  title="Please Enter Your Phone Number" name="mobile" id="input7" >
              <?php } else { ?>
                <input type="text" class="form-control" value="<?php echo $data['PinShop']['mobile'];?>" readonly title="Please Enter Your Phone Number" name="mobile" id="input7" >
                <?php } ?>
							</div>
						</div>
				       <div class="clearfix"></div> 
                              <div class="form-group control-group">
                                  <label for="bank_name" class="col-sm-2 control-label margin-right-100">Bank Name</label>
                                  <div class="col-sm-7">
                                  <input type="text" class="form-control" id="bank_name" name="bank_name"  value="<?php echo $data['PinShop']['bank_name'];?>">
                                  </div>
                              </div>
                              <div class="form-group control-group">
                                  <label for="account_number" class="col-sm-2 control-label margin-right-100" >Account Number</label>
                                  <div class="col-sm-7">
                                  <input type="text" class="form-control" id="account_number" name="account_number" title="Please enter you account number" value="<?php echo $data['PinShop']['account_number'];?>" >
                                  </div>
                              </div>
                              <div class="form-group control-group">
                                  <label for="ifsc" class="col-sm-2 control-label margin-right-100">IFSC Code</label>
                                  <div class="col-sm-7">
                                  <input  class="form-control" id="ifsc" name="ifsc" title="Please enter ifsc code" value="<?php echo $data['PinShop']['ifsc'];?>" >
                                  </div>
                              </div>
                              <div class="form-group control-group">
                                  <label for="account_name" class="col-sm-2 control-label margin-right-100">Account Name </label>
                                  <div class="col-sm-7">
                                  <input  class="form-control" id="account_name" name="account_name"  title="Please enter branch " value="<?php echo $data['PinShop']['account_name'];?>" >
                                  </div>
                              </div>
						<div class="form-group control-group controls col-sm-11">
							<div class="pull-right margin-right-70">
								<button type="submit" class="btn btn-default btn-lg ">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php //echo $this->element('pop_element'); ?>
</body>
<script type="text/javascript">
$(document).ready(function () {
  <?php if (empty($data)) { ?>
      $('#addForm').trigger("reset");
            $('input[readonly]').val("");
  <?php } ?>
            $('#addForm').validate({
                rules: {
                    name: {
                        minlength: 2,
                        required: true
                    },
                    adderess: {
                        required: true
                    },
                    city: {
                        required: true
                    },
                    mobile: {
                        required: true,
                        number: true
                    },
					nature: {
			            required: true
			        }
                },
                highlight: function (element) {
                    $(element).closest('.controls').removeClass('success').addClass('text-danger');
                },
                success: function (element) {
                    element.addClass('valid')
                        .closest('.controls').removeClass('error').addClass('success').removeClass('text-danger');
                }
            });
        });
        
</script>