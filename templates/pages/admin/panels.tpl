{include file='file:core/header.tpl'}
<div class="app-main__inner">
	<div class="app-page-title app-page-title-simple">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div>
				<div class="page-title-head center-elem">
					<span class="d-inline-block pr-2">
						<i class="fas fa-crown opacity-6"></i>
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
	{if count($success) > 0}
		<center>
		<div class="alert alert-success d-flex flex-row">
			<i class="fas fa-fw fa-check-circle mr-3 align-self-center"></i>
			<p class="mb-0">
			{foreach item=text from=$success}
			<li>{$text}</li>
			{/foreach}
			</p>
				
		</div>
		</center>
	{/if}
	{if count($message) > 0}
		<center>
		<div class="alert alert-danger d-flex flex-row" role="alert">
			
			<p class="mb-0">
			{foreach item=text from=$message}
			<li>{$text}</li>
			{/foreach}
			</p>
				
		</div>
		</center>
	{/if}
	<div class="row">
		<div class="col-md-12">
			<div class="main-card mb-3 card">
				
					{$NewPanel}
				<p>
				<center>
					<a href="javascript:parent.history.back();">Voltar</a><br/>
					<a href="index.php?act=admin">Administração</a>
				</center>
				</p>
			</div>
		</div>		
	</div>
</div>
{include file='file:core/footer.tpl'}
