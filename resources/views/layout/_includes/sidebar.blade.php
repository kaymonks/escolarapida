<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> @if(Auth::guest())

                    @else
                        {{ Auth::user()->name }}
                    @endif</p>
                <!-- Status -->
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="#"><i class="fa fa-home"></i> <span>Home</span></a></li>
            <li class="{{ str_contains(request()->url(), '/escola') ? 'active' : '' }}"><a href="{{ route('escolas') }}"><i class="fa fa-institution"></i> <span>Escolas</span></a></li>
            <li class="{{ str_contains(request()->url(), '/professor') ? 'active' : '' }}"><a href="{{ route('professores') }}"><i class="fa fa-user"></i> <span>Professores</span></a></li>
            <li class="{{ str_contains(request()->url(), '/turma') ? 'active' : '' }}"><a href="{{ route('turmas') }}"><i class="fa fa-graduation-cap"></i> <span>Turmas</span></a></li>
            <li class="{{ str_contains(request()->url(), '/pai') ? 'active' : '' }}"><a href="{{ route('pais') }}"><i class="fa fa-user"></i> <span>Pais</span></a></li>
            {{--<li class="treeview">--}}
                {{--<a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>--}}
                    {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="#">Link in level 2</a></li>--}}
                    {{--<li><a href="#">Link in level 2</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>