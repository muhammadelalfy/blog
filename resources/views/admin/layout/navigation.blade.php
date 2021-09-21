
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
  <a class="navbar-brand" href="{{ url('/back') }}"><img src="{{ asset('images/admin_logo')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="{{ url('/adminPanel')}}"><img src="{{ asset('images/admin_logo') }}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="/home"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    @permission(['permision update','All','permission'])
                    <li class="active">
                        <a href="{{url('permission/list')}}"> <i class="menu-icon fa fa-dashboard"></i>Permission </a>
                    </li>
                    @endpermission
                    @permission(['permision update','All'])
                    <li class="active">
                        <a href="{{url('role/list')}}"> <i class="menu-icon fa fa-dashboard"></i>Roles </a>
                    </li>
                    @endpermission
                    @permission(['permision update','All'])
                    <li class="active">
                        <a href="{{url('author/list')}}"> <i class="menu-icon fa fa-dashboard"></i>Authors </a>
                    </li>
                    @endpermission

                    @permission(['category list','All'])
                    <li class="active">
                        <a href="{{url('category/list')}}"> <i class="menu-icon fa fa-dashboard"></i>Categories </a>
                    </li>
                    @endpermission
                </ul>

                     
        </nav>
    </aside><!-- /#left-panel -->
