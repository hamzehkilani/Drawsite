@extends('layout')
@section('title','orderDetails')
@section('content')
@livewire('order-details', ['orderId' => $OrderID])

@endsection