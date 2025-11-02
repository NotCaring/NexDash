<?php
/* Smarty version 3.1.38, created on 2021-12-14 14:39:59
  from '/home/zilhp7sc0kr1/public_html/hackersmod/templates/pages/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_61b8d6ef221c21_98946491',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76225f4b95c57962ed6ee10489116e4bb26fac99' => 
    array (
      0 => '/home/zilhp7sc0kr1/public_html/hackersmod/templates/pages/index.tpl',
      1 => 1639502245,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61b8d6ef221c21_98946491 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <meta name="description" content="Headless Macro - Free Fire Macro" />
    <meta name="keywords" content="Headless Macro - Free Fire Macro" />
    <meta name="author" content="Headless Macro - Free Fire Macro" />
	<meta name="propeller" content="776d7d5183455fe8288f71f392b095bf">
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
images/icons/icon.ico">

    <!-- Magnific-popup -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/css/magnific-popup.css">

    <!--Slider Css-->
    <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/css/owl.theme.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/css/owl.transitions.css" rel="stylesheet">

    <!-- Icon -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/css/mobiriseicons.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/css/materialdesignicons.min.css" />

    <!--bootstrap Css-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/css/bootstrap.min.css" />

    <!-- Custom styles for this template -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/css/style.css" rel="stylesheet">
	
</head>

    <body>

        <!-- START NAVBAR -->
        <nav class="navbar navbar-expand-lg fixed-top custom_nav_menu sticky">
            <div class="container">
                <!-- LOGO -->
                <a class="navbar-brand logo" href="index.html">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/images/logo-2.png" alt="" class="img-fluid logo-light">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/images/logo-dark.png" alt="" class="img-fluid logo-dark">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item active">
                            <a href="#home" class="nav-link">Inicio</a>
                        </li>
                       
						<li class="nav-item">
                            <a href="#planos" class="nav-link">Comprar</a>
                        </li>
						
                  </ul>
                    
				  <a href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=register" class="btn_custom btn btn_small text-capitalize  navbar-btn mr-3">Registrar </a>
				  <a href="<?php echo $_smarty_tpl->tpl_vars['script_url']->value;?>
?act=login" class="btn_custom btn btn_small text-capitalize  navbar-btn mr-3">Login </a>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->

        <!-- Home Section Start-->
        <section class="bg_home_cover full_height_100vh_home" id="home">
            <div class="bg_overlay_cover_on"></div>
            <div class="home_table_cell">
                <div class="home_table_cell_center">
                    <div class="container position-relative up-index">
                        <div class="row vertical_content_manage">
                            <div class="col-lg-6">
                                <div class="">
                                    <h1 class="home_title text-white">Bem-vindo, crie sua conta ou logue para começar😉</h1>
                                    <hr><h2 class="text-white text-capitalize mb-0 pt-3">INJETOR & MOD APK</h2>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="soft_home_side_img mt-3">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/images/soft-dashboard.html" alt="" class="img-fluid mx-auto d-block">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      

        <!-- PLANOS -->
        <section class="section_all bg-light" id="planos">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section_title_all text-center ">
                            <div class="section_icons">
                                <i class="mbri-speed"></i>
                            </div>
                            <h3 class="mt-3">Escolha seu  <span class="text_custom"> Plano </span></h3>
                           
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
					
                    <div class="col-lg-3">
                        <div class="mt-3 software_pricing_plan_box bg-white">
                            <div class="pricing_header text-center">
                                <div class="price-name">
                                    <h4 class="text-capitalize mb-0">30 Dias</h4>
                                </div>
                                <div class="software_price_tag_heading mt-4">
                                    <h2 class="mb-0"><sub>R$</sub>14<span>,90</span></h2>
                                </div>
                            </div>
                            <div class="software_list_price text-muted text-center mb-4 mt-4">
                                <p>Puxadão</p>
                                <p>Bugadão</p>
                                <p>Gel Rápido</p>
                                <p>Granada Rápida</p>
								<p>AWM/Sniper Rápida</p>
								<i class="fas fa-ad"></i>
                            </div>
                            <div class="text-center">
								
                                <a href="https://www.mercadopago.com.br/checkout/v1/redirect?pref_id=130063183-1a9b30b3-b7fa-4eeb-999a-71f32b28198a" target="_blank" class="btn btn_custom btn-rounded btn_small">Mercado Pago</a><p></p>
                                <form target="_blank" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="PLLZGR9W5W6WL">
                                <button name="submit" class="btn btn_custom btn_rounded btn_small" >Paypal</button>
                                
                                </form>
                            </div>
                        </div>
                    </div>
                    
					<div class="col-lg-3">
                        <div class="mt-3 software_pricing_plan_box bg-white">
                            <div class="pricing_header text-center">
                                <div class="price-name">
                                    <h4 class="text-capitalize mb-0">60 Dias</h4>
                                </div>
                                <div class="software_price_tag_heading mt-4">
                                    <h2 class="mb-0"><sub>R$</sub>28<span>,90</span></h2>
                                </div>
                            </div>
                            <div class="software_list_price text-muted text-center mb-4 mt-4">
                                <p>Puxadão</p>
                                <p>Bugadão</p>
                                <p>Gel Rápido</p>
                                <p>Granada Rápida</p>
								<p>AWM/Sniper Rápida</p>
								<i class="fas fa-ad"></i>
                            </div>
                            <div class="text-center">
								
                              <a href="https://www.mercadopago.com.br/checkout/v1/redirect?pref_id=130063183-9f869ee6-9589-471e-8bb7-1bae990553e7" target="_blank" class="btn btn_custom btn-rounded btn_small">Mercado Pago</a><p></p>
								<form target="_blank" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="KBABXM9BXTCM4">
                                <button name="submit" class="btn btn_custom btn_rounded btn_small" >Paypal</button>
                                
                                </form>
                            </div>
                        </div>
                    </div>
					
					<div class="col-lg-3">
                      <div class="mt-3 software_pricing_plan_box bg-white active">
                            <div class="pricing_header text-center">
                                <div class="price-name">
                                    <h4 class="text-capitalize mb-0">90 Dias</h4>
                                </div>
                                <div class="software_price_tag_heading mt-4">
                                    <h2 class="mb-0"><sub>R$</sub>37<span>,90</span></h2>
                                </div>
                            </div>
                            <div class="software_list_price text-muted text-center mb-4 mt-4">
                                <p>Puxadão</p>
                                <p>Bugadão</p>
                                <p>Gel Rápido</p>
                                <p>Granada Rápida</p>
								<p>AWM/Sniper Rápida</p>
								<i class="fas fa-ad"></i>
                            </div>
                            <div class="text-center">
								
                                <a href="https://www.mercadopago.com.br/checkout/v1/redirect?pref_id=130063183-1bb4eb85-f03c-4cd7-ab89-e6a1de8a3dec" target="_blank" class="btn btn_custom btn-rounded btn_small">Mercado Pago</a><p></p>
								<form target="_blank" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="R8DDUXE2G2J5J">
                                <button name="submit" class="btn btn_custom btn_rounded btn_small" >Paypal</button>
                                
                                </form>
								
                            </div>
                        </div>
                    </div>
					<div class="col-lg-3">
                        <div class="mt-3 software_pricing_plan_box bg-white">
                            <div class="pricing_header text-center">
                                <div class="price-name">
                                    <h4 class="text-capitalize mb-0">180 Dias</h4>
                                </div>
                                <div class="software_price_tag_heading mt-4">
                                    <h2 class="mb-0"><sub>R$</sub>69<span>,90</span></h2>
                                </div>
                            </div>
                            <div class="software_list_price text-muted text-center mb-4 mt-4">
                                <p>Puxadão</p>
                                <p>Bugadão</p>
                                <p>Gel Rápido</p>
                                <p>Granada Rápida</p>
								<p>AWM/Sniper Rápida</p>
								<i class="fas fa-ad"></i>
                            </div>
                            <div class="text-center">
								
                              <a href="https://www.mercadopago.com.br/checkout/v1/redirect?pref_id=130063183-4958d0ba-9d82-454d-8f13-f63158b7d92a" target="_blank" class="btn btn_custom btn-rounded btn_small">Mercado Pago</a><p></p>
								<form target="_blank" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="CP8E9KTTQGPV8">
                                <button name="submit" class="btn btn_custom btn_rounded btn_small" >Paypal</button>
                                
                                </form>
								
                            </div>
                        </div>
                    </div>
					

                    
					
					
                </div>
            </div>
        </section>
        <!-- FIM PLANOS  -->

        <!-- ATT -->
    

        <!-- FIM ATT -->

        <!-- TESTE -->
        
        <!-- FIM TESTE -->

        <!-- Footer Start -->
        <section class="section_all bg_custom" id="teste">
            <div class="container">
                
                <div class="row mt-3">
				 <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/images/logo-dark.png" alt="" class="img-fluid mx-auto">
                    <div class="col-lg-12">
                        <div class="text-center mt-3">
                            <p class="footer_alt_cpy mb-0">2019 &copy; <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
.</p>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- Footer End -->
		
        <!-- JAVASCRIPTS -->
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/js/jquery.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/js/popper.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/js/bootstrap.min.js"><?php echo '</script'; ?>
>
        <!--TESTISLIDER JS-->
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/js/owl.carousel.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/js/isotope.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/js/jquery.magnific-popup.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/js/scrollspy.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/js/jquery.easing.min.js"><?php echo '</script'; ?>
>
        <!-- Particles Js -->
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/js/particles.js"><?php echo '</script'; ?>
>  
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/js/particles.app.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
newassets/js/custom.js"><?php echo '</script'; ?>
>
    </body>
</html><?php }
}
