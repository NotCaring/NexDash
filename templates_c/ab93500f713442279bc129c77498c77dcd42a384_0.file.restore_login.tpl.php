<?php
/* Smarty version 3.1.38, created on 2023-02-11 22:04:04
  from '/home/u342152564/domains/infinityofc.net/public_html/templates/email/restore_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_63e83b0414c8e0_69334271',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab93500f713442279bc129c77498c77dcd42a384' => 
    array (
      0 => '/home/u342152564/domains/infinityofc.net/public_html/templates/email/restore_login.tpl',
      1 => 1663800691,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e83b0414c8e0_69334271 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
	<head>
		<title>Recuperação de conta <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	</head>
	<body>
		<div>
			<font>
				<div>
				<p>Olá <b style="text-transform:capitalize"><?php echo $_smarty_tpl->tpl_vars['login']->value;?>
</b>,</p>
				<p>Você solicitou a recuperação de sua conta <strong><?php echo $_smarty_tpl->tpl_vars['login']->value;?>
</strong> no <strong><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</strong>!</p>
				<p><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
index.php?act=setpassword&hash=<?php echo $_smarty_tpl->tpl_vars['hash']->value;?>
">Clique neste link para restaurar sua conta.</a></p>
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
</html>

<?php }
}
