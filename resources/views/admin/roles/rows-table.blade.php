<div class="row">
	<div class="col-md-12">
		<div class="bgc-white bd bdrs-3 p-20 mB-20">
			<h4 class="c-grey-900 mB-20 float-left">Roles</h4>
			<div class="peer float-right">
				@can('create role')
					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
					        data-target="#addNewRoleModal"><i class="fa fa-plus"></i> Create New
					</button>
				@endcan
			</div>
			<table class="table table-bordered">
				<thead>
				<tr>
					<th>Role Name</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				@foreach($roles as $role)
					<tr>
						<td>{{ $role->name }}</td>
						<td>
							@if($role->name != 'admin')
								<div class="peers float-left">
									@can('delete role')
										<form method="POST" action="{{ route('roles.destroy', $role->id) }}">
											@csrf
											{{ method_field('DELETE') }}
											<button onclick="return confirm('Are you sure?') " type="submit" class="float-left align-content-center btn btn-danger btn-sm">
												<i class="fa fa-trash"></i>
												Delete
											</button>
										</form>
									@endcan
								</div>
							@else
								<span class="badge badge-pill fl-r badge-info lh-0 p-10">Default</span>
							@endif
						</td>
					</tr>
				@endforeach
				</tbody>
			
			</table>
		</div>
	</div>
</div>
@include('admin.roles.create-role-modal')
