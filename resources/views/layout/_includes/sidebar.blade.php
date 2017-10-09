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
            <li class="{{ str_contains(request()->url(), '/aluno') ? 'active' : '' }}"><a href="{{ route('alunos') }}"><i class="fa fa-book"></i> <span>Alunos</span></a></li>
            <li class="treeview {{ str_contains(request()->url(), '/mensagem') ? 'active' : '' }}">
                <a href="{{ route('mensagens') }}">
                    <i class="fa fa-envelope"></i><span>Mensagens</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    <ul class="treeview-menu">
                        <li><a href=""><i class="fa fa-inbox"></i> Caixa de entrada</a></li>
                        <li class="treeview">
                            <a href=""><i class="fa fa-paper-plane"></i>
                                Enviar
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ route('mensagem.pai') }}">Pai(s)</a></li>
                                <li><a href="{{ route('mensagem.turma') }}">Turma(s)</a></li>
                                <li><a href="{{ route('mensagem.escola') }}">Escola</a></li>
                            </ul>
                        </li>
                    </ul>
                </a>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>