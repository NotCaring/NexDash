<!--
:)
Agencia Erick vinicios LTDA
https://erickvinicios.ml
-->




<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>{$pagename} - {$title}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:url" content="{$base_url}index.php?act=index" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{$title} - Administrator Panel" />
    <meta property="og:image:width" content="1080" />
    <meta property="og:image:height" content="1080" />
    <meta property="og:image:alt" content="{$title} - Administrator Panel" />

    <!--===========================================alt====================================================-->
    <link rel="stylesheet" href="{$base_url}assets/vendor/login/bootstrap/css/bootstrap.min.css" />
    <!--===========================================alt====================================================-->
    <link rel="stylesheet" href="{$base_url}assets/vendor/login/fonts/fontawesome-all.min.css" />
    <!--===========================================alt===================================================-->
    <link rel="stylesheet" href="{$base_url}assets/vendor/login/css/styles.css" />
    <!--===========================================alt====================================================-->

    <script src="https://www.google.com/recaptcha/api.js"></script>

  	<!-- getURL using a value (index.php?act=addcrystals) -->
  	<script>
  	function GetSelectedValue() {
  		var getID = document.getElementById("packages");
  		var getURL = getID.value;
  		window.location.href = getURL;
  	}
  	</script>

  	<!-- CL Editor -->
    <script>
        $(document).ready(function() {
            $("#editor").cleditor();
        });
    </script>



  	<!-- Facebook Pixel Code -->
  	<script>
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
  	</script>

  	<!-- Embed Facebook Page -->
  	<div id="fb-root"></div>
  	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId=825527734679961&autoLogAppEvents=1" nonce="BYNZjnD3"></script>

  	<!-- Global site tag (gtag.js) - Google Analytics -->
  	<script async src="https://www.googletagmanager.com/gtag/js?id=G-VY2BSZ1F68"></script>
  	<script>
  	  window.dataLayer = window.dataLayer || [];
  	  function gtag() {
  			dataLayer.push(arguments);
  		}
  	  gtag('js', new Date());

  	  gtag('config', 'G-VY2BSZ1F68');
  	</script>

  	<!-- Google Tag Manager -->
  	<script>
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
  	</script>
  	<!-- End Google Tag Manager -->

  	<!-- Google Recaptcha Responsive -->
  	<script>
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
  	</script>

	<!-- Tooltip Bootstrap -->
  	<script>
  		$(function () {
  		  $('[data-toggle="tooltip"]').tooltip()
  		})
  	</script>
</head>

    <body>

      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WH8CTKS" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->

        <main>



            <form method="POST" class="login" action="{$base_url}index.php?act=login">
                <h2 class="text-center">KG<span>CHEATS</span></h2>
                <p class="text-center">Faça login para iniciar sessão</p>
                {if $oauth.action eq 'login'}
                    {if count($error) > 0}
                    <center>
                    <div class="alert alert-danger" role="alert">

                      <p class="mb-0">
                      {foreach item=text from=$error}
                      <li>{$text}</li>
                      {/foreach}
                      </p>

                    </div>
                    </center>
                    {/if}
                <input type="hidden" name="login_form" />

                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input class="form-control" type="text" id="login" name="login" placeholder="Insira seu nome de usuario" value="{$form.login}" />
                </div>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input class="form-control" type="password" id="password" placeholder="Insira sua senha de usuario" name="password" value="{$form.password}" value="{$form.password}" />
                </div>


                <div class="d-flex mt-4 flex-column align-items-center">

                    <div class="g-recaptcha" data-sitekey="{$recaptcha_key}"></div>
                    <p class="my-3">Não tem conta <a href="{$base_url}index.php?act=register">registre-se</a></p>
                    <button type="submit" class="btn btn-primary fw-bold">
                      Login
                    </button>

                </div>
            </form>
            {/if}


           {if $oauth.action eq 'register'}

            <form class="login" action="{$base_url}index.php?act=login">
                <h2 class="text-center">Cuban<span> Vip</span></h2>
                <p class="text-center">registre-se para iniciar sessão</p>


                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input class="form-control" type="text" placeholder="Nome de usuario" id="login" name="login" value="{$form.login}" />
                </div>
                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input class="form-control" type="password" placeholder="Insisra sua senha" id="password" name="password" value="{$form.repassword}"  />
                </div>
                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input class="form-control" type="password" placeholder="Confirmar senha" id="repassword" name="repassword" value="{$form.repassword}" />
                </div>
                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input class="form-control" type="email" placeholder="E-mail" id="email" name="email" />
                </div>

                <div class="d-flex mt-4 flex-column align-items-center">

                    <div class="g-recaptcha" data-sitekey="{$recaptcha_key}"></div>
                    <p class="my-3">Já tem conta? <a href="/registroo">entrar</a></p>
                    <button class="btn btn-primary fw-bold" type="submit">Registrar</button>

                      {if count($error) > 0}
                      <center>
                      <div class="alert alert-danger" role="alert">

                        <p class="mb-0">
                        {foreach item=text from=$error}
                        <li>{$text}</li>
                        {/foreach}
                        </p>

                      </div>
                      </center>
                      {/if}
                </div>
            </form>

            {/if}
            {if $oauth.action eq 'select'}

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

    							{foreach item=$account from=$accounts}
    								<tr>
    									<td>{$account.login}</td>
    									<td><a href="{$base_url}index.php?act=login&id={$account.id}"><span class="label label-success">Login</span></a></td>
    								</tr>
    							{/foreach}
    						</table>
    					</div>

    				{/if}
        </main>
      <!--===============================================================================================-->
        <script src="{$base_url}assets/vendor/jquery/jquery-3.2.1.min.js"></script>
      <!--===============================================================================================-->
        <script src="{$base_url}assets/vendor/animsition/js/animsition.min.js"></script>
      <!--==================================================alt=============================================-->
        <script src="{$base_url}assets/vendor/login/bootstrap/js/bootstrap.min.js"></script>
      <!--===============================================================================================-->
        <script src="{$base_url}assets/vendor/select2/select2.min.js"></script>
      <!--===============================================================================================-->
        <script src="{$base_url}assets/vendor/daterangepicker/moment.min.js"></script>
        <script src="{$base_url}assets/vendor/daterangepicker/daterangepicker.js"></script>
      <!--===============================================================================================-->
        <script src="{$base_url}assets/vendor/countdowntime/countdowntime.js"></script>
      <!--===============================================================================================-->
        <script src="{$base_url}assets/js/main.js"></script>
    </body>
</html>
