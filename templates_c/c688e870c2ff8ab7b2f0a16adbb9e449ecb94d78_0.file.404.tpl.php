<?php
/* Smarty version 3.1.38, created on 2022-06-15 15:45:28
  from '/var/www/vhosts/infinityofc.com/httpdocs/templates/pages/404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_62aa28c8087b24_87963802',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c688e870c2ff8ab7b2f0a16adbb9e449ecb94d78' => 
    array (
      0 => '/var/www/vhosts/infinityofc.com/httpdocs/templates/pages/404.tpl',
      1 => 1643008044,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62aa28c8087b24_87963802 (Smarty_Internal_Template $_smarty_tpl) {
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
