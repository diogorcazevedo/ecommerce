@extends('app')


@section('content')
    <div class="container">
        <h3>Editar Categorias: {{$category->name}}</h3>

        @include('errors._check')


    {!! Form::model($category,['route'=>['categories.update',$category->id]]) !!}

        @include('categories._form')

        <div class="form-group">

            {!! Form::submit('Editar categoria',['class'=>'btn btn-primary']) !!}
        </div>


    {!! Form::close()!!}
 </div>


@endsection