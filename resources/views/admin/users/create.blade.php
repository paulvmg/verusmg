@extends('layouts.cms.app')
@section('title','New User')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Users</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('admin/users')}}">Home</a>
                </li>
                <li>
                    <a>Users</a>
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
                        <h5>Create <small>User</small></h5>
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
                                    'url' => 'admin/users',
                                    'class' => 'form-horizontal cms-form',
                                    'redirect'=> url('admin/users'),
                                    'files'=>true,
                                    'autocomplete'=>'off'
                                ]) !!}
                                @include('admin.users.partials.form', ['errors' => $errors])
                                @include('admin.partials._upload',['accept'=>'.jpg,.jpeg,.png,.gif'] )
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
