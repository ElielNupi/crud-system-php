<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Tabelas de Usuários CRUD</title>
</head>
<body>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Lista de <b>Usuários</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#createModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Adicionar novo usuário</span></a>				
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover" id="usuariosTable">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>Email</th>
						<th>Data Nascimento</th>
						<th>Telefone</th>
						<th>Ação</th>
					</tr>
				</thead>
			</table>
			<div class="clearfix">
			</div>
		</div>
	</div>        
</div>

<form id="createForm">
			<!-- ADICIONAR Modal -->
			<div class="modal fade" id="createModal" aria-hidden="true">
				<div class="modal-dialog" role="document">
				    <div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Adicionar Usuário</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  	<span aria-hidden="true">&times;</span>
							</button>
						</div>
				      	<div class="modal-body">
						  	<div class="form-group">
								<label>Nome</label>
								<input type="text" class="form-control" name="nome" required>
							</div>

							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" name="email" required>
							</div>

							<div class="form-group">
								<label>Data Nascimento</label>
								<input type="date" id="start" name="dt_nascimento" value="<?php echo date("Y-m-d");?>" min="1960-01-01" max="2030-01-31">
							</div>

							<div class="form-group">
								<label>Telefone</label>
								<input type="tel" id="telefone" placeholder="(12) 99999-9999" class="form-control" name="telefone" required>
							</div>	

				      	</div>
				      	<div class="modal-footer">
				        	<button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
				        	<button type="submit" class="btn btn-primary">Adicionar</button>
				      	</div>
				    </div>
				</div>
			</div>
		</form>

			<!-- EDITAR modal -->
				<div class="modal fade" id="editModal" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Editar Usuário</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form id="editForm">
								<div class="modal-body">
									<input type="hidden" name="id" id="editID">
									<div class="form-group">
											<label>Nome</label>
											<input type="text" class="form-control" name="nome" id="editNome" required>
										</div>
										<div class="form-group">
											<label>Email</label>
											<input type="email" class="form-control" name="email" id="editEmail" required>
										</div>
										<div class="form-group">
											<label>Data Nascimento</label>
											<input type="date" id="editData" name="dt_nascimento" value="" min="1960-01-01" max="2030-01-31">
										</div>
										<div class="form-group">
											<label>Telefone</label>
											<input type="tel" placeholder="(12) 99999-9999" class="form-control" name="telefone"
											id="editTelefone"
											required>
										</div>	
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
									<button type="submit" class="btn btn-primary">Atualizar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
</body>
</html>