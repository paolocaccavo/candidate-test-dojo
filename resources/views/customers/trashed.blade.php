@extends('layouts.app')

@section('content')
<div class="row">
  <div class="offset-md-10 col-md-2">
    <a href="{{ route('customers.create') }}" class="btn btn-primary btn-block">+ New Customer</a>
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-12">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Company</th>
          <th scope="col">Deleted at</th>
          <th scope="col">Restore</th>
        </tr>
      </thead>
      <tbody>
        @foreach($customers as $customer)
          <tr>
            <th scope="row">{{ $customer->id }}</th>
            <td>{{ $customer->first_name }}</td>
            <td>{{ $customer->last_name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->company }}</td>
            <td>{{ $customer->deleted_at->format('d/m/Y') }}</td>
            <td>
              <form id="restore-customer-{{ $customer->id }}-form" action="{{ route('customers.restore', $customer) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-link p-0">[Restore]</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    {{ $customers->links() }}
  </div>
</div>

@stop
