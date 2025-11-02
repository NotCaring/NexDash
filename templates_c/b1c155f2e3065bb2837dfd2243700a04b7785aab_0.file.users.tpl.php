<?php
/* Smarty version 3.1.38, created on 2022-01-24 03:15:07
  from '/home/u129344762/domains/ninjacheat.xyz/public_html/templates/pages/account/users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_61ee43eb11b0b8_18644635',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1c155f2e3065bb2837dfd2243700a04b7785aab' => 
    array (
      0 => '/home/u129344762/domains/ninjacheat.xyz/public_html/templates/pages/account/users.tpl',
      1 => 1643004906,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:core/header.tpl' => 1,
    'file:core/footer.tpl' => 1,
  ),
),false)) {
function content_61ee43eb11b0b8_18644635 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:core/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="app-main__inner">
	<div class="app-page-title app-page-title-simple">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div>
				<div class="page-title-head center-elem">
					<span class="d-inline-block pr-2">
						<i class="fas fa-users-cog opacity-6"></i>
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
				<div class="card-header">Todos os Usuários
				<div class="btn-actions-pane-right actions-icon-btn">
					<a href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=users&reset=all" class="btn btn-primary"><i class="fa fa-sync-alt mr-1"></i> Resetar todos os usuários</a>
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
				<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
				<span class="justify-content-start float-left">
					<form action="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=users">
						<input type="hidden" name="act" value="<?php echo $_smarty_tpl->tpl_vars['active']->value;?>
" />
						<label>Mostrar</label>
						<select name="rows" class="btn btn-light" onchange="this.form.submit()">
							
							<?php if ($_smarty_tpl->tpl_vars['rows']->value == 10) {?> 
								<option value="10"> 10 </option>
								<option value="25"> 25 </option>
								<option value="50"> 50 </option>
								<option value="100"> 100 </option>
							<?php } elseif ($_smarty_tpl->tpl_vars['rows']->value == 25) {?> 
								<option value="25"> 25 </option>
								<option value="10"> 10 </option>
								<option value="50"> 50 </option>
								<option value="100"> 100 </option>
							<?php } elseif ($_smarty_tpl->tpl_vars['rows']->value == 50) {?> 
								<option value="50"> 50 </option>
								<option value="10"> 10 </option>
								<option value="25"> 25 </option>
								<option value="100"> 100 </option>
							<?php } elseif ($_smarty_tpl->tpl_vars['rows']->value == 100) {?> 
								<option value="100"> 100 </option>
								<option value="10"> 10 </option>
								<option value="25"> 25 </option>
								<option value="50"> 50 </option>
							<?php } else { ?>
								<option value="10"> 10 </option>
								<option value="25"> 25 </option>
								<option value="50"> 50 </option>
								<option value="100"> 100 </option>
							<?php }?>
						</select>
						<label> resultados </label>
						<?php if ($_smarty_tpl->tpl_vars['pagination']->value['page_current'] > 1 && $_smarty_tpl->tpl_vars['pagination']->value['total'] > $_smarty_tpl->tpl_vars['rows']->value) {?>
						<input type="hidden" name="page" value="<?php echo $_smarty_tpl->tpl_vars['pagination']->value['page_current'];?>
" />
						<?php }?>
						<?php if (!empty($_smarty_tpl->tpl_vars['search']->value) && !empty($_smarty_tpl->tpl_vars['from']->value)) {?>
						<input type="hidden" name="search" value="<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
" />
						<input type="hidden" name="from" value="<?php echo $_smarty_tpl->tpl_vars['from']->value;?>
" />
						<?php }?>
						
					</form>
				</span>
				<span class="justify-content-end float-right">
					<form method="get" action="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=users">
						<input type="hidden" name="act" value="<?php echo $_smarty_tpl->tpl_vars['active']->value;?>
" />
						<?php if ($_smarty_tpl->tpl_vars['rows']->value > 10) {?>
						<input type="hidden" name="rows" value="<?php echo $_smarty_tpl->tpl_vars['rows']->value;?>
" />
						<?php }?>
						<label>&nbsp Search: &nbsp</label>
						<input type="text" style="width:97px" name="search"/>
						<label>&nbsp By: &nbsp</label>
						<select name="from" class="btn btn-light">
							<option value="Username"> Usuário </option>
							<option value="Vendedor"> Vendedor </option>
						</select>&nbsp
						<input type="submit" value="Search" class="btn btn-dark">
						
					</form>
				</span>
				</div>
				<br>
				<div class="card-body p-0">
				<?php if (count($_smarty_tpl->tpl_vars['usuarios']->value) > 0) {?>
					
					<form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=users">
					<div class="table-responsive">
					<table class="table table-hover table-fixed">
						<thead class="thead-dark">
						<tr>
							<th><input type="checkbox" onClick="toggle(this)"/></th>
							<th>ID</th>
							<th>Usuário</th>
							<th>Aparelhos</th>
						
							<th>Dias</th>
							<th>Status</th>
							<th>Pause</th>
							<th>Modo</th>
							<th>Vendedor</th>
							<th width="10%">Ações</th>
						</tr>
						</thead>
						<tbody>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usuarios']->value, 'record');
$_smarty_tpl->tpl_vars['record']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['record']->value) {
$_smarty_tpl->tpl_vars['record']->do_else = false;
?>
						<tr>
							<td><input type="checkbox" name="select[]" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['user'];?>
" /></td>
							<td><?php echo $_smarty_tpl->tpl_vars['record']->value['id'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['record']->value['user'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['record']->value['device'];?>
</td>
							<?php if ($_smarty_tpl->tpl_vars['record']->value['pause'] != 1) {?> 
							<td><?php if ($_smarty_tpl->tpl_vars['record']->value['segundos'] >= 1) {?><span class="ml-2 badge badge-pill badge-dark"><?php echo $_smarty_tpl->tpl_vars['record']->value['dias'];?>
 D | <?php echo $_smarty_tpl->tpl_vars['record']->value['horas'];?>
:<?php echo $_smarty_tpl->tpl_vars['record']->value['minutos'];?>
:<?php echo $_smarty_tpl->tpl_vars['record']->value['segundos'];?>
</span> <?php } else { ?><span class="ml-2 badge badge-pill badge-info">0  | Dias</span><?php }?></td>
							<?php } else { ?>
							<td><span class="ml-2 badge badge-pill badge-dark"><?php echo $_smarty_tpl->tpl_vars['record']->value['diasP'];?>
 D | <?php echo $_smarty_tpl->tpl_vars['record']->value['horasP'];?>
:<?php echo $_smarty_tpl->tpl_vars['record']->value['minutosP'];?>
:<?php echo $_smarty_tpl->tpl_vars['record']->value['segundosP'];?>
</span></td>
							<?php }?>
							<td><?php if ($_smarty_tpl->tpl_vars['record']->value['status'] != 1) {?>
									<?php if ($_smarty_tpl->tpl_vars['record']->value['segundos'] >= 1) {?><div class='badge badge-pill badge-success'>Ativo</div><?php } else { ?><div class='badge badge-pill badge-info'>Expirado</div><?php }?>
								<?php } else { ?>
									<div class='badge badge-pill badge-danger'>Banido</div>
								<?php }?>
							</td>
							<td><?php if ($_smarty_tpl->tpl_vars['record']->value['segundos'] >= 1) {
if ($_smarty_tpl->tpl_vars['record']->value['pause'] == 0) {?><div class='badge badge-pill badge-secondary'>Em uso</div><?php } else { ?><div class='badge badge-pill badge-warning'>Pausado</div><?php }
} else { ?><div class='badge badge-pill badge-warning'>Expirado</div><?php }?></td>
							<td><?php if ($_smarty_tpl->tpl_vars['record']->value['mode'] == 'mod') {?><div class="badge badge-pill badge-danger">MOD APK</div><?php } elseif ($_smarty_tpl->tpl_vars['record']->value['mode'] == 'script') {?><div class="badge badge-pill badge-secondary">SCRIPT</div><?php } elseif ($_smarty_tpl->tpl_vars['record']->value['mode'] == 'injetor') {?><div class="badge badge-pill badge-info">INJETOR</div><?php } else { ?><div class="badge badge-pill badge-dark">MACRO</div><?php }?></td>
							<td><?php echo $_smarty_tpl->tpl_vars['record']->value['vendedor'];?>
</td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-dark">Ações</button>
									<button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=editar&name=<?php echo $_smarty_tpl->tpl_vars['record']->value['user'];?>
">
											<i class="fa fa-pen mr-1"></i> Editar
										</a>
										<a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=users&resetuid=<?php echo $_smarty_tpl->tpl_vars['record']->value['user'];?>
" onClick="return confirm('Você deseja resetar este UID?');">
											<i class="fa fa-id-card mr-1"></i> Resetar UID
										</a>
										<?php if ($_smarty_tpl->tpl_vars['auth']->value['admin'] || $_smarty_tpl->tpl_vars['auth']->value['mod']) {?>
											<?php if ($_smarty_tpl->tpl_vars['record']->value['status'] == 1) {?>
											<a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=users&unban=<?php echo $_smarty_tpl->tpl_vars['record']->value['user'];?>
">
												<i class="fa fa-ban mr-1"></i> Desbanir
											</a>
											<?php } else { ?>
											<a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=users&ban=<?php echo $_smarty_tpl->tpl_vars['record']->value['user'];?>
">
												<i class="fa fa-ban mr-1"></i> Banir
											</a>
											<?php }?>
											<a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=users&delete=<?php echo $_smarty_tpl->tpl_vars['record']->value['user'];?>
" onClick="return confirm('Você deseja deletar este usuário?');">
												<i class="fa fa-trash-alt mr-1"></i> Apagar
											</a>
										 
										<?php }?>
									</div>
								</div>
							</td>
						</tr>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</tbody>
					</table>
					</div>
					
					<?php if ($_smarty_tpl->tpl_vars['pagination']->value['page_number'] > 1) {?>
					<div style='padding: 10px 20px 20px; border-top: dotted 1px #CCC;'>
						<span >
							<label>Mostrando <?php echo $_smarty_tpl->tpl_vars['pagination']->value['page_current'];?>
 de <?php echo $_smarty_tpl->tpl_vars['pagination']->value['page_number'];?>
 no total de <?php echo $_smarty_tpl->tpl_vars['pagination']->value['total'];?>
 resultados </label>
						</span>
						<span class="">
							<ul class="pagination justify-content-end">
							
							<?php if ($_smarty_tpl->tpl_vars['rows']->value > 10) {?>
								<?php if (!empty($_smarty_tpl->tpl_vars['search']->value) && !empty($_smarty_tpl->tpl_vars['from']->value)) {?>
									<li<?php if ($_smarty_tpl->tpl_vars['pagination']->value['page_current'] == 1) {?> class="disabled"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=users&rows=<?php echo $_smarty_tpl->tpl_vars['rows']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['page_current']-1;?>
&search=<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
&from=<?php echo $_smarty_tpl->tpl_vars['from']->value;?>
">Anterior</a></li>
									<?php if ($_smarty_tpl->tpl_vars['pagination']->value['page_current'] >= 3) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=users&rows=<?php echo $_smarty_tpl->tpl_vars['rows']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['first'];?>
&search=<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
&from=<?php echo $_smarty_tpl->tpl_vars['from']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['pagination']->value['first'];?>
</a></li><li><a>...</a></li><?php }?>
									<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['pagination']->value['end']+1 - ($_smarty_tpl->tpl_vars['pagination']->value['start']) : $_smarty_tpl->tpl_vars['pagination']->value['start']-($_smarty_tpl->tpl_vars['pagination']->value['end'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['pagination']->value['start'], $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
									<li<?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['pagination']->value['page_current']) {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=users&rows=<?php echo $_smarty_tpl->tpl_vars['rows']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
&search=<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
&from=<?php echo $_smarty_tpl->tpl_vars['from']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
									<?php }
}
?>
									<?php if ($_smarty_tpl->tpl_vars['pagination']->value['page_number'] > 4 && $_smarty_tpl->tpl_vars['pagination']->value['page_current'] < $_smarty_tpl->tpl_vars['pagination']->value['page_number']-2) {?><li><a>...</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=users&rows=<?php echo $_smarty_tpl->tpl_vars['rows']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['page_number'];?>
&search=<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
&from=<?php echo $_smarty_tpl->tpl_vars['from']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['pagination']->value['page_number'];?>
</a></li><?php }?>
							
									<li<?php if ($_smarty_tpl->tpl_vars['pagination']->value['page_current'] == $_smarty_tpl->tpl_vars['pagination']->value['page_number']) {?> class="disabled"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=users&rows=<?php echo $_smarty_tpl->tpl_vars['rows']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['page_current']+1;?>
&search=<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
&from=<?php echo $_smarty_tpl->tpl_vars['from']->value;?>
">Próxima</a></li>
								<?php } else { ?>
									<li<?php if ($_smarty_tpl->tpl_vars['pagination']->value['page_current'] == 1) {?> class="disabled"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=users&rows=<?php echo $_smarty_tpl->tpl_vars['rows']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['page_current']-1;?>
">Anterior</a></li>
									<?php if ($_smarty_tpl->tpl_vars['pagination']->value['page_current'] >= 3) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=users&rows=<?php echo $_smarty_tpl->tpl_vars['rows']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['first'];?>
"><?php echo $_smarty_tpl->tpl_vars['pagination']->value['first'];?>
</a></li><li><a>...</a></li><?php }?>
									<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['pagination']->value['end']+1 - ($_smarty_tpl->tpl_vars['pagination']->value['start']) : $_smarty_tpl->tpl_vars['pagination']->value['start']-($_smarty_tpl->tpl_vars['pagination']->value['end'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['pagination']->value['start'], $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
									<li<?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['pagination']->value['page_current']) {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=users&rows=<?php echo $_smarty_tpl->tpl_vars['rows']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
									<?php }
}
?>
									<?php if ($_smarty_tpl->tpl_vars['pagination']->value['page_number'] > 4 && $_smarty_tpl->tpl_vars['pagination']->value['page_current'] < $_smarty_tpl->tpl_vars['pagination']->value['page_number']-2) {?><li><a>...</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=users&rows=<?php echo $_smarty_tpl->tpl_vars['rows']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['page_number'];?>
"><?php echo $_smarty_tpl->tpl_vars['pagination']->value['page_number'];?>
</a></li><?php }?>
							
									<li<?php if ($_smarty_tpl->tpl_vars['pagination']->value['page_current'] == $_smarty_tpl->tpl_vars['pagination']->value['page_number']) {?> class="disabled"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=users&rows=<?php echo $_smarty_tpl->tpl_vars['rows']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['page_current']+1;?>
">Próxima</a></li>
								<?php }?>
							<?php } else { ?>
								<?php if (!empty($_smarty_tpl->tpl_vars['search']->value) && !empty($_smarty_tpl->tpl_vars['from']->value)) {?>
									<li<?php if ($_smarty_tpl->tpl_vars['pagination']->value['page_current'] == 1) {?> class="disabled"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=users&page=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['page_current']-1;?>
&search=<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
&from=<?php echo $_smarty_tpl->tpl_vars['from']->value;?>
">Anterior</a></li>
									<?php if ($_smarty_tpl->tpl_vars['pagination']->value['page_current'] >= 3) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=users&page=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['first'];?>
&search=<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
&from=<?php echo $_smarty_tpl->tpl_vars['from']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['pagination']->value['first'];?>
</a></li><li><a>...</a></li><?php }?>
									<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['pagination']->value['end']+1 - ($_smarty_tpl->tpl_vars['pagination']->value['start']) : $_smarty_tpl->tpl_vars['pagination']->value['start']-($_smarty_tpl->tpl_vars['pagination']->value['end'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['pagination']->value['start'], $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
									<li<?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['pagination']->value['page_current']) {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=users&page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
&search=<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
&from=<?php echo $_smarty_tpl->tpl_vars['from']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
									<?php }
}
?>
									<?php if ($_smarty_tpl->tpl_vars['pagination']->value['page_number'] > 4 && $_smarty_tpl->tpl_vars['pagination']->value['page_current'] < $_smarty_tpl->tpl_vars['pagination']->value['page_number']-2) {?><li><a>...</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=users&page=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['page_number'];?>
&search=<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
&from=<?php echo $_smarty_tpl->tpl_vars['from']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['pagination']->value['page_number'];?>
</a></li><?php }?>
							
									<li<?php if ($_smarty_tpl->tpl_vars['pagination']->value['page_current'] == $_smarty_tpl->tpl_vars['pagination']->value['page_number']) {?> class="disabled"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=users&page=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['page_current']+1;?>
&search=<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
&from=<?php echo $_smarty_tpl->tpl_vars['from']->value;?>
">Próxima</a></li>
								<?php } else { ?>
									<li<?php if ($_smarty_tpl->tpl_vars['pagination']->value['page_current'] == 1) {?> class="disabled"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=users&page=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['page_current']-1;?>
">Anterior</a></li>
									<?php if ($_smarty_tpl->tpl_vars['pagination']->value['page_current'] >= 3) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=users&page=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['first'];?>
"><?php echo $_smarty_tpl->tpl_vars['pagination']->value['first'];?>
</a></li><li><a>...</a></li><?php }?>
									<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['pagination']->value['end']+1 - ($_smarty_tpl->tpl_vars['pagination']->value['start']) : $_smarty_tpl->tpl_vars['pagination']->value['start']-($_smarty_tpl->tpl_vars['pagination']->value['end'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['pagination']->value['start'], $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
									<li<?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['pagination']->value['page_current']) {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=users&page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
									<?php }
}
?>
									<?php if ($_smarty_tpl->tpl_vars['pagination']->value['page_number'] > 4 && $_smarty_tpl->tpl_vars['pagination']->value['page_current'] < $_smarty_tpl->tpl_vars['pagination']->value['page_number']-2) {?><li><a>...</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=users&page=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['page_number'];?>
"><?php echo $_smarty_tpl->tpl_vars['pagination']->value['page_number'];?>
</a></li><?php }?>
							
									<li<?php if ($_smarty_tpl->tpl_vars['pagination']->value['page_current'] == $_smarty_tpl->tpl_vars['pagination']->value['page_number']) {?> class="disabled"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=users&page=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['page_current']+1;?>
">Próxima</a></li>
								<?php }?>
							<?php }?>
							</ul>
							<hr>
							<div class="btn-group float-right">
									<button type="button" class="btn btn-dark">Ações de administradores</button>
									<button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="sr-only">Toggle Dropdown</span>
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<button class="dropdown-item" type="submit" name="reset_select" onClick="return confirm('Você deseja resetar os usuários selecionados?');">
										<i class="fa fa-asterisk mr-1"></i> Resetar selecionados
									</button>
									<?php if ($_smarty_tpl->tpl_vars['auth']->value['admin'] || $_smarty_tpl->tpl_vars['auth']->value['mod']) {?>
									
									<button class="dropdown-item" type="submit" name="del_select" onClick="return confirm('Você deseja deletar os usuários selecionados?');">
										<i class="fa fa-trash-alt mr-1"></i> Deletar selecionados
									</button>
									<button class="dropdown-item" type="submit" name="ban_select" onClick="return confirm('Você deseja banir os usuários selecionados?');">
										<i class="fa fa-ban mr-1"></i> Banir selecionados
									</button>
									<button class="dropdown-item" type="submit" name="unban_select" onClick="return confirm('Você deseja desbanir os usuários selecionados?');">
										<i class="fa fa-check-circle mr-1"></i> Desbanir selecionados
									</button>
									<?php }?>
								  </div>
							</div>
							
							<br>
						</span>
					</div>
					<?php }?>
					</form>
				<?php }?>
					<?php if (count($_smarty_tpl->tpl_vars['error']->value) > 0) {?>
						<center>
						<div class="alert alert-danger" role="alert">
							
							<p class="mb-0">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['error']->value, 'text');
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
				
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
	function toggle(source) {
	  checkboxes = document.getElementsByName('select[]');
	  for(var i=0, n=checkboxes.length;i<n;i++) {
		checkboxes[i].checked = source.checked;
	  }
	}
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender('file:core/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
