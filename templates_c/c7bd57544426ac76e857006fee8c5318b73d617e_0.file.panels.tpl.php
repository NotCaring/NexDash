<?php
/* Smarty version 3.1.38, created on 2022-06-02 00:45:11
  from 'C:\xampp0\htdocs\templates\pages\admin\panels.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_6298324707c964_53505134',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7bd57544426ac76e857006fee8c5318b73d617e' => 
    array (
      0 => 'C:\\xampp0\\htdocs\\templates\\pages\\admin\\panels.tpl',
      1 => 1654141342,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:core/header.tpl' => 1,
    'file:core/footer.tpl' => 1,
  ),
),false)) {
function content_6298324707c964_53505134 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:core/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="app-main__inner">
	<div class="app-page-title app-page-title-simple">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div>
				<div class="page-title-head center-elem">
					<span class="d-inline-block pr-2">
						<i class="fas fa-crown opacity-6"></i>
					</span>
					<span class="d-inline-block"><?php echo $_smarty_tpl->tpl_vars['pagename']->value;?>
</span>
				</div>
				<div class="page-title-subheading opacity-10">
					<nav class="" aria-label="breadcrumb">
						<ol class="breadcrumb">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['breadcrumbs']->value, 'breadcrumb');
$_smarty_tpl->tpl_vars['breadcrumb']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['breadcrumb']->value) {
$_smarty_tpl->tpl_vars['breadcrumb']->do_else = false;
?>
								<?php if ($_smarty_tpl->tpl_vars['breadcrumb']->value['url'] == '') {?>
										<li class="breadcrumb-item active"><a><?php echo $_smarty_tpl->tpl_vars['breadcrumb']->value['caption'];?>
</a></li>
								<?php } else { ?>
										<li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->tpl_vars['breadcrumb']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['breadcrumb']->value['caption'];?>
</a></li>
								<?php }?>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</ol>
					</nav>
				</div>
				</div>
			</div>
		</div>
	</div>
	<?php if (count($_smarty_tpl->tpl_vars['success']->value) > 0) {?>
		<center>
		<div class="alert alert-success d-flex flex-row">
			<i class="fas fa-fw fa-check-circle mr-3 align-self-center"></i>
			<p class="mb-0">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['success']->value, 'text');
$_smarty_tpl->tpl_vars['text']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['text']->value) {
$_smarty_tpl->tpl_vars['text']->do_else = false;
?>
			<li><?php echo $_smarty_tpl->tpl_vars['text']->value;?>
</li>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</p>
				
		</div>
		</center>
	<?php }?>
	<?php if (count($_smarty_tpl->tpl_vars['message']->value) > 0) {?>
		<center>
		<div class="alert alert-danger d-flex flex-row" role="alert">
			
			<p class="mb-0">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['message']->value, 'text');
$_smarty_tpl->tpl_vars['text']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['text']->value) {
$_smarty_tpl->tpl_vars['text']->do_else = false;
?>
			<li><?php echo $_smarty_tpl->tpl_vars['text']->value;?>
</li>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</p>
				
		</div>
		</center>
	<?php }?>
	<div class="row">
		<div class="col-md-12">
			<div class="main-card mb-3 card">
				
					<?php echo $_smarty_tpl->tpl_vars['NewPanel']->value;?>

				<p>
				<center>
					<a href="javascript:parent.history.back();">Voltar</a><br/>
					<a href="index.php?act=admin">Administração</a>
				</center>
				</p>
			</div>
		</div>		
	</div>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:core/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
