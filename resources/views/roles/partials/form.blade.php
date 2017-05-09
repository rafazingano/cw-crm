<div class="row">
    <div class="col-sm-12">
        @include('partials.alert')
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title">Informações da função</h3>
            <div class="form-group">
                {!! Form::label('title', trans('role.title'), ['for' => 'inputTitle', 'class' => 'col-md-2 ']) !!}
                <div class="col-md-10">
                    {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'inputTitle']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('slug', trans('role.slug'), ['for' => 'inputSlug', 'class' => 'col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::text('slug', null, ['class' => 'form-control', 'id' => 'inputSlug']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('level', trans('role.level'), ['for' => 'inputLevel', 'class' => 'col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::select('level', $levels, null, ['class' => "form-control", 'id' => 'inputLevel']) !!}  
                </div>
            </div>
            <div class="form-group">
                <h5 class="box-title">{{ trans('role.permissions') }}</h5>                
                {!! Form::select('permissions[]', $permissions, null, ['id' => 'permissions', 'multiple' => true]) !!}               
                <div class="button-box m-t-20"> 
                    <a id="select-all" class="btn btn-danger btn-outline" href="#">selecionar todos</a> 
                    <a id="deselect-all" class="btn btn-info btn-outline" href="#">retirar todos</a> 
                    <a id="refresh" class="btn btn-warning btn-outline" href="#">Atualizar</a> 
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