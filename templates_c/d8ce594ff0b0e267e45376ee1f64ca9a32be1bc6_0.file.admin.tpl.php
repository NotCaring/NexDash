<?php
/* Smarty version 3.1.38, created on 2025-10-12 13:39:39
  from '/home/u999974013/domains/sftzone.site/public_html/gx/templates/pages/admin/admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_68ebd9cb208603_16474045',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8ce594ff0b0e267e45376ee1f64ca9a32be1bc6' => 
    array (
      0 => '/home/u999974013/domains/sftzone.site/public_html/gx/templates/pages/admin/admin.tpl',
      1 => 1760287003,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:core/header.tpl' => 1,
    'file:core/footer.tpl' => 1,
  ),
),false)) {
function content_68ebd9cb208603_16474045 (Smarty_Internal_Template $_smarty_tpl) {
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
				<a class="btn btn-primary" href="index.php?act=panel" role="button">Painel de Administração</a>
				<a class="btn btn-info" href="index.php?act=logs" role="button">Logs dos usuários</a>
				<a class="btn btn-success" href="index.php?act=logsadmin" role="button">Logs dos admins</a>
				</div>
			</div>
		</div>
	</div>
	
	<?php if ($_smarty_tpl->tpl_vars['activation_enabled']->value) {?>
	<div class="row">
		<div class="col-md-12">
			<div class="main-card mb-3 card">
				<div class="card-header"> Contas com ativação pendente
					
				</div>
				<div class="card-body p-0">
					<?php if (count($_smarty_tpl->tpl_vars['pending_accounts']->value) > 0) {?>
						
						<table class="table table-hover table-fixed">
							<thead class="thead-dark">
							<tr>
								<th>Conta</th>
								<th>Email</th>
								<th width="10%">Ações</th>
							</tr>
							</thead>
							<tbody>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pending_accounts']->value, 'account');
$_smarty_tpl->tpl_vars['account']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['account']->value) {
$_smarty_tpl->tpl_vars['account']->do_else = false;
?>
							<tr>
								
								<td><?php echo $_smarty_tpl->tpl_vars['account']->value['login'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['account']->value['email'];?>
</td>
								<td>
								<div class="btn-group">
									<a class="btn btn-success btn-xs" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=activate&hash=<?php echo $_smarty_tpl->tpl_vars['account']->value['hash'];?>
">Ativar</a>
								</div>
									
								</td>
							</tr>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</tbody>
						</table>
						
					<?php } else { ?>
						<div class="alert alert-success">
							Todas as contas estão ativadas
						</div>
					<?php }?>
				</div>
			</div>
		</div>		
	</div>
	<?php }?>
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
                <div class="card-header">Adicionar dias para todos os usuários
                </div>
                <div class="card-body">
                
                <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=admin" method="POST">
                    <input type="hidden" name="form_dias" />
                    <div class="position-relative row form-group">
                        <label for="exampleEmail" class="col-sm-2 col-form-label">Quantidade de dias</label>
                        <div class="col-sm-10">
                            <input size="2" type="number" min="0" max="90" placeholder="Quantidade de dias" name="endate" class="form-control">
                        </div>
                    </div>
                        <div class="position-relative row form-group">
                            <label for="exampleEmail" class="col-sm-2 col-form-label">Modo</label>
                            <div class="col-sm-10">
                                <select name="modo" class="form-control">
                                <option value="injetor">INJETOR MOBILE</option>
                                <option value="x86">INJETOR EMULADOR</option>
							    <option value="script">SCRIPT</option>
							    <option value="regedit">REGEDIT</option>
                             
                                </select>
                            </div>
                        </div>
                    <div class="d-block text-right card-footer">
                        <button type="submit" name="Submit" class="btn btn-primary btn-lg">ADICIONAR</button>
                        
                    </div>
                </form>
                </div>
				
				
				
				
				<div class="card-header">Remover dias para todos os usuários
				</div>
				<div class="card-body">
				
				<form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=admin" method="POST">
					<input type="hidden" name="form_dias1" />
					<div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label">Quantidade de dias</label>
						<div class="col-sm-10">
							<input size="2" type="number" min="0" max="90" placeholder="Quantidade de dias" name="endate" class="form-control">
						</div>
					</div>
					<div class="position-relative row form-group">
                            <label for="exampleEmail" class="col-sm-2 col-form-label">Modo</label>
                            <div class="col-sm-10">
                                <select name="modo" class="form-control">
                                <option value="injetor">INJETOR MOBILE</option>
                                <option value="x86">INJETOR EMULADOR</option>
							    <option value="script">SCRIPT</option>
							    <option value="regedit">REGEDIT</option>
                             
                                </select>
                            </div>
                        </div>
					<div class="d-block text-right card-footer">
						<button type="submit" name="Submit" class="btn btn-primary btn-lg">REMOVER</button>
						
					</div>			
				</form>
				</div>
				
				
				
				
				<div class="card-header">Remover usuários expirados
				</div>
				<div class="card-body">
				
				<form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=admin" method="POST">
					<input type="hidden" name="form_dias2" />
					
					<div class="position-relative row form-group">
                            <label for="exampleEmail" class="col-sm-2 col-form-label">Modo</label>
                            <div class="col-sm-10">
                                <select name="modo" class="form-control">
                                <option value="injetor">INJETOR MOBILE</option>
                                <option value="x86">INJETOR EMULADOR</option>
							    <option value="script">SCRIPT</option>
							    <option value="regedit">REGEDIT</option>
                             
                                </select>
                            </div>
                        </div>
					<div class="d-block text-right card-footer">
						<button type="submit" name="Submit" class="btn btn-primary btn-lg">REMOVER</button>
						
					</div>			
				</form>
				</div>
				
				
				
				
				
			
				<div class="card-body">
				
				</div>
				
			</div>
			
		</div>
		
	</div>
	

	
	<div class="row">
		<div class="col-md-12">
			<div class="main-card mb-3 card">
				<div class="card-header">Adicionar Cheats
				</div>
				<div class="card-body">
					
					<form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=admin" method="POST">
						<input type="hidden" name="form" />
						<div class="position-relative row form-group">
							<label for="exampleEmail" class="col-sm-2 col-form-label">Imagem</label>
							<div class="col-sm-10">
								<input type="text" name="img" placeholder="Link da imagem ex: http://freefire.com/img.png" class="form-control" required>
							</div>
						</div>

						<div class="position-relative row form-group">
							<label for="exampleEmail" class="col-sm-2 col-form-label">Jogo</label>
							<div class="col-sm-10">
								<input type="text" name="gamename" placeholder="Nome do jogo" class="form-control" required>
							</div>
						</div>
						
						<div class="position-relative row form-group">
							<label for="exampleEmail" class="col-sm-2 col-form-label">Versão</label>
							<div class="col-sm-10">
								<input type="text" name="version" placeholder="1.0.0" class="form-control" required>
							</div>
						</div>

						<div class="position-relative row form-group">
							<label for="exampleEmail" class="col-sm-2 col-form-label">Modo</label>
							<div class="col-sm-10">
								<select name="modo" class="form-control">
								 <option value="injetor">INJETOR MOBILE</option>
								 <option value="x86">INJETOR EMULADOR</option>
								<option value="regedit">REGEDIT</option>
								<option value="script">SCRIPT</option>
								</select>
							</div>
						</div>

						<div class="position-relative row form-group">
							<label for="exampleEmail" class="col-sm-2 col-form-label">Última atualização</label>
							<div class="col-sm-10">
								<input type="text" name="last_update" value="<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
" class="form-control form_datetime" required>
							</div>
						</div>
						
						<div class="position-relative row form-group">
							<label for="exampleEmail" class="col-sm-2 col-form-label">Status</label>
							<div class="col-sm-10">
								<select name="status" class="form-control">
									<option value="ON">Online</option>
									<option value="ATT">Manutenção</option>
									<option value="OFF">Offline</option>
								</select>
							</div>
						</div>

						<div class="position-relative row form-group">
							<label for="exampleEmail" class="col-sm-2 col-form-label">Tamanho do APK</label>
							<div class="col-sm-10">
								<input type="number" min="0" maxlength="10" name="size" placeholder="12345" class="form-control" required>
							</div>
						</div>
						
						<div class="position-relative row form-group">
							<label for="exampleEmail" class="col-sm-2 col-form-label">Download</label>
							<div class="col-sm-10">
								<input type="text" name="download" placeholder="Caso não ter deixe em branco" class="form-control">
							</div>
						</div>
						
						<div class="d-block text-right card-footer">
							<button type="submit" name="Submit" class="btn btn-primary btn-lg">Adicionar cheat</button>
						</div>
					</form>
					
				</div>
			</div>
			
			<div class="main-card mb-3 card">
				<div class="card-header"> Status do cheat
					<div class="btn-actions-pane-right actions-icon-btn">
						
					</div>
				</div>
				
				<div class="card-body p-2">
					
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
								<th width="10%">Ações</th>
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
								<td><?php if ($_smarty_tpl->tpl_vars['cheat']->value['mode'] == 'injetor') {?><div class="badge badge-dark">INJETOR MOBILE</div><?php } elseif ($_smarty_tpl->tpl_vars['cheat']->value['mode'] == 'x86') {?><div class="badge badge-pill badge-danger">INJETOR EMULADOR</div><?php } elseif ($_smarty_tpl->tpl_vars['cheat']->value['mode'] == 'script') {?><div class="badge badge-pill badge-secondary">SCRIPT</div><?php } elseif ($_smarty_tpl->tpl_vars['cheat']->value['mode'] == 'regedit') {?><div class="badge badge-pill badge-info">REGEDIT</div><?php } else { ?><div class="badge badge-pill badge-dark">MACRO</div><?php }?></td>
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
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-primary">Ações</button>
										<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=produto&id=<?php echo $_smarty_tpl->tpl_vars['cheat']->value['id'];?>
">
												<i class="fa fa-pen mr-1"></i> Editar
											</a>
											<a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=admin&remove=<?php echo $_smarty_tpl->tpl_vars['cheat']->value['id'];?>
" onClick="return confirm('Você deseja realmente remover este cheat?');">
												<i class="fa fa-trash-alt mr-1"></i> Remover
											</a>
										</div>
									</div>
								</td>
							</tr>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							
						</tbody>
					</table>
					<?php } else { ?>
						<div class="alert alert-success">
							Nenhum produto adicionado
						</div>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:core/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
