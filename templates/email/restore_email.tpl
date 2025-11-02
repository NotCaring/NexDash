<html>
	<head>
		<title>Recuperação de conta {$title}</title>
	</head>
	<body>
		<div>
			<font>
				<div>
				<p>Olá</b>,</p>
				<p>Você solicitou a recuperação de sua conta no <strong>{$title}</strong>!</p>
				<p>Neste endereço de e-mail há cadastradas as seguintes contas:</p>
				<ol>
					{foreach item=$account from=$accounts}
						<li><a href="{$base_url}index.php?act=restore&login={$account.login}">{$account.login}</a></li>
					{/foreach}
				</ol>
				<p>Selecione a conta na lista e clique nela.</p>
				<p>
				<br>
				<hr>
				<br>
				Equipe {$title}
				<br>
				<a href="{$base_url}" target="_blank">{$base_url}</a>
				</p>
				</div>
			</font>
		</div>
	</body>
</html>