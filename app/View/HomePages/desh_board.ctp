
<body>	
<section id="inner-headline">
  <h2 id="welcome" class="pageTitle text-center text-danger">Welcome <?php echo $this->Session->read('User.name');?></h2>
  <?php if (!$this->Session->read('User.payment') || $this->Session->read('User.payment') != 1) { ?>
  <span><a data-toggle="modal" data-target="#ActiveNow" class="btn pull-left btn-lg">Go Green</a></span>
  <?php } ?>
<?php echo $this->Session->flash(); ?>
</section>

<div class="container">
	<div class="text-center row">
  	<img style="margin-top:-27px;" class="img-responsive m-l-18" src="<?php echo ABSOLUTE_URL;?>/img/Network-marketing.jpg">
  </div>
</div>
  </body>
<div id="ActiveNow"  class="modal fade" role="dialog">
      <div class="modal-content modal-dialog">
          <div class="modal-header">
              <button id="close" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Go Green Now</h4>
          </div>
          <div class="modal-body">
             <div class="well">
                  <form id="lactivationForm" method="POST" action="<?php echo ABSOLUTE_URL;?>/home_pages/varificationGoGreen" data-toggle="validator" >
                      <div class="form-group control-group">
                          <label for="pin" class="control-label" >Pin</label>
                          <input type="text" class="form-control" id="pin" name="pin" title="Please enter you username" placeholder="Enter your your pin" required>
                          <span class="help-block"></span>
                      </div>
                      <button type="submit" class="btn btn-success btn-block">Login</button>
                  </form>
              </div>  
          </div>
      </div>
  </div>
<?php echo $this->element('bankForm'); ?>
<style type="text/css">
  .border-radius{
    border-radius:15px 50px !important;
  }
  .m-l-3{
    margin-left: 3%;
  }
  .m-l-6{
    margin-left: 6%;
  }
  .m-r-6{
    margin-right: 6%;
  }
  .m-l-18{
    margin-left: 18%;
  }
  .m-r-20{
    margin-right: 20%;
  }
  .m-b-3{
    margin-bottom: 3%;
  }
  .m-b-6{
    margin-bottom: 6%;
  }
</style>
</body>
<style type="text/css">
	#inner-headline {
    background: #e7e7e7;
    border-bottom: 1px solid #cbcbcb;
    color: #358a22;
    height: 80px;
    margin: 0 0 25px;
    padding: 12px 0;
    position: relative;
}
.padding-0{
    padding: 0px 0px 0px;
}
.m-r-r-10{
  margin-right: 10% !important;
}
.m-r-l-10{
    margin-left: 10% !important;
}

.margin-bottom-10{
  margin-bottom: 10%;
  height: 10% !important;
}
.padding-top-10{
   margin-top: 20px;
}
.btn-footer{
    border-top: 0px solid #e5e5e5;
    margin-top: 0px;
    padding: 0px 2px 0px;
    text-align: center;
}
.remove-border{
  border-bottom: 0px solid #e5e5e5;
}
.cardType{
    box-shadow: 0 3px 5px #c9c9c9;
    border-radius: 20px !important;
}
</style>
<script type="text/javascript">
	
</script>
 <?php if ($this->Session->read('User.payment') && $this->Session->read('User.payment') == 1) { ?>
  <script>
          $("#welcome").removeClass('text-danger');</script>
     
  <?php } ?>