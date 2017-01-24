@extends('layout')
@section('content')
    <div class="col-md-4 col-md-offset-4">
        {!! Form::open(['url'=>'/auth/register']) !!}
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password_confirmation', 'Password Confirm:') !!}
            {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
        </div>
        {!! Form::submit('注册',['class'=>'btn btn-primary form-control']) !!}
        {!! Form::close() !!}
    </div>
@endsection
