<?php
/* Smarty version 3.1.38, created on 2023-02-11 19:31:55
  from '/home/u342152564/domains/infinityofc.net/public_html/templates/pages/account/changepass.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_63e8175b62aa23_30321217',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ab9bb700a627260fd0b2910ae72c90843fb2487' => 
    array (
      0 => '/home/u342152564/domains/infinityofc.net/public_html/templates/pages/account/changepass.tpl',
      1 => 1676144870,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:core/header.tpl' => 1,
    'file:core/footer.tpl' => 1,
  ),
),false)) {
function content_63e8175b62aa23_30321217 (Smarty_Internal_Template $_smarty_tpl) {
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
