<?php
/* Smarty version 3.1.38, created on 2023-07-23 01:09:25
  from '/home/u397551963/domains/hg-cheats-online.xyz/public_html/HGNEHBBTENTANAO/templates/sidebars/menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_64bca7f5e7f151_03017340',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2949f49b1b23d4753225dac967d6f12db13bf91b' => 
    array (
      0 => '/home/u397551963/domains/hg-cheats-online.xyz/public_html/HGNEHBBTENTANAO/templates/sidebars/menu.tpl',
      1 => 1690085128,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64bca7f5e7f151_03017340 (Smarty_Internal_Template $_smarty_tpl) {
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
