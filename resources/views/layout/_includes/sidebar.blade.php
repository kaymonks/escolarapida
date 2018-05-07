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
                <li class="{{ Active::check('escola') }}}"><a href="{{ route('escolas') }}"><i class="fa fa-institution"></i> <span>Escolas</span></a></li>
            @elseif(Auth::check() && Auth::user()->permission_id == 2)
                <li class="{{ Active::check('home') }}}"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <li class="{{ Active::check('professores') }}"><a href="{{ route('professores') }}"><i class="fa fa-user"></i> <span>Professores</span></a></li>
                <li class="{{ Active::check('turmas') }}"><a href="{{ route('turmas') }}"><i class="fa fa-pencil-square"></i> <span>Turmas</span></a></li>
                <li class="{{ Active::check('responsaveis') }}"><a href="{{ route('responsaveis') }}"><i class="fa fa-user"></i> <span>Responsáveis</span></a></li>
                <li class="{{ Active::check('alunos') }}"><a href="{{ route('alunos') }}"><i class="fa fa-graduation-cap"></i> <span>Alunos</span></a></li>
                <li class="treeview {{ Active::check('mensagens', true)}} {{  Active::check('mensagem', true)  }} ">
                    <a href="">
                        <i class="fa fa-envelope"></i><span>Mensagens</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        <ul class="treeview-menu">
                            <li class="{{ Active::check('mensagens') }}"><a href="{{ route('mensagens') }}"><i class="fa fa-inbox"></i> Caixa de entrada</a></li>
                            <li class="treeview {{ Active::check('mensagem', true) }}">
                                <a href="#"><i class="fa fa-plus"></i>
                                    Enviar
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="{{ Request::path() == 'mensagem/responsavel' ? 'active' : '' }}"><a href="{{ route('mensagem.responsavel') }}">Responsáveis</a></li>
                                    <li class="{{ Request::path() == 'mensagem/turma' ? 'active' : ''}}"><a href="{{ route('mensagem.turma') }}">Turmas</a></li>
                                    <li class="{{ Request::path() == 'mensagem/escola' ? 'active' : ''}}"><a href="{{ route('mensagem.escola') }}">Escola</a></li>
                                </ul>
                            </li>
                            <li class="{{ Active::check('mensagens/enviados') }}"><a href="{{ route('mensagens.enviados') }}"><i class="fa fa-send"></i> Enviados</a></li>
                        </ul>
                    </a>
                </li>
                <li class="treeview {{ Active::check('eventos', true) }} {{ Active::check('evento', true) }} ">
                    <a href="">
                        <i class="fa fa-calendar-o"></i><span>Eventos</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        <ul class="treeview-menu">
                            <li class="{{ Active::check('eventos') }}"><a href="{{ route('eventos') }}"><i class="fa fa-list"></i> Eventos</a></li>
                            <li class="treeview {{ Active::check('evento', true) }}">
                                <a href="#"><i class="fa fa-plus"></i>
                                    Adicionar
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="{{ Request::path() == 'evento/responsavel' ? 'active' : '' }}"><a href="{{ route('evento.responsavel') }}">Responsáveis</a></li>
                                    <li class="{{ Request::path() == 'evento/turma' ? 'active' : '' }}"><a href="{{ route('evento.turma') }}">Turma(s)</a></li>
                                    <li class="{{ Request::path() == 'evento/escola' ? 'active' : '' }}"><a href="{{ route('evento.escola') }}">Escola</a></li>
                                </ul>
                            </li>
                        </ul>
                    </a>
                </li>

                @elseif(Auth::check() && Auth::user()->permission_id == 3)
                    <li class="{{ Active::check('turmas') }}"><a href="{{ route('turmas') }}"><i class="fa fa-pencil-square"></i> <span>Turmas</span></a></li>
                    <li class="treeview {{  Active::check('mensagens', true) }} {{  Active::check('mensagem', true)  }} ">
                    <a href="">
                        <i class="fa fa-envelope"></i><span>Mensagens</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        <ul class="treeview-menu">
                            <li class="{{ Active::check('mensagens') }}"><a href="{{ route('mensagens') }}"><i class="fa fa-inbox"></i> Caixa de entrada</a></li>
                            <li class="treeview {{ Active::check('mensagem', true) }}">
                                <a href=""><i class="fa fa-plus"></i>
                                    Enviar
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="{{ Request::path() == 'mensagem/responsavel' ? 'active' : '' }}"><a href="{{ route('mensagem.responsavel') }}">Responsáveis</a></li>
                                    <li class="{{ Request::path() == 'mensagem/turma' ? 'active' : '' }}"><a href="{{ route('mensagem.turma') }}">Turmas</a></li>
                                </ul>
                            </li>
                            <li class="{{ Active::check('mensagens/enviados') }}"><a href="{{ route('mensagens.enviados') }}"><i class="fa fa-send"></i> Enviados</a></li>
                        </ul>
                    </a>
                </li>

                @elseif(Auth::check() && Auth::user()->permission_id == 4)
                    <li class="treeview {{ Active::check('mensagens', true)}} {{  Active::check('mensagem', true)  }}">
                        <a href="">
                            <i class="fa fa-envelope"></i><span>Mensagens</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            <ul class="treeview-menu">
                                <li class="{{ Active::check('mensagens') }}"><a href="{{ route('mensagens') }}"><i class="fa fa-inbox"></i> Caixa de entrada</a></li>
                                <li class="treeview {{ Active::check('mensagem', true) }}">
                                    <a href=""><i class="fa fa-plus"></i>
                                        Enviar
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li class="{{ Request::path() == 'mensagem/escola' ? 'active' : '' }}"><a href="{{ route('mensagem.escola') }}">Escola</a></li>
                                        <li class="{{ Request::path() == 'mensagem/professor' ? 'active' : '' }}"><a href="{{ route('mensagem.professor') }}">Professor</a></li>
                                    </ul>
                                </li>
                                <li class="{{ Active::check('mensagens/enviados') }}"><a href="{{ route('mensagens.enviados') }}"><i class="fa fa-send"></i> Enviados</a></li>
                            </ul>
                        </a>
                    </li>

                    <li class="treeview {{ str_contains(request()->url(), '/evento') ? 'active' : '' }}">
                        <a href="{{ route('eventos') }}">
                            <i class="fa fa-calendar-o"></i><span>Eventos</span>
                        </a>
                    </li>
                    @endif
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>