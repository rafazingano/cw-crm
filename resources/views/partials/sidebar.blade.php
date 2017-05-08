<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                <div>
                    <img src="{{ asset('plugins/images/users/varun.jpg') }}" alt="user-img" class="img-circle">
                </div>
                <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }} 
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu animated flipInY">
                    <li><a href="{{ route('users.show', 1) }}"><i class="ti-user"></i> Meu perfil</a></li>
                    <!--li><a href="#"><i class="ti-wallet"></i> Meu saldo</a></li-->
                    <li><a href="{{ route('mails.index') }}"><i class="ti-email"></i> Email</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('settings.index') }}"><i class="ti-settings"></i> Configurações</a></li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i> Sair
                        </a>                        
                    </li>
                </ul>
            </div>
        </div>
        <ul class="nav" id="side-menu">
            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                <!-- input-group -->
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Pesquisar...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"> 
                            <i class="fa fa-search"></i> </button>
                    </span> 
                </div>
            </li>
            <li> <a href="{{ route('dashboard') }}" class="waves-effect active">
                    <i class="linea-icon linea-basic fa-fw" data-icon="v"></i> 
                    <span class="hide-menu"> Dashboard </span></a>
            </li>
            <li>
                <a href="javascript:void(0);" class="waves-effect">
                    <i data-icon=")" class="linea-icon linea-basic fa-fw"></i> 
                    <span class="hide-menu">Email<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li> <a href="{{ route('mails.index') }}">Email</a></li>
                    <li> <a href="{{ route('mails.create') }}">Novo email</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="waves-effect">
                    <i class="icon-people fa-fw"></i> 
                    <span class="hide-menu">
                        Leads<span class="fa arrow"></span>
                        <span class="label label-rouded label-info pull-right">3</span>                            
                    </span>
                </a>
                <ul class="nav nav-second-level">
                    <li> <a href="{{ route('leads.index') }}">Lista de Leads</a></li>
                    <!--li> <a href="{{ route('leads.create') }}">Add Leads</a></li-->
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="waves-effect">
                    <i class="icon-people fa-fw"></i> 
                    <span class="hide-menu">Clientes<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="{{ route('customers.index') }}">Todos os Clientes</a></li>
                    <li> <a href="{{ route('customers.create') }}">Adicionar Clientes</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="waves-effect">
                    <i class="icon-magnet fa-fw"></i> 
                    <span class="hide-menu">Sites<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="{{ route('sites.index') }}">Todos os Sites</a></li>
                    <li> <a href="{{ route('sites.create') }}">Adicionar Site</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="waves-effect">
                    <i class="icon-people fa-fw"></i> 
                    <span class="hide-menu">
                        Usuários<span class="fa arrow"></span>
                        <span class="label label-rouded label-info pull-right">3</span>                            
                    </span>
                </a>
                <ul class="nav nav-second-level">
                    <li> <a href="{{ route('users.index') }}">Usuários</a></li>
                    <li> <a href="{{ route('users.create') }}">Novo Usuário</a></li>
                    <li> <a href="{{ route('roles.index') }}">Funções</a></li>
                    <!--li> <a href="{{ route('roles.create') }}">Nova função</a></li-->
                    <li> <a href="{{ route('permissions.index') }}">Permissões</a></li>
                    <!--li> <a href="{{ route('permissions.create') }}">Nova permição</a></li-->
                </ul>
            </li>
            <!--li><a href="javascript:void(0);" class="waves-effect">
                    <i class="icon-docs fa-fw"></i> 
                    <span class="hide-menu">Relatórios<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="{{ route('reports.index') }}">Relatórios de clientes</a></li>
                    <li> <a href="{{ route('reports.index') }}">Relatórios de vendas</a></li>
                    <li> <a href="{{ route('reports.index') }}">Relatórios de Leads</a></li>
                </ul>
            </li>            
            <li><a href="javascript:void(0);" class="waves-effect">
                    <i class="icon-handbag fa-fw"></i> 
                    <span class="hide-menu">Fornecedores<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="{{ route('vendors.index') }}">Todos os fornecedores</a></li>
                    <li> <a href="{{ route('vendors.create') }}">Adicionar Fornecedores</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="waves-effect">
                    <i class="ti-clipboard fa-fw"></i> 
                    <span class="hide-menu">Fatura<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="{{ route('invoices.index') }}">Todas as faturas</a></li>
                    <li> <a href="{{ route('invoices.index') }}">Adicionar fatura</a></li>
                </ul>
            </li-->
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="waves-effect">
                    <i class="icon-logout fa-fw"></i> 
                    <span class="hide-menu">Log out</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
</div>