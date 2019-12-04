<div class="modal fade" id="addNewRoleModal" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="addNewRoleForm" action="{{ route('roles.store') }}" method="POST">
				@csrf
				<div class="modal-header border-0">
					<h5 class="modal-title" id="exampleModalLabel">Add New Role</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">×</span></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" class="form-control"
								       placeholder="Enter Role Name">
								<div class="invalid-feedback error_name"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer border-0">
					<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
