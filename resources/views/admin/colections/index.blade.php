@extends('app')


@section('content')
    <div class="container">
        <h3>Coleções</h3>
        <br/>
        <a href="{{route('admin.colections.create')}}" class="btn btn-default btn-info">Nova Coleção</a>
        <br/>
        <br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($colections as $colection)
                <tr>
                    <td>{{$colection->id}}</td>
                    <td>{{$colection->name}}</td>
                    <td>
                        <a href="{{route('admin.colections.edit',['id'=>$colection->id])}}" class="btn-sm btn btn-primary">
                            Editar
                        </a>
                        <a href="{{route('admin.colectionsimage.index',['id'=>$colection->id])}}" class="btn-sm btn btn-primary">
                            Images
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $colections->render() !!}

    </div>


@endsection