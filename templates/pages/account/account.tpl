{include file='file:core/header.tpl'}
<div class="app-main__inner">
<div class="app-page-title app-page-title-simple">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div>
			<div class="page-title-head center-elem">
				<span class="d-inline-block pr-2">
					<i class="fas fa-building opacity-6"></i>
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
		<div class="col-lg-6 col-xl-4">
			<div class="card mb-3 widget-content bg-premium-dark">
				<div class="widget-content-wrapper text-white">
					<div class="widget-content-left">
						<div class="widget-heading">Usuários válidos</div>
						<div class="widget-subheading">Total de clientes válidos</div>
					</div>
					<div class="widget-content-right">
						<div class="widget-numbers text-warning"><span>{$account.validos}</span></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-xl-4">
			<div class="card mb-3 widget-content bg-premium-dark">
				<div class="widget-content-wrapper text-white">
					<div class="widget-content-left">
						<div class="widget-heading">Usuários expirados</div>
						<div class="widget-subheading">Total de clientes expirados</div>
					</div>
					<div class="widget-content-right">
						<div class="widget-numbers text-warning"><span> {$account.expirados}</span></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-xl-4">
			<div class="card mb-3 widget-content bg-premium-dark">
				<div class="widget-content-wrapper text-white">
					<div class="widget-content-left">
						<div class="widget-heading">R$ Total</div>
						<div class="widget-subheading">Total de R$</div>
					</div>
					<div class="widget-content-right">
						<div class="widget-numbers text-warning"><span>R$ {$account.total}</span></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="main-card mb-3 card">
				<div class="card-header"> Status dos mods
					
				</div>
				<div class="card-body p-0">
					
					<div class="table-responsive">
						<table class="table">
							<thead align="center" class="thead-dark ">
								<tr>
									<th>Última Atualização</th>
									<th>Versão</th>
									<th>Status</th>
									<th>Tipo</th>
									<th>Download</th>
								</tr>
							</thead>
							
							<tbody align="center">
							{if count($modinfo) > 0}
								{foreach item=info from=$modinfo}
									<tr>
										<td>{$info.lastupdate}</td>
										<td>{$info.version}</td>
										<td>{if $info.status == 'ON'}<div class="badge badge-pill badge-success">Online</div>{elseif $info.status == 'ATT'}<div class="badge badge-pill badge-warning">Manutenção</div>{else}<div class="badge badge-pill badge-danger">Offline</div>{/if}</td>
										<td>{if $info.type == 'x64'}<div class="badge badge-dark">INJETOR MOBILE</div>{elseif $info.type == 'x86'}<div class="badge badge-pill badge-danger">INJETOR EMULADOR</div>{elseif $info.type == 'injetor'}<div class="badge badge-dark">INJETOR MOBILE</div>{elseif $info.type == 'script'}<div class="badge badge-pill badge-secondary">SCRIPT</div>{elseif $info.type == 'regedit'}<div class="badge badge-pill badge-info">REGEDIT</div>{else}<div class="badge badge-pill badge-dark">MACRO</div>{/if}</td>
										<td>
											<a class="btn btn-primary" href="{$info.download}">
												<i class="fa fa-download" style="padding-right:10px;"></i>DOWNLOAD 
											</a>
										</td>
									</tr>
								{/foreach}
							{/if}
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
		</div>		
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="main-card mb-3 card">
				<div class="card-header">Últimos usuários registrados
				</div>
				<div class="card-body p-0">
		
					<div class="table-responsive">
					<table class="mb-0 table table-striped table-hover">
						<thead align="center" class="thead-dark">
							<tr>
								<th>Usuário</th>
								<th>Vendedor</th>
								<th>Data</th>
								<th>Tipo</th>
							</tr>
						</thead>
						<tbody align="center">
							{if count($lastsell) > 0}
								{foreach item=last from=$lastsell}
									<tr>
										<td style="text-transform: capitalize;">{$last.user}</td>
										<td style="text-transform: capitalize;">{$last.vendedor}</td>
										<td>{$last.data}</td>
										<td>{if $last.modo == 'injetor'}<div class="badge badge-dark">INJETOR MOBILE</div>{elseif $last.modo == 'x86'}<div class="badge badge-pill badge-danger">INJETOR EMULADOR</div>{elseif $last.modo == 'script'}<div class="badge badge-pill badge-secondary">SCRIPT</div>{elseif $last.modo == 'regedit'}<div class="badge badge-pill badge-info">REGEDIT</div>{else}<div class="badge badge-pill badge-dark">MACRO</div>{/if}</td>
									</tr>
								{/foreach}
							{/if}
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="main-card mb-3 card">
				<div class="card-header"> <b><i class="fas fa-trophy"></i></b> &nbsp;&nbsp;Melhores Vendedores</center>
				</div>
				<div class="card-body p-0">
					<div class="table-responsive">
						<table class="mb-0 table table-striped table-hover">
							<thead align="center" class="thead-dark">
								<tr>
									<th>Rank</th>
									<th>Usuário</th>
									<th>Vendas</th>
								</tr>
							</thead>
							<tbody align="center">
								{if count($rank) > 0}
								{foreach item=ranks from=$rank}
								<tr>
									{if $ranks.rank == 1}
									<td><span style="display: inline-block;width:20px!important;height:20px!important;border-radius:50%!important;" class="bg-sunny-morning"><i style="color:#FFCD00!important;" class="fas fa-medal"></i></span></td>
									{elseif $ranks.rank == 2}
									<td><span style="display: inline-block;width:20px!important;height:20px!important;border-radius:50%!important;" class="bg-secondary"><i style="color:#DADADA!important;" class="fas fa-medal"></i></span></td>
									{elseif $ranks.rank == 3}
									<td><span style="display: inline-block;width:20px!important;height:20px!important;border-radius:50%!important;" class="bg-strong-bliss"><i style="color:#DEC2C2!important;" class="fas fa-medal"></i></span></td>
									{else}
									<td><span style="display: inline-block;width:20px!important;height:20px!important;border-radius:50%!important;" class="bg-heavy-rain"> <b style="color:#545454">{$ranks.rank}</b></span></td>
									{/if}
									<td><b style="text-transform: uppercase;">{$ranks.user}</b></td>
									<td><span class="ml-2 badge badge-pill badge-dark">{$ranks.vendas}</span></td>
									
								</tr>
								{/foreach}
								{/if}
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>		
	</div>
</div>
{include file='file:core/footer.tpl'}