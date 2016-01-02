@extends('app')


@section('content')
    <div class="container">
        <h3>Images of {{$colection->name}}</h3>
        <br/>
        <a href="{{route('admin.colectionsimage.create',['id'=>$colection->id])}}" class="btn btn-default btn-info">Nova Imagem</a>
        <br/>
        <br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Nome da Imagem</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($colection->images as $image)
            <tr>
                <td>{{$image->id}}</td>
                <td><img src="{{url('uploads/colections/'.$image->id.'.'.$image->extension)}}" width="100"/> </td>
                <td>{{$image->id.'.'.$image->extension}}</td>
                <td>
                    <a href="{{route('admin.colectionsimage.destroy',['id'=>$image->id])}}" class="btn-sm btn btn-danger">
                        Delete
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
<a href="{{route('admin.colections.index')}}" class="btn btn-default btn-primary">Coleções</a>
    </div>


@endsection