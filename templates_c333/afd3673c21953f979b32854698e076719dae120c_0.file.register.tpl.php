<?php
/* Smarty version 3.1.38, created on 2022-01-24 01:27:24
  from '/home/u129344762/domains/ninjacheat.xyz/public_html/CHEAT/Ninja/templates/pages/register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_61ee2aac24b025_29223681',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'afd3673c21953f979b32854698e076719dae120c' => 
    array (
      0 => '/home/u129344762/domains/ninjacheat.xyz/public_html/CHEAT/Ninja/templates/pages/register.tpl',
      1 => 1642998443,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61ee2aac24b025_29223681 (Smarty_Internal_Template $_smarty_tpl) {
?><head>
    <meta charset="utf-8">
	<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/images/icons/icon.ico" type="image/x-icon">
    <title><?php echo $_smarty_tpl->tpl_vars['pagename']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta property="og:url" content="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=index" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 - Administrator Panel" />
	<meta property="og:image:width" content="1080" />
	<meta property="og:image:height" content="1080" />
	<meta property="og:image:alt" content="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 - Administrator Panel" />
  
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/main.css">
<!--===============================================================================================-->
    <?php echo '<script'; ?>
 src="https://www.google.com/recaptcha/api.js"><?php echo '</script'; ?>
>

	<!-- getURL using a value (index.php?act=addcrystals) -->
	<?php echo '<script'; ?>
>
	function GetSelectedValue() {
		var getID = document.getElementById("packages");
		var getURL = getID.value;
		window.location.href = getURL;
	}
	<?php echo '</script'; ?>
>
	
	<!-- CL Editor -->
    <?php echo '<script'; ?>
>
        $(document).ready(function() {
            $("#editor").cleditor();
        });
    <?php echo '</script'; ?>
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
	
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				
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
					<div class="alert alert-success">
						<?php if ($_smarty_tpl->tpl_vars['activation']->value) {?>
						Sua conta foi criada com sucesso <strong><?php echo $_smarty_tpl->tpl_vars['login']->value;?>
</strong>! Um e-mail com instruções sobre como ativar sua conta foi enviado para seu endereço de e-mail.
						 <meta http-equiv="refresh" content="2; URL='<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=login'"/>
						<?php } else { ?>
						Sua conta foi criada com sucesso <strong><?php echo $_smarty_tpl->tpl_vars['login']->value;?>
</strong>! Agora você pode fazer <strong><a href="index.php?act=login&login=<?php echo $_smarty_tpl->tpl_vars['login']->value;?>
">login</a></strong>.
						<?php }?>
					</div>
					<?php }?>
				<?php }?>
				
				<form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=register" class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-51">
						<small><h6><b>Ninja</b>¹³</h6></small>
						<span><h2><?php echo $_smarty_tpl->tpl_vars['pagename']->value;?>
</h2></span>
						<hr>
					</span>
					<input type="hidden" name="form" />
					
					<!--<div class="flex-sb-m w-full p-t-3 p-b-24">
						<a href="<?php echo $_smarty_tpl->tpl_vars['auth_url']->value['facebook'];?>
" class="fb connect">Entrar com o Facebook</a>
					</div>-->
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="text" placeholder="Usuário" id="login" name="login">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" id="password" name="password" placeholder="Senha">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "RePassword is required">
						<input class="input100" type="password" id="repassword" name="repassword" placeholder="Confirmar senha">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Email is required">
						<input class="input100" type="text" placeholder="E-mail" id="email" name="email">
						<span class="focus-input100"></span>
					</div>
					<div class="flex-sb-m w-full p-t-3 p-b-24">
						<div class="contact100-form-checkbox">
							<div class="g-recaptcha" data-sitekey="<?php echo $_smarty_tpl->tpl_vars['recaptcha_key']->value;?>
"></div>
						</div>
					</div>
					<div class="flex-sb-m w-full p-t-3 p-b-24">
						<div class="contact100-form-checkbox">
									Já tem uma conta? 
						</div>
						<div>
							<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=login" class="btn btn-primary" title="Já tem uma conta?">
								 FAZER LOGIN
							</a>
						</div>
					</div>
					<div class="container-login100-form-btn m-t-17">
						<button type="submit" class="login100-form-btn">
							Registrar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>
		
	<!--===============================================================================================-->
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/vendor/jquery/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
	<!--===============================================================================================-->
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/vendor/animsition/js/animsition.min.js"><?php echo '</script'; ?>
>
	<!--===============================================================================================-->
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/vendor/bootstrap/js/popper.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/vendor/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
	<!--===============================================================================================-->
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/vendor/select2/select2.min.js"><?php echo '</script'; ?>
>
	<!--===============================================================================================-->
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/vendor/daterangepicker/moment.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/vendor/daterangepicker/daterangepicker.js"><?php echo '</script'; ?>
>
	<!--===============================================================================================-->
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/vendor/countdowntime/countdowntime.js"><?php echo '</script'; ?>
>
	<!--===============================================================================================-->
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/main.js"><?php echo '</script'; ?>
>
	</body>
</html><?php }
}
