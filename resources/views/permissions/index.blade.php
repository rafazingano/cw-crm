@extends('layouts.default')
@section('content')
@include('partials.bg-title', $bgtitle)
<div class="row">
    <div class="col-sm-12">
        @include('partials.alert')
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Todos os usuários</h3>
            <p class="text-muted m-b-30">Lista de todos os usuários</p>
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                            <th>{{ trans('permission.title') }}</th>
                            <th>{{ trans('permission.slug') }}</th>
                            <th class="hidden-xs">{{ trans('permission.created_at') }}</th>
                            <th class="hidden-xs">{{ trans('permission.updated_at') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $p)
                        <tr>
                            <td>{{ $p->title }}</td>
                            <td>{{ $p->slug }}</td>
                            <td class="center hidden-xs">{{ $p->created_at }}</td>
                            <td class="center hidden-xs">{{ $p->updated_at }}</td>
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
<link href="{{ asset('plugins/bower_components/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
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
<script src="{{ asset('plugins/bower_components/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('js/jszip.min.js') }}"></script>
<script src="{{ asset('js/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/buttons.print.min.js') }}"></script>
<script>
$('#LeadList').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ]
});
</script>
<script src="{{ asset('plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
@endpush