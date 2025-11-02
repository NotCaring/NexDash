<?php
/* Smarty version 3.1.38, created on 2025-10-12 20:34:52
  from '/home/u999974013/domains/sftzone.site/public_html/gx/templates/pages/404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_68ec3b1c4cada6_86077456',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '170cec6a376bbc277118d5b8329d6a6b853df2e4' => 
    array (
      0 => '/home/u999974013/domains/sftzone.site/public_html/gx/templates/pages/404.tpl',
      1 => 1760287003,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68ec3b1c4cada6_86077456 (Smarty_Internal_Template $_smarty_tpl) {
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
