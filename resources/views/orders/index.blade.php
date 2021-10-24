@extends('layouts.app')

@section('content')
<div class="row">
  <div class="offset-md-10 col-md-2">
    <a href="{{ route('orders.create') }}" class="btn btn-primary btn-block">+ New Order</a>
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-12">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Cost</th>
          <th scope="col">Customer</th>
          <th scope="col" colspan="3" class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($orders as $order)
          <tr>
            <th scope="row">{{ $order->id }}</th>
            <td>{{ $order->title }}</td>
            <td>{{ $order->description }}</td>
            <td>€ {{ number_format($order->cost, 2, ',', '.') }}</td>
            <td>{{ optional($order->customer)->fullname ?: '-' }}</td>
            <td><a href="{{ route('orders.show', $order) }}">[Show]</a></td>
            <td><a href="{{ route('orders.edit', $order) }}">[Edit]</a></td>
            <td>
              <form id="delete-order-{{ $order->id }}-form" action="{{ route('orders.destroy', $order) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-link p-0">[Delete]</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <th colspan="6" scope="row">No orders found</th>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    {{ $orders->links() }}
  </div>
</div>

@stop
