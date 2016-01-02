@extends('app')


@section('content')
    <div class="container">
        <h3>Editar Coleção: {{$colection->name}}</h3>

        @include('errors._check')


    {!! Form::model($colection,['route'=>['admin.colections.update',$colection->id]]) !!}

        @include('admin.colections._form')

        <div class="form-group">

            {!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
        </div>


    {!! Form::close()!!}
 </div>


@endsection