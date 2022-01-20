@extends('layouts.cms.app')
@section('title', 'Edit Terms of Use')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        @include('admin.partials.messages')
        @include('admin.partials.errors', ['errors' => $errors])

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Actualizar Términos de uso</h5>
                    </div>
                    <div class="ibox-content" id="app">
                        {!! Form::model($term, [
                        'method' => 'PATCH',
                        'url'    => ['admin/terms', $term->id],
                        'class'  => 'form-horizontal',
                        'files'  => true
                        ]) !!}
                        @include('admin.terms.partials.form', ['errors' => $errors])
                        @include('admin.partials.buttons', ['label' => 'Save'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
