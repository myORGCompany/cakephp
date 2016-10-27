<div id="bankForm"  class="modal fade" role="dialog">
      <div class="modal-content modal-dialog">
          <div class="modal-header">
              <button id="close" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="">Please fill the details</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-12">
                  <div class="well">
                      <form id="bnkForm" method="POST" action="<?php echo ABSOLUTE_URL;?>/desh_board/saveBankDetails"  data-toggle="validator" novalidate="novalidate">
                              <div class="form-group control-group">
                              <div class="form-group control-group">
                                  <label for="bankName" class="control-label">Bank Name</label>
                                  <input type="text" class="form-control" id="bankName" name="bankName" value="" required="" title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group control-group">
                                  <label for="accountNumber" class="control-label" >Account Number</label>
                                  <input type="text" class="form-control" id="accountNumber" name="accountNumber" title="Please enter you account number" required="">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group control-group">
                                  <label for="ifsc" class="control-label">IFSC Code</label>
                                  <input  class="form-control" id="ifsc" name="ifsc" value="" required="" title="Please enter ifsc code">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group control-group">
                                  <label for="branch" class="control-label">Branch </label>
                                  <input  class="form-control" id="branch" name="branch" value="" required="" title="Please enter branch ">
                                  <span class="help-block"></span>
                              </div>
                              <button type="submit"   class="btn btn-default btn-primary">Submit</button>
                          </form>
                      </div>
                      <?php if(!empty($HelpData['bank'])) { ?>
                      <strong>Existing bank</strong> 
                      <div class="well">
                          <table class="table table-responsive">
                                  <tr><td><label class="control-label">Bank</label></td>
                                  <td><label class="control-label">Account No.</label></td>
                                  <td><label class="control-label">Branch</label></td>
                                  <td><label class="control-label">Ifsc</label></td></tr>
                                <div class="clearfix"></div><div class="clearfix"></div>
                                  <tr class="text-success"> <td><label class="control-label"><?php echo $HelpData['bank']['UserBank']['bank_name'] ?></label></td>
                                  <td><label class="control-label"><?php echo $HelpData['bank']['UserBank']['account_number'] ?></label></td>
                                  <td><label class="control-label"><?php echo $HelpData['bank']['UserBank']['branch'] ?></label></td>
                                  <td><label class="control-label"><?php echo $HelpData['bank']['UserBank']['ifsc_code'] ?></label></td></tr>
                             <?php } ?>
                            </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <script type="text/javascript">
  $(document).ready(function () {       
        $("#bnkForm").bootstrapValidator({
            live: false,
            trigger: 'blur',
            fields: {
                "bankName": {
                    selector: "#bankName",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: "Please enter your bank name"
                        },
                        regexp: {
                            regexp: /^[a-z\s]+$/i,
                            message: 'Please enter your bank name in valid characters'
                        },
                        stringLength: {
                            enabled: true,
                            min: 3,
                            max: 70,
                            message: 'Bank name too short'
                        }
                    }
                },
                "ifsc": {
                    message: "Please Enter IFSC code",
                   
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter IFSC code'
                        }
                    }
                },
                "branch": {
                    message: "Please Enter branch name",
                   
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter branch name'
                        }
                    }
                },
                "accountNumber": {
                    message: "Enter your account number",
                    validators: {
                        notEmpty: {
                            min: 12,
                            max: 20,
                            enabled: true,
                            message: 'Enter account number'
                        }
                    }
                }
            }
        }).on('success.form.bv', function(e) {
                    e.preventDefault();
                   $.ajax({
                        url:'<?php echo ABSOLUTE_URL;?>/desh_board/saveBankDetails/',
                        method:'post',
                        data: {bankName:$("#bankName").val(),accountNumber:$("#accountNumber").val(),ifsc: $("#ifsc").val(),branch:$("#branch").val()},
                        success: function (res) {
                           if (res.hasError === true) {
                                $("#bnkForm").html(res.messages).show().removeClass('hide');
                            } else {
                                $("#bnkForm").addClass('hidden');
                                alert('Thank You Your Bank Details Updated Successfully');
                                location.reload(); 
                            }
                        },
                        error: function (){
                            alert('Something went wrong..');
                        }
                    });
                });
    });
    
  </script>
  <style type="text/css">
       .m-r-10{
    margin-right: 10%;
  }
  </style>