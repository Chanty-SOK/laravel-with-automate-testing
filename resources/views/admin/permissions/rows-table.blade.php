<div class="col-md-12">
	<br><br><br>
	<div class="bgc-white bd bdrs-3 p-20 mB-20">
		<h4 class="c-grey-900 mB-20">Permissions</h4>
		<form action="{{ route('permissions.store') }}" method="post">
			@csrf
			<table class="table table-bordered">
				<thead>
				<tr>
					<th>Permission Name</th>
					@foreach($roles as $role)
						<th>{{ $role->name }}</th>
					@endforeach
				</tr>
				</thead>
				<tbody>
				@foreach($permissions as $permission)
					<tr>
						<td>{{ $permission->name }}</td>
						@foreach($roles as $role)
						
						<?php
								$roleId = $role->id;
								$permissionId = $permission->id;
								$checked = (in_array($roleId.'-'.$permissionId, $roleHasPermissions)) ? 'checked' : '';
								$isAdmin = ($role->name == 'admin') ? 'disabled' : '';
								?>
							<td>
								<input type="checkbox"  name="permission[{{ $role->id }}][{{ $permission->id }}]" value = '1' {!! $checked !!} {{ $isAdmin }}>
							</td>
						@endforeach
					</tr>
				@endforeach
				</tbody>
			</table>
			@can('update permission')
				<button type="submit" class="btn btn-info">Save</button>
			@endcan
		</form>
	</div>
</div>
