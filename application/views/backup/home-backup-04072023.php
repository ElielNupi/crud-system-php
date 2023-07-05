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
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Adicionar novo usuário</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Deletar usuário</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover" id="usuariosTable">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Nome</th>
						<th>Email</th>
						<th>Data Nascimento</th>
						<th>Telefone</th>
						<th>Editar/Excluir</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($usuarios as $usuarios) : ?>
						<tr>
							<td>
								<span class="custom-checkbox">
								<input type="checkbox" id="checkbox5" name="options[]" value="1">
								<label for="checkbox5"></label>
								</span>
							</td>
							<td><?= $usuarios['nome'] ?> </td>
							<td><?= $usuarios['email'] ?> </td>
							<td><?= $usuarios['data_nascimento'] ?> </td>
							<td><?= $usuarios['telefone'] ?> </td>
							<td>
								<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>
					<?php endforeach ;?>	
				</tbody>
			</table>
			<div class="clearfix">
				 
				<div class="hint-text">Mostrando <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>
		</div>
	</div>        
</div>

<!-- AddUs Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="addForm">
				<div class="modal-header">						
					<h4 class="modal-title">Adicionar novo usuário</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
						<input type="tel" placeholder="(12) 99999-9999" class="form-control" name="telefone" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-success" value="Adicionar">
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Editar Usuário</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Nome</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Endereço</label>
						<textarea class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Telefone</label>
						<input type="text" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Deletar Usuário?</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Tem certeza que deseja deletar este usuário</p>
					<p class="text-warning"><small>Essa ação não pode ser desfeita.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>