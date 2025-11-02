{include file='file:core/header.tpl'}
<div class="app-main__inner">
<div class="app-page-title app-page-title-simple">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
		<div>
			<div class="page-title-head center-elem">
				<span class="d-inline-block pr-2">
					<i class="fas fa-user-plus opacity-6"></i>
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
<div class="card">
  <div class="card-header">
    Informações
  </div>
  <div class="card-body">
    <h5 class="card-title">Créditos para criar cada usuário</h5>
    <p class="card-text"><b>1</b> Device <i class="fas fa-long-arrow-alt-right"></i> <strong>{$inj_1dev}</strong> Créditos</p>
    <p class="card-text"><b>2</b> Device <i class="fas fa-long-arrow-alt-right"></i> <strong>{$inj_2dev}</strong> Créditos</p>
  </div>
</div>
<br>

<div class="row">
	<div class="col-md-12">
		<div class="main-card mb-3 card">
			<div class="card-header">Adicionar Usuário
			</div>
			<div class="card-body">
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
				<form action="{$base_url}index.php?act=adduser" method="POST">
					<input type="hidden" name="newuser_form" />
					<div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label">Usuário</label>
						<div class="col-sm-10">
							<input type="text" name="usuario" placeholder="Digite o usuário" class="form-control" required>
						</div>
					</div>
					
					<div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label">Senha</label>
						<div class="col-sm-10">
							<input type="text" name="senha" placeholder="Digite uma senha" class="form-control" required>
						</div>
					</div>
					
					<div class="position-relative row form-group">
						<label for="exampleEmail" class="col-sm-2 col-form-label">Devices</label>
						<div class="col-sm-10">
							<input type="number" max="2" min="1" name="device" value="1" class="form-control" required>
						</div>
					</div>
					
					
					<div class="position-relative row form-group">
						<label for="dias_validade" class="col-sm-2 col-form-label">Dias de Validade</label>
						<div class="col-sm-10">
							<input type="number" name="dias_validade" placeholder="Número de dias" class="form-control" value="10" required>
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
						<label for="exampleEmail" class="col-sm-2 col-form-label"></label>
						<div class="col-sm-10">
							<div class="g-recaptcha" data-sitekey="{$recaptcha_key}"></div>
						</div>
					</div>
					
					<div class="d-block text-right card-footer">
						<button type="submit" name="Submit" class="btn btn-dark btn-lg">Adicionar usuário</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
{include file='file:core/footer.tpl'}