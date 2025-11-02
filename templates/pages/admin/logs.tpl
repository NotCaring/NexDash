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
	<div class="row">
		<div class="col-md-12">
			<div class="main-card mb-3 card">
				<div class="card-body">
				<a class="btn btn-dark" readonly href="index.php?act=admin" role="button">Admin</a>
				<a class="btn btn-primary" href="index.php?act=panel" role="button">Painel de Administração</a>
				<a class="btn btn-success" href="index.php?act=logsadmin" role="button">Logs dos admins</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			
			<div class="row">
				<div class="col-md-12">
					<div class="main-card mb-3 card">
						<div class="card-header"> Logs dos usuários
							<div class="btn-actions-pane-right actions-icon-btn">
								
							</div>
						</div>
					
						<div class="card-body p-2">
							<div class="table-responsive">
								<div class="tab-content">
									{if count($logs) > 0}
									<table id="example" class="table table-hover">
										<thead class="thead-light">
											<tr>
												<th>#</th>
												<th>Ação</th>
												<th>Usuário</th>
												<th>Cliente</th>
												<th>Data</th>
												<th>Informações</th>
											</tr>
										</thead>
											
										<tbody>
											{foreach item=cheat from=$logs}
											<tr>
												
												<td>{$cheat.id}</td>
												<td>{$cheat.action}</td>
												<td>{$cheat.username}</td>
												<td>{$cheat.cliente}</td>
												<td>{$cheat.data}</td>
												<td>{$cheat.info_adicional}</td>
											</tr>
											{/foreach}
											
										</tbody>
									</table>
									{/if}
									
								</div>
							</div>
						</div>
					</div>
				</div>
						
			</div>

		</div>
	</div>
	
</div>
{include file='file:core/footer.tpl'}