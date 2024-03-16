@extends('layouts.app')
@section('content')
<div class="container marketing">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="">
                <div class="">Name: {{ $product->name }}</div>
                <div class="">Brand: {{ $product->marca }}</div>
                <div class="">Category: {{ $product->category }}</div>
                <div class="">Description: {{ $product->description }}</div>
                <img src="{{ asset($product->pic) }}" alt="" style="width:300px">
            </div>
        </div>
        </div>
@endsection
