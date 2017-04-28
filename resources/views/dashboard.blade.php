@extends('layouts.default')

@section('content')

@include('partials.bg-title')
<div class="row">
    <div class="col-md-3 col-sm-6">
        <div class="white-box">
            <div class="r-icon-stats">
                <i class="ti-user bg-danger"></i>
                <div class="bodystate">
                    <h4>3564</h4>
                    <span class="text-muted">New Customers</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="white-box">
            <div class="r-icon-stats">
                <i class="ti-shopping-cart bg-info"></i>
                <div class="bodystate">
                    <h4>342</h4>
                    <span class="text-muted">New Products</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="white-box">
            <div class="r-icon-stats">
                <i class="ti-wallet bg-success"></i>
                <div class="bodystate">
                    <h4>56%</h4>
                    <span class="text-muted">Today's Profit</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="white-box">
            <div class="r-icon-stats">
                <i class="ti-star bg-inverse"></i>
                <div class="bodystate">
                    <h4>56%</h4>
                    <span class="text-muted">New Leads</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/row -->
<!--row -->
<div class="row">
    <div class="col-md-5 col-lg-4 col-sm-12 col-xs-12">
        <div class="white-box">
            <h3 class="box-title">Leads by Source</h3>
            <div id="morris-donut-chart" class="ecomm-donute" style="height: 317px;"></div>
            <ul class="list-inline m-t-30 text-center">
                <li class="p-r-20">
                    <h5 class="text-muted"><i class="fa fa-circle" style="color: #fb9678;"></i> Ads</h5>
                    <h4 class="m-b-0">8500</h4>
                </li>
                <li class="p-r-20">
                    <h5 class="text-muted"><i class="fa fa-circle" style="color: #01c0c8;"></i> Tredshow</h5>
                    <h4 class="m-b-0">3630</h4>
                </li>
                <li>
                    <h5 class="text-muted"> <i class="fa fa-circle" style="color: #4F5467;"></i> Web</h5>
                    <h4 class="m-b-0">4870</h4>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-7 col-lg-8 col-sm-12 col-xs-12">
        <div class="white-box">
            <h3 class="box-title">Top Products sales</h3>
            <ul class="list-inline text-center">
                <li>
                    <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>iMac</h5>
                </li>
                <li>
                    <h5><i class="fa fa-circle m-r-5" style="color: #b4becb;"></i>iPhone</h5>
                </li>
            </ul>
            <div id="morris-area-chart2" style="height: 370px;"></div>
        </div>
    </div>
</div>
<!-- row -->
<!-- .row -->
<div class="row">
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="white-box">
            <h3 class="box-title"><small class="pull-right m-t-10 text-success"><i class="fa fa-sort-asc"></i> 18% High then last month</small> Total Leads</h3>
            <div class="stats-row">
                <div class="stat-item">
                    <h6>Overall Growth</h6>
                    <b>80.40%</b></div>
                <div class="stat-item">
                    <h6>Montly</h6>
                    <b>15.40%</b></div>
                <div class="stat-item">
                    <h6>Day</h6>
                    <b>5.50%</b></div>
            </div>
            <div id="sparkline8" class="minus-mar"></div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="white-box">
            <h3 class="box-title"><small class="pull-right m-t-10 text-danger"><i class="fa fa-sort-desc"></i> 18% High then last month</small>Total Vendor</h3>
            <div class="stats-row">
                <div class="stat-item">
                    <h6>Overall Growth</h6>
                    <b>80.40%</b></div>
                <div class="stat-item">
                    <h6>Montly</h6>
                    <b>15.40%</b></div>
                <div class="stat-item">
                    <h6>Day</h6>
                    <b>5.50%</b></div>
            </div>
            <div id="sparkline9" class="minus-mar"></div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="white-box">
            <h3 class="box-title"><small class="pull-right m-t-10 text-success"><i class="fa fa-sort-asc"></i> 18% High then last month</small>Invoice Generate</h3>
            <div class="stats-row">
                <div class="stat-item">
                    <h6>Overall Growth</h6>
                    <b>80.40%</b></div>
                <div class="stat-item">
                    <h6>Montly</h6>
                    <b>15.40%</b></div>
                <div class="stat-item">
                    <h6>Day</h6>
                    <b>5.50%</b></div>
            </div>
            <div id="sparkline10" class="minus-mar"></div>
        </div>
    </div>
</div>
<!-- /.row -->
<!-- /row -->
<div class="row">
    <div class="col-sm-6">
        <div class="white-box">
            <h3 class="box-title m-b-0">New Customers List</h3>
            <p class="text-muted">this is the sample data here for crm</p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Deshmukh</td>
                            <td>Prohaska</td>
                            <td>@Genelia</td>
                            <td><span class="label label-danger">admin</span> </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Deshmukh</td>
                            <td>Gaylord</td>
                            <td>@Ritesh</td>
                            <td><span class="label label-info">member</span> </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Sanghani</td>
                            <td>Gusikowski</td>
                            <td>@Govinda</td>
                            <td><span class="label label-warning">developer</span> </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Roshan</td>
                            <td>Rogahn</td>
                            <td>@Hritik</td>
                            <td><span class="label label-success">supporter</span> </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Joshi</td>
                            <td>Hickle</td>
                            <td>@Maruti</td>
                            <td><span class="label label-info">member</span> </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Nigam</td>
                            <td>Eichmann</td>
                            <td>@Sonu</td>
                            <td><span class="label label-success">supporter</span> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="white-box">
            <h3 class="box-title m-b-0">New Product List</h3>
            <p class="text-muted">this is the sample data here for crm</p>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Products</th>
                            <th>Popularity</th>
                            <th>Sales</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Milk Powder</td>
                            <td><span class="peity-line" data-width="120" data-peity='{ "fill": ["#13dafe"], "stroke":["#13dafe"]}' data-height="40">0,-3,-2,-4,-5,-4,-3,-2,-5,-1</span> </td>
                            <td><span class="text-danger text-semibold"><i class="fa fa-level-down" aria-hidden="true"></i> 28.76%</span> </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Air Conditioner</td>
                            <td><span class="peity-line" data-width="120" data-peity='{ "fill": ["#13dafe"], "stroke":["#13dafe"]}' data-height="40">0,-1,-1,-2,-3,-1,-2,-3,-1,-2</span> </td>
                            <td><span class="text-warning text-semibold"><i class="fa fa-level-down" aria-hidden="true"></i> 8.55%</span> </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>RC Cars</td>
                            <td><span class="peity-line" data-width="120" data-peity='{ "fill": ["#13dafe"], "stroke":["#13dafe"]}' data-height="40">0,3,6,1,2,4,6,3,2,1</span> </td>
                            <td><span class="text-success text-semibold"><i class="fa fa-level-up" aria-hidden="true"></i> 58.56%</span> </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Down Coat</td>
                            <td><span class="peity-line" data-width="120" data-peity='{ "fill": ["#13dafe"], "stroke":["#13dafe"]}' data-height="40">0,3,6,4,5,4,7,3,4,2</span> </td>
                            <td><span class="text-info text-semibold"><i class="fa fa-level-up" aria-hidden="true"></i> 35.76%</span> </td>
                        </tr>
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
<link href="{{ asset('plugins/bower_components/morrisjs/morris.css') }}" rel="stylesheet">
<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/colors/gray-dark.css') }}" id="theme" rel="stylesheet">
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
<script src="{{ asset('plugins/bower_components/raphael/raphael-min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/morrisjs/morris.js') }}"></script>
<script src="{{ asset('plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/peity/jquery.peity.init.js') }}"></script>
<script src="{{ asset('js/dashboard1.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>       
<script src="{{ asset('plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
@endpush