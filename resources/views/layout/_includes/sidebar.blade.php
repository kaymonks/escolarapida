<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div style="background-color: white">
            <div class="text-center">

                <h1 style="margin: 0;">
                    <img style="" src="{{ asset("/images/logo2.jpg") }}" alt="Logo">
                </h1>
                <!-- Status -->
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            @if(Auth::check() && Auth::user()->permission_id == 1)
                <li class="{{ str_contains(request()->url(), '/escola') ? 'active' : '' }}"><a href="{{ route('escolas') }}"><i class="fa fa-institution"></i> <span>Escolas</span></a></li>
            @elseif(Auth::check() && Auth::user()->permission_id == 2)
                <li class="{{ str_contains(request()->url(), '/professor') ? 'active' : '' }}"><a href="{{ route('professores') }}"><i class="fa fa-user"></i> <span>Professores</span></a></li>
                <li class="{{ str_contains(request()->url(), '/turma') ? 'active' : '' }}"><a href="{{ route('turmas') }}"><i class="fa fa-pencil-square"></i> <span>Turmas</span></a></li>
                <li class="{{ str_contains(request()->url(), '/responsavel') ? 'active' : '' }}"><a href="{{ route('responsaveis') }}"><i class="fa fa-user"></i> <span>Responsáveis</span></a></li>
                <li class="{{ str_contains(request()->url(), '/aluno') ? 'active' : '' }}"><a href="{{ route('alunos') }}"><i class="fa fa-graduation-cap"></i> <span>Alunos</span></a></li>
                <li class="treeview {{ str_contains(request()->url(), '/mensagem') ? 'active' : '' }}">
                    <a href="{{ route('mensagens') }}">
                        <i class="fa fa-envelope"></i><span>Mensagens</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('mensagens') }}"><i class="fa fa-inbox"></i> Caixa de entrada</a></li>
                            <li class="treeview">
                                <a href=""><i class="fa fa-plus"></i>
                                    Enviar
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ route('mensagem.responsavel') }}">Responsáveis</a></li>
                                    <li><a href="{{ route('mensagem.turma') }}">Turma(s)</a></li>
                                    <li><a href="{{ route('mensagem.escola') }}">Escola</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('mensagens.enviados') }}"><i class="fa fa-send"></i> Enviados</a></li>
                        </ul>
                    </a>
                </li>
            <!--
                <li class="treeview {{ str_contains(request()->url(), '/evento') ? 'active' : '' }}">
                    <a href="{{ route('eventos') }}">
                        <i class="fa fa-calendar-o"></i><span>Eventos</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('eventos') }}"><i class="fa fa-list"></i> Eventos</a></li>
                            <li class="treeview">
                                <a href=""><i class="fa fa-plus"></i>
                                    Adicionar
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ route('evento.responsavel') }}">Pai(s)</a></li>
                                    <li><a href="{{ route('evento.turma') }}">Turma(s)</a></li>
                                    <li><a href="{{ route('evento.escola') }}">Escola</a></li>
                                </ul>
                            </li>
                        </ul>
                    </a>
                </li>
                -->
                @elseif(Auth::check() && Auth::user()->permission_id == 3)
                    <li class="{{ str_contains(request()->url(), '/turma') ? 'active' : '' }}"><a href="{{ route('turmas') }}"><i class="fa fa-pencil-square"></i> <span>Turmas</span></a></li>
                    <li class="treeview {{ str_contains(request()->url(), '/mensagem') ? 'active' : '' }}">
                    <a href="{{ route('mensagens') }}">
                        <i class="fa fa-envelope"></i><span>Mensagens</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('mensagens') }}"><i class="fa fa-inbox"></i> Caixa de entrada</a></li>
                            <li class="treeview">
                                <a href=""><i class="fa fa-paper-plane"></i>
                                    Enviar
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ route('mensagem.responsavel') }}">Responsáveis</a></li>
                                    <li><a href="{{ route('mensagem.turma') }}">Turma(s)</a></li>
                                </ul>
                            </li>
                        </ul>
                    </a>
                </li>
                <!--
                <li class="treeview {{ str_contains(request()->url(), '/evento') ? 'active' : '' }}">
                    <a href="{{ route('eventos') }}">
                        <i class="fa fa-calendar-o"></i><span>Eventos</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                </li>
                -->
            @elseif(Auth::check() && Auth::user()->permission_id == 4)
                <li class="treeview {{ str_contains(request()->url(), '/mensagem') ? 'active' : '' }}">
                    <a href="{{ route('mensagens') }}">
                        <i class="fa fa-envelope"></i><span>Mensagens</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('mensagens') }}"><i class="fa fa-inbox"></i> Caixa de entrada</a></li>
                            <li class="treeview">
                                <a href=""><i class="fa fa-paper-plane"></i>
                                    Enviar
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ route('mensagem.escola') }}">Escola</a></li>
                                    <li><a href="{{ route('mensagem.professor') }}">Professor</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('mensagens.enviados') }}"><i class="fa fa-send"></i> Enviados</a></li>
                        </ul>
                    </a>
                </li>
                <!--
                <li class="treeview {{ str_contains(request()->url(), '/evento') ? 'active' : '' }}">
                    <a href="{{ route('eventos') }}">
                        <i class="fa fa-calendar-o"></i><span>Eventos</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                </li>
                -->
                @endif
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>