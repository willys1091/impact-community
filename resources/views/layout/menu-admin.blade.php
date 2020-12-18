<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('admin')}}" class="nav-link">Home</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown user-menu">
			<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
				<img src="https://www.gravatar.com/avatar/221cce464778cb94229ff5a54b784262?d=mm&s=84" class="user-image img-circle elevation-2" alt="User Image">
				<span class="d-none d-md-inline">{{Session('username')}}</span>
			</a>
			<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<li class="user-header bg-primary">
					<img src="https://www.gravatar.com/avatar/221cce464778cb94229ff5a54b784262?d=mm&s=84" class="img-circle elevation-2" alt="User Image">
					<p>{{Session('username')}}</p>
				</li>
				<li class="user-footer">
					<a href="{{url('admin/edit_account')}}" class="btn btn-default btn-flat">Edit Account</a>
					<a href="{{url('admin/logout')}}" class="btn btn-default btn-flat float-right">Sign out</a>
				</li>
			</ul>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{url('admin')}}" class="brand-link">
        <img src="{{asset('assets/img/Logo_only.png')}}" alt="ICI Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ICI Admin</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/img/Logo_only.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Session::has('name')?Session('name'):''}}</a>
            </div>
        </div>

         <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{url('admin')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-fast"></i><p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('admin/schedule')}}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-star"></i><p>Schedule</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{url('admin/section')}}" class="nav-link">
                        <i class="nav-icon fas fa-browser"></i><p>Section</p>
                    </a>
                </li>
              --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-video"></i><p>Watch Video - Series<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{url('admin/watchvideo')}}" class="nav-link">
                                <i class="fal fa-circle nav-icon text-info"></i><p>Video</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/series')}}" class="nav-link">
                                <i class="fal fa-circle nav-icon text-info"></i><p>Series</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/file')}}" class="nav-link">
                        <i class="nav-icon fas fa-tasks-alt"></i><p>File Management</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th-list"></i><p>Content<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{url('admin/categorycontent')}}" class="nav-link"><i class="fal fa-circle nav-icon text-info"></i><p>Category</p></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/content')}}" class="nav-link"><i class="fal fa-circle nav-icon text-info"></i><p>Content</p></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/admin')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i><p>Admin</p>
                    </a>
                </li>
               
                <li class="nav-item">
                    <a href="{{url('admin/logout')}}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out"></i><p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
