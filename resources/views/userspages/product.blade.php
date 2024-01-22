@extends('layout')
@section('title','ProductInfo')
@section('content')
<style>
body{
  background-color: #eee;
}
div.stars {
  display: inline-block;
}

input.star { display: none; }
label.star {
  float: right;
  padding: 6px; 
  font-size: 20px;
  color: #4A148C;
  transition: all .2s;
}
input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}
input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}
input.star-1:checked ~ label.star:before { color: #F62; }  
label.star:hover { transform: rotate(-15deg) scale(1.3); }
label.star:before {
   content: '\f006';
  font-family: FontAwesome;
}
  </style>
@livewire('productinfo', ['productId' =>$Product_id])
@endsection