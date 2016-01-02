@extends('layout.layout')


@section('img_layout')
            @foreach($colections as $colection)
                <a href="{{route('store.colection',['id'=>$colection->id])}}">
                    <img class="img-responsive" src="{{url('uploads/colections/'.$colection->images->first()->id.'.'.$colection->images->first()->extension)}} " alt="" />
                </a>
            @endforeach
@endsection

@section('modal')
    @include('layout.modal._carla')
    @include('layout.modal._enderecos')
@endsection