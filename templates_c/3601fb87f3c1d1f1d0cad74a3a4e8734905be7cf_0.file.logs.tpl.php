<?php
/* Smarty version 3.1.38, created on 2022-06-02 14:26:47
  from '/var/www/vhosts/infinityofc.com/httpdocs/teste/templates/pages/admin/logs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_6298f2d7b36d61_82354933',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3601fb87f3c1d1f1d0cad74a3a4e8734905be7cf' => 
    array (
      0 => '/var/www/vhosts/infinityofc.com/httpdocs/teste/templates/pages/admin/logs.tpl',
      1 => 1643008044,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:core/header.tpl' => 1,
    'file:core/footer.tpl' => 1,
  ),
),false)) {
function content_6298f2d7b36d61_82354933 (Smarty_Internal_Template $_smarty_tpl) {
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
	<div class="row">
		<div class="col-md-12">
			<div class="main-card mb-3 card">
				<div class="card-body">
				<a class="btn btn-dark" readonly href="index.php?act=admin" role="button">Admin</a>
				<a class="btn btn-primary" href="index.php?act=panel" role="button">Painel de Administração</a>
				<a class="btn btn-success" href="index.php?act=logsadmin" role="button">Logs dos admins</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			
			<div class="row">
				<div class="col-md-12">
					<div class="main-card mb-3 card">
						<div class="card-header"> Logs dos usuários
							<div class="btn-actions-pane-right actions-icon-btn">
								
							</div>
						</div>
					
						<div class="card-body p-2">
							<div class="table-responsive">
								<div class="tab-content">
									<?php if (count($_smarty_tpl->tpl_vars['logs']->value) > 0) {?>
									<table id="example" class="table table-hover">
										<thead class="thead-light">
											<tr>
												<th>#</th>
												<th>Ação</th>
												<th>Usuário</th>
												<th>Cliente</th>
												<th>Data</th>
												<th>Informações</th>
											</tr>
										</thead>
											
										<tbody>
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['logs']->value, 'cheat');
$_smarty_tpl->tpl_vars['cheat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cheat']->value) {
$_smarty_tpl->tpl_vars['cheat']->do_else = false;
?>
											<tr>
												
												<td><?php echo $_smarty_tpl->tpl_vars['cheat']->value['id'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['cheat']->value['action'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['cheat']->value['username'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['cheat']->value['cliente'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['cheat']->value['data'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['cheat']->value['info_adicional'];?>
</td>
											</tr>
											<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
											
										</tbody>
									</table>
									<?php }?>
									
								</div>
							</div>
						</div>
					</div>
				</div>
						
			</div>

		</div>
	</div>
	
</div>
<?php $_smarty_tpl->_subTemplateRender('file:core/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
