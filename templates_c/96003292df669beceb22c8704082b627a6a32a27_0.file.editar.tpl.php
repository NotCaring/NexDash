<?php
/* Smarty version 3.1.38, created on 2022-07-26 15:06:11
  from '/var/www/vhosts/infinityofc.com/httpdocs/templates/pages/account/editar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_62e02d13484205_70181536',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '96003292df669beceb22c8704082b627a6a32a27' => 
    array (
      0 => '/var/www/vhosts/infinityofc.com/httpdocs/templates/pages/account/editar.tpl',
      1 => 1658858766,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:core/header.tpl' => 1,
    'file:core/footer.tpl' => 1,
  ),
),false)) {
function content_62e02d13484205_70181536 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:core/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="app-main__inner">
	<div class="app-page-title app-page-title-simple">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div>
				<div class="page-title-head center-elem">
					<span class="d-inline-block pr-2">
						<i class="fas fa-user-edit opacity-6"></i>
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
		<div class="col-md-8">
			<div class="main-card mb-3 card">
			<?php if (count($_smarty_tpl->tpl_vars['usuarios']->value) > 0) {?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usuarios']->value, 'record');
$_smarty_tpl->tpl_vars['record']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['record']->value) {
$_smarty_tpl->tpl_vars['record']->do_else = false;
?>
				<div class="card-header">Informações de #<?php echo $_smarty_tpl->tpl_vars['record']->value['user'];?>
</div>
				<?php if (count($_smarty_tpl->tpl_vars['error']->value) > 0) {?>
					<center>
					<div class="alert alert-danger d-flex flex-row">
						<i class="fas fa-fw fa-times-circle mr-3 align-self-center"></i>
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
				<div class="card-body">
				
				<table class="mb-0 table table-bordered">
					<tbody>
					<tr>
						<th scope="row">Usuário</th>
						<td align="center"><?php echo $_smarty_tpl->tpl_vars['record']->value['user'];?>
</td>
						<?php if ($_smarty_tpl->tpl_vars['auth']->value['admin']) {?><td width="20%" align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=editar&name=<?php echo $_smarty_tpl->tpl_vars['record']->value['user'];?>
&sact=changeuser">[Mudar USER]</a></td><?php }?>
					</tr>
					<tr>
						<th scope="row">Senha</th>
						<td align="center"><?php echo $_smarty_tpl->tpl_vars['record']->value['password'];?>
</td>
						<?php if ($_smarty_tpl->tpl_vars['auth']->value['admin']) {?><td width="20%" align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=editar&name=<?php echo $_smarty_tpl->tpl_vars['record']->value['user'];?>
&sact=changepass">[Mudar PASS]</a></td><?php }?>
					</tr>
				
					<tr>
						
						<th scope="row">Modo</th>
						<td align="center"><?php if ($_smarty_tpl->tpl_vars['record']->value['mode'] == 'injetor') {?><div class="badge badge-pill badge-danger">INJETOR MOBILE</div><?php } elseif ($_smarty_tpl->tpl_vars['record']->value['mode'] == 'x86') {?><div class="badge badge-pill badge-danger">INJETOR EMULADOR</div><?php } elseif ($_smarty_tpl->tpl_vars['record']->value['mode'] == 'script') {?><div class="badge badge-pill badge-secondary">SCRIPT</div><?php } elseif ($_smarty_tpl->tpl_vars['record']->value['mode'] == 'regedit') {?><div class="badge badge-pill badge-info">REGEDIT</div><?php } else { ?><div class="badge badge-pill badge-dark">MACRO</div><?php }?></td>
						
						<td width="20%" align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=editar&name=<?php echo $_smarty_tpl->tpl_vars['record']->value['user'];?>
&sact=changemode">[Mudar MODO]</a></td>
						
					</tr>
					<tr>
						<th scope="row">Data de criação</th>
						<td align="center"><?php echo $_smarty_tpl->tpl_vars['record']->value['data'];?>
</td>
					</tr>
					<tr>
						<th scope="row">Tempo restante</th>
						
						 <?php echo '<script'; ?>
>
							
							var countDownDate = new Date("<?php echo $_smarty_tpl->tpl_vars['record']->value['dteV'];?>
").getTime();

							
							var myfunc = setInterval(function() {

							var now = new Date().getTime();
							var timeleft = countDownDate - now;
								
							
							var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
							var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
							var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
							var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
								
							
							document.getElementById("days").innerHTML = (days < 10) ? ('0' + days) : days;
							document.getElementById("hours").innerHTML = (hours < 10) ? ('0' + hours) : hours;
							document.getElementById("mins").innerHTML = (minutes < 10) ? ('0' + minutes) : minutes;
							document.getElementById("secs").innerHTML = (seconds < 10) ? ('0' + seconds) : seconds;
								
							
							if (timeleft < 0) {
								clearInterval(myfunc);
								
							}
							}, 1000);
							<?php echo '</script'; ?>
>
						<?php if ($_smarty_tpl->tpl_vars['record']->value['pause'] != 1) {?> 
						<td align="center"><?php if ($_smarty_tpl->tpl_vars['record']->value['segundos'] >= 1) {?><span class="ml-2 badge badge-pill badge-dark"><span id="days"></span> D | <span id="hours"></span>:<span id="mins"></span>:<span id="secs"></span></span> <?php } else { ?><span class="ml-2 badge badge-pill badge-info">0  | Dias</span><?php }?></td>
						<?php } else { ?>
						<td align="center"><span class="ml-2 badge badge-pill badge-dark"><?php echo $_smarty_tpl->tpl_vars['record']->value['diasP'];?>
 D | <?php echo $_smarty_tpl->tpl_vars['record']->value['horasP'];?>
:<?php echo $_smarty_tpl->tpl_vars['record']->value['minutosP'];?>
:<?php echo $_smarty_tpl->tpl_vars['record']->value['segundosP'];?>
</span></td>
						<?php }?>
					</tr>
					<tr>
						<th scope="row">Status</th>
						<td align="center"><?php if ($_smarty_tpl->tpl_vars['record']->value['status'] != 1) {
if ($_smarty_tpl->tpl_vars['record']->value['dias'] >= 1) {?><div class='badge badge-pill badge-success'>Ativo</div><?php } else { ?><div class='badge badge-pill badge-info'>Expirado</div><?php }
} else { ?><div class='badge badge-pill badge-danger'>Banido</div><?php }?></td>
						<?php if ($_smarty_tpl->tpl_vars['auth']->value['admin']) {?><td width="20%" align="center"><?php if ($_smarty_tpl->tpl_vars['record']->value['status'] == 0) {?><a href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=editar&name=<?php echo $_smarty_tpl->tpl_vars['record']->value['user'];?>
&banir=1">[BANIR]</a><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=editar&name=<?php echo $_smarty_tpl->tpl_vars['record']->value['user'];?>
&banir=2">[DESBANIR]</a><?php }?></td><?php }?>
					</tr>
					<tr>
						<th scope="row">Pausar conta</th>
						<td align="center"><?php if ($_smarty_tpl->tpl_vars['record']->value['segundos'] >= 1) {
if ($_smarty_tpl->tpl_vars['record']->value['pause'] != 1) {?><div class='badge badge-pill badge-primary'>Em uso</div><?php } else { ?><div class='badge badge-pill badge-warning'>Pausado</div><?php }
} else { ?><div class='badge badge-pill badge-warning'>Expirado</div><?php }?></td>
						<?php if ($_smarty_tpl->tpl_vars['auth']->value['admin']) {?><td width="20%" align="center"><?php if ($_smarty_tpl->tpl_vars['record']->value['segundos'] >= 1) {
if ($_smarty_tpl->tpl_vars['record']->value['pause'] == 0) {?><a href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=editar&name=<?php echo $_smarty_tpl->tpl_vars['record']->value['user'];?>
&pause=1">[PAUSAR]</a><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=editar&name=<?php echo $_smarty_tpl->tpl_vars['record']->value['user'];?>
&pause=2">[RETOMAR]</a><?php }
}?></td><?php }?>
					</tr>
					</tbody>
				</table>
				</div>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			<?php }?>
			</div>
			
			<?php if ($_smarty_tpl->tpl_vars['auth']->value['admin']) {?>
			<div class="main-card mb-3 card">
				<div class="card-header">Editar Tempo do Membro
				</div>
				<div class="card-body">
					
					<form action="" method="POST">
				
					<div class="position-relative row form-group">
					<label for="exampleEmail" class="col-sm-2 col-form-label">Tempo do Membro</label>
					<div class="col-sm-10">
					<input size="2" type="number" min="0" placeholder="Quantidade de dias" name="endate" class="form-control">
					</div>
					</div>
					
					<div class="d-block text-right card-footer">
					<button type="submit" name="adddias" class="btn btn-primary btn-lg">ADICIONAR DIAS</button>
					<button type="submit" name="deldias" class="btn btn-danger btn-lg">REMOVER DIAS</button>
					
					</div>
					</form>
				</div>
			</div>
			<?php }?>
		</div>
		
		<div class="col-md-4">
			<div class="main-card mb-3 card">
				<div class="card-body p-0">
					<?php echo $_smarty_tpl->tpl_vars['NewPanel']->value;?>

				</div>
			</div>
		</div>
	</div>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:core/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
