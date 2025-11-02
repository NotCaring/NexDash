<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="{$base_url}img/icon.ico" type="image/x-icon">
		<title>{$pagename} - {$title}</title>
		<link href="{$base_url}css/bootstrap.min.css" rel="stylesheet">
		<link href="{$base_url}css/bootstrap-override.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		{literal}
			<style>
				.error-template {padding: 40px 15px;text-align: center;}
				.error-actions {margin-top:15px;margin-bottom:15px;}
				.error-actions .btn { margin-right:10px; }
			</style>
		{/literal}
	
	</head>

	<body>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="error-template">
					
						<h1>Ooops!</h1>
						<h2>A critical error has occurred!</h2>
						<div class="error-details">
							{if $error.debug eq true}
								{$error.message}
							{/if}
						</div>
						
						<div class="error-actions">
							<a href="{$base_url}index.php" class="btn btn-primary btn-lg">
								<span class="glyphicon glyphicon-home"></span>
								Return to Home
							</a>	
						</div>
					</div>
					
				</div>
			</div>
		</div>
	
	</body>

</html>