<head>
    <meta charset="utf-8">
	<link rel="shortcut icon" href="{$base_url}assets/images/icons/icon.ico" type="image/x-icon">
    <title>{$pagename} - {$title}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta property="og:url" content="{$base_url}index.php?act=index" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="{$title} - Administrator Panel" />
	<meta property="og:image:width" content="1080" />
	<meta property="og:image:height" content="1080" />
	<meta property="og:image:alt" content="{$title} - Administrator Panel" />
  
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{$base_url}assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{$base_url}assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{$base_url}assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{$base_url}assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{$base_url}assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{$base_url}assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{$base_url}assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{$base_url}assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{$base_url}assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="{$base_url}assets/css/main.css">
<!--===============================================================================================-->
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
	
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				{if $sent}
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
					{else}
						<div class="alert alert-success">
							A senha da sua conta foi alterada com sucesso!
						</div>
						<a href="{$base_url}index.php?act=login" class="btn btn-success">Login</a>
					{/if}
				{/if}
				
				{if !$sent or count($error) > 0}
					<form method="POST" action="{$base_url}index.php?act=setpassword&hash={$hash}" class="login100-form validate-form flex-sb flex-w">
						<span class="login100-form-title p-b-51">
							<small><h6><b>Ninja</b>BR</h6></small>
							<span><h2>{$pagename}</h2></span>
							<hr>
						</span>
						<input type="hidden" name="form" />
						
						<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
							<input class="input100" type="password" id="password" name="password" placeholder="Nova senha">
							<span class="focus-input100"></span>
						</div>
						
						<div class="wrap-input100 validate-input m-b-16" data-validate = "RePassword is required">
							<input class="input100" type="password" id="repassword" name="repassword" placeholder="Confirmar senha">
							<span class="focus-input100"></span>
						</div>
						
						<div class="flex-sb-m w-full p-t-3 p-b-24">
							<div class="contact100-form-checkbox">
								<div class="g-recaptcha" data-sitekey="{$recaptcha_key}"></div>
							</div>
						</div>
						
						<div class="container-login100-form-btn m-t-17">
							<button type="submit" class="login100-form-btn">
								Mudar senha
							</button>
						</div>
					</form>
					<br>
					<div class="alert alert-info">
						<ul>
							<li>A senha pode ter <strong>4-15</strong> caracteres;</li>
							<li>A senha pode conter os seguintes caracteres: <strong>a-z A-Z 0-9</strong>;</li>
							<li>As letras maiúsculas e minúsculas na senha <strong> têm um valor </strong>. Por exemplo, QwErTy e Qwerty são duas senhas <strong> diferentes </strong>.</li>
							
						</ul>
					</div>
				{/if}
				
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>
		
	<!--===============================================================================================-->
		<script src="{$base_url}assets/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
		<script src="{$base_url}assets/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
		<script src="{$base_url}assets/vendor/bootstrap/js/popper.js"></script>
		<script src="{$base_url}assets/vendor/bootstrap/js/bootstrap.min.js"></script>
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