@extends('app')


@section('content')
    <div class="container">
        <h3>Novo Produto</h3>

        @include('errors._check')

    {!! Form::open(['route'=>'products.store']) !!}

        @include('products._form')

        <div class="form-group">

            {!! Form::submit('criar Produto',['class'=>'btn btn-primary']) !!}
        </div>


    {!! Form::close()!!}
 </div>


@endsection