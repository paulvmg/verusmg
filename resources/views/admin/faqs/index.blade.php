@extends('layouts.cms.app')
@section('title', "FAQ's")
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        @include('admin.partials.messages')
        @include('admin.partials.errors', ['errors' => $errors])

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>FAQ</h5>
                        <div class="ibox-tools">
                            <a href="{{ url('admin/faqs/create') }}">
                                <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"></i> New</button>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($faqs as $item)
                                    <tr class="gradeX">
                                        <td>{{ @$item->id }}</td>
                                        <td>{{ @$item->question }}</td>
                                        <td>{{ @$item->answer }}</td>
                                        <td>
                                            <a href="{{ url('admin/faqs/' . @$item->id . '/edit') }}">
                                                <button type="submit" class="btn btn-primary btn-xs">Update</button>
                                            </a>/
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['admin/faqs', @$item->id],
                                                'style' => 'display:inline',
                                                'onsubmit' => 'return confirm("Are you sure to delete this item?")'
                                            ]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                            {!! Form::close() !!}
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
