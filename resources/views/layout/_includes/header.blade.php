<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="visible-xs sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <!-- /.messages-menu -->
                    <!-- Notifications Menu -->
                    <!-- Tasks Menu -->
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            {{--<img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="user-image" alt="User Image">--}}
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <i class="fa fa-user"></i>
                            <span class="hidden-xs">
                                @if(Auth::guest())
                                @else
                                    {{ Auth::user()->name }}
                                    <?php $perfil = null;
                                        $id_user = Auth::user()->id; ?>
                                @if(Auth::user()->permission_id == 2)
                                        <?php $perfil = "escola"  ?>
                                    @elseif(Auth::user()->permission_id == 4)
                                        <?php $perfil = "responsavel" ?>
                                    @elseif(Auth::user()->permission_id == 3)
                                        <?php $perfil = "professor" ?>
                                    @endif
                               @endif </span>
                        </a>
                        <ul class="dropdown-menu">
                            @if(Auth::user()->permission_id != 1)
                                <li><a style="padding: 10px 20px;" href="{{ route('perfil', ['perfil'=>$perfil, 'id'=>$id_user]) }}" class="">Perfil</a></li>
                            @endif
                            <li><a style="padding: 10px 20px;" href="{{ route('login.sair') }}" class="">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>