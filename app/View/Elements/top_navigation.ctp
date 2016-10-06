<div class="templatemo-top-bar" id="templatemo-top">
            <div class="container">
                <div class="subheader">
                    <div id="phone" class="pull-left">
                            <img src="<?php echo ABSOLUTE_URL;?>/img/phone.png" alt="phone"/>
                            090-080-0110
                    </div>
                    <div id="email" class="pull-right">
                            <img src="<?php echo ABSOLUTE_URL;?>/img/email.png" alt="email"/>
                            info@fortunepower.co.in
                    </div>
                </div>
            </div>
        </div>
        <div class="templatemo-top-menu">
            <div class="container">
                <!-- Static navbar -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                                <a href="#" class="navbar-brand"><img src="<?php echo ABSOLUTE_URL;?>/img/templatemo_logo.png" alt="Urbanic Template" title="Urbanic Template" /></a>
                        </div>
                        <div class="navbar-collapse collapse" id="templatemo-nav-bar">
                            
                            <?php if ($this->params['controller'] == 'home_pages' && $this->action != 'deshBoard') { ?> 
                              <ul class="nav navbar-nav navbar-right" style="margin-top: 40px;">
                                <li class="active"><a href="#templatemo-top">HOME</a></li>
                                <li><a href="#templatemo-about">ABOUT</a></li>
                                <li><a href="#plan">PLAN</a></li>
                                <li><a rel="nofollow" 
                                        class="external-link" data-toggle="modal" data-target="#login">LOGIN</a></li>
                                        <li><a rel="nofollow" 
                                        class="external-link" id="register" data-toggle="modal" data-target="#signUpForm">REGISTER</a></li>
                                <li><a href="#templatemo-contact">CONTACT</a></li></ul>
                                <?php } else {  ?>
                                  <ul class="nav navbar-nav navbar-right active" style="margin-top: 40px;">
                                    <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">One more separated link</a></li>
                                      </ul>
                                    </li>
                                  </ul>
                                  <ul class="nav navbar-nav navbar-right" style="margin-top: 40px;">
                                <li class="active"><a href="<?php echo ABSOLUTE_URL;?>/home_pages/logout/">Logout</a></li> </ul>
                                <ul class="nav navbar-nav navbar-right" style="margin-top: 40px;"><li class="active"><a id="bank"  
                                        data-toggle="modal" data-target="#bankForm" >Bank Details</a></li></ul>

                               <?php } ?>
                            
                        </div><!--/.nav-collapse -->
                    </div><!--/.container-fluid -->
                </div><!--/.navbar -->
            </div> <!-- /container -->
        </div>
       
  <div id="login"  class="modal fade" role="dialog">
      <div class="modal-content modal-dialog">
          <div class="modal-header">
              <button id="close" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Login to site.com</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-6">
                      <div class="well">
                          <form id="loginForm" method="POST" action="<?php echo ABSOLUTE_URL;?>/home_pages/logins/" data-toggle="validator" >
                              <div class="form-group control-group">
                                  <label for="email" class="control-label" >Username</label>
                                  <input type="text" class="form-control" id="email" name="email" title="Please enter you username" placeholder="example@gmail.com" required="">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group control-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                              <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                              <div class="checkbox">
                                  <label>
                                      <input type="checkbox" name="remember" id="remember"> Remember login
                                  </label>
                                  <p class="help-block">(if this is a private computer)</p>
                              </div>
                              <button type="submit" class="btn btn-success btn-block">Login</button>
                              <a href="/forgot/" class="btn btn-default btn-block">Help to login</a>
                          </form>
                      </div>
                  </div>
                  <div class="col-xs-6">
                      <p class="lead">Register now for <span class="text-success">FREE</span></p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span> See all your orders</li>
                          <li><span class="fa fa-check text-success"></span> Fast re-order</li>
                          <li><span class="fa fa-check text-success"></span> Save your favorites</li>
                          <li><span class="fa fa-check text-success"></span> Fast checkout</li>
                          <li><span class="fa fa-check text-success"></span> Get a gift <small>(only new customers)</small></li>
                          <li><a href="/read-more/"><u>Read more</u></a></li>
                      </ul>
                      <p><a id="reg" href="" class="btn btn-info btn-block">Yes please, register now!</a></p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  
  <script type="text/javascript">

$(document).ready(function(){
     $('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
   
    $("#reg").click(function(){
        $("#close").click();
        setTimeout(show_reg, 1000));
       
    });

});

function show_reg(){
  alert("DDDDD");
     $("#register").click();
}




// function hidepopup()
// {
//    $("#loginform").fadeOut();
//    $("#loginform").css({"visibility":"hidden","display":"none"});
// }
</script>
