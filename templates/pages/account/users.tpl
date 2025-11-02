{include file='file:core/header.tpl'}
<div class="app-main__inner">
	<div class="app-page-title app-page-title-simple">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div>
				<div class="page-title-head center-elem">
					<span class="d-inline-block pr-2">
						<i class="fas fa-users-cog opacity-6"></i>
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
				<div class="card-header">Todos os Usuários
				<div class="btn-actions-pane-right actions-icon-btn">
					<a href="{$script_url}?act=users&pauseall=all" class="btn btn-warning" onClick="return confirm(\'Você deseja pausar todas as Keys?\');"><i class="fa fa-pause mr-1"></i> Pausar todas as Keys</a>
					<a href="{$script_url}?act=users&unpauseall=all" class="btn btn-success" onClick="return confirm(\'Você deseja despausar todas as Keys?\');"><i class="fa fa-play mr-1"></i> Despausar todas as Keys</a>
					<a href="{$script_url}?act=users&reset=all" class="btn btn-primary"><i class="fa fa-sync-alt mr-1"></i> Resetar todos os usuários</a>
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
				<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
				<span class="justify-content-start float-left">
					<form action="{$script_url}?act=users">
						<input type="hidden" name="act" value="{$active}" />
						<label>Mostrar</label>
						<select name="rows" class="form-control" onchange="this.form.submit()">
							
							{if $rows == 10} 
								<option value="10"> 10 </option>
								<option value="25"> 25 </option>
								<option value="50"> 50 </option>
								<option value="100"> 100 </option>
							{elseif $rows == 25} 
								<option value="25"> 25 </option>
								<option value="10"> 10 </option>
								<option value="50"> 50 </option>
								<option value="100"> 100 </option>
							{elseif $rows == 50} 
								<option value="50"> 50 </option>
								<option value="10"> 10 </option>
								<option value="25"> 25 </option>
								<option value="100"> 100 </option>
							{elseif $rows == 100} 
								<option value="100"> 100 </option>
								<option value="10"> 10 </option>
								<option value="25"> 25 </option>
								<option value="50"> 50 </option>
							{else}
								<option value="10"> 10 </option>
								<option value="25"> 25 </option>
								<option value="50"> 50 </option>
								<option value="100"> 100 </option>
							{/if}
						</select>
						<label> resultados </label>
						{if $pagination.page_current > 1 && $pagination.total > $rows}
						<input type="hidden" name="page" value="{$pagination.page_current}" />
						{/if}
						{if !empty($search) && !empty($from)}
						<input type="hidden" name="search" value="{$search}" />
						<input type="hidden" name="from" value="{$from}" />
						{/if}
						
					</form>
				</span>
				<span class="justify-content-end float-right">
					<form method="get" action="{$script_url}?act=users">
						<input type="hidden" name="act" value="{$active}" />
						{if $rows > 10}
						<input type="hidden" name="rows" value="{$rows}" />
						{/if}
						<label>&nbsp Search: &nbsp</label>
						<input type="text" style="width:97px" name="search"/>
						<label>&nbsp By: &nbsp</label>
						<select name="from" class="btn btn-light">
							<option value="Username"> Usuário </option>
							<option value="Vendedor"> Vendedor </option>
						</select>&nbsp
						<input type="submit" value="Search" class="btn btn-dark">
						
					</form>
				</span>
				</div>
				<br>
				<div class="card-body p-0">
				{if count($usuarios) > 0}
					
					<form method="POST" action="{$script_url}?act=users">
					<div class="table-responsive">
					<table class="table table-hover table-fixed">
						<thead class="thead-dark">
						<tr>
							<th><input type="checkbox" onClick="toggle(this)"/></th>
							<th>ID</th>
							<th>Usuário</th>
							<th>Aparelhos</th>
						
							<th>Dias</th>
							<th>Status</th>
							<th>Pause</th>
							<th>Modo</th>
							<th>Vendedor</th>
							<th width="10%">Ações</th>
						</tr>
						</thead>
						<tbody>
						{foreach item=record from=$usuarios}
						<tr>
							<td><input type="checkbox" name="select[]" value="{$record.user}" /></td>
							<td>{$record.id}</td>
							<td>{$record.user}</td>
							<td>{$record.device}</td>
							{if $record.pause != 1} 
							<td>{if $record.segundos >= 1}<span class="ml-2 badge badge-pill badge-dark">{$record.dias} D | {$record.horas}:{$record.minutos}:{$record.segundos}</span> {else}<span class="ml-2 badge badge-pill badge-info">0  | Dias</span>{/if}</td>
							{else}
							<td><span class="ml-2 badge badge-pill badge-dark">{$record.diasP} D | {$record.horasP}:{$record.minutosP}:{$record.segundosP}</span></td>
							{/if}
							<td>{if $record.status != 1}
									{if $record.segundos >= 1}<div class='badge badge-pill badge-success'>Ativo</div>{else}<div class='badge badge-pill badge-info'>Expirado</div>{/if}
								{else}
									<div class='badge badge-pill badge-danger'>Banido</div>
								{/if}
							</td>
							<td>{if $record.segundos >= 1}{if $record.pause == 0}<div class='badge badge-pill badge-secondary'>Em uso</div>{else}<div class='badge badge-pill badge-warning'>Pausado</div>{/if}{else}<div class='badge badge-pill badge-warning'>Expirado</div>{/if}</td>
							<td>{if $record.mode == 'injetor'}<div class="badge badge-dark">INJETOR MOBILE</div>{elseif $record.mode == 'x86'}<div class="badge badge-pill badge-danger">INJETOR EMULADOR</div>{elseif $record.mode == 'injetor'}<div class="badge badge-dark">INJETOR MOBILE</div>{elseif $record.mode == 'script'}<div class="badge badge-pill badge-secondary">SCRIPT</div>{elseif $record.mode == 'regedit'}<div class="badge badge-pill badge-info">REGEDIT</div>{else}<div class="badge badge-pill badge-dark">MACRO</div>{/if}</td>
							<td>{$record.vendedor}</td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-dark">Ações</button>
									<button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="{$script_url}?act=editar&name={$record.user}">
											<i class="fa fa-pen mr-1"></i> Editar
										</a>
										<a class="dropdown-item" href="{$script_url}?act=users&resetuid={$record.user}" onClick="return confirm('Você deseja resetar este UID?');">
											<i class="fa fa-id-card mr-1"></i> Resetar UID
										</a>
										{if $auth.admin || $auth.mod}
											{if $record.status == 1}
											<a class="dropdown-item" href="{$script_url}?act=users&unban={$record.user}">
												<i class="fa fa-ban mr-1"></i> Desbanir
											</a>
											{else}
											<a class="dropdown-item" href="{$script_url}?act=users&ban={$record.user}">
												<i class="fa fa-ban mr-1"></i> Banir
											</a>
											{/if}
											<a class="dropdown-item" href="{$script_url}?act=users&delete={$record.user}" onClick="return confirm('Você deseja deletar este usuário?');">
												<i class="fa fa-trash-alt mr-1"></i> Apagar
											</a>
										 
										{/if}
									</div>
								</div>
							</td>
						</tr>
						{/foreach}
						</tbody>
					</table>
					</div>
					
					{if $pagination.page_number > 1}
					<div style='padding: 10px 20px 20px; border-top: dotted 1px #CCC;'>
						<span >
							<label>Mostrando {$pagination.page_current} de {$pagination.page_number} no total de {$pagination.total} resultados </label>
						</span>
						<span class="">
							<ul class="pagination justify-content-end">
							
							{if $rows > 10}
								{if !empty($search) && !empty($from)}
									<li{if $pagination.page_current eq 1} class="disabled"{/if}><a href="{$base_url}index.php?act=users&rows={$rows}&page={$pagination.page_current - 1}&search={$search}&from={$from}">Anterior</a></li>
									{if $pagination.page_current ge 3}<li><a href="{$base_url}index.php?act=users&rows={$rows}&page={$pagination.first}&search={$search}&from={$from}">{$pagination.first}</a></li><li><a>...</a></li>{/if}
									{for $i=$pagination.start to $pagination.end}
									<li{if $i eq $pagination.page_current} class="active"{/if}><a href="{$base_url}index.php?act=users&rows={$rows}&page={$i}&search={$search}&from={$from}">{$i}</a></li>
									{/for}
									{if $pagination.page_number gt 4 && $pagination.page_current lt $pagination.page_number - 2}<li><a>...</a></li><li><a href="{$base_url}index.php?act=users&rows={$rows}&page={$pagination.page_number}&search={$search}&from={$from}">{$pagination.page_number}</a></li>{/if}
							
									<li{if $pagination.page_current eq $pagination.page_number} class="disabled"{/if}><a href="{$base_url}index.php?act=users&rows={$rows}&page={$pagination.page_current + 1}&search={$search}&from={$from}">Próxima</a></li>
								{else}
									<li{if $pagination.page_current eq 1} class="disabled"{/if}><a href="{$base_url}index.php?act=users&rows={$rows}&page={$pagination.page_current - 1}">Anterior</a></li>
									{if $pagination.page_current ge 3}<li><a href="{$base_url}index.php?act=users&rows={$rows}&page={$pagination.first}">{$pagination.first}</a></li><li><a>...</a></li>{/if}
									{for $i=$pagination.start to $pagination.end}
									<li{if $i eq $pagination.page_current} class="active"{/if}><a href="{$base_url}index.php?act=users&rows={$rows}&page={$i}">{$i}</a></li>
									{/for}
									{if $pagination.page_number gt 4 && $pagination.page_current lt $pagination.page_number - 2}<li><a>...</a></li><li><a href="{$base_url}index.php?act=users&rows={$rows}&page={$pagination.page_number}">{$pagination.page_number}</a></li>{/if}
							
									<li{if $pagination.page_current eq $pagination.page_number} class="disabled"{/if}><a href="{$base_url}index.php?act=users&rows={$rows}&page={$pagination.page_current + 1}">Próxima</a></li>
								{/if}
							{else}
								{if !empty($search) && !empty($from)}
									<li{if $pagination.page_current eq 1} class="disabled"{/if}><a href="{$base_url}index.php?act=users&page={$pagination.page_current - 1}&search={$search}&from={$from}">Anterior</a></li>
									{if $pagination.page_current ge 3}<li><a href="{$base_url}index.php?act=users&page={$pagination.first}&search={$search}&from={$from}">{$pagination.first}</a></li><li><a>...</a></li>{/if}
									{for $i=$pagination.start to $pagination.end}
									<li{if $i eq $pagination.page_current} class="active"{/if}><a href="{$base_url}index.php?act=users&page={$i}&search={$search}&from={$from}">{$i}</a></li>
									{/for}
									{if $pagination.page_number gt 4 && $pagination.page_current lt $pagination.page_number - 2}<li><a>...</a></li><li><a href="{$base_url}index.php?act=users&page={$pagination.page_number}&search={$search}&from={$from}">{$pagination.page_number}</a></li>{/if}
							
									<li{if $pagination.page_current eq $pagination.page_number} class="disabled"{/if}><a href="{$base_url}index.php?act=users&page={$pagination.page_current + 1}&search={$search}&from={$from}">Próxima</a></li>
								{else}
									<li{if $pagination.page_current eq 1} class="disabled"{/if}><a href="{$base_url}index.php?act=users&page={$pagination.page_current - 1}">Anterior</a></li>
									{if $pagination.page_current ge 3}<li><a href="{$base_url}index.php?act=users&page={$pagination.first}">{$pagination.first}</a></li><li><a>...</a></li>{/if}
									{for $i=$pagination.start to $pagination.end}
									<li{if $i eq $pagination.page_current} class="active"{/if}><a href="{$base_url}index.php?act=users&page={$i}">{$i}</a></li>
									{/for}
									{if $pagination.page_number gt 4 && $pagination.page_current lt $pagination.page_number - 2}<li><a>...</a></li><li><a href="{$base_url}index.php?act=users&page={$pagination.page_number}">{$pagination.page_number}</a></li>{/if}
							
									<li{if $pagination.page_current eq $pagination.page_number} class="disabled"{/if}><a href="{$base_url}index.php?act=users&page={$pagination.page_current + 1}">Próxima</a></li>
								{/if}
							{/if}
							</ul>
							<hr>
							<div class="btn-group float-right">
									<button type="button" class="btn btn-dark">Ações de administradores</button>
									<button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="sr-only">Toggle Dropdown</span>
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<button class="dropdown-item" type="submit" name="reset_select" onClick="return confirm('Você deseja resetar os usuários selecionados?');">
										<i class="fa fa-asterisk mr-1"></i> Resetar selecionados
									</button>
									{if $auth.admin || $auth.mod}
									
									<button class="dropdown-item" type="submit" name="del_select" onClick="return confirm('Você deseja deletar os usuários selecionados?');">
										<i class="fa fa-trash-alt mr-1"></i> Deletar selecionados
									</button>
									<button class="dropdown-item" type="submit" name="ban_select" onClick="return confirm('Você deseja banir os usuários selecionados?');">
										<i class="fa fa-ban mr-1"></i> Banir selecionados
									</button>
									<button class="dropdown-item" type="submit" name="unban_select" onClick="return confirm('Você deseja desbanir os usuários selecionados?');">
										<i class="fa fa-check-circle mr-1"></i> Desbanir selecionados
									</button>
									{/if}
								  </div>
							</div>
							
							<br>
						</span>
					</div>
					{/if}
					</form>
				{/if}
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
					{/if}
				
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function toggle(source) {
	  checkboxes = document.getElementsByName('select[]');
	  for(var i=0, n=checkboxes.length;i<n;i++) {
		checkboxes[i].checked = source.checked;
	  }
	}
</script>
{include file='file:core/footer.tpl'}