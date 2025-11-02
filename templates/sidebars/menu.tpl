{if $auth.logged_in}
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
				<li {if $active eq 'account'} class="mm-active"{/if}>
					<a href="{$script_url}?act=account" id="index">
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
						<li {if $active eq 'adduser'} class="mm-active"{/if}>
							<a href="{$script_url}?act=adduser">
								Adicionar usuário
							</a>
						</li>
						<li {if $active eq 'users'} class="mm-active"{/if}>
							<a href="{$script_url}?act=users">
								Gerenciar usuários
							</a>
						</li>
					</ul>
				</li>
				{if $auth.admin}
				<li class="app-sidebar__heading">Administração</li>
				<li>
					<a href="javascript: void(0);">
						<i class="metismenu-icon fas fa-crown"></i>
						Administração
						<i class="metismenu-state-icon fas fa-caret-down caret-left"></i>
					</a>
					<ul expanded="false">
						<li {if $active eq 'admin'} class="mm-active"{/if}>
							<a href="{$script_url}?act=admin">
								Admin Dashboard
							</a>
						</li>
						<li {if $active eq 'panel'} class="mm-active"{/if}>
							<a href="{$script_url}?act=panel">
								Painel de Administração
							</a>
						</li>
					</ul>
				</li>
				
				{/if}
			</ul>
		</div>
	</div>
</div>
{/if}
<div class="app-main__outer">