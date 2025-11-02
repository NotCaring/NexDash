<?php
/* Smarty version 3.1.38, created on 2023-06-18 03:56:10
  from '/home/u695161280/domains/cubanoficial.shop/public_html/templates/pages/404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_648eaa8a9e0823_34055298',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '29c340cf9968064b4a3497dc40811dbfa630244e' => 
    array (
      0 => '/home/u695161280/domains/cubanoficial.shop/public_html/templates/pages/404.tpl',
      1 => 1684790422,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_648eaa8a9e0823_34055298 (Smarty_Internal_Template $_smarty_tpl) {
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
