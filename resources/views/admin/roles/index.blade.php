@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<h4 class="c-grey-900 mT-10 mB-30">Role & Permission</h4>
		<hr><br><br>
		@include('admin.roles.rows-table')
		@include('admin.permissions.rows-table')
	</div>
@endsection
