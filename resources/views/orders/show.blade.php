@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-12 col-md-6">
        <h2 class="mb-3">Order details:</h2>
        <h4>Customer</h4>
        <p>{{ $order->customer->fullname }}</p>
        <h4>Title</h4>
        <p>{{ $order->title }}</p>
        <h4>Description</h4>
        <p>{{ $order->description }}</p>
        <h4>Cost</h4>
        <p>€ {{ number_format($order->cost, 2, ',', '.') }}</p>
    </div>
    <div class="col-12 col-lg-6">
      <h2 class="mb-3">Tags</h2>
      <div class="mb-4">
          @foreach($order->tags as $tag)
          <span class="bagde bg-primary py-1 px-2">{{ $tag->name }}</span>
          @endforeach
      </div>

      <h2 class="mb-3">Contract</h2>
      <h4>{{ $order->contract->title }}</h4>
      <p>{{ $order->contract->description }}</p>
    </div>
  </div>
  <a href="{{ route('orders.index') }}" class="btn btn-warning">Go back</a>
@stop