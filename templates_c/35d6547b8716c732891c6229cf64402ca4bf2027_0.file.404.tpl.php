<?php
/* Smarty version 3.1.38, created on 2022-06-06 01:07:29
  from '/var/www/vhosts/infinityofc.com/httpdocs/teste/templates/pages/404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_629d7d82000fa1_36232852',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '35d6547b8716c732891c6229cf64402ca4bf2027' => 
    array (
      0 => '/var/www/vhosts/infinityofc.com/httpdocs/teste/templates/pages/404.tpl',
      1 => 1643008044,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629d7d82000fa1_36232852 (Smarty_Internal_Template $_smarty_tpl) {
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
