<?php
/* Smarty version 3.1.38, created on 2022-06-01 14:11:09
  from 'C:\xampp2\htdocs\templates\pages\account\changepass.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_62979dad0f63c4_22793341',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '07d54992550e1934cfa2830a020ac8e45914b5fa' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\templates\\pages\\account\\changepass.tpl',
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
function content_62979dad0f63c4_22793341 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:core/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="app-main__inner">
<div class="app-page-title app-page-title-simple">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
		<div>
			<div class="page-title-head center-elem">
				<span class="d-inline-block pr-2">
					<i class="fas fa-key opacity-6"></i>
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
			<div class="card-header"><?php echo $_smarty_tpl->tpl_vars['pagename']->value;?>

			</div>
			
			<div class="card-body">
				<?php if ($_smarty_tpl->tpl_vars['sent']->value) {?>
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
					<?php } else { ?>
					<div class="alert alert-success d-flex flex-row">
						<i class="fas fa-fw fa-check-circle mr-3 align-self-center"></i>
						<p class="mb-0">A senha da sua conta foi alterada com sucesso!</p>
					</div>
					<?php }?>
				<?php }?>
				
				<form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=changepass" method="POST">
					<input type="hidden" name="form" />
					<div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label">Senha atual</label>
						<div class="col-sm-10">
							<input type="text" name="oldpass" placeholder="Senha atual" class="form-control" required>
						</div>
					</div>
					
					<div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label">Nova senha</label>
						<div class="col-sm-10">
							<input type="text" name="newpass" placeholder="Digite a nova senha" class="form-control" required>
						</div>
					</div>
					
					<div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label">Confirmar nova senha</label>
						<div class="col-sm-10">
							<input type="text" name="repass" placeholder="Confirme a nova senha" class="form-control" required>
						</div>
					</div>
					
					<div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label"></label>
						<div class="col-sm-10">
							<div class="g-recaptcha" data-sitekey="<?php echo $_smarty_tpl->tpl_vars['recaptcha_key']->value;?>
"></div>
						</div>
						
					</div>
					<div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label"></label>
						<div class="col-sm-10">
							<div class="alert alert-info">
								<ul class="list-unstyled">
									<li>A senha pode ter de <strong> 4 a 15 </strong> caracteres;</li>
									<li>A senha pode conter os seguintes caracteres: <strong> a-z A-Z 0-9 </strong>;</li>
									<li>As letras maiúsculas e minúsculas na senha <strong> têm um valor </strong>. Por exemplo, QwErTy e Qwerty são duas senhas <strong> diferentes </strong>.</li>
								</ul>
							</div>
						</div>
						
					</div>
					
					<div class="d-block text-right card-footer">
						<button type="submit" name="Submit" class="btn btn-dark btn-lg">Mudar senha</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:core/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
