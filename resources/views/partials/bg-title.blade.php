<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">
            @if(isset($title))
            {{ $title }}
            @endif
        </h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        @if(isset($buttons) && is_array($buttons))
        @foreach($buttons as $b)
        <a href="" class="btn btn-{{ $b['btn'] or 'primary'}} pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">{{ $b['text'] }}</a>
        @endforeach
        @endif
        @if(isset($breadcrumbs) && is_array($breadcrumbs))
        <ol class="breadcrumb">
            @foreach($breadcrumbs as $bc)            
            @if (!$loop->last or isset($bc['href']))
            <li><a href="{{ $bc['href'] or '' }}">{{ $bc['text'] }}</a></li>
            @else
            <li class="active">{{ $bc['text'] }}</li>
            @endif            
            @endforeach
        </ol>
        @endif
    </div>
</div>