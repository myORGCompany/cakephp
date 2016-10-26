
<body>	
<section id="inner-headline">
<div class="container">
	<h2 class="pageTitle text-center">Dashboard</h2>
	</div>
	</section>
<div class="container">
	<div class="row">
  	<table width="100%" >
    		<tr class="">
      			<td class="pull-left" >
      			    <a data-toggle="modal" data-target="#giveHelp"><img border="0" src="<?php echo ABSOLUTE_URL;?>/img/givehelp.png" ></a>
      			</td>
            <td class="pull-right">
      			<a data-toggle="modal" data-target="#getHelp"><img border="0" src="<?php echo ABSOLUTE_URL;?>/img/gethelp.png" ></a></td>
    		</tr>
  	</table>
  </div>
  <div class="clearfix"></div>
<?php $cnt= max(count($HelpData['giveHelpData']),count($HelpData['getHelpData']));
for($i=0; $i<$cnt;$i++) { ?>
<div class="row">
    <table width="100%" >
<?php if(!empty($HelpData['giveHelpData'][$i]['GiveHelp']['amount'])) {  ?>
      <tr class=""> 
          <td class=" pull-left " >            
              <div class="thumbnail border-radius caption m-b-3" >
                <img src="<?php echo ABSOLUTE_URL;?>/img/large-help.jpg" class="border-radius" >
                    <div class="row">
                        <div class="m-l-3 pull-left">
                            <table>
                                <tr><td><h4><?php echo $HelpData['giveHelpData'][$i]['GiveHelp']['amount'] ;?></h4></td></tr>
                                <tr> <td>Bank : &nbsp;<?php echo $HelpData['bank']['UserBank']['bank_name'] ;?></td></tr>
                                <tr><td>acct : &nbsp;<?php echo $HelpData['bank']['UserBank']['account_number'] ;?></td></tr>
                                <tr><td>Ifsc :&nbsp;<?php echo $HelpData['bank']['UserBank']['ifsc_code'] ;?></td></tr>
                            </table>
                        </div>
                        <div class="pull-right ">
                            <table>
                                <tr><td><h4>Name:&nbsp;<?php echo $HelpData['userData']['0']['User']['name'] ;?></h4></td></tr>
                                <tr><td>Mobile :&nbsp;<?php echo $HelpData['userData']['0']['User']['mobile'] ;?></td></tr>
                                <tr><td>Attatch Reciept:<input type="file" name="file" value=""></td></tr>
                            </table>
                            <div class="m-r-10 "><a href="javascript:void(0);" id="<?php echo $HelpData['giveHelpData'][$i]['GiveHelp']['id'] ;?>" class="btn btn-primary pull-right border-radius" onclick="submitReq(this.id);" role="button">Submit</a></div>
                            
                        </div>
                    </div>
                
              </div>
          </td> 
<?php }
if(!empty($HelpData['getHelpData'][$i]['GetHelp']['amount'])) { ?>
          <td class=" pull-right " > 
              <div class="thumbnail border-radius caption m-b-3" >
                <img src="<?php echo ABSOLUTE_URL;?>/img/large-help.jpg" class="border-radius" >
                    <div class="row">
                        <div class="pull-right m-r-6">
                            <table class="">
                                <tr><td><h4><?php echo $HelpData['getHelpData'][$i]['GetHelp']['amount'] ;?></h4></td></tr>
                            </table>
                        </div>
                        <div class=" m-l-6 pull-left">
                            <table>
                                <tr><td><h4>Name:&nbsp;<?php echo $HelpData['userData']['0']['User']['name'] ;?></h4></td></tr>
                                <tr><td>Mobile : <?php echo $HelpData['userData']['0']['User']['mobile'] ;?></td></tr>
                            </table> 
                        </div>
                    </div>
                    <div class="caption m-b-6">
                            <a href="javascript:void(0);" class="btn btn-primary pull-right border-radius" id="<?php echo $HelpData['getHelpData'][$i]['GetHelp']['id'] ;?>" role="button" onclick="acceptReq(this.id);">Accept</a>
                            <button class="btn btn-primary pull-left border-radius">View Reciept</button>
                    </div>
              </div>
          </td> 
           </tr>
<?php }  ?>
    </table>
</div>
<div class="clearfix"></div>
<?php } ?>
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
  .m-r-10{
    margin-right: 10%;
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
<div id="giveHelp" class="modal fade" role="dialog">
  <div class="modal-dialog modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Give Help</h4>
      </div>
     				 <div class="modal-body well ">

					      <form method="POST" action="" data-toggle="validator" novalidate="novalidate">
                          <div class="row">
					        <div class="form-group control-group col-xs-5 pull-left">
					            <label for="amount" class="control-label">Select Amount</label>
								<select class="form-control " id="sel1">
                    <option>Select Amount</option>
								<?php for ($i=5000;$i<=100000;$i+=5000) { ?>
                        <option><?php echo $i;?></option>
                <?php } ?>
								</select>
							</div>

							<div class=" pull-right  m-r-t ">
					        <button type="submit" class="btn btn-default btn-primary" data-dismiss="modal" onclick="giveHelpSubmit();">Submit</button>
					      </div>
                          </div>
					      <div class="modal-footer btn-footer padding-0">
					        <button type="button" class="btn btn-default btn-primary pull-left" data-dismiss="modal">Close</button>
					      </div>
					      </form>

					      </div>
					      
 

  </div>

</div>
<div id="getHelp" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Get Help</h4>
      </div>
      <div class="modal-body well ">

                          <form method="POST" action="" data-toggle="validator" novalidate="novalidate">
                          <div class="row">
                            <div class="form-group control-group col-xs-5 pull-left">
                                <label for="amount" class="control-label">Select Amount</label>
                                     <option>Select Amount</option>
                                <select class="form-control " id="sel2">
                                <?php for ($i=1000;$i<=100000;$i+=1000) { ?>
                                <option><?php echo $i;?></option>
                                <?php } ?>
                                </select>
                            </div>

                            <div class=" pull-right  m-r-t ">
                            <button type="submit" class="btn btn-default btn-primary" data-dismiss="modal" onclick="getHelpSubmit();">Submit</button>
                          </div>
                          </div>
                          <div class="modal-footer btn-footer padding-0">
                            <button type="button" class="btn btn-default btn-primary pull-left" data-dismiss="modal">Close</button>
                          </div>
                          </form>

                          </div>
                          
      
    </div>

  </div>

</div>
<?php echo $this->element('bankForm'); ?>
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
	function giveHelpSubmit(){
		var optn = $("#sel1").val();
		$.ajax({
            url:'<?php echo ABSOLUTE_URL;?>/desh_board/giveHelp/'+optn,
            method:'post',
            data: {amount:optn},
            success: function (data) {
                alert("Your request submitted successfully");
            },
            error: function (){
                alert('Something went wrong..');
            }
        });
	}
    function getHelpSubmit() {
        var optn = $("#sel2").val();
        $.ajax({
            url:'<?php echo ABSOLUTE_URL;?>/desh_board/getHelp/',
            method:'post',
            data: {amount:optn},
            success: function (data) {
                alert("Your request submitted successfully");
            },
            error: function (){
                alert('Something went wrong..');
            }
        });
    }
    function acceptReq(id){
        $.ajax({
            url:'<?php echo ABSOLUTE_URL;?>/desh_board/acceptGetHelp',
            method:'post',
            data: {id: id},
            success: function (data) {
                alert("Accepted successfully");
                window.location.reload();
            },
            error: function (){
                alert('Something went wrong..');
            }
        });
    }
    function submitReq(id){
        $.ajax({
            url:'<?php echo ABSOLUTE_URL;?>/desh_board/submitGiveHelp',
            method:'post',
            data: {id: id},
            success: function (data) {
                alert("Accepted successfully");
                window.location.reload();
            },
            error: function (){
                alert('Something went wrong..');
            }
        });
    }

</script>
 <?php if (isset($this->params['url']['bankDetails']) && $this->params['url']['bankDetails'] == 1) { ?>
  <script>
          alert("Thanks to update your bank details");
          window.location = "<?php echo ABSOLUTE_URL.'/home_pages/deshBoard/'?>";</script>
     
    <?php } ?>