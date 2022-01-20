<div class="row">
    <div class="col-lg-12 mb-20">
        <p>(*) Required fields</p>
    </div>
    <div class="col-lg-6">
        <fieldset>
            <div class="form-group row {{ $errors->has('nombre') ? 'has-error' : ''}}">
                {!! Form::label('nombre', '*Nombre: ', ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                <div class="col-md-7">
                    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder'=>"Nombre", "required"]) !!}
                    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('apellido') ? 'has-error' : ''}}">
                {!! Form::label('apellido', '*Apellido: ', ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                <div class="col-md-7">
                    {!! Form::text('apellido', null, ['class' => 'form-control', 'placeholder'=>"Apellido", "required"]) !!}
                    {!! $errors->first('apellido', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', '*Email: ', ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                <div class="col-md-7">
                    {!! Form::email('email', null, ['class' => 'form-control','required', 'placeholder'=>"Email","required"]) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            @if (!isset($user))
                <div class="form-group row {{ $errors->has('password') ? 'has-error' : ''}}">
                    {!! Form::label('password', '*Password: ', ['class' => 'col-md-4 form-control-label text-md-left']) !!}
                    <div class="col-md-7">
                        @if(isset($user))
                            <input type="hidden" name="password" value={{$user->password}}>
                        @else
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder'=>"Password",'required']) !!}
                        @endif
                        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            @endif
            <div class="form-group row {{ $errors->has('direccion') ? 'has-error' : ''}}">
                {!! Form::label('direccion', '*Dirección: ', ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                <div class="col-md-7">
                    {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder'=>"Dirección", "required"]) !!}
                    {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('ciudad') ? 'has-error' : ''}}">
                {!! Form::label('ciudad', '*Ciudad: ', ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                <div class="col-md-7">
                    {!! Form::text('ciudad', null, ['class' => 'form-control', 'placeholder'=>"Ciudad", "required"]) !!}
                    {!! $errors->first('ciudad', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('cuit') ? 'has-error' : ''}}">
                {!! Form::label('cuit', '*Cuit: ', ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                <div class="col-md-7">
                    {!! Form::text('cuit', null, ['class' => 'form-control', 'placeholder'=>"Cuit", "required"]) !!}
                    {!! $errors->first('cuit', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('dni_mano') ? 'has-error' : ''}}">
                {{ Form::label('dni_mano', 'DNI Mano:', ['class' => 'col-md-4 form-control-label text-md-right']) }}
                <div class="col-lg-7">
                    @if(isset($user->dni_mano) && $user->dni_mano != '')
                        <input type="hidden" name="dni_mano" value="{{ $user->dni_mano }}">
                        <div class="thumb">
                            <img src="{{ url('img/user_images/'.$user->dni_mano) }}" width="200px"/>
                        </div>
                    @endif
                    <input type="file" name="dni_mano" accept="image/*"/>
                    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('dni_frente') ? 'has-error' : ''}}">
                {{ Form::label('dni_frente', 'DNI Frente:', ['class' => 'col-md-4 form-control-label text-md-right']) }}
                <div class="col-lg-7">
                    @if(isset($user->dni_frente) && $user->dni_frente != '')
                        <input type="hidden" name="dni_frente" value="{{ $user->dni_frente }}">
                        <div class="thumb">
                            <img src="{{ url('img/user_images/'.$user->dni_frente) }}" width="200px"/>
                        </div>
                    @endif
                    <input type="file" name="dni_frente" accept="image/*"/>
                    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('dni_dorso') ? 'has-error' : ''}}">
                {{ Form::label('dni_dorso', 'DNI Dorso:', ['class' => 'col-md-4 form-control-label text-md-right']) }}
                <div class="col-lg-7">
                    @if(isset($user->dni_dorso) && $user->dni_dorso != '')
                        <input type="hidden" name="dni_dorso" value="{{ $user->dni_dorso }}">
                        <div class="thumb">
                            <img src="{{ url('img/user_images/'.$user->dni_dorso) }}" width="200px"/>
                        </div>
                    @endif
                    <input type="file" name="dni_dorso" accept="image/*"/>
                    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('razon_social') ? 'has-error' : ''}}">
                {!! Form::label('razon_social', '*Razón Social: ', ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                <div class="col-md-7">
                    {!! Form::text('razon_social', null, ['class' => 'form-control', 'placeholder'=>"razon_social","required"]) !!}
                    {!! $errors->first('razon_social', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('cargo') ? 'has-error' : ''}}">
                {!! Form::label('cargo', '*Cargo: ', ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                <div class="col-md-7">
                    {!! Form::text('cargo', null, ['class' => 'form-control', 'placeholder'=>"cargo","required"]) !!}
                    {!! $errors->first('cargo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('user_role') ? 'has-error' : ''}}">
                {!! Form::label('user_role', '*Rol: ', ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                <div class="col-md-7">
                    {!! Form::select('user_role', \App\User::roles_list(),null, ['class' => 'form-control', 'placeholder'=>"Rol...", "required"]) !!}
                    {!! $errors->first('user_role', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </fieldset>
    </div>

    <div class="col-lg-6">
        <fieldset>

        </fieldset>
    </div>
</div>
<br>
