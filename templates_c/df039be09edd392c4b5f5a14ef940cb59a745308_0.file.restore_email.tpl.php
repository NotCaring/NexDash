<?php
/* Smarty version 3.1.38, created on 2022-06-17 12:55:52
  from '/var/www/vhosts/infinityofc.com/httpdocs/templates/email/restore_email.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_62aca408331c85_19241268',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'df039be09edd392c4b5f5a14ef940cb59a745308' => 
    array (
      0 => '/var/www/vhosts/infinityofc.com/httpdocs/templates/email/restore_email.tpl',
      1 => 1643008044,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62aca408331c85_19241268 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
	<head>
		<title>Recuperação de conta <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	</head>
	<body>
		<div>
			<font>
				<div>
				<p>Olá</b>,</p>
				<p>Você solicitou a recuperação de sua conta no <strong><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</strong>!</p>
				<p>Neste endereço de e-mail há cadastradas as seguintes contas:</p>
				<ol>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['accounts']->value, 'account');
$_smarty_tpl->tpl_vars['account']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['account']->value) {
$_smarty_tpl->tpl_vars['account']->do_else = false;
?>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=restore&login=<?php echo $_smarty_tpl->tpl_vars['account']->value['login'];?>
"><?php echo $_smarty_tpl->tpl_vars['account']->value['login'];?>
</a></li>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</ol>
				<p>Selecione a conta na lista e clique nela.</p>
				<p>
				<br>
				<hr>
				<br>
				Equipe <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

				<br>
				<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
</a>
				</p>
				</div>
			</font>
		</div>
	</body>
</html><?php }
}
