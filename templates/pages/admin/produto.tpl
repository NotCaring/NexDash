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
				<div class="card-header">Modificações do produto
				</div>
				
				<div class="card-body">
				{if count($cheats) > 0}
					{foreach item=cheat from=$cheats}
					<form action="{$base_url}index.php?act=produto&id={$getID}" method="POST">
					<input type="hidden" name="form" />
					<div class="position-relative form-group">
					<label for="exampleEmail" class="">Imagem</label>
					<input type="text" name="img" value="{$cheat.img}" placeholder="Link da imagem ex: http://freefire.png" class="form-control" required>
					</div>

					<div class="position-relative form-group">
					<label for="exampleEmail" class="">Jogo</label>
					<input type="text" name="gamename" value="{$cheat.gamename}" placeholder="Nome do jogo" class="form-control" required>
					</div>
					
					<div class="position-relative form-group">
					<label for="exampleEmail" class="">Versão</label>
					<input type="text" name="version" value="{$cheat.version}" placeholder="1.0.0" class="form-control" required>
					</div>
					
					<div class="position-relative form-group">
						<label for="exampleEmail" class="">Modo</label>
						<select name="mode" class="form-control">
						{if $cheat.mode == 'x86'}
						<option value="x86">INJETOR EMULADOR</option>
						<option value="injetor">INJETOR MOBILE</option>
						<option value="script">SCRIPT</option>
						<option value="regedit">REGEDIT</option>
						{elseif $cheat.mode == 'regedit'}
						<option value="regedit">REGEDIT</option>
						<option value="x86">INJETOR EMULADOR</option>
						<option value="injetor">INJETOR MOBILE</option>
						<option value="script">SCRIPT</option>
						{elseif $cheat.mode == 'injetor'}
						<option value="injetor">INJETOR MOBILE</option>
						<option value="x86">INJETOR EMULADOR</option>
						<option value="script">SCRIPT</option>
						<option value="regedit">REGEDIT</option>
						{else}
						<option value="script">SCRIPT</option>
						<option value="x86">INJETOR EMULADOR</option>
						<option value="injetor">INJETOR MOBILE</option>
						<option value="regedit">REGEDIT</option>
						{/if}
						</select>
					</div>


					<div class="position-relative form-group">
					<label for="exampleEmail" class="">Última atualização</label>
					<input type="text" name="last_update" value="{$date}" placeholder="{$date}" class="form-control" required>
					</div>
					
					<div class="position-relative form-group">
					<label for="exampleEmail" class="">Status</label>
					<select name="status" class="form-control">
					{if $cheat.status == 'ON'}
					<option value="ON">Online</option>
					<option value="ATT">Manutenção</option>
					<option value="OFF">Offline</option>
					{elseif $cheat.status == 'ATT'}
					<option value="ATT">Manutenção</option>
					<option value="ON">Online</option>
					<option value="OFF">Offline</option>
					{else}
					<option value="OFF">Offline</option>
					<option value="ON">Online</option>
					<option value="ATT">Manutenção</option>
					{/if}
					</select>
					</div>
					<div class="position-relative form-group">
					<label for="exampleEmail" class="">Tamanho do APK</label>
						
					<input type="number" min="0" maxlength="10" name="size" placeholder="12345" value="{$cheat.size}" class="form-control" required>
						
					</div>
					<div class="position-relative form-group">
					<label for="exampleEmail" class="">Download</label>
					<input type="text" name="download" value="{$cheat.download}" placeholder="Caso não ter deixe em branco" class="form-control">
					</div>

					<div class="d-block text-right card-footer">
					<button type="submit" name="Submit" class="btn btn-success btn-lg">Salvar Alterações</button>
					
					</div>
					</form>
					{/foreach}
				{else}
					<div class="alert alert-success">
						Nenhum produto adicionado
					</div>
				{/if}
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="main-card mb-3 card">
						<div class="card-header"> Status do cheat selecionado
							<div class="btn-actions-pane-right actions-icon-btn">
								
							</div>
						</div>
					
						<div class="card-body p-2">
							<div class="table-responsive">
								<div class="tab-content">
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
											</tr>
										</thead>
											
										<tbody>
											{foreach item=cheat from=$cheats}
											<tr>
												
												<td><img src="{$cheat.img}" class="psctcircle" style="width: 20px;">&nbsp;{$cheat.gamename}</td>
												<td>{$cheat.update}</td>
												<td>{if $cheat.mode == 'regedit'}<div class="badge badge-pill badge-danger">REGEDIT</div>{elseif $cheat.mode == 'script'}<div class="badge badge-pill badge-secondary">SCRIPT</div>{elseif $cheat.mode == 'injetor'}<div class="badge badge-pill badge-info">INJECT MOBILE</div>{elseif $cheat.mode == 'x86'}<div class="badge badge-pill badge-info">INJECT x86</div>{else}<div class="badge badge-pill badge-dark">MACRO</div>{/if}</td>
												<td>{$cheat.version}</td>
												<td>
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