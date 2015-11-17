@extends('app')


@section('content')
    <div class="container">
        <h3>Editar Produtos: {{$product->name}}</h3>

        @include('errors._check')


    {!! Form::model($product,['route'=>['admin.products.update',$product->id]]) !!}

        @include('admin.products._form')

        <div class="form-group">
            {!! Form::submit('Editar Produtos',['class'=>'btn btn-primary']) !!}
        </div>


    {!! Form::close()!!}
 </div>


@endsection