<style>
    .brand-you-modal {width:480px !important}
    .close-btn{cursor:pointer!important;margin-right:10px; font-size:16px; font-weight:bold; }
    .modal-body-padding {
    padding: 0px!important;
}
.modal-dialog-width-650{width: 650px!important; position: absolute;}
    @media (max-width: 480px) {
        .brand-you-modal {width:320px !important;  margin: 60px auto;}
        .brand-you-modal img {width:290px !important }
    
    
}
</style>
<div class="modal-dialog modal-dialog-width-650 modal fade" data-backdrop="static" data-keyboard="false" align="center" id='diwaliPopUp'>
<button id="close" type="button" class="close hidden" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    <div class="modal-content">
 <div class="modal-body modal-body-padding">
     <div class="col-md-4" id="navigation" >
                <div class="" style="opacity: 1; width: 100%; margin-top:15px; margin-left:50px; color: #fff; font-size: 15px;">
                    <div style="width: 94%; background: rgba(47, 47, 47, 0.75); border-bottom-right-radius: 13px; border-top-left-radius: 13px; border: 1px solid #fff">
                        <table width="100%">
                            <tr>
                                <td style="padding-top: 34px; padding-left:6px;">
                                    <b style="color: #fff; font-weight: bold; font-size: 16px; text-shadow: 0px -1px 4px white, 0px -2px 10px yellow, 0px -10px 20px #ff8000, 0px -18px 40px red; letter-spacing: 2px">Welcome To</b>
                                    <br />
                                    <b style="color: #fff; text-shadow: 0px -1px 4px white, 0px -2px 10px yellow, 0px -10px 20px #ff8000, 0px -18px 40px red; font-size: 36px; font-weight: bold; letter-spacing: 5px">Fortune Power</b>
                                </td>
                            </tr>
                        </table>  
                        
                         <form id="popLead" method="POST" action="javascript:void(0);" data-toggle="validator" >
                                <div class="form-group control-group" id="emailid">
                                  <label for="fname" class="control-label" >Name</label>
                                  <input type="text" class="form-control"  id="fname" name="fname" title="Name or user name" description="user email or username"  required="">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group control-group" id="emailid">
                                  <label for="email" class="control-label" >Email</label>
                                  <input type="text" class="form-control" id="email_id" name="email_id" title="Email or user name" description="user email or username" placeholder="example@gmail.com" required="">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group control-group" id="pass">
                                  <label for="contact" class="control-label">contact</label>
                                  <input type="text" title="contact" description="user contact" class="form-control" id="contact" name="contact" required="" title="Please enter your contact number">
                                  <span class="help-block"></span>
                              </div>
                              <div id="loginNotifications" class="alert alert-danger hide"  role="alert"></div>
                              <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                           
                              <button type="submit" name="submit" value="Enter Website" id="submit" class="button_example" >Submit</button><br /><br />
                            
                          </form>
                        </div>
                    </div>
                </div>
</div>
    </div>
</div>
<script>

        $('#diwaliPopUp').modal('show');
$(document).ready(function () {
    
        ABSOLUTE_URL = "<?php echo ABSOLUTE_URL;?>";        
        $("#popLead").bootstrapValidator({
            live: false,
            trigger: 'blur',
            fields: {
                "email_id": {
                    message: "Please Enter emailid",
                   
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter an E-mail address'
                        },
                        emailAddress: {
                            message: 'Please enter a valid E-mail address'
                        }
                    }
                },
                "fname": {
                    message: "Please enter your full name",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter your full name'
                        }
                    }
                },
                "contact": {
                    message: "Enter 10 digit phone number",
                    validators: {
                        notEmpty: {
                            message: 'Enter mobile number'
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

        })   .on('success.form.bv', function(e) {
                    e.preventDefault();

                    $.ajax({
                        dataType: "JSON",
                        url: ABSOLUTE_URL + "/home_pages/saveLead",
                        data: $('#popLead').serialize(),
                        type: "POST",
                        success: function(res) {
                            if (res.hasError === true) {
                                $("#popLead").html(res.messages).show().removeClass('hide');
                                //$('#diwaliPopUp').modal('hide');
                                $('#close').removeClass('hidden').addClass('show');
                                 $("#diwaliPopUp .close").click();
                            } else {
                                 $('#close').removeClass('hidden').addClass('show');

                                 $("#diwaliPopUp .close").click() ;                         }
                           
                        }
                    });
                    //$('#diwaliPopUp').modal('hide');
                });
    });

</script>

