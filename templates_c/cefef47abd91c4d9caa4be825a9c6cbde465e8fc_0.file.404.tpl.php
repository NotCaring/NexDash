<?php
/* Smarty version 3.1.38, created on 2022-09-21 21:04:38
  from '/home/u342152564/domains/infinityofc.net/public_html/templates/pages/404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_632ba69694a138_36064225',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cefef47abd91c4d9caa4be825a9c6cbde465e8fc' => 
    array (
      0 => '/home/u342152564/domains/infinityofc.net/public_html/templates/pages/404.tpl',
      1 => 1663800691,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_632ba69694a138_36064225 (Smarty_Internal_Template $_smarty_tpl) {
?>
	<div class="panel panel-danger">
		<div class="panel-heading">
			<h3 class="panel-title">Error 404</h3>
		</div>		
		<div class="panel-body">
			<p>The requested page is not found! :-(</p>
			<p><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php" class="btn btn-default">Back</a></p>
		</div>
	</div>
<?php }
}
