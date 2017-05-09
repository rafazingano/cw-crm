<div class="row">
    <div class="col-sm-12">
        @include('partials.alert')
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="white-box">
            <h3 class="box-title">Informações do usuário</h3>

            <div class="form-group">
                {!! Form::label('name', 'Nome', ['class' => "col-md-12", 'for' => "name"]) !!}
                <div class="col-md-12">
                    {!! Form::text('name', null, ['class' => "form-control", 'placeholder' => "Digite o nome aqui"]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email', ['class' => "col-md-12", 'for' => "email"]) !!}
                <div class="col-md-12">
                    {!! Form::email('email', null, ['class' => "form-control", 'placeholder' => "Digite o email aqui"]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Senha', ['class' => "col-md-12", 'for' => "password"]) !!}
                <div class="col-md-12">
                    {!! Form::password('password', ['class' => "form-control", 'placeholder' => "Digite a senha aqui"]) !!}
                </div>
            </div> 
            <div class="form-group">
                {!! Form::label('roles', 'Função', ['class' => "col-md-12", 'for' => "roles"]) !!}
                <div class="col-md-12">
                     {!! Form::select('roles', $roles, isset($user)? $user->roles->pluck('id')->all() : null, ['class' => "form-control", 'multiple' => true]) !!}    
                </div>
            </div> 

            <div class="form-group">
                {!! Form::label('options[photo]', 'Imagem de perfil', ['class' => "col-md-12", 'for' => "options[photo]"]) !!}
                <div class="col-sm-12">
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                        <div class="form-control" data-trigger="fileinput"> 
                            <i class="glyphicon glyphicon-file fileinput-exists"></i> 
                            <span class="fileinput-filename"></span>
                        </div> 
                        <span class="input-group-addon btn btn-default btn-file"> 
                            <span class="fileinput-new">Select file</span> 
                            <span class="fileinput-exists">Mudar</span>
                            {!! Form::file('options[photo]') !!}
                        </span> 
                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a> 
                    </div>
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