<?php
/* Smarty version 3.1.38, created on 2023-08-10 12:31:53
  from '/home/u397551963/domains/hgregeditmod.online/public_html/templates/core/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_64d502e984dec3_54046409',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe7f19f3a5475a7f6643282a8920f4f2f7f883b3' => 
    array (
      0 => '/home/u397551963/domains/hgregeditmod.online/public_html/templates/core/header.tpl',
      1 => 1691680931,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sidebars/menu.tpl' => 1,
  ),
),false)) {
function content_64d502e984dec3_54046409 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<link rel='shortcut icon' type='image/x-icon' href='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/images/icons/icon.ico' />
    <title><?php echo $_smarty_tpl->tpl_vars['pagename']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
	<meta name="msapplication-tap-highlight" content="no">
	<link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
css/main.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" rel="stylesheet" />
    
    <?php echo '<script'; ?>
 src="https://www.google.com/recaptcha/api.js"><?php echo '</script'; ?>
>


	<!-- Facebook Pixel Code -->
	<?php echo '<script'; ?>
>
		!(function (f, b, e, v, n, t, s) {
			if (f.fbq) return;
			n = f.fbq = function () {
				n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments);
			};
			if (!f._fbq) f._fbq = n;
			n.push = n;
			n.loaded = !0;
			n.version = "2.0";
			n.queue = [];
			t = b.createElement(e);
			t.async = !0;
			t.src = v;
			s = b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t, s);
		})(window, document, "script", "https://connect.facebook.net/en_US/fbevents.js");
		fbq("init", "493746141599576");
		fbq("track", "PageView");
	<?php echo '</script'; ?>
>
	
	<!-- Embed Facebook Page -->
	<div id="fb-root"></div>
	<?php echo '<script'; ?>
 async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId=825527734679961&autoLogAppEvents=1" nonce="BYNZjnD3"><?php echo '</script'; ?>
>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<?php echo '<script'; ?>
 async src="https://www.googletagmanager.com/gtag/js?id=G-VY2BSZ1F68"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
	  window.dataLayer = window.dataLayer || [];
	  function gtag() {
			dataLayer.push(arguments);
		}
	  gtag('js', new Date());

	  gtag('config', 'G-VY2BSZ1F68');
	<?php echo '</script'; ?>
>
	
	<!-- Google Tag Manager -->
	<?php echo '<script'; ?>
> 
	(function(w, d, s, l, i) {
		w[l] = w[l] || [];
		w[l].push({
			'gtm.start': new Date().getTime(), event: 'gtm.js'
		});
		var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
		j.async = true;
		j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
		f.parentNode.insertBefore(j, f);
	})(window, document, 'script', 'dataLayer', 'GTM-WH8CTKS'); 
	<?php echo '</script'; ?>
>
	<!-- End Google Tag Manager -->

	<!-- Google Recaptcha Responsive -->
	<?php echo '<script'; ?>
>
	$(document).ready(function () {        
		var width = $('.g-recaptcha').parent().width();
		if (width < 302) {
			var scale = width / 302;
			$('.g-recaptcha').css('transform', 'scale(' + scale + ')');
			$('.g-recaptcha').css('-webkit-transform', 'scale(' + scale + ')');
			$('.g-recaptcha').css('transform-origin', '0 0');
			$('.g-recaptcha').css('-webkit-transform-origin', '0 0');
		}
	}); 
	<?php echo '</script'; ?>
>
	
	<!-- Tooltip Bootstrap -->
	<?php echo '<script'; ?>
>
		$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})	
	<?php echo '</script'; ?>
>
</head>

<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WH8CTKS" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow bg-slick-carbon header-text-light">
            <div class="app-header__logo">
                <div class="logo-src"><center><h6 style="color:white;text-transform:uppercase"><b><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</b></h6></center></div>
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
			<div class="app-header__content">
			<?php if ($_smarty_tpl->tpl_vars['auth']->value['logged_in']) {?>
                <div class="app-header-left">
				
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
					
				</div>
				<div><b style="color:white">Creditos:</b> <?php if ($_smarty_tpl->tpl_vars['auth']->value['credits'] > 50) {?><b style="color:lightgreen"><?php echo $_smarty_tpl->tpl_vars['auth']->value['credits'];?>
</b><?php } else { ?><b style="color:red"><?php echo $_smarty_tpl->tpl_vars['auth']->value['credits'];?>
</b><?php }?></div>	
                <div class="app-header-right">
				
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42"  src="assets/images/avatars/BM.png" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
		
                                            <button type="button" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=changepass'" tabindex="0" class="dropdown-item"><i class="fas fa-key"></i>&nbsp;&nbsp;&nbsp;&nbsp;Mudar Senha</button>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <button type="button" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=logout'" tabindex="0" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Logout</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
									<div class="widget-heading">
										
											<span style="text-transform:capitalize"><?php echo $_smarty_tpl->tpl_vars['auth']->value['login'];?>
</span>
										
									</div>
									<div class="widget-subheading text-center">
										<?php if ($_smarty_tpl->tpl_vars['auth']->value['admin']) {?>
											<i style="color:lightgreen">Administrador</i>
										<?php } elseif ($_smarty_tpl->tpl_vars['auth']->value['mod']) {?>
											<i style="color:lightgreen">Moderador</i>
										<?php } elseif ($_smarty_tpl->tpl_vars['auth']->value['seller']) {?>
											<i style="color:lightgreen">Vendedor</i>
										<?php } else { ?>
											<i style="color:lightgreen">Membro</i>
										<?php }?>
									</div>
									
								</div>
                            </div>
                        </div>
                    </div>
				</div>
			<?php }?>
            </div>
        </div>
		<div class="app-main">
		<?php $_smarty_tpl->_subTemplateRender('file:sidebars/menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
