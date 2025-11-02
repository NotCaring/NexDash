{include file='file:core/header.tpl'}
<div class="app-main__inner">
<div class="app-page-title app-page-title-simple">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
		<div>
			<div class="page-title-head center-elem">
				<span class="d-inline-block pr-2">
					<i class="fas fa-at opacity-6"></i>
				</span>
				<span class="d-inline-block">{$pagename}</span>
			</div>
			<div class="page-title-subheading opacity-10">
				<nav class="" aria-label="breadcrumb">
					<ol class="breadcrumb">
						{foreach item=breadcrumb from=$breadcrumbs}
							{if $breadcrumb.url eq ""}
									<li class="breadcrumb-item active"><a>{$breadcrumb.caption}</a></li>
							{else}
									<li class="breadcrumb-item"><a href="{$breadcrumb.url}">{$breadcrumb.caption}</a></li>
							{/if}
						{/foreach}
					</ol>
				</nav>
			</div>
		</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="main-card mb-3 card">
			<div class="card-header">{$pagename}
			</div>
			<div class="card-body">
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
					<div class="alert alert-success d-flex flex-row">
						<i class="fas fa-fw fa-check-circle mr-3 align-self-center"></i>
						<p class="mb-0">Seu endereço de e-mail foi alterado com sucesso para <strong>{$email}</strong>!</p>
					</div>
					{/if}
				{/if}
				
				<form action="{$base_url}index.php?act=changemail" method="POST">
					<input type="hidden" name="form" />
					<div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label">E-mail</label>
						<div class="col-sm-10">
							<input type="text" name="email" placeholder="Email" value="{$email}" class="form-control" required>
						</div>
					</div>
					
					<div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label"></label>
						<div class="col-sm-10">
							<div class="g-recaptcha" data-sitekey="{$recaptcha_key}"></div>
						</div>
					</div>
					
					<div class="d-block text-right card-footer">
						<button type="submit" name="Submit" class="btn btn-dark btn-lg">Mudar e-mail</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
{include file='file:core/footer.tpl'}