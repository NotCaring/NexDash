<?php
/* Smarty version 3.1.38, created on 2022-06-01 11:58:49
  from 'C:\xampp2\htdocs\templates\pages\account\account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_62977ea9363ca0_14828244',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34cf80dd85608170a432ea0e0ca63454240f7b2c' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\templates\\pages\\account\\account.tpl',
      1 => 1643015730,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:core/header.tpl' => 1,
    'file:core/footer.tpl' => 1,
  ),
),false)) {
function content_62977ea9363ca0_14828244 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:core/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="app-main__inner">
<div class="app-page-title app-page-title-simple">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div>
			<div class="page-title-head center-elem">
				<span class="d-inline-block pr-2">
					<i class="fas fa-building opacity-6"></i>
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
		<div class="col-lg-6 col-xl-4">
			<div class="card mb-3 widget-content bg-premium-dark">
				<div class="widget-content-wrapper text-white">
					<div class="widget-content-left">
						<div class="widget-heading">Usuários válidos</div>
						<div class="widget-subheading">Total de clientes válidos</div>
					</div>
					<div class="widget-content-right">
						<div class="widget-numbers text-warning"><span><?php echo $_smarty_tpl->tpl_vars['account']->value['validos'];?>
</span></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-xl-4">
			<div class="card mb-3 widget-content bg-premium-dark">
				<div class="widget-content-wrapper text-white">
					<div class="widget-content-left">
						<div class="widget-heading">Usuários expirados</div>
						<div class="widget-subheading">Total de clientes expirados</div>
					</div>
					<div class="widget-content-right">
						<div class="widget-numbers text-warning"><span> <?php echo $_smarty_tpl->tpl_vars['account']->value['expirados'];?>
</span></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-xl-4">
			<div class="card mb-3 widget-content bg-premium-dark">
				<div class="widget-content-wrapper text-white">
					<div class="widget-content-left">
						<div class="widget-heading">R$ Total</div>
						<div class="widget-subheading">Total de R$</div>
					</div>
					<div class="widget-content-right">
						<div class="widget-numbers text-warning"><span>R$ <?php echo $_smarty_tpl->tpl_vars['account']->value['total'];?>
</span></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="main-card mb-3 card">
				<div class="card-header"> Informações do Mod
					
				</div>
				<div class="card-body p-0">
					
					<div class="table-responsive">
						<table class="table">
							<thead align="center" class="thead-dark ">
								<tr>
									<th>Última Atualização</th>
									<th>Versão</th>
									<th>Status</th>
									<th>Tipo</th>
									<th>Download</th>
								</tr>
							</thead>
							
							<tbody align="center">
							<?php if (count($_smarty_tpl->tpl_vars['modinfo']->value) > 0) {?>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['modinfo']->value, 'info');
$_smarty_tpl->tpl_vars['info']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['info']->value) {
$_smarty_tpl->tpl_vars['info']->do_else = false;
?>
									<tr>
										<td><?php echo $_smarty_tpl->tpl_vars['info']->value['lastupdate'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['info']->value['version'];?>
</td>
										<td><?php if ($_smarty_tpl->tpl_vars['info']->value['status'] == 'ON') {?><div class="badge badge-pill badge-success">Online</div><?php } elseif ($_smarty_tpl->tpl_vars['info']->value['status'] == 'ATT') {?><div class="badge badge-pill badge-warning">Manutenção</div><?php } else { ?><div class="badge badge-pill badge-danger">Offline</div><?php }?></td>
										<td><?php if ($_smarty_tpl->tpl_vars['info']->value['type'] == 'mod') {?><div class="badge badge-pill badge-danger">MOD APK</div><?php } elseif ($_smarty_tpl->tpl_vars['info']->value['type'] == 'script') {?><div class="badge badge-pill badge-secondary">SCRIPT</div><?php } elseif ($_smarty_tpl->tpl_vars['info']->value['type'] == 'injetor') {?><div class="badge badge-pill badge-info">INJETOR</div><?php } else { ?><div class="badge badge-pill badge-dark">MACRO</div><?php }?></td>
										<td>
											<a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['info']->value['download'];?>
">
												<i class="fa fa-download" style="padding-right:10px;"></i>DOWNLOAD 
											</a>
										</td>
									</tr>
								<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							<?php }?>
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
		</div>		
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="main-card mb-3 card">
				<div class="card-header">Últimos usuários
				</div>
				<div class="card-body p-0">
		
					<div class="table-responsive">
					<table class="mb-0 table table-striped table-hover">
						<thead align="center" class="thead-dark">
							<tr>
								<th>Usuário</th>
								<th>Vendedor</th>
								<th>Data</th>
								<th>Tipo</th>
							</tr>
						</thead>
						<tbody align="center">
							<?php if (count($_smarty_tpl->tpl_vars['lastsell']->value) > 0) {?>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lastsell']->value, 'last');
$_smarty_tpl->tpl_vars['last']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['last']->value) {
$_smarty_tpl->tpl_vars['last']->do_else = false;
?>
									<tr>
										<td style="text-transform: capitalize;"><?php echo $_smarty_tpl->tpl_vars['last']->value['user'];?>
</td>
										<td style="text-transform: capitalize;"><?php echo $_smarty_tpl->tpl_vars['last']->value['vendedor'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['last']->value['data'];?>
</td>
										<td><?php if ($_smarty_tpl->tpl_vars['last']->value['modo'] == 'mod') {?><div class="badge badge-pill badge-danger">MOD APK</div><?php } elseif ($_smarty_tpl->tpl_vars['last']->value['modo'] == 'script') {?><div class="badge badge-pill badge-secondary">SCRIPT</div><?php } elseif ($_smarty_tpl->tpl_vars['last']->value['modo'] == 'injetor') {?><div class="badge badge-pill badge-info">INJETOR</div><?php } else { ?><div class="badge badge-pill badge-dark">MACRO</div><?php }?></td>
									</tr>
								<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							<?php }?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="main-card mb-3 card">
				<div class="card-header"> <b><i class="fas fa-trophy"></i></b> &nbsp;&nbsp;Melhor Vendedor</center>
				</div>
				<div class="card-body p-0">
					<div class="table-responsive">
						<table class="mb-0 table table-striped table-hover">
							<thead align="center" class="thead-dark">
								<tr>
									<th>Rank</th>
									<th>Usuário</th>
									<th>Vendas</th>
								</tr>
							</thead>
							<tbody align="center">
								<?php if (count($_smarty_tpl->tpl_vars['rank']->value) > 0) {?>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rank']->value, 'ranks');
$_smarty_tpl->tpl_vars['ranks']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ranks']->value) {
$_smarty_tpl->tpl_vars['ranks']->do_else = false;
?>
								<tr>
									<?php if ($_smarty_tpl->tpl_vars['ranks']->value['rank'] == 1) {?>
									<td><span style="display: inline-block;width:20px!important;height:20px!important;border-radius:50%!important;" class="bg-sunny-morning"><i style="color:#FFCD00!important;" class="fas fa-medal"></i></span></td>
									<?php } elseif ($_smarty_tpl->tpl_vars['ranks']->value['rank'] == 2) {?>
									<td><span style="display: inline-block;width:20px!important;height:20px!important;border-radius:50%!important;" class="bg-secondary"><i style="color:#DADADA!important;" class="fas fa-medal"></i></span></td>
									<?php } elseif ($_smarty_tpl->tpl_vars['ranks']->value['rank'] == 3) {?>
									<td><span style="display: inline-block;width:20px!important;height:20px!important;border-radius:50%!important;" class="bg-strong-bliss"><i style="color:#DEC2C2!important;" class="fas fa-medal"></i></span></td>
									<?php } else { ?>
									<td><span style="display: inline-block;width:20px!important;height:20px!important;border-radius:50%!important;" class="bg-heavy-rain"> <b style="color:#545454"><?php echo $_smarty_tpl->tpl_vars['ranks']->value['rank'];?>
</b></span></td>
									<?php }?>
									<td><b style="text-transform: uppercase;"><?php echo $_smarty_tpl->tpl_vars['ranks']->value['user'];?>
</b></td>
									<td><span class="ml-2 badge badge-pill badge-dark"><?php echo $_smarty_tpl->tpl_vars['ranks']->value['vendas'];?>
</span></td>
									
								</tr>
								<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>		
	</div>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:core/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
