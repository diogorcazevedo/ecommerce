@extends('app')


@section('content')
    <div class="container">
        <h3>Nova Coleção</h3>

        @include('errors._check')

    {!! Form::open(['route'=>'admin.colections.store']) !!}

        @include('admin.colections._form')

        <div class="form-group">

            {!! Form::submit('criar',['class'=>'btn btn-primary']) !!}
        </div>


    {!! Form::close()!!}
 </div>


@endsection