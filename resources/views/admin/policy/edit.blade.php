@extends('layouts.cms.app')
@section('title', 'Edit Privacy Policy')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        @include('admin.partials.messages')
        @include('admin.partials.errors', ['errors' => $errors])

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Update Privacy Policy</h5>
                    </div>
                    <div class="ibox-content" id="app">
                        {!! Form::model($policy, [
                        'method' => 'PATCH',
                        'url'    => ['admin/policy', $policy->id],
                        'class'  => 'form-horizontal',
                        'files'  => true
                        ]) !!}
                        @include('admin.policy.partials.form', ['errors' => $errors])
                        @include('admin.partials.buttons', ['label' => 'Save'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
