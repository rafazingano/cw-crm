@extends('layouts.default')
@section('content')
@include('partials.bg-title', ['title' => $customer['title']])
<div class="row">
    <div class="col-sm-12">
        @include('partials.alert')
    </div>
</div>

<div class="row">


    <div class="col-lg-6 col-sm-6 col-xs-12">
        <div class="white-box">
            <h3 class="box-title">Informações do cliente</h3>
            <p class="text-muted m-b-30">Use default tab with class <code>customtab</code></p>
            <!-- Nav tabs -->
            <ul class="nav customtab nav-tabs" role="tablist">
                <li role="presentation" class="nav-item"><a href="#home1" class="nav-link active" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Home</span></a></li>
                <li role="presentation" class="nav-item"><a href="#profile1" class="nav-link" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Profile</span></a></li>
                <li role="presentation" class="nav-item"><a href="#messages1" class="nav-link" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Messages</span></a></li>
                <li role="presentation" class="nav-item"><a href="#settings1" class="nav-link " aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-settings"></i></span> <span class="hidden-xs">Settings</span></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade active show" id="home1" aria-expanded="true">
                    <div class="col-md-6">
                        <h3>Bestxx Clean Tab ever</h3>
                        <h4>you can use it with the small code</h4>
                    </div>
                    <div class="col-md-5 pull-right">
                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="profile1" aria-expanded="false">
                    <div class="col-md-6">
                        <h3>{{ $customer->user->name }}</h3>
                        <h4>{{ $customer->user->email }}</h4>
                    </div>
                    <div class="col-md-5 pull-right">
                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="messages1" aria-expanded="false">
                    <div class="col-md-6">
                        <h3>Come on you have a lot message</h3>
                        <h4>you can use it with the small code</h4>
                    </div>
                    <div class="col-md-5 pull-right">
                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings1" aria-expanded="false">
                    <div class="col-md-6">
                        <h3>Just do Settings</h3>
                        <h4>you can use it with the small code</h4>
                    </div>
                    <div class="col-md-5 pull-right">
                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>



    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="panel panel-info">
            <div class="panel-heading">Sites do cliente</div>
            <div class="panel-wrapper collapse in">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Site</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customer->sites as $site)
                        <tr>
                            <td>{{ $site->title }}</td>
                            <td>{!! ($site->status == 'y')? '<span class="label label-success">Ativo</span>' : '<span class="label label-danger">Desativado</span>' !!}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="panel panel-info">
            <div class="panel-heading">Usuários do cliente</div>
            <div class="panel-wrapper collapse in">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customer->users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="panel panel-info">
            <div class="panel-heading">Leads do cliente</div>
            <div class="panel-wrapper collapse in">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customer->leads as $lead)
                        <tr>
                            <td>{{ $lead->code }}</td>
                            <td>{{ json_decode($lead->content)->email }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
@endpush

@push('scripts')
<script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap/dist/js/tether.min.js') }}"></script>
<script src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('js/waves.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
@endpush