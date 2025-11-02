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
				<a class="btn btn-primary" href="index.php?act=panel" role="button">Painel de Administração</a>
				<a class="btn btn-info" href="index.php?act=logs" role="button">Logs dos usuários</a>
				<a class="btn btn-success" href="index.php?act=logsadmin" role="button">Logs dos admins</a>
				</div>
			</div>
		</div>
	</div>
	
	{if $activation_enabled}
	<div class="row">
		<div class="col-md-12">
			<div class="main-card mb-3 card">
				<div class="card-header"> Contas com ativação pendente
					
				</div>
				<div class="card-body p-0">
					{if count($pending_accounts) > 0}
						
						<table class="table table-hover table-fixed">
							<thead class="thead-dark">
							<tr>
								<th>Conta</th>
								<th>Email</th>
								<th width="10%">Ações</th>
							</tr>
							</thead>
							<tbody>
							{foreach item=account from=$pending_accounts}
							<tr>
								
								<td>{$account.login}</td>
								<td>{$account.email}</td>
								<td>
								<div class="btn-group">
									<a class="btn btn-success btn-xs" href="{$base_url}index.php?act=activate&hash={$account.hash}">Ativar</a>
								</div>
									
								</td>
							</tr>
							{/foreach}
							</tbody>
						</table>
						
					{else}
						<div class="alert alert-success">
							Todas as contas estão ativadas
						</div>
					{/if}
				</div>
			</div>
		</div>		
	</div>
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
	{if count($error) > 0}
		<center>
		<div class="alert alert-danger d-flex flex-row" role="alert">
			
			<p class="mb-0">
			{foreach item=text from=$error}
			<li>{$text}</li>
			{/foreach}
			</p>
				
		</div>
		</center>
	{/if}
	
	<div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Adicionar dias para todos os usuários
                </div>
                <div class="card-body">
                
                <form action="{$base_url}index.php?act=admin" method="POST">
                    <input type="hidden" name="form_dias" />
                    <div class="position-relative row form-group">
                        <label for="exampleEmail" class="col-sm-2 col-form-label">Quantidade de dias</label>
                        <div class="col-sm-10">
                            <input size="2" type="number" min="0" max="90" placeholder="Quantidade de dias" name="endate" class="form-control">
                        </div>
                    </div>
                        <div class="position-relative row form-group">
                            <label for="exampleEmail" class="col-sm-2 col-form-label">Modo</label>
                            <div class="col-sm-10">
                                <select name="modo" class="form-control">
                                <option value="injetor">INJETOR MOBILE</option>
                                <option value="x86">INJETOR EMULADOR</option>
							    <option value="script">SCRIPT</option>
							    <option value="regedit">REGEDIT</option>
                             
                                </select>
                            </div>
                        </div>
                    <div class="d-block text-right card-footer">
                        <button type="submit" name="Submit" class="btn btn-primary btn-lg">ADICIONAR</button>
                        
                    </div>
                </form>
                </div>
				
				
				
				
				<div class="card-header">Remover dias para todos os usuários
				</div>
				<div class="card-body">
				
				<form action="{$base_url}index.php?act=admin" method="POST">
					<input type="hidden" name="form_dias1" />
					<div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label">Quantidade de dias</label>
						<div class="col-sm-10">
							<input size="2" type="number" min="0" max="90" placeholder="Quantidade de dias" name="endate" class="form-control">
						</div>
					</div>
					<div class="position-relative row form-group">
                            <label for="exampleEmail" class="col-sm-2 col-form-label">Modo</label>
                            <div class="col-sm-10">
                                <select name="modo" class="form-control">
                                <option value="injetor">INJETOR MOBILE</option>
                                <option value="x86">INJETOR EMULADOR</option>
							    <option value="script">SCRIPT</option>
							    <option value="regedit">REGEDIT</option>
                             
                                </select>
                            </div>
                        </div>
					<div class="d-block text-right card-footer">
						<button type="submit" name="Submit" class="btn btn-primary btn-lg">REMOVER</button>
						
					</div>			
				</form>
				</div>
				
				
				
				
				<div class="card-header">Remover usuários expirados
				</div>
				<div class="card-body">
				
				<form action="{$base_url}index.php?act=admin" method="POST">
					<input type="hidden" name="form_dias2" />
					
					<div class="position-relative row form-group">
                            <label for="exampleEmail" class="col-sm-2 col-form-label">Modo</label>
                            <div class="col-sm-10">
                                <select name="modo" class="form-control">
                                <option value="injetor">INJETOR MOBILE</option>
                                <option value="x86">INJETOR EMULADOR</option>
							    <option value="script">SCRIPT</option>
							    <option value="regedit">REGEDIT</option>
                             
                                </select>
                            </div>
                        </div>
					<div class="d-block text-right card-footer">
						<button type="submit" name="Submit" class="btn btn-primary btn-lg">REMOVER</button>
						
					</div>			
				</form>
				</div>
				
				
				
				
				
			
				<div class="card-body">
				
				</div>
				
			</div>
			
		</div>
		
	</div>
	

	
	<div class="row">
		<div class="col-md-12">
			<div class="main-card mb-3 card">
				<div class="card-header">Adicionar Cheats
				</div>
				<div class="card-body">
					
					<form action="{$base_url}index.php?act=admin" method="POST">
						<input type="hidden" name="form" />
						<div class="position-relative row form-group">
							<label for="exampleEmail" class="col-sm-2 col-form-label">Imagem</label>
							<div class="col-sm-10">
								<input type="text" name="img" placeholder="Link da imagem ex: http://freefire.com/img.png" class="form-control" required>
							</div>
						</div>

						<div class="position-relative row form-group">
							<label for="exampleEmail" class="col-sm-2 col-form-label">Jogo</label>
							<div class="col-sm-10">
								<input type="text" name="gamename" placeholder="Nome do jogo" class="form-control" required>
							</div>
						</div>
						
						<div class="position-relative row form-group">
							<label for="exampleEmail" class="col-sm-2 col-form-label">Versão</label>
							<div class="col-sm-10">
								<input type="text" name="version" placeholder="1.0.0" class="form-control" required>
							</div>
						</div>

						<div class="position-relative row form-group">
							<label for="exampleEmail" class="col-sm-2 col-form-label">Modo</label>
							<div class="col-sm-10">
								<select name="modo" class="form-control">
								 <option value="injetor">INJETOR MOBILE</option>
								 <option value="x86">INJETOR EMULADOR</option>
								<option value="regedit">REGEDIT</option>
								<option value="script">SCRIPT</option>
								</select>
							</div>
						</div>

						<div class="position-relative row form-group">
							<label for="exampleEmail" class="col-sm-2 col-form-label">Última atualização</label>
							<div class="col-sm-10">
								<input type="text" name="last_update" value="{$date}" class="form-control form_datetime" required>
							</div>
						</div>
						
						<div class="position-relative row form-group">
							<label for="exampleEmail" class="col-sm-2 col-form-label">Status</label>
							<div class="col-sm-10">
								<select name="status" class="form-control">
									<option value="ON">Online</option>
									<option value="ATT">Manutenção</option>
									<option value="OFF">Offline</option>
								</select>
							</div>
						</div>

						<div class="position-relative row form-group">
							<label for="exampleEmail" class="col-sm-2 col-form-label">Tamanho do APK</label>
							<div class="col-sm-10">
								<input type="number" min="0" maxlength="10" name="size" placeholder="12345" class="form-control" required>
							</div>
						</div>
						
						<div class="position-relative row form-group">
							<label for="exampleEmail" class="col-sm-2 col-form-label">Download</label>
							<div class="col-sm-10">
								<input type="text" name="download" placeholder="Caso não ter deixe em branco" class="form-control">
							</div>
						</div>
						
						<div class="d-block text-right card-footer">
							<button type="submit" name="Submit" class="btn btn-primary btn-lg">Adicionar cheat</button>
						</div>
					</form>
					
				</div>
			</div>
			
			<div class="main-card mb-3 card">
				<div class="card-header"> Status do cheat
					<div class="btn-actions-pane-right actions-icon-btn">
						
					</div>
				</div>
				
				<div class="card-body p-2">
					
					{if count($cheats) > 0}
					<table class="table table-hover">
						<thead class="thead-light">
							<tr>
								<th>Jogo</th>
								<th>Atualização</th>
								<th>Modo</th>
								<th>Versão</th>
								<th>Status</th>
								<th>Tamanho</th>
								<th width="10%">Ações</th>
							</tr>
						</thead>
							
						<tbody>
							{foreach item=cheat from=$cheats}
							<tr>
								
								<td><img src="{$cheat.img}" class="psctcircle" style="width: 20px;">&nbsp;{$cheat.gamename}</td>
								<td>{$cheat.update}</td>
								<td>{if $cheat.mode == 'injetor'}<div class="badge badge-dark">INJETOR MOBILE</div>{elseif $cheat.mode == 'x86'}<div class="badge badge-pill badge-danger">INJETOR EMULADOR</div>{elseif $cheat.mode == 'script'}<div class="badge badge-pill badge-secondary">SCRIPT</div>{elseif $cheat.mode == 'regedit'}<div class="badge badge-pill badge-info">REGEDIT</div>{else}<div class="badge badge-pill badge-dark">MACRO</div>{/if}</td>
								<td>{$cheat.version}</td>
								<td>
									{if $cheat.status == 'ON'}
									<div class="badge badge-pill badge-success">Online</div>
									{elseif $cheat.status == 'ATT'}
									<div class="badge badge-pill badge-warning">Manutenção</div>
									{else}
									<div class="badge badge-pill badge-danger">Offline</div>
									{/if}
								</td>
								<td>{$cheat.size}</td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-primary">Ações</button>
										<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="{$script_url}?act=produto&id={$cheat.id}">
												<i class="fa fa-pen mr-1"></i> Editar
											</a>
											<a class="dropdown-item" href="{$script_url}?act=admin&remove={$cheat.id}" onClick="return confirm('Você deseja realmente remover este cheat?');">
												<i class="fa fa-trash-alt mr-1"></i> Remover
											</a>
										</div>
									</div>
								</td>
							</tr>
							{/foreach}
							
						</tbody>
					</table>
					{else}
						<div class="alert alert-success">
							Nenhum produto adicionado
						</div>
					{/if}
				</div>
			</div>
		</div>
	</div>
</div>
{include file='file:core/footer.tpl'}