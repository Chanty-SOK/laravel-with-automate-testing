<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
	
	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-laugh-wink"></i>
		</div>
		<div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
	</a>
	
	<!-- Divider -->
	<hr class="sidebar-divider my-0">
	
	<!-- Nav Item - User -->
	@can('view user')
		<li class="nav-item {{ (request()->is('users*')) ? 'active' : '' }}">
			<a class="nav-link" href="{{ route('users.index') }}">
				<i class="fas fa-user fa-tachometer-alt"></i>
				<span>User Management</span></a>
		</li>
	@endcan
	
	<!-- Divider -->
	<hr class="sidebar-divider">
	
	@can('view role')
		<li class="nav-item {{ (request()->is('roles*')) ? 'active' : '' }}">
			<a class="nav-link" href="{{ route('roles.index') }}">
				<i class="fa fa-check-square"></i>
				<span>Roles & Permissions</span></a>
		</li>
	@endcan
	
	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">
	
	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
