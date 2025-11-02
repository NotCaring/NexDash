<?php
/* Smarty version 3.1.38, created on 2022-06-15 02:00:15
  from '/var/www/vhosts/infinityofc.com/httpdocs/templates/pages/admin/produto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_62a9675fa34be2_13048442',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c84f33acb75f5da5c123dce62ba1be1b55d16af6' => 
    array (
      0 => '/var/www/vhosts/infinityofc.com/httpdocs/templates/pages/admin/produto.tpl',
      1 => 1655269206,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:core/header.tpl' => 1,
    'file:core/footer.tpl' => 1,
  ),
),false)) {
function content_62a9675fa34be2_13048442 (Smarty_Internal_Template $_smarty_tpl) {
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
	<?php if (count($_smarty_tpl->tpl_vars['error']->value) > 0) {?>
		<center>
		<div class="alert alert-danger d-flex flex-row" role="alert">
			
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
	
	<div class="row">
		<div class="col-md-12">
			<div class="main-card mb-3 card">
				<div class="card-header">Modificações do produto
				</div>
				
				<div class="card-body">
				<?php if (count($_smarty_tpl->tpl_vars['cheats']->value) > 0) {?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cheats']->value, 'cheat');
$_smarty_tpl->tpl_vars['cheat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cheat']->value) {
$_smarty_tpl->tpl_vars['cheat']->do_else = false;
?>
					<form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=produto&id=<?php echo $_smarty_tpl->tpl_vars['getID']->value;?>
" method="POST">
					<input type="hidden" name="form" />
					<div class="position-relative form-group">
					<label for="exampleEmail" class="">Imagem</label>
					<input type="text" name="img" value="<?php echo $_smarty_tpl->tpl_vars['cheat']->value['img'];?>
" placeholder="Link da imagem ex: http://freefire.png" class="form-control" required>
					</div>

					<div class="position-relative form-group">
					<label for="exampleEmail" class="">Jogo</label>
					<input type="text" name="gamename" value="<?php echo $_smarty_tpl->tpl_vars['cheat']->value['gamename'];?>
" placeholder="Nome do jogo" class="form-control" required>
					</div>
					
					<div class="position-relative form-group">
					<label for="exampleEmail" class="">Versão</label>
					<input type="text" name="version" value="<?php echo $_smarty_tpl->tpl_vars['cheat']->value['version'];?>
" placeholder="1.0.0" class="form-control" required>
					</div>
					
					<div class="position-relative form-group">
						<label for="exampleEmail" class="">Modo</label>
						<select name="mode" class="form-control">
						<?php if ($_smarty_tpl->tpl_vars['cheat']->value['mode'] == 'x86') {?>
						<option value="x86">INJETOR EMULADOR</option>
						<option value="script">SCRIPT</option>
						<option value="regedit">REGEDIT</option>
						<option value="injetor">INJETOR MOBILE</option>
						<?php } elseif ($_smarty_tpl->tpl_vars['cheat']->value['mode'] == 'regedit') {?>
						<option value="regedit">REGEDIT</option>
						<option value="script">SCRIPT</option>
						<option value="x86">INJETOR EMULADOR</option>
						<option value="injetor">INJETOR MOBILE</option>
						<?php } elseif ($_smarty_tpl->tpl_vars['cheat']->value['mode'] == 'injetor') {?>
						<option value="injetor">INJETOR MOBILE</option>
						<option value="script">SCRIPT</option>
						<option value="regedit">REGEDIT</option>				
						<option value="x86">INJETOR EMULADOR</option>
						<?php } else { ?>
						<option value="script">SCRIPT</option>
						<option value="regedit">REGEDIT</option>
						<option value="x86">INJETOR EMULADOR</option>
						<option value="injetor">INJETOR MOBILE</option>
						<?php }?>
						</select>
					</div>

					<div class="position-relative form-group">
					<label for="exampleEmail" class="">Última atualização</label>
					<input type="text" name="last_update" value="<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
" class="form-control" required>
					</div>
					
					<div class="position-relative form-group">
					<label for="exampleEmail" class="">Status</label>
					<select name="status" class="form-control">
					<?php if ($_smarty_tpl->tpl_vars['cheat']->value['status'] == 'ON') {?>
					<option value="ON">Online</option>
					<option value="ATT">Manutenção</option>
					<option value="OFF">Offline</option>
					<?php } elseif ($_smarty_tpl->tpl_vars['cheat']->value['status'] == 'ATT') {?>
					<option value="ATT">Manutenção</option>
					<option value="ON">Online</option>
					<option value="OFF">Offline</option>
					<?php } else { ?>
					<option value="OFF">Offline</option>
					<option value="ON">Online</option>
					<option value="ATT">Manutenção</option>
					<?php }?>
					</select>
					</div>
					<div class="position-relative form-group">
					<label for="exampleEmail" class="">Tamanho do APK</label>
						
					<input type="number" min="0" maxlength="10" name="size" placeholder="12345" value="<?php echo $_smarty_tpl->tpl_vars['cheat']->value['size'];?>
" class="form-control" required>
						
					</div>
					<div class="position-relative form-group">
					<label for="exampleEmail" class="">Download</label>
					<input type="text" name="download" value="<?php echo $_smarty_tpl->tpl_vars['cheat']->value['download'];?>
" placeholder="Caso não ter deixe em branco" class="form-control">
					</div>

					<div class="d-block text-right card-footer">
					<button type="submit" name="Submit" class="btn btn-success btn-lg">Salvar Alterações</button>
					
					</div>
					</form>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				<?php } else { ?>
					<div class="alert alert-success">
						Nenhum produto adicionado
					</div>
				<?php }?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="main-card mb-3 card">
						<div class="card-header"> Status do cheat selecionado
							<div class="btn-actions-pane-right actions-icon-btn">
								
							</div>
						</div>
					
						<div class="card-body p-2">
							<div class="table-responsive">
								<div class="tab-content">
									<?php if (count($_smarty_tpl->tpl_vars['cheats']->value) > 0) {?>
									<table class="table table-hover">
										<thead class="thead-light">
											<tr>
												<th>Jogo</th>
												<th>Atualização</th>
												<th>Modo</th>
												<th>Versão</th>
												<th>Status</th>
												<th>Tamanho</th>
											</tr>
										</thead>
											
										<tbody>
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cheats']->value, 'cheat');
$_smarty_tpl->tpl_vars['cheat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cheat']->value) {
$_smarty_tpl->tpl_vars['cheat']->do_else = false;
?>
											<tr>
												
												<td><img src="<?php echo $_smarty_tpl->tpl_vars['cheat']->value['img'];?>
" class="psctcircle" style="width: 20px;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['cheat']->value['gamename'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['cheat']->value['update'];?>
</td>
												<td><?php if ($_smarty_tpl->tpl_vars['cheat']->value['mode'] == 'regedit') {?><div class="badge badge-pill badge-danger">REGEDIT</div><?php } elseif ($_smarty_tpl->tpl_vars['cheat']->value['mode'] == 'script') {?><div class="badge badge-pill badge-secondary">SCRIPT</div><?php } elseif ($_smarty_tpl->tpl_vars['cheat']->value['mode'] == 'injetor') {?><div class="badge badge-pill badge-info">INJECT MOBILE</div><?php } elseif ($_smarty_tpl->tpl_vars['cheat']->value['mode'] == 'x86') {?><div class="badge badge-pill badge-info">INJECT x86</div><?php } else { ?><div class="badge badge-pill badge-dark">MACRO</div><?php }?></td>
												<td><?php echo $_smarty_tpl->tpl_vars['cheat']->value['version'];?>
</td>
												<td>
												<td><?php echo $_smarty_tpl->tpl_vars['cheat']->value['version'];?>
</td>
												<td>
													<?php if ($_smarty_tpl->tpl_vars['cheat']->value['status'] == 'ON') {?>
													<div class="badge badge-pill badge-success">Online</div>
													<?php } elseif ($_smarty_tpl->tpl_vars['cheat']->value['status'] == 'ATT') {?>
													<div class="badge badge-pill badge-warning">Manutenção</div>
													<?php } else { ?>
													<div class="badge badge-pill badge-danger">Offline</div>
													<?php }?>
												</td>
												<td><?php echo $_smarty_tpl->tpl_vars['cheat']->value['size'];?>
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
