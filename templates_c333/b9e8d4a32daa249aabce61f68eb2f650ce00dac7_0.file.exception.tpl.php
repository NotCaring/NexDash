<?php
/* Smarty version 3.1.38, created on 2022-01-24 01:09:16
  from '/home/u129344762/domains/ninjacheat.xyz/public_html/CHEAT/PainelH13/templates/pages/exception.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_61ee266cd96dc6_07064880',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b9e8d4a32daa249aabce61f68eb2f650ce00dac7' => 
    array (
      0 => '/home/u129344762/domains/ninjacheat.xyz/public_html/CHEAT/PainelH13/templates/pages/exception.tpl',
      1 => 1642997245,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61ee266cd96dc6_07064880 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
img/icon.ico" type="image/x-icon">
		<title><?php echo $_smarty_tpl->tpl_vars['pagename']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
		<link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
css/bootstrap-override.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>
		  <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
		<![endif]-->
		
		
			<style>
				.error-template {padding: 40px 15px;text-align: center;}
				.error-actions {margin-top:15px;margin-bottom:15px;}
				.error-actions .btn { margin-right:10px; }
			</style>
		
	
	</head>

	<body>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="error-template">
					
						<h1>Ooops!</h1>
						<h2>A critical error has occurred!</h2>
						<div class="error-details">
							<?php if ($_smarty_tpl->tpl_vars['error']->value['debug'] == true) {?>
								<?php echo $_smarty_tpl->tpl_vars['error']->value['message'];?>

							<?php }?>
						</div>
						
						<div class="error-actions">
							<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php" class="btn btn-primary btn-lg">
								<span class="glyphicon glyphicon-home"></span>
								Return to Home
							</a>	
						</div>
					</div>
					
				</div>
			</div>
		</div>
	
	</body>

</html><?php }
}
