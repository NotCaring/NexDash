<html>
	<head>
		<title>Recuperação de conta {$title}</title>
	</head>
	<body>
		<div>
			<font>
				<div>
				<p>Olá <b style="text-transform:capitalize">{$login}</b>,</p>
				<p>Você solicitou a recuperação de sua conta <strong>{$login}</strong> no <strong>{$title}</strong>!</p>
				<p><a href="{$base_url}index.php?act=setpassword&hash={$hash}">Clique neste link para restaurar sua conta.</a></p>
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

