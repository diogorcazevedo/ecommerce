@extends('app')


@section('content')
    <div class="container">

        <h3>Lista de categorias</h3>
        <br/>
        <a class="btn btn-default btn-primary" href="{{route('categories.create')}}">Create Category</a>
        <br/>
        <br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Description</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                   <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td>
                        <a href="{{route('categories.edit',['id'=>$category->id])}}" class="btn btn-xs btn-primary">Editar</a>
                        <a href="{{route('categories.destroy',['id'=>$category->id])}}" class="btn btn-xs btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $categories->render() !!}
    </div>


@endsection

