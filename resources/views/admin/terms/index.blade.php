@extends('layouts.cms.app')
@section('title', 'Terms of Use')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        @include('admin.partials.messages')
        @include('admin.partials.errors', ['errors' => $errors])

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Terms of Use</h5>
                        <div class="ibox-tools">
                            {{--<a href="{{ url('admin/terms/create') }}">
                                <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"></i> Nuevo</button>
                            </a>--}}
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($terms as $item)
                                    <tr class="gradeX">
                                        <td>{{@$item->id}}</td>
                                        <td>{!! @$item->description !!}</td>
                                        <td>
                                            <a href="{{ url('admin/terms/' . @$item->id . '/edit') }}">
                                                <button type="submit" class="btn btn-primary btn-xs">Update</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
