@extends('layouts.app')
@section('content')
<form action="{{ route('orders.update', $order) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="row">
    <div class="col-12 col-md-6">
      <h2 class="mb-4">Edit order</h2>
      @include('orders._form')
    </div>
    <div class="col-12 col-lg-6">
      <h2 class="mb-4">Attach tags</h2>
      @include('orders._tags')
    </div>
  </div>
  <button type="submit" class="btn btn-warning">Update</button>
</form>
@stop