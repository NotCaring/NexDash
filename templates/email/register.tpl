<html>
	<head>
		<title>Registro de conta {$title}</title>
	</head>
	<body>
		<div>
			<font>
				<div>
				<p>Olá <b style="text-transform:capitalize">{$login}</b>,</p>
				<p>Obrigado por se registrar no {$title}!</p>
				<p>Para ativar sua conta, por favor verifique seu endreço de email acessando o link:</p>
				<p><a href="{$base_url}index.php?act=activation&hash={$hash}" target="_blank" >Click aqui para ativar sua conta.</a></p>
				<p>Se por algum motivo o link acima não funcionar, por favor, copie e cole o link diretamente no seu browser ou simplesmente responda a esse email para suporte.</p>
				<p><a href="{$base_url}index.php?act=activation&hash={$hash}" target="_blank" >{$base_url}index.php?act=activation&hash={$hash}</a></p>
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

