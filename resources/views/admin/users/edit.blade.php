<div class="modal fade" id="editUserModal" user="dialog" aria-hidden="true">
	<div class="modal-dialog" user="document">
		<div class="modal-content">
			<form id="editUserForm" action="" method="POST">
				@csrf
				@method('PUT')
				<div class="modal-header border-0">
					<h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				</div>
				<div class="modal-body">
					<div class="bgc-white px-3">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" class="form-control" id="name" placeholder="Enter First & Last Name">
							<div class="invalid-feedback error_name"></div>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" class="form-control" id="email" placeholder="Email">
							<div class="invalid-feedback error_email"></div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="password">Password</label>
								<input type="password" name="password" class="form-control" id="password"
								       placeholder="Leave it blank if you don't want to change password.">
								<div class="invalid-feedback error_password"></div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="inputPassword4">Re-Type Password</label>
								<input type="password" name="password_confirmation" class="form-control" id="confirmation_password" placeholder="Confirm Password">
								<div class="invalid-feedback error_password_confirmation"></div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="role">Role</label>
								<select name="role" id="role" class="form-control">
									<option selected="selected" value="">Choose...</option>
									@foreach($roles as $role)
										<option value="{{ $role->id }}">{{ $role->name }}</option>
									@endforeach
								</select>
								<div class="invalid-feedback error_role"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer border-0">
					<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
