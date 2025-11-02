<?php
/* Smarty version 3.1.38, created on 2023-02-12 18:23:24
  from '/home/u342152564/domains/infinityofc.net/public_html/templates/pages/account/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_63e958cc3d3158_95007695',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74aa8b7396cd85b26fcff348dd6f5c24351e43d6' => 
    array (
      0 => '/home/u342152564/domains/infinityofc.net/public_html/templates/pages/account/login.tpl',
      1 => 1676237000,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e958cc3d3158_95007695 (Smarty_Internal_Template $_smarty_tpl) {
?><!--
:)
Agencia Erick vinicios LTDA
https://erickvinicios.ml
-->




<!DOCTYPE html>
<html lang="en">
    <head>
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

    <!--===========================================alt====================================================-->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/vendor/login/bootstrap/css/bootstrap.min.css" />
    <!--===========================================alt====================================================-->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/vendor/login/fonts/fontawesome-all.min.css" />
    <!--===========================================alt===================================================-->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/vendor/login/css/styles.css" />
    <!--===========================================alt====================================================-->

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

        <main>



            <form method="POST" class="login" action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=login">
                <h2 class="text-center">Infinity<span>Team</span></h2>
                <p class="text-center">Faça login para iniciar sessão</p>
                <?php if ($_smarty_tpl->tpl_vars['oauth']->value['action'] == 'login') {?>
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
                <input type="hidden" name="login_form" />

                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input class="form-control" type="text" id="login" name="login" placeholder="Insira seu nome de usuario" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['login'];?>
" />
                </div>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input class="form-control" type="password" id="password" placeholder="Insira sua senha de usuario" name="password" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['password'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['password'];?>
" />
                </div>


                <div class="d-flex mt-4 flex-column align-items-center">

                    <div class="g-recaptcha" data-sitekey="<?php echo $_smarty_tpl->tpl_vars['recaptcha_key']->value;?>
"></div>
                    <p class="my-3">Não tem conta <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=register">registre-se</a></p>
                    <button type="submit" class="btn btn-primary fw-bold">
                      Login
                    </button>

                </div>
            </form>
            <?php }?>


           <?php if ($_smarty_tpl->tpl_vars['oauth']->value['action'] == 'register') {?>

            <form class="login" action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=login">
                <h2 class="text-center">Infinity<span>Team</span></h2>
                <p class="text-center">registre-se para iniciar sessão</p>


                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input class="form-control" type="text" placeholder="Nome de usuario" id="login" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['login'];?>
" />
                </div>
                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input class="form-control" type="password" placeholder="Insisra sua senha" id="password" name="password" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['repassword'];?>
"  />
                </div>
                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input class="form-control" type="password" placeholder="Confirmar senha" id="repassword" name="repassword" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['repassword'];?>
" />
                </div>
                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input class="form-control" type="email" placeholder="E-mail" id="email" name="email" />
                </div>

                <div class="d-flex mt-4 flex-column align-items-center">

                    <div class="g-recaptcha" data-sitekey="<?php echo $_smarty_tpl->tpl_vars['recaptcha_key']->value;?>
"></div>
                    <p class="my-3">Já tem conta? <a href="/registroo">entrar</a></p>
                    <button class="btn btn-primary fw-bold" type="submit">Registrar</button>

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
                </div>
            </form>

            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['oauth']->value['action'] == 'select') {?>

    					<div class="panel-body">
    						<div class="page-header">
    						<h2>Selecionar conta
    						</h2>

    						</div>

    						<div class="alert alert-info">
    							<p>Escolha a conta que deseja usar para fazer login.</p>
    						</div>

    						<table class="table table-condensed table-hover table-striped">
    							<tr>
    								<th>Conta</th>
    								<th>Ação</th>
    							</tr>

    							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['accounts']->value, 'account');
$_smarty_tpl->tpl_vars['account']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['account']->value) {
$_smarty_tpl->tpl_vars['account']->do_else = false;
?>
    								<tr>
    									<td><?php echo $_smarty_tpl->tpl_vars['account']->value['login'];?>
</td>
    									<td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=login&id=<?php echo $_smarty_tpl->tpl_vars['account']->value['id'];?>
"><span class="label label-success">Login</span></a></td>
    								</tr>
    							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    						</table>
    					</div>

    				<?php }?>
        </main>
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
      <!--==================================================alt=============================================-->
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/vendor/login/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
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
</html>
<?php }
}
