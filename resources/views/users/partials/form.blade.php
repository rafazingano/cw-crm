<div class="row">
    <div class="col-sm-12">
        @include('partials.alert')
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="white-box">
            <h3 class="box-title">Informações do site</h3>

            <div class="form-group">
                {!! Form::label('customer_id', 'Cliente', ['class' => "col-md-12", 'for' => "customer_id"]) !!}
                </label>
                <div class="col-md-12">
                    {!! Form::select('customer_id', $customers, NULL, ['class' => "form-control", 'placeholder' => "Cliente"]) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('title', 'Titulo', ['class' => "col-md-12", 'for' => "title"]) !!}
                </label>
                <div class="col-md-12">
                    {!! Form::text('title', null, ['class' => "form-control", 'placeholder' => "Titulo para esse cliente"]) !!}
                </div>
            </div>            
        </div>
    </div>

    <div class="col-sm-6">
        <div class="white-box">
            
            
            <h3 class="box-title">Domínios</h3>
            
            <div class="panel panel-default">
                <div class="panel-heading">Lista de domínios deste site</div>
                <div class="panel-wrapper collapse in">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Domínio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($site))
                            @foreach($site->domains as $dmn)
                                <td>{{ $dmn->domain }}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('domain[][domain]', 'Adicionar nova URL do Domínio', ['class' => "col-md-12", 'for' => "domain[][domain]"]) !!}
                <div class="col-md-12">
                    {!! Form::text('domain[][domain]', null, ['class' => "form-control", 'placeholder' => "Digite a url do domínio aqui"]) !!}
                </div>
            </div>  
 
            
        </div>
    </div>

    <div class="col-sm-12">
        <div class="white-box">
            <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Salvar</button>
        </div>
    </div>
</div>