@extends('store.store')

@section('content')
    <div class="container">
        <div class="col-lg-4">
            @section('categories')
                @include('store.partial.categories')
            @endsection
        </div>
        <div class="col-lg-8">
            <h3>Meus Pedidos realizado com Sucesso</h3>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th>#ID</th>
                    <th>Itens</th>
                    <th>Valor</th>
                    <th>Status</th>
                </tr>
                </tbody>

                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>
                            <ul>
                            @foreach($order->items as $item)
                                <li>{{$item->product->name}}</li>
                            @endforeach
                            </ul>
                        </td>
                        <td>{{$order->total}}</td>
                        <td>{{$order->status}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection