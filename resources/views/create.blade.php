@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Error!</strong>{{ $error }}
                </div>
            @endforeach
        @endif

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add New Student</h3>
            </div>
            <div class="panel-body">
               {{Form::open(array('route' => 'students.store'),['class'=>'form-horizontal'])}}
                    @include('layouts.form')
                {{ Form::close() }}

            </div>
        </div>
    </div>
@endsection