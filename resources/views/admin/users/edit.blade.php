@extends('layouts.cms.app')
@section('title','Edit User')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        @include('admin.partials.messages')
        @include('admin.partials.errors', ['errors' => $errors])

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit User</h5>
                    </div>
                    <div class="ibox-content" id="app">
                        {!! Form::model($user, [
                        'method' => 'PATCH',
                        'url'    => ['admin/users', $user->id],
                        'class'  => 'form-horizontal cms-form',
                        'redirect'=> url('admin/users'),
                        'files'  => true
                        ]) !!}
                        @include('admin.users.partials.form', ['errors' => $errors])
                        @include('admin.partials._upload',['accept'=>'.jpg,.jpeg,.png,.gif'] )
                        @include('admin.partials.buttons', ['label' => 'Save'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
