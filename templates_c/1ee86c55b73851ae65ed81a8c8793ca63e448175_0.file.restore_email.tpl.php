<?php
/* Smarty version 3.1.38, created on 2023-02-11 22:00:32
  from '/home/u342152564/domains/infinityofc.net/public_html/templates/email/restore_email.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_63e83a30a446c6_69842802',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ee86c55b73851ae65ed81a8c8793ca63e448175' => 
    array (
      0 => '/home/u342152564/domains/infinityofc.net/public_html/templates/email/restore_email.tpl',
      1 => 1663800690,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e83a30a446c6_69842802 (Smarty_Internal_Template $_smarty_tpl) {
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
