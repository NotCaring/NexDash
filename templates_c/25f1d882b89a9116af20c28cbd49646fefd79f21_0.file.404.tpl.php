<?php
/* Smarty version 3.1.38, created on 2024-01-07 18:44:38
  from '/home5/qpnbvfcj/public_html/templates/pages/404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_659b1b46e92d87_87328010',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '25f1d882b89a9116af20c28cbd49646fefd79f21' => 
    array (
      0 => '/home5/qpnbvfcj/public_html/templates/pages/404.tpl',
      1 => 1691691730,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659b1b46e92d87_87328010 (Smarty_Internal_Template $_smarty_tpl) {
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
