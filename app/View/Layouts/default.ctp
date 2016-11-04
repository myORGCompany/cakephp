<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to Fortune Power </title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
<script src="<?php echo ABSOLUTE_URL;?>/js/jquery.min.js"></script> 
<script src="<?php echo ABSOLUTE_URL;?>/js/bootstrap.min.js"  type="text/javascript"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel="shortcut icon" href="PUT YOUR FAVICON HERE">-->
        
        <!-- Google Web Font Embed -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        
        <!-- Bootstrap core CSS -->
        <link href="<?php echo ABSOLUTE_URL;?>/css/bootstrap.css" rel='stylesheet' type='text/css'>

        <!-- Custom styles for this template -->
        <link href="<?php echo ABSOLUTE_URL;?>/css/style.css"  rel='stylesheet' type='text/css'>
        <link href="<?php echo ABSOLUTE_URL;?>/css/templatemo_style.css"  rel='stylesheet' type='text/css'>

    </head> 
<body>
  <?php 


echo $this->element('top_navigation'); 
echo $this->element('registration');
//echo 'jwkqdjwqd'.$this->Session->read('pop'); die;
if($this->Session->read('pop') !=1 ){
    echo $this->element('popup');
}

  ?>

	<div id="container">
		
		<div id="content">
			<?php echo $this->fetch('content'); ?>

		</div>
		<div id="footer">
			
			<p>
				
			</p>
		</div>
	</div>
    <?php echo $this->element('footer'); ?>

</body>
</html>
