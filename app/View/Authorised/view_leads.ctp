<div class="container "> 
<div class="row well ">
    <h2 class="text-danger text-center">Wellcome <?php echo $this->Session->read('User.name');?></h2>
</div>
    <div class="row well ">
    <h4 class="text-info">Visitors list</h4>
        <table class="table-striped  table text-center ">
            <tr>
                <td class="col-xs-2">Name</td>
                <td class="text-center col-xs-2">Email</td>
                <td class="text-center col-xs-2">Mobile</td>
                <td class="text-center col-xs-2">Comments</td>
                <td class="text-center col-xs-2">Date</td>
                <td class="text-center col-xs-2">Source</td>
            </tr>
            <?php foreach ($leads as $key => $value) { ?>
                <tr>
                    <td><?php echo $value['PopLead']['name'];?></td>
                    <td><?php echo $value['PopLead']['email'];?></td>
                    <td><?php echo $value['PopLead']['mobile'];?></td>
                    <td><?php echo $value['PopLead']['comments'];?></td>
                    <td><?php echo $value['PopLead']['created'];?></td>
                    <td><?php echo $value['PopLead']['source'];?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>