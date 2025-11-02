{include file='file:core/header.tpl'}
<div class="app-main__inner">
	<div class="app-page-title app-page-title-simple">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div>
				<div class="page-title-head center-elem">
					<span class="d-inline-block pr-2">
						<i class="fas fa-user-edit opacity-6"></i>
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
		<div class="col-md-8">
			<div class="main-card mb-3 card">
			{if count($usuarios) > 0}
			{foreach item=record from=$usuarios}
				<div class="card-header">Informações de #{$record.user}</div>
				{if count($error) gt 0}
					<center>
					<div class="alert alert-danger d-flex flex-row">
						<i class="fas fa-fw fa-times-circle mr-3 align-self-center"></i>
						<p class="mb-0">
						{foreach item=text from=$error}
						<li>{$text}</li>
						{/foreach}
						</p>
					</div>
					</center>
				{/if}
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
				<div class="card-body">
				
				<table class="mb-0 table table-bordered">
					<tbody>
					<tr>
						<th scope="row">Usuário</th>
						<td align="center">{$record.user}</td>
						<td width="20%" align="center"><a href="{$script_url}?act=editar&name={$record.user}&sact=changeuser">[Mudar USER]</a></td>
					</tr>
					<tr>
						<th scope="row">Senha</th>
						<td align="center">{$record.password}</td>
						<td width="20%" align="center"><a href="{$script_url}?act=editar&name={$record.user}&sact=changepass">[Mudar PASS]</a></td>
					</tr>
				
					<tr>
						
						<th scope="row">Modo</th>
						<td align="center">{if $record.mode == 'injetor'}<div class="badge badge-pill badge-danger">INJETOR MOBILE</div>{elseif $record.mode == 'x86'}<div class="badge badge-pill badge-danger">INJETOR EMULADOR</div>{elseif $record.mode == 'script'}<div class="badge badge-pill badge-secondary">SCRIPT</div>{elseif $record.mode == 'regedit'}<div class="badge badge-pill badge-info">REGEDIT</div>{else}<div class="badge badge-pill badge-dark">MACRO</div>{/if}</td>
						
						<td width="20%" align="center"><a href="{$script_url}?act=editar&name={$record.user}&sact=changemode">[Mudar MODO]</a></td>
						
					</tr>
					<tr>
						<th scope="row">Data de criação</th>
						<td align="center">{$record.data}</td>
					</tr>
					<tr>
						<th scope="row">Tempo restante</th>
						
						 <script>
							
							var countDownDate = new Date("{$record.dteV}").getTime();

							
							var myfunc = setInterval(function() {

							var now = new Date().getTime();
							var timeleft = countDownDate - now;
								
							
							var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
							var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
							var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
							var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
								
							
							document.getElementById("days").innerHTML = (days < 10) ? ('0' + days) : days;
							document.getElementById("hours").innerHTML = (hours < 10) ? ('0' + hours) : hours;
							document.getElementById("mins").innerHTML = (minutes < 10) ? ('0' + minutes) : minutes;
							document.getElementById("secs").innerHTML = (seconds < 10) ? ('0' + seconds) : seconds;
								
							
							if (timeleft < 0) {
								clearInterval(myfunc);
								
							}
							}, 1000);
							</script>
						{if $record.pause != 1} 
						<td align="center">{if $record.segundos >= 1}<span class="ml-2 badge badge-pill badge-dark"><span id="days"></span> D | <span id="hours"></span>:<span id="mins"></span>:<span id="secs"></span></span> {else}<span class="ml-2 badge badge-pill badge-info">0  | Dias</span>{/if}</td>
						{else}
						<td align="center"><span class="ml-2 badge badge-pill badge-dark">{$record.diasP} D | {$record.horasP}:{$record.minutosP}:{$record.segundosP}</span></td>
						{/if}
					</tr>
					<tr>
						<th scope="row">Status</th>
						<td align="center">{if $record.status != 1}{if $record.dias >= 1}<div class='badge badge-pill badge-success'>Ativo</div>{else}<div class='badge badge-pill badge-info'>Expirado</div>{/if}{else}<div class='badge badge-pill badge-danger'>Banido</div>{/if}</td>
						<td width="20%" align="center">{if $record.status == 0}<a href="{$script_url}?act=editar&name={$record.user}&banir=1">[BANIR]</a>{else}<a href="{$script_url}?act=editar&name={$record.user}&banir=2">[DESBANIR]</a>{/if}</td>
					</tr>
					<tr>
					   
						<th scope="row">Pausar conta</th>
						<td align="center">{if $record.segundos >= 1}{if $record.pause != 1}<div class='badge badge-pill badge-primary'>Em uso</div>{else}<div class='badge badge-pill badge-warning'>Pausado</div>{/if}{else}<div class='badge badge-pill badge-warning'>Expirado</div>{/if}</td>
						<td width="20%" align="center">{if $record.segundos >= 1}{if $record.pause == 0}{if $auth.admin}<a href="{$script_url}?act=editar&name={$record.user}&pause=1">[PAUSAR]</a>{/if}{else}<a href="{$script_url}?act=editar&name={$record.user}&pause=2">[RETOMAR]</a>{/if}{/if}
					</tr>
					</tbody>
				</table>
				</div>
				{/foreach}
			{/if}
			</div>
			
			{if $auth.admin}
			<div class="main-card mb-3 card">
				<div class="card-header">Editar Tempo do Membro
				</div>
				<div class="card-body">
					
					<form action="" method="POST">
				
					<div class="position-relative row form-group">
					<label for="exampleEmail" class="col-sm-2 col-form-label">Tempo do Membro</label>
					<div class="col-sm-10">
					<input size="2" type="number" min="0" placeholder="Quantidade de dias" name="endate" class="form-control">
					</div>
					</div>
					
					<div class="d-block text-right card-footer">
					<button type="submit" name="adddias" class="btn btn-primary btn-lg">ADICIONAR DIAS</button>
					<button type="submit" name="deldias" class="btn btn-danger btn-lg">REMOVER DIAS</button>
					
					</div>
					</form>
				</div>
			</div>
			{/if}
		</div>
		
		<div class="col-md-4">
			<div class="main-card mb-3 card">
				<div class="card-body p-0">
					{$NewPanel}
				</div>
			</div>
		</div>
	</div>
</div>
{include file='file:core/footer.tpl'}