@extends('layouts.app')
@section('content')
	<div class="float-right">
		<button class="btn btn-primary add-user" data-toggle="modal" data-target="#addNewUserModal">Add New</button>
	</div>
	<br><br>
	<table class="table">
		<caption>List of users</caption>
		<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Name</th>
			<th scope="col">Email</th>
			<th scope="col">Created_at</th>
			<th scope="col">Action</th>
		</tr>
		</thead>
		<tbody>
		@foreach($users as $index=> $item)
			<tr>
				
				<th scope="row">{{ $index + 1 }}</th>
				<td>{{ $item->name }}</td>
				<td>{{ $item->email }}</td>
				<td>{{ $item->created_at }}</td>
				<td>
					@can('edit user')
						<a item="{{ $item->id }}" type="button" class="editUserBtn" data-toggle="modal"
						   data-target="#editUserModals">
							<span class="btn btn-primary btn-sm">Edit &nbsp<i class="fas fa-pen"></i></span>
						</a>
					@endcan
					@can('delete user')
					@if ($item->email != config('constants.DEFAULT_EMAIL_LOGIN'))
						<div class="float-left" style="margin-right: 5px">
							<form method="POST" action="{{ route('users.destroy', $item->id) }}">
								@csrf
								{{ method_field('DELETE') }}
								<button onclick="return confirm('Are you sure?')" type="submit"
								        class="btn btn-danger btn-sm">Delete</button>
							</form>
						</div>
						@endif
					@endcan
				</td>
			</tr>
		
		@endforeach
		
		</tbody>
	</table>
	{{ $users->links() }}
	
	@include('admin.modal-delete')
	
	@include('admin.users.create')
	
	@include('admin.users.edit')
@endsection
