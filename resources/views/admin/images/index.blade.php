@extends('app')


@section('content')
    <div class="container">
        <h3>Images of {{$product->name}}</h3>
        <br/>
        <a href="{{route('admin.images.create',['id'=>$product->id])}}" class="btn btn-default btn-info">Nova Imagem</a>
        <br/>
        <br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Extension</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product->images as $image)
            <tr>
                <td>{{$image->id}}</td>
                <td><img src="{{url('uploads/'.$image->id.'.'.$image->extension)}}"/> </td>
                <td>{{$image->extension}}</td>
                <td>
                    <a href="{{route('admin.images.destroy',['id'=>$image->id])}}" class="btn-sm btn btn-danger">
                        Delete
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
<a href="{{route('admin.products.index')}}" class="btn btn-default btn-primary">Produtos</a>
    </div>


@endsection