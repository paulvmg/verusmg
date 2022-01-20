@extends('layouts.cms.app')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Terms of Use</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('admin/terms')}}">Home</a>
                </li>
                <li>
                    <a>Terms of Use</a>
                </li>
                <li class="active">
                    <strong>Create</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Form <small>Terms of Use Create</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12 b-r" id="app">
                                @include('admin.partials.errors', ['errors' => $errors])
                                {!! Form::open([
                                    'url' => 'admin/terms',
                                    'class' => 'form-horizontal',
                                    'files'=>true,
                                    'autocomplete'=>'off'
                                ]) !!}
                                @include('admin.terms.partials.form', ['errors' => $errors])
                                @include('admin.partials.buttons', ['label' => 'Create'])
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
