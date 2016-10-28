<style type="text/css">
  .drop-shadow {
        -webkit-box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5);
        box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5);
    }
   .margin-top-30{margin-top:30px !important;} 
   .margin-bottom-30{margin-bottom:30px !important;}
   .widthmin{max-width: 99.8%; margin-left: -1px !important;}
   .mobile{padding-top: 1px !important;
        padding-bottom: 1px !important;}
   #templatemo-nav-bar{ margin-top: -42px !important; }
</style>
<body>
	<div class="container page-heading margin-top-30">
		<div class="row col-md-12 col-xs-12 padding-xs-0">
			<div class="col-xs-12 col-md-12 padding-top-10 margin-top-7">
				<div class="visible-md visible-lg visible-sm margin-top-15 text-white well">
					<p><h2 class="text-info">Contact Us</h2></p>
				</div>
        <div id="contacts" class="contaier margin-top-30 drop-shadow visible-xs row">
          <div class="well margin-bottom-0"><h3 class="text-info">Contact Us</h3></div>
        </div>
				<div class="margin-top-15  text-center">
					<h4>
						<b>We'd like to hear from you. Drop in your comments & queries and the NextStep team will get back to you</b>
					</h4>
					<br>
				</div>
				<div id="respoce" class="hidden col-md-6 col-md-offset-3 col-md-offset-3 modal-body well margin-bottom-0">
          <div id="responceDiv" class="card">
            <h3><?php echo $message['message'];?></h3>
          </div>
        </div>
			
			<div id="contacts-us" class="row  text-white well widthmin">
                  <div class="col-md-10  col-md-offset-1 margin-bottom-30 margin-top-30 mobile drop-shadow">
                  <div class="margin-top-30 margin-bottom-30">



                      <form id="contactUsForm" method="POST" action="javascript:void(0);" data-toggle="validator" >
                              <div class="form-group control-group controls">
                                  <label for="Name" class="control-label">Name</label>
                                  <input type="text" class="form-control" id="Name" name="Name" required="" title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group control-group controls">
                                  <label for="email" class="control-label" >Email</label>
                                  <input type="text" class="form-control" id="email" name="email" title="Please enter you username" placeholder="example@gmail.com" required="">
                                  <span class="help-block"></span>
                              </div>
                              
                              <div class="form-group control-group controls">
                                  <label for="mobile" class="control-label">Mobile</label>
                                  <input type="integer" class="form-control" id="mobile" name="mobile" value="" required="" title="Please enter your mobile number">
                                  <span class="help-block"></span>
                              </div>
                            <div class="form-group control-group controls">
                                  <label for="comments" class="control-label">Comments or Inquiry</label>
                                  <textarea type="integer" class="form-control" id="comments" name="comments" value="" required="" title="Please enter your Comments or Inquiry"></textarea>
                                  <span class="help-block"></span>
                              </div>
                             
                              <button type="submit" class="btn btn-success btn-block">Submit</button>
                          </form>
                      </div>

                  </div>
        </div>
              <div class="clearfix"></div>
           <div class="col-sm-12 text-center">
                    <h3>Fortune-Power Help Desk</h3>
                    <div class="col-sm-12 padding-left-0 padding-top-7">
                        <div class="margin-top-15">
                            <i class="fa fa-phone-square"></i> &nbsp; Call @  +91 7878787878 ( Mon-Fri, 9:30 am - 6:30 pm)
                        </div>
                        <div class="margin-top-15">
                           <img class="img-responsive pull-left" style="margin-left:27%;" src="<?php echo ABSOLUTE_URL;?>/img/bitLogo.png"><span class="pull-left">Our BitCoin Address : 1PAWptQQbo32hZUp7JPZRZ8wvacVpeKZMR</span>
                        </div>
                        <div class="clearfix"></div>
                        <div class="margin-top-7">
                            <i class="fa fa-envelope-square"></i> &nbsp; Email us - <a href="helpdesk@fortunepower.co.in" >helpdesk@fortunepower.co.in</a>
                        </div>
                        <br>
                    </div>
                </div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	 	$(document).ready(function () {
     $(".navbar-right").attr("style","margin-top: 40px; margin-right: 30px !important;");
    <?php if(empty($message)) { ?>
      $("#contacts").removeClass('hidden')
    <?php } ?>
        ABSOLUTE_URL = "<?php echo ABSOLUTE_URL;?>";        
        $("#contactUsForm").bootstrapValidator({
            live: false,
            trigger: 'blur',
            fields: {
                "Name": {
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
                        }
                    }
                },
                "mobile": {
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

        }).on('success.form.bv',function(e){
          e.preventDefault();
          $.ajax({
            type: "POST",
            url: "<?php echo ABSOLUTE_URL;?>/home_pages/submitLeads",
            data : $("#contactUsForm").serialize(true),
            success:function( data ){
              msg = JSON.parse(data);
              $("#contacts-us").addClass('hidden');
              $("#respoce").removeClass('hidden');
              $("#respoce h3").html(msg['message']);
              $("#responceDiv").addClass(msg['class']);
            },
            error:function(request, status, error){
              alert("Something went wrong");
            }
          });
        });
    });
</script>