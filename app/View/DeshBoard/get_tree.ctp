<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ABSOLUTE_URL;?>/css/jquery-treetable.css">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.10/d3.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="<?php echo ABSOLUTE_URL;?>/js/jquery-treetable.js"></script>
    <script>
        $(function() {
            $("table").treetable();
        });
    </script>
    
</head>
<?php $userData = $this->Session->read('User'); ?>
</div>
<div class="container text-center" >
    <h1>Your Team</h1>
    <table align="center" style='margin-top: 50px;'>  
        <tr>
            <td>
                <div class="tt" data-tt-id="<?php echo $userData['email'];?>" data-tt-parent=""><?php echo $userData['email'];?></div>
            </td>
        </tr>      
    <?php foreach ($use as $key => $value) { ?>
        <tr>
            <td>
                <div class="tt" data-tt-id="<?php echo $value['email'];?>" data-tt-parent="<?php echo $value['sponcer'];?>"><?php echo $value['email'];?></div>
            </td>
        </tr>
       <?php 
        } ?>    
    </table>
</div>