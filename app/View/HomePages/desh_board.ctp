
<body>	
<section id="inner-headline">
  <h2 class="pageTitle text-center">Wellcome <?php echo $this->Session->read('User.name');?></h2>
</section>
<div class="container">
	<div class="text-center row">
  	<img style="margin-top:-27px;" class="img-responsive m-l-18" src="<?php echo ABSOLUTE_URL;?>/img/Network-marketing.jpg">
  </div>
</div>
  </body>

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
 <?php if (isset($this->params['url']['bankDetails']) && $this->params['url']['bankDetails'] == 1) { ?>
  <script>
          alert("Thanks to update your bank details");
          window.location = "<?php echo ABSOLUTE_URL.'/home_pages/deshBoard/'?>";</script>
     
    <?php } ?>