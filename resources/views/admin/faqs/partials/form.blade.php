<div class="row">
    <div class="col-lg-10">
        <fieldset>
            <div class="form-group row {{ $errors->has('question') ? 'has-error' : ''}}">
                {!! Form::label('question', 'Question: ', ['class' => 'col-md-4 form-control-label text-right']) !!}
                <div class="col-md-7">
                    {!! Form::text('question', null, ['class' => 'form-control', 'placeholder'=>"Question", "required"]) !!}
                    {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('answer') ? 'has-error' : ''}}">
                {!! Form::label('answer', 'Answer: ', ['class' => 'col-md-4 form-control-label text-right']) !!}
                <div class="col-md-7">
                    {!! Form::text('answer', null, ['class' => 'form-control', 'placeholder'=>"Answer", "required"]) !!}
                    {!! $errors->first('answer', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

        </fieldset>
    </div>

    <div class="col-lg-6">
        <fieldset>

        </fieldset>
    </div>
</div>
