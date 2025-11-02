<?php
/* Smarty version 3.1.38, created on 2022-06-07 12:55:46
  from '/var/www/vhosts/infinityofc.com/httpdocs/teste/templates/pages/register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_629f7502b6f072_30834778',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '917a431f5de1cd43f1475c9728b4c246d49a5a93' => 
    array (
      0 => '/var/www/vhosts/infinityofc.com/httpdocs/teste/templates/pages/register.tpl',
      1 => 1654617343,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:core/header.tpl' => 1,
  ),
),false)) {
function content_629f7502b6f072_30834778 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:core/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="app-main__inner">
<div class="app-page-title app-page-title-simple">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
		<div>
			<div class="page-title-head center-elem">
				<span class="d-inline-block pr-2">
					<i class="fas fa-user-plus opacity-6"></i>
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
<br>
	
<div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Adicionar Vendedor
                </div>
                <div class="card-body">
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
				
				<form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=register" class="login100-form validate-form flex-sb flex-w">
				<input type="hidden" name="form" />
		
                    <div class="position-relative row form-group">
                            <label for="exampleEmail" class="col-sm-2 col-form-label">Usuário</label>
                            <div class="col-sm-10">
                            <input type="text" name="login" placeholder="Digite o usuário" class="form-control" required>
                        </div>
					</div>

                    <div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label">Senha</label>
						<div class="col-sm-10">
							<input type="text" name="password" placeholder="Digite uma senha" class="form-control" required>
						</div>
					</div>

                    <div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label">Confirmar</label>
						<div class="col-sm-10">
							<input type="text" name="repassword" placeholder="Confirmar senha" class="form-control" required>
						</div>
					</div>

                    <div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label">Creditos</label>
						<div class="col-sm-10">
							<input type="text" name="credits" placeholder="Quantidades de creditos" class="form-control" required>
						</div>
					</div>

                    <div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label">Cargo</label>
						<div class="col-sm-10">
							<select name="a_level" class="form-control">
							<option value="30">Vendedor</option>
                            <option value="99">Administrador</option>
							</select>
						</div>
					</div>
				
					<div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label"></label>
						<div class="col-sm-10">
							<div class="g-recaptcha" data-sitekey="<?php echo $_smarty_tpl->tpl_vars['recaptcha_key']->value;?>
"></div>
						</div>
					</div>
                    
					<div class="d-block text-right card-footer">
						<button type="submit" name="Submit" class="btn btn-dark btn-lg">Adicionar usuário</button>
					</div>
				</form>
			</div>
		</div>
	</div>
 </div>
</div><?php }
}
