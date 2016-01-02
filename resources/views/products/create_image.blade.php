@extends('app')


@section('content')
    <div class="container">
        <h3>Upload Imagem</h3>

        @include('errors._check')

    {!! Form::open(['route'=>['products.images.store',$product->id],'method'=>'post','enctype'=>'multipart/form-data']) !!}

        @include('products._formUpload')

        <div class="form-group">

            {!! Form::submit('Salvar',['class'=>'btn btn-primary']) !!}
        </div>


    {!! Form::close()!!}
 </div>


@endsection