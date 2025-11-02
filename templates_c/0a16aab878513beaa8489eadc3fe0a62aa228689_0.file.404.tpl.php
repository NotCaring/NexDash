<?php
/* Smarty version 3.1.38, created on 2022-01-28 16:28:35
  from '/home/u129344762/domains/ninjacheat.xyz/public_html/templates/pages/404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_61f443e32e00c5_93131315',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a16aab878513beaa8489eadc3fe0a62aa228689' => 
    array (
      0 => '/home/u129344762/domains/ninjacheat.xyz/public_html/templates/pages/404.tpl',
      1 => 1642997245,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61f443e32e00c5_93131315 (Smarty_Internal_Template $_smarty_tpl) {
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
