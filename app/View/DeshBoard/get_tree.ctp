
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
<div class="container" style='margin-bottom: 50px;' >
    <h3>Your Team</h3>
    <p>Please click on your id to see your team</p>
    <table>  
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