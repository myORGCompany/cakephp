<!DOCTYPE html>
<html lang="en">
  
    <body>

        
       
        <!-- <div id = "loginform" align="center" class="collapse">
        
           <form>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>                  
                  <button type="submit" class="btn btn-default">Submit</button>

            </form>

        </div>
       -->


        <div>
        <script type="text/javascript">
        $(document).ready(function () {
        $('#loginForm').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    minlength: 2,
                    required: true
                }
            },
            highlight: function (element) {
                $(element).closest('.control-group').removeClass('success').addClass('error');
            },
            success: function (element) {
                element.text('OK!').addClass('valid')
                    .closest('.control-group').removeClass('error').addClass('success');
            }
        });
});</script>
            <!-- Carousel -->
            <?php /* <div id="templatemo-carousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#templatemo-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#templatemo-carousel" data-slide-to="1"></li>
                    <li data-target="#templatemo-carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="container">
                            <div class="carousel-caption" id="1pic">
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="item">
                        <div class="container">
                                <div class="carousel-caption">
                                    <div class="col-sm-6 col-md-6">
                                        <h1>FLUID</h1>
                                        <p>Suspendisse pellentesque, odio vel ultricies interdum, mauris nulla ullamcorper magna, non aliquet odio velit aliquam augue.</p>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <h1>ENERGY</h1>
                                        <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam mattis fringilla urna.</p>
                                    </div>
                                </div>
                        </div>
                    </div>
                        <div class="item">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h1>RESPONSIVE LAYOUT</h1>
                                    <p>This website theme is free to download and use for everyone. This layout is based on Bootstrap framework.</p>
                                    <p><a class="btn btn-lg btn-orange" href="#" role="button">Read More</a></p>
                                </div>
                            </div>
                        </div>
                </div>
                <a class="left carousel-control" href="#templatemo-carousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#templatemo-carousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div><!-- /#templatemo-carousel --> */?>
        </div>
                                <style>
                        * {box-sizing:border-box}
                        {font-family: Verdana,sans-serif;}
                        .mySlides {display:none}

                        /* Slideshow container */
                        .slideshow-container {
                          max-width: 1000px;
                          position: relative;
                          margin: auto;
                        }

                        /* Caption text */
                        .text {
                          color: #f2f2f2;
                          font-size: 15px;
                          padding: 8px 12px;
                          position: absolute;
                          bottom: 8px;
                          width: 100%;
                          text-align: center;
                        }

                        /* Number text (1/3 etc) */
                        .numbertext {
                          color: #f2f2f2;
                          font-size: 12px;
                          padding: 8px 12px;
                          position: absolute;
                          top: 0;
                        }

                        /* The dots/bullets/indicators */
                        .dot {
                          height: 13px;
                          width: 13px;
                          margin: 0 2px;
                          background-color: #bbb;
                          border-radius: 50%;
                          display: inline-block;
                          transition: background-color 0.1s ease;
                        }

                        .active {
                          background-color: #717171;
                        }

                        /* Fading animation */
                        .fade {
                          -webkit-animation-name: fade;
                          -webkit-animation-duration: 4s;
                          animation-name: fade;
                          animation-duration: 4s;
                        }

                        @-webkit-keyframes fade {
                          from {opacity: .4} 
                          to {opacity: 1}
                        }

                        @keyframes fade {
                          from {opacity: .4} 
                          to {opacity: 1}
                        }

                        /* On smaller screens, decrease text size */
                        @media only screen and (max-width: 300px) {
                          .text {font-size: 11px}
                        }
                        </style>

                        <div class="slideshow-container">

                        <div class="mySlides fade">
                          <img src="<?php echo ABSOLUTE_URL;?>/img/1.png" style="width:100%">
                          
                        </div>
                        <div class="mySlides fade">
                          <img src="<?php echo ABSOLUTE_URL;?>/img/4.jpg" style="width:100%">
                          
                        </div>
                        <div class="mySlides fade">
                          <img src="<?php echo ABSOLUTE_URL;?>/img/5.jpg" style="width:100%">
                          
                        </div>
                        <div class="mySlides fade">
                          <img src="<?php echo ABSOLUTE_URL;?>/img/6.jpg" style="width:100%">
                          
                        </div>


                        <div class="mySlides fade">
                          <img src="<?php echo ABSOLUTE_URL;?>/img/3.jpg" style="width:100%">
                        </div>

                        </div>
                        <br>

                        <div style="text-align:center">
                          <span class="dot"></span> 
                          <span class="dot"></span> 
                          <span class="dot"></span>
                          <span class="dot"></span> 
                          <span class="dot"></span> 
                        </div>

                        <script>
                        var slideIndex = 0;
                        showSlides();

                        function showSlides() {
                            var i;
                            var slides = document.getElementsByClassName("mySlides");
                            var dots = document.getElementsByClassName("dot");
                            for (i = 0; i < slides.length; i++) {
                               slides[i].style.display = "none";  
                            }
                            slideIndex++;
                            if (slideIndex> slides.length) {slideIndex = 1}    
                            for (i = 0; i < dots.length; i++) {
                                dots[i].className = dots[i].className.replace(" active", "");
                            }
                            slides[slideIndex-1].style.display = "block";  
                            dots[slideIndex-1].className += " active";
                            setTimeout(showSlides, 4000); // Change image every 2 seconds
                        }
                        </script>
        <div class="templatemo-welcome" id="templatemo-welcome">
            <div class="container">
                <div class="templatemo-slogan text-center">
                    <span class="txt_darkgrey">Welcome to </span><span class="txt_orange">Fortune Power</span>
                    <p class="txt_slogan"><i>Lorem ipsum dolor sit amet, consect adipiscing elit. Etiam metus libero mauriec ignissim fermentum.</i></p>
                </div>  
            </div>
        </div>
        
        <div class="templatemo-service">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="templatemo-service-item">
                            <div>
                                <img src="<?php echo ABSOLUTE_URL;?>/img/leaf.png" alt="icon" />
                                <span class="templatemo-service-item-header">AWESOME ICONS</span>
                            </div>
                            <p>Nam porta adipiscing tortor, eget rutrum turpis bibendum ut. Donec eu lacus in diam euismod imperdiet eu ut turpis. Morbi felis orci, tincidunt pretium laoreet id, euismod et lacus. Praesent aliquet magna vitae mi elementum pharetra.</p>
                            <div class="text-center">
                                <a href="#" 
                                    class="templatemo-btn-read-more btn btn-orange">READ MORE</a>
                            </div>
                            <br class="clearfix"/>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="templatemo-service-item">
                            <div>
                                <img src="<?php echo ABSOLUTE_URL;?>/img/mobile.png" alt="icon"/>
                                <span class="templatemo-service-item-header">FULLY RESPONSIVE</span>
                            </div>
                            <p>Fortune is a Money creating web portal that is available for free instant . Credits go to <a rel="nofollow" href="http://getbootstrap.com" target="_parent">Bootstrap</a> and <a rel="nofollow" href="http://unsplash.com" target="_parent">Fortune Power</a>  You may spread a word about Fortune. Thank you.</p>
                            <div class="text-center">
                                <a href="#" 
                                    class="templatemo-btn-read-more btn btn-orange">READ MORE</a>
                            </div>
                            <br class="clearfix"/>
                        </div>
                        
                    </div>
                    
                    <div class="col-md-4">
                        <div class="templatemo-service-item">
                            <div>
                                <img src="<?php echo ABSOLUTE_URL;?>/img/battery.png" alt="icon"/>
                                <span class="templatemo-service-item-header">HIGH EFFICIENCY</span>
                            </div>
                            <p>Morbi imperdiet ipsum sit amet dui pharetra, vulputate porta neque tristique. Quisque id turpis tristique, venenatis erat sit amet, venenatis turpis. Ut tellus ipsum, posuere bibendum consectetur vel, egestas sit amet erat. Morbi rhoncus leo fermentum viverra.</p>
                            <div class="text-center">
                                <a href="#" 
                                    class="templatemo-btn-read-more btn btn-orange">READ MORE</a>
                            </div>
                            <br class="clearfix"/>
                        </div>
                        <br class="clearfix"/>
                    </div>
                </div>
            </div>
        </div>
<div id="plan" style=" background-image:url(http://localhost/cakephp/images/money3.jpg); background-repeat:repeat-x; padding-top:10px; padding-bottom:10px;">
    <div class="container">
        <div class="row well" style="">
            <div class="top_grid_top" style=" border:1px solid# CCC; border-radius:5px;  ">
                <div class="col-md-12 span1_of_1">
                    <h3 style="color:#000;">Welcome To Fortune Power</h3>
                    <p>
                        We are an International Direct Selling Company having Alliances and Channel partners all  across the World. 
                        We are one of the fastest growing  Companies in the Network Marketing Industry today and are creating waves with our superb and revolutionary line of products meshed with a Global Business Opportunity.

                            Our turnkey Business system is the finest in the industry which has been 
                            acclaimed and validated by Experts from around the globe.
                          <br>      
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="row well">
            <h4 class="text-success"><strong>Opportunity</strong></h4>
            <table class="table table-striped ">
                <p style="font-size: 18px;"><strong>There are 5 types of income in this plan.*</strong></p>
                  <tr class="white-bg" >
                    <td>
                        <ul>
                            <li><strong>1: WORKING ZONE </strong></li> 
                            <li><strong>2: ACTIVE ZONE  </strong></li>
                            <li><strong>3: SAFE ZONE </strong></li>
                            <li><strong>4: AWARDS & REWARDS</strong></li>
                            <li><strong>5: ROYALITY </strong></li>
                        </ul>
                    </td>
                </tr>
            </table>
            <div class="clearfix" style="margin-top:15px!important;"></div>
            <table class="table table-striped">
                <tr><strong >WORKING ZONE</strong></tr>
                <tr class="text-center">
                    <td><strong>Lavel</strong></td>
                    <td><strong>Working Zone</strong></td>
                    <td><strong>No of Re-Entries</strong></td>
                    <td><strong>Distribution Amount</strong></td>
                    <td><strong>Gross Income</strong></td>
                    <td><strong>Less Re-Entry Amount</strong></td>
                    <td><strong>Net Income</strong></td>
                </tr>
                <tr style="color:#5e001b;" class="text-center"><td><strong>0</strong></td><td><strong>1</strong></td>  <td><strong> </strong></td>  <td><strong> </strong></td>  <td><strong> </strong></td>  <td><strong> </strong></td>  <td><strong> </strong></td></tr>
                <tr style="color:#5e001b;" class="text-center"><td><strong>1</strong></td>  <td><strong>3</strong></td>  <td><strong> </strong></td>  <td><strong>250</strong></td>  <td><strong>750</strong></td>  <td><strong> </strong></td>  <td><strong>750</strong></td></tr>
                <tr style="color:#5e001b;" class="text-center"><td><strong>2</strong></td>  <td><strong>9</strong></td>  <td><strong> </strong></td>  <td><strong>175</strong></td>  <td><strong>1575</strong></td> <td><strong> </strong></td>  <td><strong>1575</strong></td></tr>
                <tr style="color:#5e001b;" class="text-center"><td><strong>3</strong></td>  <td><strong>27</strong></td> <td><strong>1</strong></td>  <td><strong>150</strong></td>  <td><strong>4050</strong></td> <td><strong>2000</strong></td> <td><strong>2050</strong></td></tr>
                <tr style="color:#5e001b;" class="text-center"><td><strong>4</strong></td>  <td><strong>81</strong></td> <td><strong>0</strong></td>  <td><strong>50</strong></td> <td><strong>4050</strong></td> <td><strong>0</strong></td>  <td><strong>4050</strong></td></tr>
                <tr style="color:#5e001b;" class="text-center"><td><strong>5</strong></td>  <td><strong>243</strong></td>  <td><strong>3</strong></td>  <td><strong>50</strong></td> <td><strong>12150</strong></td>  <td><strong>6000</strong></td> <td><strong>6150</strong></td></tr>
                <tr style="color:#5e001b;" class="text-center"><td><strong>6</strong></td>  <td><strong>729</strong></td>  <td><strong> </strong></td>  <td><strong>50</strong></td> <td><strong>36450</strong></td>  <td><strong> </strong></td>  <td><strong>36450</strong></td></tr>
                <tr style="color:#5e001b;" class="text-center"><td><strong>7</strong></td>  <td><strong>2187</strong></td> <td><strong> </strong></td>  <td><strong>100</strong></td>  <td><strong>218700</strong></td> <td><strong> </strong></td>  <td><strong>218700</strong></td></tr>
                <tr style="color:#5e001b;" class="text-center"><td><strong>8</strong></td>  <td><strong>6561</strong></td> <td><strong> </strong></td>  <td><strong>300</strong></td>  <td><strong>1968300</strong></td>  <td><strong> </strong></td>  <td><strong>1968300</strong></td></tr>
                <tr style="color:#5e001b;" class="text-center"><td><strong>9</strong></td>  <td><strong>19683</strong></td>  <td><strong> </strong></td>  <td><strong>400</strong></td>  <td><strong>7873200</strong></td>  <td><strong> </strong></td>  <td><strong>7873200</strong></td>
                </tr>
                <tr style="color:#5e001b;" class="text-center"><td></td><td></td><td></td><td></td><td></td><td><strong>Total income</strong></td><td><strong>10111225</strong></td></tr>
            </table>
            <table class="table table-striped">
                <tr><strong >ACTIVE ZONE :</strong></tr><br />
                <p class="text-info"><strong >If you are a active participate of the company n do 3 direct in your structure and complete 1st lavel then u will comes in all india pool in company where automatic ids sets which is comes from all over india ant its will gives the income of approx 20 times on your invested which is approx 40000rs</strong></p>
            </table> 
            <table class="table table-striped">
                <tr><strong >SAFE ZONE :</strong></tr><br />
                <p class="text-info"><strong >If you are a ordinary participate of the company and not complete any lavel then u will comes in all india pool in company where automatic ids sets which is comes from all over india ant its will gives the income of principle which is 2000rs </strong></p>
            </table>
            <div class="clearfix"></div>
            <table class="table table-striped">
                <tr><strong >AWARDS & REWARDS</strong></tr><br />
                <p class="text-info"><strong>reward is in a commulative</strong></p>
                  <tr class="text-center"><td><strong>Lavel</strong></td>  <td><strong>Time Period</strong></td>  <td><strong>Award & Reward </strong></td></tr>
                  <tr style="color:#5e001b;" class="text-center"><td><strong>3rd lavel</strong></td>  <td><strong>1 month </strong></td> <td><strong>smart phone</strong></td></tr>
                  <tr style="color:#5e001b;" class="text-center"><td><strong>5th lavel </strong></td> <td><strong>2 month</strong></td>  <td><strong>laptop</strong></td></tr>
                 <tr style="color:#5e001b;" class="text-center"> <td><strong>7th lavel </strong></td> <td><strong>3 month </strong></td> <td><strong>bike</strong></td></tr>
                  <tr style="color:#5e001b;" class="text-center"><td><strong>8th lavel </strong></td> <td><strong>4 month </strong></td> <td><strong>Nano</strong></td></tr>
                  <tr style="color:#5e001b;" class="text-center"><td><strong>9th lavel </strong></td> <td><strong>5 month</strong></td>  <td><strong>honda city</strong></td> </tr>
            </table> 
             <table class="table table-striped">
                <tr><strong >TEARMS & CONDITIONS* :</strong></tr><br /><br />
                <p class="text-info"><strong> Frist participate have to pay 500 for pin
                then 1500rs have to do the payment via link </strong></p>
                <p class="text-info"><strong>Only 1 ID can be registered on 1 mobile number</strong></p>
                <p class="text-info"><strong> Income withdrawal on weekend every Saturday  n get help links comes on monday</strong></p>
                <p class="text-info"><strong>Active Zone & Safe Zone income will b given with the help of all india pool</strong></p>
                <p class="text-success"><strong>All the best for all achivers in Fortune Power</strong></p>
            </table>
        </div>
    </div>
</div>
<div class="clearfix"></div>
</div></div>
        <div class="templatemo-team" id="templatemo-about">
            <div class="container">
                <div class="row">
                    <div class="templatemo-line-header">
                        <div class="text-center">
                            <hr class="team_hr team_hr_left"/><span>MEET OUR TEAM</span>
                            <hr class="team_hr team_hr_right" />
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
                    <ul class="row row_team">
                        <li class="col-lg-3 col-md-3 col-sm-6 ">
                            <div class="text-center">
                                <div class="member-thumb">
                                    <img src="<?php echo ABSOLUTE_URL;?>/img/member1.jpg" class="img-responsive" alt="member 1" />
                                    <div class="thumb-overlay">
                                        <a href="#"><span class="social-icon-fb"></span></a>
                                        <a href="#"><span class="social-icon-twitter"></span></a>
                                        <a href="#"><span class="social-icon-linkedin"></span></a>
                                    </div>
                                </div>
                                <div class="team-inner">
                                    <p class="team-inner-header">TRACY</p>
                                    <p class="team-inner-subtext">Designer</p>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-6 ">
                            <div class="text-center">
                                <div class="member-thumb">
                                    <img src="<?php echo ABSOLUTE_URL;?>/img/member2.jpg" class="img-responsive" alt="member 2" />
                                    <div class="thumb-overlay">
                                        <a href="#"><span class="social-icon-fb"></span></a>
                                        <a href="#"><span class="social-icon-twitter"></span></a>
                                        <a href="#"><span class="social-icon-linkedin"></span></a>
                                    </div>
                                </div>
                                <div class="team-inner">
                                    <p class="team-inner-header">MARY</p>
                                    <p class="team-inner-subtext">Developer</p>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-6 ">
                            <div class="text-center">
                                <div class="member-thumb">
                                    <img src="<?php echo ABSOLUTE_URL;?>/img/member3.jpg" class="img-responsive" alt="member 3" />
                                    <div class="thumb-overlay">
                                        <a href="#"><span class="social-icon-fb"></span></a>
                                        <a href="#"><span class="social-icon-twitter"></span></a>
                                        <a href="#"><span class="social-icon-linkedin"></span></a>
                                    </div>
                                </div>
                                <div class="team-inner">
                                    <p class="team-inner-header">JULIA</p>
                                    <p class="team-inner-subtext">Director</p>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-6 ">
                            <div class="text-center">
                                <div class="member-thumb">
                                    <img src="<?php echo ABSOLUTE_URL;?>/img/member4.jpg" class="img-responsive" alt="member 4" />
                                    <div class="thumb-overlay">
                                        <a href="#"><span class="social-icon-fb"></span></a>
                                        <a href="#"><span class="social-icon-twitter"></span></a>
                                        <a href="#"><span class="social-icon-linkedin"></span></a>
                                    </div>
                                </div>
                                <div class="team-inner">
                                    <p class="team-inner-header">LINDA</p>
                                    <p class="team-inner-subtext">Manager</p>
                                </div>
                            </div>
                        </li>
                    </ul>
            </div>
        </div><!-- /.templatemo-team -->

    <?php /*    <div id="templatemo-portfolio" >
            <div class="container">
                <div class="row">
                    <div class="templatemo-line-header" >
                        <div class="text-center">
                            <hr class="team_hr team_hr_left hr_gray"/><span class="txt_darkgrey">OUR PORTFOLIO</span>
                            <hr class="team_hr team_hr_right hr_gray" />
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="templatemo-gallery-category" style="font-size:16px; margin-top:80px;">
                        <div class="text-center">
                            <a class="active" href=".gallery">All</a> / <a href=".gallery-design">Web Design </a>/ <a href=".gallery-graphic">Graphic</a> / <a href=".gallery-inspiration">Inspiration</a> / <a href=".gallery-creative">Creative</a>                           
                        </div>
                    </div>
                </div> <!-- /.row -->


                <div class="clearfix"></div>
                <div class="text-center">
                    <ul class="templatemo-project-gallery" >
                        <li class="col-lg-2 col-md-2 col-sm-2  gallery gallery-graphic" >
                            <a class="colorbox" href="<?php echo ABSOLUTE_URL;?>/img/full-gallery-image-1.jpg" data-group="gallery-graphic">
                                <div class="templatemo-project-box">

                                    <img src="<?php echo ABSOLUTE_URL;?>/img/gallery-image-1.jpg" class="img-responsive" alt="gallery" />

                                    <div class="project-overlay">
                                        <h5>Graphic</h5>
                                        <hr />
                                        <h4>TEA POT</h4>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="col-lg-2 col-md-2 col-sm-2  gallery gallery-creative" >
                            <a class="colorbox" href="<?php echo ABSOLUTE_URL;?>/img/full-gallery-image-2.jpg" data-group="gallery-creative">
                                <div class="templatemo-project-box">
                                    <img src="<?php echo ABSOLUTE_URL;?>/img/gallery-image-2.jpg" class="img-responsive" alt="gallery" />
                                    <div class="project-overlay">
                                        <h5>Creative</h5>
                                        <hr />
                                        <h4>BREAKFAST</h4>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="col-lg-2 col-md-2 col-sm-2  gallery gallery-inspiration" >
                            <a class="colorbox" href="<?php echo ABSOLUTE_URL;?>/img/full-gallery-image-3.jpg" data-group="gallery-inspiration">
                                <div class="templatemo-project-box">
                                    <img src="<?php echo ABSOLUTE_URL;?>/img/gallery-image-3.jpg" class="img-responsive" alt="gallery" />
                                    <div class="project-overlay">
                                        <h5>Inspiration</h5>
                                        <hr />
                                        <h4>GREEN COLORS</h4>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="col-lg-2 col-md-2 col-sm-2  gallery gallery-design" >
                            <a class="colorbox" href="<?php echo ABSOLUTE_URL;?>/img/full-gallery-image-4.jpg" data-group="gallery-design">
                                <div class="templatemo-project-box">
                                    <img src="<?php echo ABSOLUTE_URL;?>/img/gallery-image-4.jpg" class="img-responsive" alt="gallery" />
                                    <div class="project-overlay">
                                        <h5>Web Design</h5>
                                        <hr />
                                        <h4>CAMERA</h4>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="col-lg-2 col-md-2 col-sm-2  gallery gallery-inspiration" >
                            <a class="colorbox" href="<?php echo ABSOLUTE_URL;?>/img/full-gallery-image-5.jpg" data-group="gallery-inspiration">
                                <div class="templatemo-project-box">
                                    <img src="<?php echo ABSOLUTE_URL;?>/img/gallery-image-5.jpg" class="img-responsive" alt="gallery" />
                                    <div class="project-overlay">
                                        <h5>Inspiration</h5>
                                        <hr />
                                        <h4>PLANT</h4>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="col-lg-2 col-md-2 col-sm-2  gallery gallery-inspiration" >
                            <a class="colorbox" href="<?php echo ABSOLUTE_URL;?>/img/full-gallery-image-6.jpg" data-group="gallery-inspiration">
                                <div class="templatemo-project-box">
                                    <img src="<?php echo ABSOLUTE_URL;?>/img/gallery-image-6.jpg" class="img-responsive" alt="gallery" />
                                    <div class="project-overlay">
                                        <h5>Inspiration</h5>
                                        <hr />
                                        <h4>CABLE TRAIN</h4>
                                    </div>
                                </div>
                            </a>
                        </li>
                        
                        <li class="col-lg-2 col-md-2 col-sm-2 gallery gallery-design" >
                            <a class="colorbox" href="<?php echo ABSOLUTE_URL;?>/img/full-gallery-image-7.jpg" data-group="gallery-design">
                                <div class="templatemo-project-box">
                                    <img src="<?php echo ABSOLUTE_URL;?>/img/gallery-image-7.jpg" class="img-responsive" alt="gallery" />
                                    <div class="project-overlay">
                                        <h5>Web Design</h5>
                                        <hr />
                                        <h4>CITY</h4>
                                    </div>
                                </div>
                            </a>
                        </li>
                        
                        <li class="col-lg-2 col-md-2 col-sm-2 gallery gallery-creative" >
                            <a class="colorbox" href="<?php echo ABSOLUTE_URL;?>/img/full-gallery-image-8.jpg" data-group="gallery-creative">
                                <div class="templatemo-project-box">
                                    <img src="<?php echo ABSOLUTE_URL;?>/img/gallery-image-8.jpg" class="img-responsive" alt="gallery" />
                                    <div class="project-overlay">
                                        <h5>Creative</h5>
                                        <hr />
                                        <h4>BIRDS</h4>
                                    </div>
                                </div>
                            </a>
                        </li>
                        
                        <li class="col-lg-2 col-md-2 col-sm-2 gallery gallery-graphic" >
                            <a class="colorbox" href="<?php echo ABSOLUTE_URL;?>/img/full-gallery-image-9.jpg" data-group="gallery-graphic">
                                <div class="templatemo-project-box">
                                    <img src="<?php echo ABSOLUTE_URL;?>/img/gallery-image-9.jpg" class="img-responsive" alt="gallery" />
                                    <div class="project-overlay">
                                        <h5>Graphic</h5>
                                        <hr />
                                        <h4>NATURE</h4>
                                    </div>
                                </div>
                            </a>
                        </li>
                        
                        <li class="col-lg-2 col-md-2 col-sm-2 gallery gallery-inspiration" >
                            <a class="colorbox" href="<?php echo ABSOLUTE_URL;?>/img/full-gallery-image-10.jpg" data-group="gallery-inspiration">
                                <div class="templatemo-project-box">
                                    <img src="<?php echo ABSOLUTE_URL;?>/img/gallery-image-10.jpg" class="img-responsive" alt="gallery" />
                                    <div class="project-overlay">
                                        <h5>Inspiration</h5>
                                        <hr />
                                        <h4>DOGGY</h4>
                                    </div>
                                </div>
                            </a>
                        </li>

                    </ul><!-- /.gallery -->
                </div>
                <div class="clearfix"></div>
                <div class="row text-center">
                    <a class="btn_loadmore btn btn-lg btn-orange" href="#" role="button">LOAD MORE</a>
                </div>
            </div><!-- /.container -->
        </div> <!-- /.templatemo-portfolio -->

        <div id="templatemo-blog">
            <div class="container">
                <div class="row">
                    <div class="templatemo-line-header" style="margin-top: 0px;" >
                        <div class="text-center">
                            <hr class="team_hr team_hr_left hr_gray"/><span class="span_blog txt_darkgrey">BLOG POSTS</span>
                            <hr class="team_hr team_hr_right hr_gray" />
                        </div>
                    </div>
                    <br class="clearfix"/>
                </div>
                
                <div class="blog_box">
                    <div class="col-sm-5 col-md-6 blog_post">
                        <ul class="list-inline">
                            <li class="col-md-4">
                                <a href="#">
                                    <img class="img-responsive" src="<?php echo ABSOLUTE_URL;?>/img/blog-image-1.jpg" alt="gallery 1" />
                                </a>
                            </li>
                            <li  class="col-md-8">
                                <div class="pull-left">
                                    <span class="blog_header">GRAPHIC DESIGN</span><br/>
                                    <span>Posted by : <a class="link_orange" href="#"><span class="txt_orange">Tracy</span></a></span>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-orange" href="#" role="button">21 February 2084</a>
                                </div>
                                <div class="clearfix"> </div>
                                <p class="blog_text">
                                    Aliquam quis rutrum risus, ut condimentum ipsum. Nullam aliquet libero augue, eget auctor felis vulputate id. Proin a enim eu libero ornare malesuada. Sed iaculis fringilla lacinia. Sed laoreet lectus vitae [...]
                                </p>
                            </li>
                        </ul>
                    </div> <!-- /.blog_post 1 -->
                    
                    <div class="col-sm-5 col-md-6 blog_post">
                        <ul class="list-inline">
                            <li class="col-md-4"><a href="#">
                                <img class="img-responsive" src="<?php echo ABSOLUTE_URL;?>/img/blog-image-2.jpg" alt="gallery 2" /></a>
                            </li>
                            <li class="col-md-8">
                                <div class="pull-left">
                                    <span class="blog_header">WEBSITE TEMPLATE</span><br/>
                                    <span>Posted by : <a class="link_orange" href="#"><span class="txt_orange">Mary</span></a></span>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-orange" href="#" role="button">18 February 2084</a>
                                </div>
                                <div class="clearfix"> </div>
                                <p class="blog_text">
                                        Morbi imperdiet ipsum sit amet dui pharetra, vulputate porta neque tristique. Quisque id turpis tristique, venenatis erat sit amet, venenatis turpis. Ut tellus ipsum, posuere bibendum [...]
                                </p>
                            </li>
                        </ul>   
                    </div><!-- /.blog_post 2 -->
                    
                    <div class="templatemo_clear"></div>
                    
                    <div class="col-sm-5 col-md-6 blog_post">
                        <ul class="list-inline">
                            <li class="col-md-4"><a href="#">
                                <img class="img-responsive" src="<?php echo ABSOLUTE_URL;?>/img/blog-image-2.jpg" alt="gallery 3" /></a>
                            </li>
                            <li class="col-md-8">
                                <div class="pull-left">
                                    <span class="blog_header">WEB DEVELOPMENT</span><br/>
                                    <span>Posted by : <a class="link_orange" href="#"><span class="txt_orange">Julia</span></a></span>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-orange" href="#" role="button">14 February 2084</a>
                                </div>
                                <div class="clearfix"> </div>
                                <p class="blog_text">
                                        Fusce molestie tellus risus, id commodo turpis convallis id. Morbi mattis sapien sapien, vitae lacinia ante interdum sit amet. Praesent eget varius diam, ac tempor est. Mauris at scelerisque magna [...]
                                </p>
                            </li>
                        </ul>   
                    </div><!-- /.blog_post 3 -->
                    
                    <div class="col-sm-5 col-md-6 blog_post">
                        <ul class="list-inline">
                            <li class="col-md-4">
                                <a href="#">
                                    <img class="img-responsive" src="<?php echo ABSOLUTE_URL;?>/img/blog-image-1.jpg"  alt="gallery 4" />
                                </a>
                            </li>
                            <li class="col-md-8">
                                <div class="pull-left">
                                    <span class="blog_header">NEW FLUID LAYOUT</span><br/>
                                    <span>Posted by : <a class="link_orange" href="#"><span class="txt_orange">Linda</span></a></span>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-orange" href="#" role="button">11 February 2084</a>
                                </div>
                                <div class="clearfix"> </div>
                                <p class="blog_text">
                                    In venenatis sodales purus a cursus. Ut consectetur, libero ac elementum tristique, enim ante aliquet mauris, scelerisque congue magna neque ac purus. Aliquam facilisis volutpat odio [...]
                                </p>
                            </li>
                        </ul>
                    </div> <!-- /.blog_post 4 -->
                    
                </div>
            </div>
        </div>

        <div id="templatemo-contact">
            <div class="container">
                <div class="row">
                    <div class="templatemo-line-header head_contact">
                        <div class="text-center">
                            <hr class="team_hr team_hr_left hr_gray"/><span class="txt_darkgrey">CONTACT US</span>
                            <hr class="team_hr team_hr_right hr_gray"/>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="templatemo-contact-map" id="map-canvas"> </div>  
                        <div class="clearfix"></div>
                        <i>You can find us on 80 Dagon Studio, Yankin Street, <span class="txt_orange">Digital Estate</span> in Yangon.</i>
                    </div>
                    <div class="col-md-4 contact_right">
                        <p>Lorem ipsum dolor sit amet, consectetu adipiscing elit pendisse as a molesti.</p>
                        <p><img src="<?php echo ABSOLUTE_URL;?>/img/location.png" alt="icon 1" /> 80 Dagon Studio, Yakin Street, Digital Estate</p>
                        <p><img src="<?php echo ABSOLUTE_URL;?>/img/phone1.png"  alt="icon 2" /> 090-080-0110</p>
                        <p><img src="<?php echo ABSOLUTE_URL;?>/img/globe.png" alt="icon 3" /><a class="link_orange" href="#"><span class="txt_orange">www.company.com</span></a></p>
                        <form class="form-horizontal" action="#">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Name..." maxlength="40" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email..." maxlength="40" />
                            </div>
                            <div class="form-group">
                                <textarea  class="form-control" style="height: 130px;" placeholder="Write down your message..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-orange pull-right">SEND</button>
                        </form>
                            
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /#templatemo-contact -->


        <div class="templatemo-tweets">
            <div class="container">
                <div class="row" style="margin-top:20px;">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-1">
                                <img src="<?php echo ABSOLUTE_URL;?>/img/quote.png" alt="icon" />
                        </div>
                        <div class="col-md-7 tweet_txt" >
                                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit suspendiise as a molesti neque vestibulum,  persiutsor de andues mare fricilus ipsum dolor sit amet cons forukus.</span>
                                <br/>
                                <span class="twitter_user">Moe Moe, Yangon</span>
                        </div>
                        <div class="col-md-2">
                        </div>
                 </div><!-- /.row -->
            </div><!-- /.container -->
        </div>

        <div class="templatemo-partners" >
            <div class="container">
                <div class="row">


                    <div class="templatemo-line-header" >
                        <div class="text-center">
                            <hr class="team_hr team_hr_left hr_gray"/><span class="txt_darkgrey">OUR PARTNERS</span>
                            <hr class="team_hr team_hr_right hr_gray" />
                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="text-center">

                        <div style="margin-top:60px;">
                            <ul class="list-inline">
                                <li class="col-sm-2 col-md-2 templatemo-partner-item">
                                    <a href="#"><img src="<?php echo ABSOLUTE_URL;?>/img/partner1.jpg" class="img-responsive" alt="partner 1" /></a>
                                </li>
                                <li class="col-sm-2 col-md-2 templatemo-partner-item">
                                    <a href="#"><img src="<?php echo ABSOLUTE_URL;?>/img/partner2.jpg" class="img-responsive" alt="partner 2" /></a>
                                </li>
                                <li class="col-sm-2 col-md-2 templatemo-partner-item">
                                    <a href="#"><img src="<?php echo ABSOLUTE_URL;?>/img/partner3.jpg" class="img-responsive" alt="partner 3" /></a>
                                </li>
                                <li class="col-sm-2 col-md-2 templatemo-partner-item">
                                    <a href="#"><img src="<?php echo ABSOLUTE_URL;?>/img/partner4.jpg" class="img-responsive" alt="partner 4" /></a>
                                </li>
                                <li class="col-sm-2 col-md-2 templatemo-partner-item">
                                    <a href="#"><img src="<?php echo ABSOLUTE_URL;?>/img/partner5.jpg" class="img-responsive" alt="partner 5" /></a>
                                </li>
                                <li class="col-sm-2 col-md-2 templatemo-partner-item">
                                    <a href="#"><img src="<?php echo ABSOLUTE_URL;?>/img/partner6.jpg" class="img-responsive" alt="partner 6" /></a>
                                </li>
                            </ul>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        */ ?>
<?php  
    if (!empty($this->params['url']['status'])) {
        if($this->params['url']['status'] == 2){ 
            $alert="You are not registered yet Plese register first";
        } else if ($this->params['url']['status'] == 3) {
            $alert = "You have entered wrong password";
        } else if ($this->params['url']['status'] == 1) {
            $alert = "You are already registered please goto login";
        } else if ($this->params['url']['status'] == 4) {
            $alert = "you have registered successfully please proceed for login";
        }?>
        <script> alert("<?php echo $alert;?>");
             window.location = "<?php echo ABSOLUTE_URL?>"+ "/home_pages/index";
        </script>
        <?php } ?>