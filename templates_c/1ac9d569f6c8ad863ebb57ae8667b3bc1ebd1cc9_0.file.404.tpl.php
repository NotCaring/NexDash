<?php
/* Smarty version 3.1.38, created on 2023-08-16 11:45:36
  from '/home/u397551963/domains/hgregeditmod.online/public_html/templates/pages/404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_64dce11029b680_06081185',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ac9d569f6c8ad863ebb57ae8667b3bc1ebd1cc9' => 
    array (
      0 => '/home/u397551963/domains/hgregeditmod.online/public_html/templates/pages/404.tpl',
      1 => 1691680931,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64dce11029b680_06081185 (Smarty_Internal_Template $_smarty_tpl) {
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
