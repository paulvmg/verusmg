<div class="row">
    <div class="col-lg-10">
        <fieldset>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                {{ Form::label('description', 'Description: ', ['class' => 'col-md-3 form-control-label text-md-right']) }}
                <div class="col-md-12">
                    {{ Form::textArea('description', null, ['class' => 'form-control summernote', 'placeholder'=>"Description"]) }}
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
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

@section('js')
<script>
    $(document).ready(function(){
        $('.datepicker').datepicker({
            language: 'en',
            format: 'mm/dd/yyyy'
        });
    })
</script>
@endsection
