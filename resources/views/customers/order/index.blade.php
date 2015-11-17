@extends('app')


@section('content')
    <div class="container">
        <h3>Meus pedidos</h3>
        <br/>
        <a href="{{route('customer.order.create')}}" class="btn btn-default btn-info">Nova Pedido</a>
        <br/>
        <br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->total}}</td>
                <td>{{$order->status}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {!! $orders->render() !!}

    </div>


@endsection