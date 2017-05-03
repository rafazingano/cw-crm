<div class="row">
    <div class="col-sm-12">
        @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="white-box">
            <h3 class="box-title">Informações básicas</h3>
            <div class="form-group">
                {!! Form::label('customer[title]', 'Titulo', ['class' => "col-md-12", 'for' => "customer[title]"]) !!}
                </label>
                <div class="col-md-12">
                    {!! Form::text('customer[title]', null, ['class' => "form-control", 'placeholder' => "Titulo para esse cliente"]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('customer[options][phone]', 'Telefone', ['class' => "col-md-12", 'for' => "customer[options][phone]"]) !!}
                </label>
                <div class="col-md-12">
                    {!! Form::text('customer[options][phone]', null, ['class' => "form-control", 'placeholder' => "Telefone do cliente", 'data-mask' => "(999) 9999-9999"]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('customer[options][cellphone]', 'Celular', ['class' => "col-md-12", 'for' => "customer[options][cellphone]"]) !!}
                </label>
                <div class="col-md-12">
                    {!! Form::text('customer[options][cellphone]', null, ['class' => "form-control", 'placeholder' => "Telefone celular do cliente", 'data-mask' => "(999) 9999-9999"]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('customer[options][email]', 'Email do cliente', ['class' => "col-md-12", 'for' => "customer[options][email]"]) !!}
                <div class="col-md-12">
                    {!! Form::email('customer[options][email]', null, ['class' => "form-control", 'placeholder' => "Digite o email do clienteaqui"]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('customer[options][description]', 'Descrição', ['class' => "col-md-12", 'for' => "customer[options][description]"]) !!}
                <div class="col-md-12">
                    {!! Form::textarea('customer[options][description]', null, ['class' => "form-control", 'rows' => "3", 'placeholder' => "Descrição da empresa"]) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="white-box">
            <h3 class="box-title">Informações do usuário</h3>
            <p class="help-block">Estas informações são de acesso do usuário dono da conta cliente.</p>
            <div class="form-group">
                {!! Form::label('user[name]', 'Nome', ['class' => "col-md-12", 'for' => "user[name]"]) !!}
                <div class="col-md-12">
                    {!! Form::text('user[name]', null, ['class' => "form-control", 'placeholder' => "Digite o nome aqui"]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('user[email]', 'Email', ['class' => "col-md-12", 'for' => "user[email]"]) !!}
                <div class="col-md-12">
                    {!! Form::email('user[email]', null, ['class' => "form-control", 'placeholder' => "Digite o email aqui"]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('user[password]', 'Senha', ['class' => "col-md-12", 'for' => "user[password]"]) !!}
                <div class="col-md-12">
                    {!! Form::password('user[password]', ['class' => "form-control", 'placeholder' => "Digite a senha aqui"]) !!}
                </div>
            </div> 

            <div class="form-group">
                {!! Form::label('user[options][photo]', 'Imagem de perfil', ['class' => "col-md-12", 'for' => "user[options][photo]"]) !!}
                <div class="col-sm-12">
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                        <div class="form-control" data-trigger="fileinput"> 
                            <i class="glyphicon glyphicon-file fileinput-exists"></i> 
                            <span class="fileinput-filename"></span>
                        </div> 
                        <span class="input-group-addon btn btn-default btn-file"> 
                            <span class="fileinput-new">Select file</span> 
                            <span class="fileinput-exists">Mudar</span>
                            {!! Form::file('user[options][photo]') !!}
                        </span> 
                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-sm-6">
        <div class="white-box">
            <h3 class="box-title">Localização</h3>
            <div class="form-group">
                {!! Form::label('customer[options][country]', 'País', ['class' => "col-md-12", 'for' => "customer[options][country]"]) !!}
                <div class="col-md-12">
                    {!! Form::text('customer[options][country]', null, ['class' => "form-control", 'placeholder' => "Digite o país aqui"]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('customer[options][state]', 'Estado', ['class' => "col-md-12", 'for' => "customer[options][state]"]) !!}
                <div class="col-md-12">
                    {!! Form::text('customer[options][state]', null, ['class' => "form-control", 'placeholder' => "Digite o estado aqui"]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('customer[options][city]', 'Cidade', ['class' => "col-md-12", 'for' => "customer[options][city]"]) !!}
                <div class="col-md-12">
                    {!! Form::text('customer[options][city]', null, ['class' => "form-control", 'placeholder' => "Digite a cidade aqui"]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('customer[options][neighborhood]', 'Bairro', ['class' => "col-md-12", 'for' => "customer[options][neighborhood]"]) !!}
                <div class="col-md-12">
                    {!! Form::text('customer[options][neighborhood]', null, ['class' => "form-control", 'placeholder' => "Digite o bairro aqui"]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('customer[options][address]', 'Endereço', ['class' => "col-md-12", 'for' => "customer[options][address]"]) !!}
                <div class="col-md-12">
                    {!! Form::text('customer[options][address]', null, ['class' => "form-control", 'placeholder' => "Digite o endereço aqui"]) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="white-box">
            <h3 class="box-title">Informações Sociais</h3>
            <div class="form-group">
                {!! Form::label('customer[options][facebook]', 'Facebook (Page)', ['class' => "col-md-12", 'for' => "customer[options][facebook]"]) !!}
                <div class="col-md-12">
                    {!! Form::text('customer[options][facebook]', null, ['class' => "form-control", 'placeholder' => "Digite a url da página do facebook aqui"]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('customer[options][twitter]', 'Twitter', ['class' => "col-md-12", 'for' => "customer[options][twitter]"]) !!}
                <div class="col-md-12">
                    {!! Form::text('customer[options][twitter]', null, ['class' => "form-control", 'placeholder' => "Digite a url do twitter aqui"]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('customer[options][linkedin]', 'Linkedin', ['class' => "col-md-12", 'for' => "customer[options][linkedin]"]) !!}
                <div class="col-md-12">
                    {!! Form::text('customer[options][linkedin]', null, ['class' => "form-control", 'placeholder' => "Digite a url do linkedin aqui"]) !!}
                </div>
            </div>

        </div>

    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Enviar</button>
        </div>
    </div>
</div>