<style type="text/css">
  .text-bold{color:#000000 ;}
</style>
<div id="signUpForm"  class="modal fade" role="dialog">
      <div class="modal-content modal-dialog">
          <div class="modal-header text-bold">
              <button id="close" type="button" class="close" data-dismiss="modal"><span aria-hidden="true" ><b class="text-bold">X</b></span><span class="sr-only"><strong>Close</strong></span></button>
              <strong><h4 class="modal-title" id="myModalLabel">Register hare........</h4></strong>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-12">
                  <div class="well">
                      <form id="regForm" method="POST" action="javascript:void(0);" data-toggle="validator" >
                              <div class="form-group control-group controls">
                                  <label for="Name" class="control-label">Name</label>
                                  <input type="text" class="form-control" id="Name" name="Name" value="" required="" title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group control-group controls">
                                  <label for="email" class="control-label" >Username</label>
                                  <input type="text" class="form-control" id="email" name="email" title="Please enter you username" placeholder="example@gmail.com" required="">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group control-group controls">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group control-group controls">
                                  <label for="mobile" class="control-label">mobile</label>
                                  <input type="integer" class="form-control" id="mobile" name="mobile" value="" required="" title="Please enter your mobile number">
                                  <span class="help-block"></span>
                              </div>
                              <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                             
                              <button type="submit" class="btn btn-success btn-block">Register</button>
                          </form>
                          <div class="form-group hidden control-group" id="feedback">
                                  <p id=feedbackblok class="control-label" ></p>
                          </div>
                          <p id="already" class="margin-top-20"><a id="alreadyReg" href="javascript:void(0);" class="text-info btn-block">Already register! Click hare to login</a></p>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
<script>

    $(document).ready(function () {
        ABSOLUTE_URL = "<?php echo ABSOLUTE_URL;?>";        
        $("#regForm").bootstrapValidator({
            live: false,
            trigger: 'blur',
            fields: {
                "Name": {
                    selector: "#Name",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: "Please enter your complete name"
                        },
                        regexp: {
                            regexp: /^[a-z\s]+$/i,
                            message: 'Please enter your name in valid characters'
                        },
                        stringLength: {
                            enabled: true,
                            min: 1,
                            max: 40,
                            message: 'Please enter your complete name'
                        }
                    }
                },
                "email": {
                    message: "Please Enter emailid",
                   
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter an E-mail address'
                        },
                        emailAddress: {
                            message: 'Please enter a valid E-mail address'
                        },
                        remote: {
                            message: "This Email is already registered",
                            url: ABSOLUTE_URL + "/desh_board/checkMemberShipByEmail",
                            trigger: 'blur'
                        }
                    }
                },
                "password": {
                    message: "Please chose a password with at least 7 chars",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter your password'
                        },
                        password: {
                            message: 'The password is not valid'
                        },
                        stringLength: {
                            enabled: true,
                            min: 7,
                            max: 20,
                            message: 'Password should be at least 7 characters'
                        },
                    }
                },
                "mobile": {
                    message: "Enter 10 digit phone number",
                    validators: {
                        notEmpty: {
                            message: 'Enter mobile number'
                        },
                        remote: {
                            message: "This mobile number is already registered",
                            url: ABSOLUTE_URL + "/desh_board/checkMemberShipByMobile",
                            trigger: 'blur'
                        },
                        callback: {
                            message: 'Enter a valid mobile number',
                            callback: function (value, validator, $field) {

                                if (value === '') {
                                    return(true);
                                }
                                myString = value.replace(/ /g, '');
                               if (((myString.length == 10))) {
                                    return {
                                        valid: true,
                                    };
                                } 
                                else {
                                    return {
                                        valid: false,
                                        message: 'Enter a valid mobile number'
                                    };
                                }
                                return {
                                    valid: false,
                                    message: 'Enter a valid mobile number'
                                };
                            }
                        }//END CALL BACK
                    }
                }
            }

        }).on('success.form.bv', function(e) {
                    
                    // Prevent form submission
                    e.preventDefault();

                    $.ajax({
                        dataType: "JSON",
                        url: ABSOLUTE_URL + "/home_pages/registration",
                        data: $('#regForm').serialize(),
                        type: "POST",
                        success: function(res) {
                            if (res.hasError === true) {
                                $("#regForm").html(res.messages).show().removeClass('hide');
                            } else {
                                $("#feedbackblok").append('Thank You Your registration completed An Approval mail sended to your registered emailid kindly Confirm your email id to login');
                                $("#regForm").addClass('hidden');
                                $("#already").addClass('hidden');
                                $("#feedback").removeClass('hidden');
                            }

                        }
                    });
                });
    });
    // function openClose(){
    //   $("#regForm").addClass('hidden');
    //   $("#already").addClass('hidden');
    //   //$("#classdiv").removeClass('col-xs-6').addClass('col-xs-12');
    //   $("#feedback").removeClass('hidden');
    // }
   
</script>