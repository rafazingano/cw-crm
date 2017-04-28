@extends('layouts.auth')

@section('content')
<section id="wrapper" class="login-register">
    <div class="login-box login-sidebar">
        <div class="white-box">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <form class="form-horizontal form-material" id="loginform" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <a href="javascript:void(0)" class="text-center db">
                    <img src="{{ asset('plugins/images/eliteadmin-logo-dark.png') }}" alt="Home" />
                    <br/>
                    <img src="{{ asset('plugins/images/eliteadmin-text-dark.png') }}" alt="Home" />
                </a>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} m-t-40">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" name="email" required="" placeholder="Email" value="{{ old('email') }}" autofocus>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password" required="" placeholder="Senha">
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-primary pull-left p-t-0">
                            <input id="checkbox-signup" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                   <label for="checkbox-signup"> Lembre-me </label>
                        </div>
                        <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right">
                            <i class="fa fa-lock m-r-5"></i> Esqueceu-se da senha?
                        </a> 
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Entrar</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                        <div class="social">
                            <a href="#" class="btn  btn-facebook" data-toggle="tooltip"  title="Login with Facebook"> 
                                <i aria-hidden="true" class="fa fa-facebook"></i> 
                            </a> 
                            <a href="#" class="btn btn-googleplus" data-toggle="tooltip"  title="Login with Google"> 
                                <i aria-hidden="true" class="fa fa-google-plus"></i> 
                            </a> 
                        </div>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>
                            Não tem uma conta? 
                            <a href="{{ url('/register') }}" class="text-primary m-l-5"><b>Inscrever-se</b></a>
                        </p>
                    </div>
                </div>
            </form>
            <form class="form-horizontal" id="recoverform" role="form" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} ">
                    <div class="col-xs-12">
                        <h3>Recuperar Senha</h3>
                        <p class="text-muted">Digite seu e-mail e as instruções serão enviadas para você! </p>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="" placeholder="Email" name="email" value="{{ $email or old('email') }}" autofocus>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@push('slyles')
<link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css') }}" rel="stylesheet">
<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/colors/gray-dark.css') }}" id="theme"  rel="stylesheet">
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
<script src=".{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>

<script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('js/waves.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>

@endpush