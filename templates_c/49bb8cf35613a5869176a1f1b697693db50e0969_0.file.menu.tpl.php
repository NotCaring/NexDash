<?php
/* Smarty version 3.1.38, created on 2022-06-07 23:21:58
  from '/var/www/vhosts/infinityofc.com/httpdocs/templates/sidebars/menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_62a007c6d68306_30467029',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '49bb8cf35613a5869176a1f1b697693db50e0969' => 
    array (
      0 => '/var/www/vhosts/infinityofc.com/httpdocs/templates/sidebars/menu.tpl',
      1 => 1654497894,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a007c6d68306_30467029 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['auth']->value['logged_in']) {?>
<div class="app-sidebar sidebar-shadow bg-slick-carbon sidebar-text-light">
	<div class="app-header__logo">
		<div class="logo-src"></div>
		<div class="header__pane ml-auto">
			<div>
				<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>
			</div>
		</div>
	</div>
	<div class="app-header__mobile-menu">
		<div>
			<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button>
		</div>
	</div>
	<div class="app-header__menu">
		<span>
			<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
				<span class="btn-icon-wrapper">
					<i class="fa fa-ellipsis-v fa-w-6"></i>
				</span>
			</button>
		</span>
	</div>
	<div class="scrollbar-sidebar">
		<div class="app-sidebar__inner">
			<ul class="vertical-nav-menu">
				<li class="app-sidebar__heading">Dashboards</li>
				<li <?php if ($_smarty_tpl->tpl_vars['active']->value == 'account') {?> class="mm-active"<?php }?>>
					<a href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=account" id="index">
						<i class="metismenu-icon fas fa-tv"></i>
						Dashboard
					</a>
				</li>
				<li class="app-sidebar__heading">Gerenciamento</li>
				<li>
					<a href="javascript: void(0);">
						<i class="metismenu-icon fas fa-receipt"></i>
						Gerenciar
						<i class="metismenu-state-icon fas fa-caret-down caret-left"></i>
					</a>
					<ul expanded="false">
						<li <?php if ($_smarty_tpl->tpl_vars['active']->value == 'adduser') {?> class="mm-active"<?php }?>>
							<a href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=adduser">
								Adicionar usuário
							</a>
						</li>
						<li <?php if ($_smarty_tpl->tpl_vars['active']->value == 'users') {?> class="mm-active"<?php }?>>
							<a href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=users">
								Gerenciar usuários
							</a>
						</li>
					</ul>
				</li>
				<?php if ($_smarty_tpl->tpl_vars['auth']->value['admin']) {?>
				<li class="app-sidebar__heading">Administração</li>
				<li>
					<a href="javascript: void(0);">
						<i class="metismenu-icon fas fa-crown"></i>
						Administração
						<i class="metismenu-state-icon fas fa-caret-down caret-left"></i>
					</a>
					<ul expanded="false">
						<li <?php if ($_smarty_tpl->tpl_vars['active']->value == 'admin') {?> class="mm-active"<?php }?>>
							<a href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=admin">
								Admin Dashboard
							</a>
						</li>
						<li <?php if ($_smarty_tpl->tpl_vars['active']->value == 'panel') {?> class="mm-active"<?php }?>>
							<a href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=panel">
								Painel de Administração
							</a>
						</li>
					   <li <?php if ($_smarty_tpl->tpl_vars['active']->value == 'register') {?> class="mm-active"<?php }?>>
							<a href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=register">
								Adicionar Vendedor
							</a>
						</li>
					</ul>
				</li>
				
				<?php }?>
			</ul>
		</div>
	</div>
</div>
<?php }?>
<div class="app-main__outer"><?php }
}
