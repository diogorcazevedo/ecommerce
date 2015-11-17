@extends('app')


@section('content')
    <div class="container well well-sm">
        <h3 class="well well-sm">Editar Ordens Pedidos #{{$order->id}} - R$ {{$order->total}} </h3>
        <h4 class="well well-sm">Cliente: {{$order->client->user->name}}</h4>
        <h4 class="well well-sm">Data: {{$order->created_at}}</h4>
        <p class="well well-sm">Entregar em:</br>
          End:  {{$order->client->address}} - Cidade: {{$order->client->city}} - Estado: {{$order->client->state}}
        </p>
 </div>
    </br>


    @include('errors._check')


    {!! Form::model($order,['route'=>['admin.orders.update',$order->id]]) !!}

    @include('admin.orders._form')

    <div class="form-group">
        {!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
    </div>


    {!! Form::close()!!}
@endsection