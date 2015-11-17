@extends('app')


@section('content')
    <div class="container">
        <h3>Clientes</h3>
        <br/>
        <a href=" {{route('admin.clients.create')}}" class="btn btn-default btn-info">Cadastrar Cliente</a>
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
            @foreach($clients as $client)
            <tr>
                <td>{{$client->id}}</td>
                <td>{{$client->user->name}}</td>
                <td>
                    <a href="{{route('admin.clients.edit',['id'=>$client->id])}}" class="btn-sm btn btn-primary">
                        Editar
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {!! $clients->render() !!}

    </div>


@endsection